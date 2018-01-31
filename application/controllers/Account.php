<?php
class Account extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');//handles images
		$this->load->database();
        $this->load->helper('url_helper');
        $this->load->helper('text');
		$this->load->library('session');
		
		if(!isset($_SESSION['userid'])){
			redirect(base_url()."signin".'?dest='.urlencode($_SERVER['REQUEST_URI']));
		}else{
 			$this->data['user_details']  = $this->jobseeker_mdl->user_full_details($this->session->userdata('userid'));
		}
		$this->data['recentpost'] = $this->post_mdl->getrecentpost();
		$this->data['adverts'] = $this->advert_mdl->getadvert();
		$this->data['popularpost'] = $this->post_mdl->getpopularpost();
		$this->data['featuredpost'] = $this->post_mdl->getfeaturedpost();
		$this->data['pagess'] = $this->page_model->getpages(1);
		$this->data['postcategory'] = $this->post_mdl->getcategory(1);
		$this->data['favicon'] = base_url().'images/ico/'.$this->page_model->getcms('icon');
		$this->data['logo'] = base_url().'images/'.$this->page_model->getcms('logo');
		$this->data['showpostupdate'] = true;
		$this->data['content1']='';
		$this->data['class1']='';
		$this->data['activepage'] = '';
	}

	public function addbook($page = 'addbooks')
	{
		$this->data['title'] = ucfirst($page); // Capitalize the first letter
		$this->data['class']='';
		$this->data['content']='';
		$this->data['category']='';
		if(isset($_POST['send'])){
			$this->post_mdl->uploadpost(); // Get Post from DB
			$this->data['content']=$this->session->flashdata('content');
			$this->data['class']=$this->session->flashdata('class');
			$this->data['category'] = trim($_POST['category']);
		}
		$this->data['activepage'] = $page;
		$this->data['title'] = ucfirst('Upload a book'); // Capitalize the first letter

		$this->data['categories'] = $this->post_mdl->getcategory(1);
		
		$this->load->view('general/header_account', $this->data);
		$this->load->view('account/'.$page, $this->data);
		$this->load->view('general/footer', $this->data);
	}

	public function addbrand($page = 'addbrand')
	{
		$this->data['title'] = ucfirst($page); // Capitalize the first letter
		$this->data['class']='';
		$this->data['content']='';
		if(isset($_POST['send'])){
			$this->advert_mdl->uploadadvert(); // Get Post from DB
			$this->data['content']=$this->session->flashdata('content');
			$this->data['class']=$this->session->flashdata('class');
		}
		$this->data['activepage'] = $page;
		$this->load->view('general/header_account', $this->data);
		$this->load->view('account/'.$page, $this->data);
		$this->load->view('general/footer', $this->data);
	}
	
	public function delete_entry(){
	
		$this->jobseeker_mdl->delete_entry($_REQUEST['id'],$_REQUEST['status']);
		redirect(base_url()."account/profile");
	}
	
	public function editbook($slug="")
	{
		$this->data['content']='';$this->data['class']='';
		
		if(isset($_POST['send'])){
			$this->post_mdl->editpost($slug);
			$this->data['content']=$this->session->flashdata('content');
			$this->data['class']=$this->session->flashdata('class');
		}
		$this->data['title'] = ucfirst('Update Library'); // Capitalize the first letter
		
		$this->data['books'] = $this->post_mdl->getsinglepost($slug);
		$this->data['categories'] = $this->post_mdl->getcategory(1);
		
		$this->load->view('general/header_account', $this->data);
		$this->load->view('account/editbooks', $this->data);
		$this->load->view('general/footer', $this->data);
	}
	
	public function editbrand($id="")
	{
		$this->data['content']='';$this->data['class']='';
		if(isset($_POST['submit'])){
			$this->advert_mdl->editadvert($id);
			$this->data['content']=$this->session->flashdata('content');
			$this->data['class']=$this->session->flashdata('class');
		}
		$this->data['title'] = ucfirst('Edit Brand'); // Capitalize the first letter
		
		$this->data['advert'] = $this->advert_mdl->getadvertsingle($id);
		$this->load->view('general/header_account', $this->data);
		$this->load->view('account/editadvert', $this->data);
		$this->load->view('general/footer', $this->data);
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url()."signin");
	}
		
	public function mybooks($action = '', $id='')
	{
		$page = 'viewbooks';
		$this->data['content']='';$this->data['class'] = "";

		$this->data['title'] = ucfirst("My Books"); // Capitalize the first letter

		if($action==="delete"){
			$this->data['content'] = $this->post_mdl->postdelete($id);
			$this->data['class'] = 'alert alert-success';
		}
		
		if($action==="changestatus"){
			$this->data['content'] = "Sorry! You are not allowed to perform the requested operation";
			$this->data['class'] = "alert alert-danger";
		}

		if($this->input->post('delete')!==null){
			$this->data['content'] = $this->post_mdl->postdeletegroup($id);
			$this->data['class'] = 'alert alert-success';
		}

		if($this->input->post('deactivate')!==null){
			$this->data['content'] = "Sorry! You are not allowed to perform the requested operation";
			$this->data['class'] = "alert alert-danger";
		}

		$this->data['posts'] = $this->post_mdl->getmyposts();
		$this->data['activepage'] = $page;
		$this->load->view('general/header_account', $this->data);
		$this->load->view('account/'.$page, $this->data);
		$this->load->view('general/footer', $this->data);
	}
	 
	public function myprofile()
	{
		$page = 'profile';
		$this->data['content']='';
		$this->data['activepage'] = $page;
		$this->data['title'] = ucfirst($page); // Capitalize the first letter
		$this->data['user'] = $this->users_mdl->getusers($_SESSION['userid']);
		
		$this->data['state']=$this->users_mdl->getState();
		
		$this->data['user_profile'] = $this->jobseeker_mdl->get_profile();
		$this->data['user_work_experience'] = $this->jobseeker_mdl->get_work_experience();
		$this->data['user_get_eduation'] = $this->jobseeker_mdl->get_eduation();
		$this->data['user_get_certifications'] = $this->jobseeker_mdl->get_certifications(); 
			
		$this->load->view('general/header_account', $this->data);
		$this->load->view('/account/profile/viewall',$this->data);
		//$this->load->view('account/js', $this->data);
		$this->load->view('account/footer', $this->data);
	}
	
	public function notification($page = 'notification')
	{
		$this->data['title'] = ucfirst($page); // Capitalize the first letter
		$this->data['class']='';
		$this->data['content']='';
		if(isset($_POST['send'])){
			$content = $this->page_model->voguepay_notification(); // Get Post from DB
			redirect(base_url().'article/'.$content);
		}
		$this->load->view('general/header_account', $this->data);
		$this->load->view('account/'.$page, $this->data);
		$this->load->view('general/footer', $this->data);
	}

	public function mybrand()
	{
		$page = 'viewadvert';
		$this->data['activepage'] = $page;
		$this->data['content']='';$this->data['class'] = "";

		$this->data['title'] = ucfirst("My Brand"); // Capitalize the first letter

		$this->data['advert'] = $this->advert_mdl->getmyadvert();
		
		$this->load->view('general/header_account', $this->data);
		$this->load->view('account/'.$page, $this->data);
		$this->load->view('general/footer', $this->data);
	}
	
	public function profiling($username="")
	{
		$this->data['content']='';
		$this->data['class']='';
		if(isset($_POST['iconbtn'])){
			$this->CMS_mdl->icon();
			$this->data['content']=$this->session->flashdata('content');
			$this->data['class']=$this->session->flashdata('class');
		}
		elseif(isset($_POST['logobtn'])){
			$this->CMS_mdl->logo();
			$this->data['content']=$this->session->flashdata('content');
			$this->data['class']=$this->session->flashdata('class');
		}
		elseif(isset($_POST['bannerbtn'])){
			$this->CMS_mdl->banner();
			$this->data['content']=$this->session->flashdata('content');
			$this->data['class']=$this->session->flashdata('class');
		}
		elseif(isset($_POST['wlcbtn'])){
			$this->CMS_mdl->welcome();
			$this->data['content']=$this->session->flashdata('content');
			$this->data['class']=$this->session->flashdata('class');
		}
		elseif(isset($_POST['servicebtn'])){
			$this->CMS_mdl->updateservice();
			$this->data['content']=$this->session->flashdata('content');
			$this->data['class']=$this->session->flashdata('class');
		}
		elseif(isset($_POST['serviceimgbtn'])){
			$this->CMS_mdl->uploadserviceimage();
			$this->data['content']=$this->session->flashdata('content');
			$this->data['class']=$this->session->flashdata('class');
		}
		$this->data['activepage'] = 'profile';
		$this->data['title'] = ucfirst('Corporate Profiling'); // Capitalize the first letter
		$this->load->view('general/header_account', $this->data);
		$this->load->view('account/profiling', $this->data); 
		$this->load->view('general/footer', $this->data);
	}

	public function updateprofile($page = 'updateprofile')
	{
		$this->data['title'] = ucfirst($page); // Capitalize the first letter
		$this->data['content']='';
		if($this->input->post('send')!==null){
			$this->data['content']=$this->users_mdl->updateprofile();
		}
		$this->data['activepage'] = 'profile';
		$this->data['lga']=$this->page_model->getlga();
		$this->data['country']=$this->users_mdl->getCountry();
		$this->data['state']=$this->users_mdl->getState();
		$this->data['user'] = $this->users_mdl->getusers($_SESSION['userid']);
		$this->load->view('general/header_account', $this->data);
		$this->load->view('account/'.$page, $this->data);
		$this->load->view('general/footer', $this->data);
	}

	//Skilljobs
	
	public function add_education(){
		$this->load->view('account/profile/add_education');
	}
	
	public function edit_education(){
 		$this->data['education_id'] = $_REQUEST['id'];
		$this->data['eduation'] = $this->jobseeker_mdl->get_eduation_full_details($_REQUEST['id']);
		$this->load->view('account/profile/edit_education',$this->data);
 	}
 	
 	public function add_education_entry(){
		$this->jobseeker_mdl->add_education_entry();
		redirect(base_url()."account/myprofile");
	}
	
	public function edit_education_entry(){
		
			$this->jobseeker_mdl->edit_education_entry($_REQUEST['id']);
			redirect(base_url()."account/myprofile");
	}
	
	public function add_work_experience(){
		$this->load->view('account/profile/add_work_exp');
	}
	
	public function add_work_experience_entry(){
			$this->jobseeker_mdl->add_work_experience();
			redirect(base_url()."account/myprofile");
	}
	
	public function edit_work_experience(){
 		$this->data['work_experience_id'] = $_REQUEST['id'];
		$this->data['work_experience'] = $this->jobseeker_mdl->get_work_experience_full_details($_REQUEST['id']);
		$this->load->view('account/profile/edit_work_exp',$this->data);
 	}
	
	
	public function edit_work_experience_entry(){
		
			$this->jobseeker_mdl->edit_work_experience_entry($_REQUEST['id']);
			redirect(base_url()."account/myprofile");
			
	}
	
	public function add_certification(){
		$this->load->view('account/profile/add_certification');
	}
	
	public function edit_certificate(){
 		$this->data['certificate_id'] = $_REQUEST['id'];
		$this->data['certification'] = $this->jobseeker_mdl->get_certification_full_details($_REQUEST['id']);
		$this->load->view('account/profile/edit_certificate',$this->data);
 	}
	
	public function add_certification_entry(){
			$this->jobseeker_mdl->add_certification_entry();
			redirect(base_url()."account/myprofile");
	}
	
	public function edit_certification_entry(){
		
			$this->jobseeker_mdl->edit_certification_entry($_REQUEST['id']);
			redirect(base_url()."account/myprofile");
	}
 	
	public function update_cv(){
		
			$this->jobseeker_mdl->update_cv();
			redirect(base_url()."account/myprofile");
			
	}
	
	public function profile_summary_edit(){
		
			$this->jobseeker_mdl->profile_summary_edit();
			redirect(base_url()."account/myprofile");

	}
	
	public function career_details_edit(){
		
			$this->jobseeker_mdl->career_details_edit();
			redirect(base_url()."account/myprofile");
	}
	
 	
	public function profile_details_basic_edit(){
		
			$this->jobseeker_mdl->profile_details_basic_edit();
			redirect(base_url()."account/myprofile");
			
	}	
	
	public function password_edit(){
	
			$this->jobseeker_mdl->password_edit();
			redirect(base_url()."account/account_setting");
			
	}
	
	public function email_address_edit(){
			$this->jobseeker_mdl->email_address_edit();
			redirect(base_url()."account/account_setting");
	}
	
	public function account_setting(){
			$this->data['page_title'] = 'Account Setting';  
			$this->data['newsletter'] = $this->jobseeker_mdl->get_newsletter($this->data['job_seeker_details']->email);  
			
			$this->load->view('Frontend/partials/top_header',$this->data);
			$this->load->view('Frontend/job_seeker/includes/menu',$this->data);
			$this->load->view('Frontend/job_seeker/account_setting/view', $this->data);
			$this->load->view('Frontend/job_seeker/includes/footer');
			$this->load->view('Frontend/partials/js');
	}
/*
	public function profile() {
	
			$this->data['page_title'] = 'Profile'; 
			$this->data['active_class'] = 'dashboard';
			$this->data['job_seeker_profile'] = $this->jobseeker_mdl->get_profile();
			$this->data['job_seeker_work_experience'] = $this->jobseeker_mdl->get_work_experience();
			$this->data['job_seeker_get_eduation'] = $this->jobseeker_mdl->get_eduation();
			$this->data['job_seeker_get_certifications'] = $this->jobseeker_mdl->get_certifications(); 
			
			$this->load->view('Frontend/partials/top_header',$this->data);
			$this->load->view('Frontend/job_seeker/includes/menu',$this->data);
			$this->load->view('Frontend/job_seeker/profile/viewall',$this->data);
			$this->load->view('Frontend/job_seeker/includes/footer');
			$this->load->view('Frontend/partials/js');
	}
 	 */
 	public function forgot_password(){
  
		$this->form_validation->set_rules('userName1', 'Login ID', 'required|valid_email'); 
		
		if($this->form_validation->run() === FALSE){
			
			$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
			 
			$this->data['page_title'] = 'Signin';
			$this->load->view('Frontend/partials/top_header',$this->data);
			$this->load->view('Frontend/job_seeker/includes/menu',$this->data);
			$this->load->view('Frontend/job_seeker/forgot_password/view',$this->data);
			$this->load->view('Frontend/job_seeker/includes/footer');
			$this->load->view('Frontend/partials/js');
		
		}else{
		
			$this->jobseeker_mdl->forgot_password();
 			redirect(base_url()."account/forgot_password");
		} 
	}
	
	public function recover_password(){
	
		$last = $this->uri->total_segments();
		$md5_id = $this->uri->segment($last);
		
		$this->form_validation->set_rules('new_password', 'Password', 'required'); 
		
		if($this->form_validation->run() === FALSE){
			
			$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
 			$this->data['page_title'] = 'Recover Password'; 
			$this->load->view('Frontend/partials/top_header',$this->data);
			$this->load->view('Frontend/job_seeker/includes/menu',$this->data);
			$this->load->view('Frontend/job_seeker/forgot_password/change_password');
			$this->load->view('Frontend/job_seeker/includes/footer');
			$this->load->view('Frontend/partials/js');
		
		}else{
		
			$this->jobseeker_mdl->recover_password($md5_id);
 			redirect(base_url()."job_seeker/signin");
		} 
	}
	
	public function activation(){
		 
		$last = $this->uri->total_segments();
		$md5_id = $this->uri->segment($last);
		
		$this->jobseeker_mdl->activate_profile($md5_id);
		 
		$this->data['page_title'] = 'Profile Activation'; 
		$this->load->view('Frontend/partials/top_header',$this->data);
		$this->load->view('Frontend/job_seeker/includes/menu',$this->data);
		$this->load->view('Frontend/job_seeker/activation/view');
		$this->load->view('Frontend/job_seeker/includes/footer');
		$this->load->view('Frontend/partials/js');
	}
	 

}
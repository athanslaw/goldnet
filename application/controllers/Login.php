<?php
class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');//handles images
		$this->load->database();
        $this->load->helper('url_helper');
		$this->load->library('session');
        $this->load->model('Login_mdl');
		$this->data['pagess'] = $this->page_model->getpages(1);
		$this->data['favicon'] = base_url().'images/'.$this->page_model->getcms('icon');
		$this->data['logo'] = base_url().'images/'.$this->page_model->getcms('logo');
		$this->data['postcategory'] = $this->post_mdl->getcategory(1);
		$this->data['content1']='';
		$this->data['class1']='';
		$this->data['activepage'] = '';
	}
	
	public function index(){
		$this->data['content'] = 'Supply your signin credentials here';
		$this->data['class'] = 'alert alert-warning';
		if($_POST){
 			$this->Login_mdl->check_admin_login();
			$this->data['content']=$this->session->flashdata('error');
 		}
		
		$this->data['title']=founder()->short_name.' - User Login';
		
		$this->load->view('general/header', $this->data);
        $this->load->view('general/login', $this->data);
		$this->load->view('general/footer', $this->data);
	}
	
	public function signin(){
		$this->data['content'] = 'Supply your signin credentials here';
		$this->data['class'] = 'alert alert-warning';
		
		if(isset($_REQUEST['dest']) && $_REQUEST['dest']!=''){

			$url_destination = urlencode($_REQUEST['dest']);

		}else{
		
			$url_destination = '';

		}
		if($_POST){
 			$this->Login_mdl->check_user_login($url_destination);
			$this->data['content']=$this->session->flashdata('error');
 		}
		
		$this->data['title']=founder()->short_name.' - User Login';
		
		$this->load->view('general/header', $this->data);
        $this->load->view('general/signin', $this->data);
		$this->load->view('general/footer', $this->data);
	}
	
	public function signup(){
		
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$page = 'signup';
		$this->data['title'] = ucfirst($page); // Capitalize the first letter
		//$this->data['referredby'] = isset($_SESSION['ybderrefer'])?$_SESSION['ybderrefer']:'';
		//$id = obfuscate_not($id, 3, 7);
		$this->data['content']='';
		//$this->data['egakcapdi']=$id;
		$a = rand(1,10);
		$b = rand(1,10);
		$this->data['a'] = $a;
		$this->data['b'] = $b;
		$this->data['c'] = $a + $b;
		
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$this->form_validation->set_rules('fname', 'First Name', 'required|alpha');
		$this->form_validation->set_rules('lname', 'Last Name', 'required|alpha');
		
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|matches[passconf]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('username', 'Email Address', 'trim|required|valid_email');
		
		if($this->form_validation->run() !== FALSE && $this->input->post('v1')==""){
			if($this->input->post('aut') != $this->input->post('c')){
				$this->data['content'] = "<div class='alert alert-danger'>User Authentication Failed</div>";
			}else{
				$this->data['content']=$this->Login_mdl->signup();
				/*$this->data['content']=$this->session->flashdata('content');
				$this->data['class']=$this->session->flashdata('class');
				*/
				if($this->data['content'] == "")
					redirect(base_url()."account/myprofile");
			}
		}
		
		
		
		/*
		$this->data['content'] = 'Supply your basic information here';
		$this->data['class'] = 'alert alert-warning';
		*/
		$this->data['title']=founder()->short_name.' - Sign Up';
		
		$this->load->view('general/header', $this->data);
        $this->load->view('general/sign_up', $this->data);
		$this->load->view('general/footer', $this->data);

	}

	public function forgot_password(){
  
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('userName1', 'Login ID', 'required|valid_email'); 
		$this->data['title']=founder()->short_name.' - Forgot Password';
		$this->data['class']='';
		$this->data['content']='';
		
		if($this->form_validation->run() === FALSE){
			
			$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
			 
			$this->data['page_title'] = 'Forgot Password';
		
		}else{
			$forgot = $this->jobseeker_mdl->forgot_password();
			if($forgot == "success"){
			$this->data['content'] = "A password reset link has been sent to your email address.<br>
			Kindly check your spam messages if the mail is not found in your inbox";
			}else{
			$this->data['content'] = "The supplied email address is not registered.<br>
			Kindly verify that the typed email address is accurate";
			}
			$this->data['class'] = "alert alert-info";
		} 
		$this->load->view('general/header', $this->data);
		$this->load->view('forgot_password/view', $this->data);
		$this->load->view('general/footer', $this->data);
	}
	
	public function recover_password(){
	
		$this->load->helper('form');
		$this->load->library('form_validation');
		$last = $this->uri->total_segments();
		$md5_id = $this->uri->segment($last);
		$this->data['title']=founder()->short_name.' - Reset Password';
		
		$this->form_validation->set_rules('new_password', 'Password', 'required'); 
		
		if($this->form_validation->run() === FALSE){
			
			$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
 			$this->data['page_title'] = 'Recover Password'; 
			
			$this->load->view('general/header', $this->data);
			$this->load->view('forgot_password/change_password', $this->data);
			$this->load->view('general/footer', $this->data);
		
		}else{
		
			$this->jobseeker_mdl->recover_password($md5_id);
 			redirect(base_url()."signin");
		} 
	}
	
	
}
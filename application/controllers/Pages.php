<?php
class Pages extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');//handles images
		$this->load->database();
        $this->load->helper('url_helper');
        $this->load->helper('text');
		$this->load->library('session');
		
		$this->data['recentpost'] = $this->post_mdl->getrecentpost();
		$this->data['activepage'] = '';
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
	}

	public function about($page = 'about')
	{
		$this->data['title'] = ucfirst($page.' - '.founder()->organization.' | Software Development / Hosting / Maintenance| Web design | Database Analysis and Devt | Project Management | Software Installation and Troubleshooting | Networking Services | Graphics Design | Bulk SMS'); // Capitalize the first letter
		$this->data['activepage'] = $page;
		if(!isset($_SESSION['userid'])){
			$this->load->view('general/header', $this->data);
		}else{
 			$this->load->view('general/header_account', $this->data);
		}
		$this->load->view('general/'.$page, $this->data);
		$this->load->view('general/footer', $this->data);
	}
	
	public function article($id)
	{
        if ( ! file_exists(APPPATH.'/views/general/article.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		$this->data['class'] ="";
		$this->data['content'] ="";
		if(isset($_POST['comment'])){
			$this->post_mdl->postcomment();
			$this->data['content']=$this->session->flashdata('content');
			$this->data['class']=$this->session->flashdata('class');
		}

		$this->data['url'] = $id; // Get url
		$this->data['post'] = $this->post_mdl->getsinglepost($id); // Get Post from DB
		$this->data['checkpaid'] = $this->page_model->voguepay_check($id); // Get Post from DB
		//$this->data['comment'] = $this->post_mdl->getcommentactive($id); // Get Comment from DB
		$this->data['title'] = ucfirst($this->data['post']->title.' - '.founder()->short_name); // Capitalize the first letter

		if(!isset($_SESSION['userid'])){
			$this->load->view('general/header', $this->data);
		}else{
 			$this->load->view('general/header_account', $this->data);
		}
		$this->load->view('general/article', $this->data);
		$this->load->view('general/rightnav', $this->data);
		$this->load->view('general/footer', $this->data);
	}
	
	public function books($category='')
	{
		$page = 'books';
		if ( ! file_exists(APPPATH.'/views/general/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

		if($category !== ""){
			$this->data['books'] = $this->post_mdl->getpost($category);
			$this->data['category'] = $this->post_mdl->getcategorydetails($category);
		}
		else{
			$this->data['category'] = $this->post_mdl->getcategory(1);
		}
		$this->data['categories'] = $this->post_mdl->getcategory(1);
		$this->data['title'] = ucfirst('library - '.founder()->organization); // Capitalize the first letter
		
		if(!isset($_SESSION['userid'])){
			$this->load->view('general/header', $this->data);
		}else{
 			$this->load->view('general/header_account', $this->data);
		}
		
		if($category !== ""){
			$this->load->view('general/'.$page, $this->data);
		}else{
			$this->load->view('general/books_all', $this->data);
		}
		//$this->load->view('general/rightnav', $this->data);
		$this->load->view('general/footer', $this->data);
	}

	public function checkhtml()
	{
		$message = "Welcome to Goldnet Consult. <br>Regards";
		echo '<div style="border-style:ridge; padding:2px; width:560px"><a href="http://goldnet.com.ng">
			<div class="widget-author__image-container">
				<div class="widget-author__avatar--blurred">
					<img src="'.base_url().'images/goldnet1.jpg" alt="Avatar image" width="100%">
				</div>
			</div></a><div class="boxed  sticky  push-down-45">
				
					<div class="row">
						<div class="col-xs-10  col-xs-offset-1">
						<section id="state_section" class="clear">
							<h1 class="title2" style="color:#63c">GoldNet Consult - Portal</h1>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="business_block">
							'.$message.'
							</div>
							</div>
						</section>
								</div>
							</div>
				</div></div>';
	}

	public function contact($page = 'contact')
	{
		$this->data['title'] = ucfirst($page.' - '.founder()->organization); // Capitalize the first letter
		
		$this->data['content']='';
		$this->data['class']='';
		if($this->input->post('send')!==null){
			$this->page_model->contact();
			$this->data['content']=$this->session->flashdata('content');
			$this->data['class']=$this->session->flashdata('class');
		}
		
		$this->data['showpostupdate']=false;
		$this->data['showfounder']=true;
		
		if(!isset($_SESSION['userid'])){
			$this->load->view('general/header', $this->data);
		}else{
 			$this->load->view('general/header_account', $this->data);
		}
		
		$this->load->view('general/'.$page, $this->data);
		$this->load->view('general/rightnavpages', $this->data);
		$this->load->view('general/footer', $this->data);
	}

	public function deals()
	{
		$page = "deals";
		$this->data['adverts'] = "";
		$property = isset($_REQUEST['property'])?$_REQUEST['property']:"";
		if(isset($property) && $property != ""){
			$this->data['adverts'] = $this->advert_mdl->getadvertsearch($property);
		}
		else{
			$this->data['adverts'] = $this->advert_mdl->getadvert(1);
		}
		$this->data['title'] = ucfirst('deals - '.founder()->organization); // Capitalize the first letter
        if(!isset($_SESSION['userid'])){
			$this->load->view('general/header', $this->data);
		}else{
 			$this->load->view('general/header_account', $this->data);
		}
        $this->load->view('general/'.$page, $this->data);
		$this->load->view('general/footer', $this->data);
	}
	
	public function fetch_lga(){
		$data['lga'] = $this->page_model->lga($_REQUEST['id']);
		$this->load->view('general/getlga',$data);
	}

	public function fetch_state(){
		$data['state'] = $this->users_mdl->getStateByCountry($_REQUEST['id']);
		$this->load->view('general/getstate',$data);
	}

	public function founder($page = 'founder')
	{
		$this->data['title'] = ucfirst($page.' - '.founder()->organization); // Capitalize the first letter
		$this->data['activepage'] = $page;
		if(!isset($_SESSION['userid'])){
			$this->load->view('general/header', $this->data);
		}else{
 			$this->load->view('general/header_account', $this->data);
		}
		
		$this->load->view('general/'.$page, $this->data);
		$this->load->view('general/footer', $this->data);
	}
	
	public function irecharge()
	{
		$page = 'I-Recharge';
		$this->data['content']='';
		$this->data['showpostupdate']=true;
		$this->data['adverts'] = $this->advert_mdl->getadvert(1);
		$this->data['activepage'] = $page;
		$this->data['title'] = ucfirst($page.' - '.founder()->organization); // Capitalize the first letter
		
		if(!isset($_SESSION['userid'])){
			$this->load->view('general/header', $this->data);
		}else{
 			$this->load->view('general/header_account', $this->data);
		}
		
		$this->load->view('general/irecharge', $this->data);
		$this->load->view('general/rightnavpages', $this->data);
		$this->load->view('general/footer', $this->data);
	}
	
	public function lga($state)
	{
        $sc=$this->page_model->lga($state);
        echo $sc;
	}
	
 	public function newsletter(){
	
		$email_id = $_REQUEST['email_id'];
		$this->jobseeker_mdl->newsletter($email_id);
			 
	}
	
	public function noprofile()
	{
		$page = 'errors/html/error_404';
		$this->data['pages'] = array("page_title"=>"No Record Found", "content"=>"No Record Found");
		$this->data['content']='';
		$this->data['showpostupdate']=true;
		$this->data['adverts'] = $this->advert_mdl->getadvert(1);
		$this->data['title'] = ucfirst(founder()->organization); // Capitalize the first letter
		
		if(!isset($_SESSION['userid'])){
			$this->load->view('general/header', $this->data);
		}else{
 			$this->load->view('general/header_account', $this->data);
		}
		
		$this->load->view('general/noprofile', $this->data);
							
		$this->load->view('general/rightnavpages', $this->data);
		$this->load->view('general/footer', $this->data);
	}

	public function page($slug)
	{
		$page = 'page';
		$this->data['content']='';
		$this->data['page']=$this->page_model->getpagebyslug($slug);
		$this->data['showpostupdate']=true;
		$this->data['adverts'] = $this->advert_mdl->getadvert(1);
		$this->data['title'] = ucfirst($this->data['page']->page_title.' - '.founder()->organization); // Capitalize the first letter
		
		$this->data['activepage'] = $slug;
		if(!isset($_SESSION['userid'])){
			$this->load->view('general/header', $this->data);
		}else{
 			$this->load->view('general/header_account', $this->data);
		}
		
		$this->load->view('general/'.$page, $this->data);
		$this->load->view('general/rightnavpages', $this->data);
		$this->load->view('general/footer', $this->data);
	}

	public function profile($username="")
	{
		$page = 'profile';
		$this->data['content']='';

		$this->data['user'] = $this->users_mdl->getusers($username);
		if($this->users_mdl->check_user($username)){
			$this->data['title'] = $this->data['user']->fname.' '.$this->data['user']->lname; // Capitalize the first letter
			$this->data['state']=$this->users_mdl->getState();
			
			$this->data['user_profile'] = $this->jobseeker_mdl->get_profile1($username);
			$this->data['user_work_experience'] = $this->jobseeker_mdl->get_work_experience1($username);
			$this->data['user_get_eduation'] = $this->jobseeker_mdl->get_eduation1($username);
			$this->data['user_get_certifications'] = $this->jobseeker_mdl->get_certifications1($username); 
				
			if(!isset($_SESSION['userid'])){
			$this->load->view('general/header', $this->data);
			}else{
				$this->load->view('general/header_account', $this->data);
			}
		
			$this->load->view('/general/profile/viewall',$this->data);
			$this->load->view('general/footer', $this->data);
		}
		else{
			$this->noprofile();
		}
	}
	
	public function recommended()
	{
		$page = 'recommended';
		$this->data['content']='';
		$this->data['showpostupdate']=true;
		$this->data['adverts'] = $this->advert_mdl->getadvert(1);
		$this->data['deals'] = $this->post_mdl->getdeals(1);
		$this->data['title'] = ucfirst('Recommended Links - '.founder()->organization); // Capitalize the first letter
		$this->data['activepage'] = $page;
		if(!isset($_SESSION['userid'])){
			$this->load->view('general/header', $this->data);
		}else{
 			$this->load->view('general/header_account', $this->data);
		}
		
		$this->load->view('general/'.$page, $this->data);
		$this->load->view('general/rightnavpages', $this->data);
		$this->load->view('general/footer', $this->data);
	}

	private function response($header="", $footer, $previous, $class="", $content=""){
		$this->data['class'] = $class;
		$this->data['previous'] = $previous;
		$this->data['content'] = $content;
		isset($header) ? $this->load->view($header, $this->data):"";
		$this->load->view("general/response", $this->data);
		isset($footer) ? $this->load->view($footer):"";
	}
	
	public function view($page = 'index')
	{
        if ( ! file_exists(APPPATH.'/views/general/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		$this->data['activepage'] = $page;
		$this->data['categories'] = $this->post_mdl->getcategory_array(1);
		$this->data['deals'] = $this->post_mdl->getdeals(1);
        $this->data['title'] = ucfirst(founder()->organization."::Home::"); // Capitalize the first letter
		$this->data['adverts'] = $this->advert_mdl->getadvert(1);
//        $this->data['url'] = str_replace('.site.ng','',$_SERVER['HTTP_HOST']);
		//$this->data['url'] = $this->config->item('business_url_id');
        
		if(!isset($_SESSION['userid'])){
			$this->load->view('general/header', $this->data);
		}else{
 			$this->load->view('general/header_account', $this->data);
		}
		
        $this->load->view('general/'.$page, $this->data);
		$this->load->view('general/footer', $this->data);
	}

}
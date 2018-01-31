<?php
class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');//handles images
		$this->load->database();
        $this->load->helper('url_helper');
		$this->load->library('session');

		if(!isset($_SESSION['logged_in'])){
			redirect(base_url()."admin");
		}
		$this->data['recentpost'] = $this->post_mdl->getrecentpost();
		$this->data['popularpost'] = $this->post_mdl->getpopularpost();
		$this->data['featuredpost'] = $this->post_mdl->getfeaturedpost();
		$this->data['postcategory'] = $this->post_mdl->getcategory(1);
		$this->data['headername'] = founder()->organization;
		$this->data['activepage'] = '';
		$this->data['favicon'] = base_url().'images/'.$this->page_model->getcms('icon');
		$this->data['logo'] = base_url().'images/'.$this->page_model->getcms('logo');

	}

	public function addcategory()
	{
		$page = 'addcategory';
		$this->data['class']='';
		$this->data['activepage'] = 'posts';
		$this->data['content']='';
        if ( $_POST)
        {
            $this->post_mdl->categoryadd();
			$this->data['content']=$this->session->flashdata('content');
			$this->data['class']=$this->session->flashdata('class');
        }

		$this->data['title'] = ucfirst($page); // Capitalize the first letter
		
		$this->data['category'] = $this->post_mdl->getcategory();
		$this->load->view('admin/adminheader', $this->data);
		$this->load->view('admin/menu', $this->data);
		$this->load->view('admin/'.$page, $this->data);
		$this->load->view('admin/adminfooter', $this->data);
	}
	
	public function adddeals()
	{
		$page = 'adddeals';
		$this->data['class']='';
		$this->data['content']='';
		$this->data['activepage'] = 'deals';
        if ( $_POST)
        {
            $this->post_mdl->deals_add();
			$this->data['content']=$this->session->flashdata('content');
			$this->data['class']=$this->session->flashdata('class');
        }

		$this->data['title'] = ucfirst($page); // Capitalize the first letter
		
		$this->data['deals'] = $this->post_mdl->getdeals();
		$this->load->view('admin/adminheader', $this->data);
		$this->load->view('admin/menu', $this->data);
		$this->load->view('admin/'.$page, $this->data);
		$this->load->view('admin/adminfooter', $this->data);
	}
	public function advert()
	{
        if ( ! file_exists(APPPATH.'/views/admin/advert.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

		$this->data['content']='';
		$this->data['class']='';
		if(isset($_POST['submit'])){
			$this->data['content'] = $this->advert_mdl->uploadadvert(); // Get Post from DB
			$this->data['content']=$this->session->flashdata('content');
			$this->data['class']=$this->session->flashdata('class');
		}
		$this->data['title'] = ucfirst('Post Advert'); // Capitalize the first letter
		$this->data['activepage'] = 'advert';
		
		$this->load->view('admin/adminheader', $this->data);
		$this->load->view('admin/menu', $this->data);
		$this->load->view('admin/advert', $this->data);
		$this->load->view('admin/adminfooter', $this->data);
	}
	
	public function article($id = '',  $cid='', $action='')
	{
		$page = 'article';
		$this->data['content']='';$this->data['class'] = "";
		
        if ( ! file_exists(APPPATH.'/views/admin/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

		//$this->data['post'] = $this->getpost(); // Get Post from DB
		$this->data['title'] = ucfirst($page); // Capitalize the first letter
		
		if($action==="delete"){
			$this->data['content'] = $this->post_mdl->commentdelete($cid);
			$this->data['class'] = "alert alert-success";
		}
		
		if($action==="changestatus"){
			$this->data['content'] = $this->post_mdl->commentchangestatus($cid);
			$this->data['class'] = "alert alert-success";
		}

		if($this->input->post('delete')!==null){
			$this->data['content'] = $this->post_mdl->commentdeletegroup($cid);
			$this->data['class'] = "alert alert-success";
		}

		if($this->input->post('deactivate')!==null){
			$this->data['content'] = $this->post_mdl->commentchangestatusgroup();
			$this->data['class'] = "alert alert-success";
		}
		$this->data['post']=$this->post_mdl->getsinglepostbyid($id);
		$this->data['comment'] = $this->post_mdl->getcomment($id);
		$this->data['activepage'] = $page;
		
		$this->load->view('admin/adminheader', $this->data);
		$this->load->view('admin/menu', $this->data);
		$this->load->view('admin/'.$page, $this->data);
		$this->load->view('admin/adminfooter', $this->data);
	}
	
	public function changepass()
	{
        if ( ! file_exists(APPPATH.'/views/admin/changepass.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

		$this->data['content']='';
		$this->data['class']='';
		$this->data['role']=isset($_POST['role'])?$_POST['role']:'';
		if(isset($_POST['send'])){
			$this->data['content'] = $this->users_mdl->changepass();
		}
		
		$this->data['title'] = ucfirst('change pass'); // Capitalize the first letter

		$this->data['activepage'] = 'changepass';
		$this->load->view('admin/adminheader', $this->data);
		$this->load->view('admin/menu', $this->data);
		$this->load->view('admin/changepass', $this->data);
		$this->load->view('admin/adminfooter', $this->data);
	}
	
	public function createpage()
	{
        if ( ! file_exists(APPPATH.'/views/admin/createpage.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

		$this->data['content']='Create Page';
		$this->data['class']='';
		if(isset($_POST['send'])){
			$this->page_model->createpage();
			$this->data['content']=$this->session->flashdata('content');
			$this->data['class']=$this->session->flashdata('class');
			
		}
		
		$this->data['title'] = ucfirst('Create User'); // Capitalize the first letter

		$this->data['activepage'] = 'pages';
		$this->load->view('admin/adminheader', $this->data);
		$this->load->view('admin/menu', $this->data);
		$this->load->view('admin/createpage', $this->data);
		$this->load->view('admin/adminfooter', $this->data);
	}
	
	public function createuser()
	{
        if ( ! file_exists(APPPATH.'/views/admin/createuser.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

		$this->data['content']='';
		$this->data['class']='';
		$this->data['role']=isset($_POST['role'])?$_POST['role']:'';
		if(isset($_POST['send'])){
			$this->users_mdl->createadmin();
			$this->data['content']=$this->session->flashdata('content');
			$this->data['class']=$this->session->flashdata('class');
		}
		
		$this->data['title'] = ucfirst('Create User'); // Capitalize the first letter

		$this->data['activepage'] = 'admins';
		$this->load->view('admin/adminheader', $this->data);
		$this->load->view('admin/menu', $this->data);
		$this->load->view('admin/createuser', $this->data);
		$this->load->view('admin/adminfooter', $this->data);
	}
	
	public function editadvert($id="")
	{
        if ( ! file_exists(APPPATH.'/views/admin/editadvert.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

		$this->data['content']='';$this->data['class']='';
		
		if(isset($_POST['submit'])){
			$this->advert_mdl->editadvert($id);
			$this->data['content']=$this->session->flashdata('content');
			$this->data['class']=$this->session->flashdata('class');
		}
		$this->data['title'] = ucfirst('Edit Advert'); // Capitalize the first letter
		
		$this->data['activepage'] = 'advert';
		$this->data['advert'] = $this->advert_mdl->getadvertsingle($id);
		$this->load->view('admin/adminheader', $this->data);
		$this->load->view('admin/menu', $this->data);
		$this->load->view('admin/editadvert', $this->data);
		$this->load->view('admin/adminfooter', $this->data);
	}
	
	public function editcategory($id="")
	{
        if ( ! file_exists(APPPATH.'/views/admin/editcategory.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

		$this->data['content']='';$this->data['class']='';
		
		if(isset($_POST['submit'])){
			$this->post_mdl->editcategory($id);
			$this->data['content']=$this->session->flashdata('content');
			$this->data['class']=$this->session->flashdata('class');
		}
		$this->data['title'] = ucfirst('Edit Category'); // Capitalize the first letter
		
		$this->data['category'] = $this->post_mdl->getcategorydetails($id);
		$this->load->view('admin/adminheader', $this->data);
		$this->load->view('admin/menu', $this->data);
		$this->load->view('admin/editcategory', $this->data);
		$this->load->view('admin/adminfooter', $this->data);
	}
	
	public function editdeal($id="")
	{
        if ( ! file_exists(APPPATH.'/views/admin/editdeal.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

		$this->data['content']='';$this->data['class']='';
		
		if(isset($_POST['submit'])){
			$this->post_mdl->editdeal($id);
			$this->data['content']=$this->session->flashdata('content');
			$this->data['class']=$this->session->flashdata('class');
		}
		$this->data['title'] = ucfirst('Edit Deal'); // Capitalize the first letter
		
		$this->data['deal'] = $this->post_mdl->getdealdetails($id);
		$this->load->view('admin/adminheader', $this->data);
		$this->load->view('admin/menu', $this->data);
		$this->load->view('admin/editdeal', $this->data);
		$this->load->view('admin/adminfooter', $this->data);
	}
	
	public function editpage($slug="")
	{
		$this->data['content']='';$this->data['class']='';
		
		if(isset($_POST['send'])){
			$this->page_model->editpage($slug);
			$this->data['content']=$this->session->flashdata('content');
			$this->data['class']=$this->session->flashdata('class');
			redirect(base_url()."admin/viewpages");
		}
		$this->data['title'] = ucfirst('Edit Page'); // Capitalize the first letter
		
		$this->data['page'] = $this->page_model->getpagebyslug($slug);
		$this->load->view('admin/adminheader', $this->data);
		$this->load->view('admin/menu', $this->data);
		$this->load->view('admin/editpage', $this->data);
		$this->load->view('admin/adminfooter', $this->data);
	}

	public function founder()
	{
        if ( ! file_exists(APPPATH.'/views/admin/founder.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

		$this->data['content']='';$this->data['class']='';
		
		if(isset($_POST['submit'])){
			$this->users_mdl->editfounder();
			$this->data['content']=$this->session->flashdata('content');
			$this->data['class']=$this->session->flashdata('class');
		}
		$this->data['title'] = ucfirst('Founder Information'); // Capitalize the first letter

		$this->data['founder'] = $this->users_mdl->founder();
		$this->data['activepage'] = 'setup';
		$this->load->view('admin/adminheader', $this->data);
		$this->load->view('admin/menu', $this->data);
		$this->load->view('admin/founder', $this->data);
		$this->load->view('admin/adminfooter', $this->data);
	}

	public function editpost($slug="")
	{
        if ( ! file_exists(APPPATH.'/views/admin/editpost.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

		$this->data['content']='';$this->data['class']='';
		
		if(isset($_POST['submit'])){
			$this->post_mdl->editpost($slug);
			//redirect(base_url()."admin/editpost1/".$slug);
		}
		$this->data['title'] = ucfirst('Update Library'); // Capitalize the first letter
		$this->data['activepage'] = 'library';
		$this->data['books'] = $this->post_mdl->getsinglepost($slug);
		$this->data['categories'] = $this->post_mdl->getcategory(1);
		$this->load->view('admin/adminheader', $this->data);
		$this->load->view('admin/menu', $this->data);
		$this->load->view('admin/editpost', $this->data);
		$this->load->view('admin/adminfooter', $this->data);
	}
/*
	public function editpost1($slug="")
	{	
		$this->data['content']=$this->session->flashdata('content');
		$this->data['class']=$this->session->flashdata('class');
		$this->data['title'] = ucfirst('Edit Post'); // Capitalize the first letter
		
		$this->data['post'] = $this->post_mdl->getsinglepost($slug);
		$this->data['categories'] = $this->post_mdl->getcategory(1);
		$this->load->view('admin/adminheader', $this->data);
		$this->load->view('admin/menu', $this->data);
		$this->load->view('admin/article', $this->data);
		$this->load->view('admin/adminfooter', $this->data);
	}
*/
	public function home()
	{
        if ( ! file_exists(APPPATH.'/views/admin/adminhome.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		$this->data['title'] = ucfirst('Admin Home'); // Capitalize the first letter
		$this->load->view('admin/adminheader', $this->data);
		$this->load->view('admin/menu', $this->data);
		$this->load->view('admin/adminhome', $this->data); 
		$this->load->view('admin/adminfooter', $this->data);
	}
	
	public function logo()
	{
        if ( ! file_exists(APPPATH.'/views/admin/logo.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
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
		$this->data['title'] = ucfirst('Complete CMS'); // Capitalize the first letter
		$this->load->view('admin/adminheader', $this->data);
		$this->load->view('admin/menu', $this->data);
		$this->load->view('admin/logo', $this->data); 
		$this->load->view('admin/adminfooter', $this->data);
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url()."admin");
	}
	
	public function myposts($action = '', $id='')
	{
		$page = 'myposts';
		$this->data['content']='';$this->data['class']='';
        if ( ! file_exists(APPPATH.'/views/admin/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

		//$this->data['post'] = $this->getpost(); // Get Post from DB
		$this->data['title'] = ucfirst($page); // Capitalize the first letter

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

		$this->data['activepage'] = 'posts';
		$this->data['posts'] = $this->post_mdl->getmyposts();
		
		$this->load->view('admin/adminheader', $this->data);
		$this->load->view('admin/menu', $this->data);
		$this->load->view('admin/'.$page, $this->data);
		$this->load->view('admin/adminfooter', $this->data);
	}

	public function post()
	{
        if ( ! file_exists(APPPATH.'/views/admin/post.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

		$this->data['content']='';
		$this->data['class']='';
		$this->data['category']='';
		if(isset($_POST['submit'])){
			$this->data['content'] = $this->post_mdl->uploadpost(); // Get Post from DB
			$this->data['content']=$this->session->flashdata('content');
			$this->data['class']=$this->session->flashdata('class');
			$this->data['category'] = trim($_POST['category']);
		}
		$this->data['title'] = ucfirst('Write Post'); // Capitalize the first letter

		$this->data['activepage'] = 'posts';
		$this->data['categories'] = $this->post_mdl->getcategory(1);
		
		$this->load->view('admin/adminheader', $this->data);
		$this->load->view('admin/menu', $this->data);
		$this->load->view('admin/post', $this->data);
		$this->load->view('admin/adminfooter', $this->data);
	}

	public function replyenquiry($id)
	{
		$this->data['class']='';
		$this->data['content']='';
		if(isset($_POST['send'])){
			$this->page_model->postreply();
			$this->data['content']=$this->session->flashdata('content');
			$this->data['class']=$this->session->flashdata('class');
		}
		$this->data['contact'] = $this->page_model->getenquiries();
		$this->data['title'] = ucfirst('Reply Enquiry'); // Capitalize the first letter
		$this->data['id'] = $id;
		
		$this->load->view('admin/adminheader', $this->data);
		$this->load->view('admin/menu', $this->data);
		$this->load->view('admin/replyenquiry', $this->data);
		$this->load->view('admin/adminfooter', $this->data);
	}
	
	function setfeaturedpost(){
		$this->data['class']= '';
		$this->data['content']= '';

		if(isset($_POST['send'])){
			$this->post_mdl->setfeaturedpost();
			$this->data['class']='alert alert-success';
			$this->data['content'] = 'Posts status successfully updated';
		}
		$this->data['title'] = ucfirst('Set Featured Post'); // Capitalize the first letter
		
		$this->data['featuredpost'] = $this->post_mdl->getfeaturedpost();
		$this->data['post'] = $this->post_mdl->getpost();
		$this->load->view('admin/adminheader', $this->data);
		$this->load->view('admin/menu', $this->data);
		$this->load->view('admin/setfeaturedpost', $this->data);
		$this->load->view('admin/adminfooter', $this->data);
	}

	public function sociallinks()
	{
        if ( ! file_exists(APPPATH.'/views/admin/sociallinks.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

		$this->data['social'] = $this->page_model->sociallinks();
		$this->data['content']='';
		$this->data['class']='';
		$this->data['title'] = ucfirst('Configure Social Links');
		
		$this->load->view('admin/adminheader', $this->data);
		$this->load->view('admin/menu', $this->data);
		$this->load->view('admin/sociallinks', $this->data);
		$this->load->view('admin/adminfooter', $this->data);
	}

	public function updateprofile_admin($page = 'updateprofile')
	{
		$this->data['title'] = ucfirst($page); // Capitalize the first letter
		$this->data['content']='';
		if($this->input->post('send')!==null){
			$this->data['content']=$this->users_mdl->updateprofile_admin();
		}
		$this->data['lga']=$this->page_model->getlga();
		$this->data['country']=$this->users_mdl->getCountry();
		$this->data['state']=$this->users_mdl->getState();
		$this->data['user'] = $this->users_mdl->getadmins($_SESSION['username']);
		$this->load->view('admin/adminheader', $this->data);
		$this->load->view('admin/menu', $this->data);
		$this->load->view('admin/'.$page, $this->data);
		$this->load->view('admin/adminfooter', $this->data);
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
		$this->data['user'] = $this->users_mdl->getusers($_SESSION['username']);
		$this->load->view('admin/adminheader', $this->data);
		$this->load->view('admin/menu', $this->data);
		$this->load->view('admin/'.$page, $this->data);
		$this->load->view('admin/adminfooter', $this->data);
	}

	public function admins($id1=' ___ ')
	{
		list($action, $id) = explode("___", $id1);
		$this->data['content']='';$this->data['class'] = "";

		if($action==="delete"){
			$this->data['content'] = $this->users_mdl->usersdelete_admin();
		}
		
		if($this->input->post('changestatus')!==null){
			$this->data['content'] = $this->users_mdl->userschangestatus_admin();
		}

		if($this->input->post('delete')!==null){
			$this->data['content'] = $this->users_mdl->usersdelete_admin();
			$this->data['class'] = "alert alert-success";
		}

		$this->data['users'] = $this->users_mdl->getadmins();
		$this->data['title'] = ucfirst('View Site Managers'); // Capitalize the first letter
		$this->data['activepage'] = 'admins';
		$this->load->view('admin/adminheader', $this->data);
		$this->load->view('admin/menu', $this->data);
		$this->load->view('admin/viewadmins', $this->data);
		$this->load->view('admin/adminfooter', $this->data);
	}

	public function users($id1=' ___ ')
	{
		list($action, $id) = explode("___", $id1);
		$this->data['content']='';$this->data['class'] = "";

		if($action==="delete"){
			$this->data['content'] = $this->users_mdl->usersdelete();
		}
		
		if($this->input->post('changestatus')!==null){
			$this->data['content'] = $this->users_mdl->userschangestatus();
		}

		if($this->input->post('delete')!==null){
			$this->data['content'] = $this->users_mdl->usersdelete();
			$this->data['class'] = "alert alert-success";
		}

		$this->data['users'] = $this->users_mdl->getusers();
		$this->data['title'] = ucfirst('View Users'); // Capitalize the first letter
		$this->data['activepage'] = 'users';
		$this->load->view('admin/adminheader', $this->data);
		$this->load->view('admin/menu', $this->data);
		$this->load->view('admin/viewusers', $this->data);
		$this->load->view('admin/adminfooter', $this->data);
	}

	public function view($page = 'index')
	{
	
        if ( ! file_exists(APPPATH.'/views/admin/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $this->data['title'] = ucfirst($page); // Capitalize the first letter


		
        $this->load->view('admin/'.$page, $this->data);
	}
	
	public function viewadvert($id1=" ___ ")
	{
		list($action, $id) = explode("___", $id1);
		$page = 'viewadvert';
		$this->data['content']='';$this->data['class'] = "";

		//$this->data['post'] = $this->getpost(); // Get Post from DB
		$this->data['title'] = ucfirst($page); // Capitalize the first letter

		if($action==="delete"){
			$this->data['content'] = $this->advert_mdl->advertdelete($id);
			$this->data['class'] = "alert alert-success";
		}
		
		if($action==="changestatus"){
			$this->data['content'] = $this->advert_mdl->advertchangestatus($id);
			$this->data['class'] = "alert alert-success";
		}

		if($this->input->post('delete')!==null){
			$this->data['content'] = $this->advert_mdl->advertdeletegroup($id);
			$this->data['class'] = "alert alert-success";
		}

		if($this->input->post('deactivate')!==null){
			$this->data['content'] = $this->advert_mdl->advertchangestatusgroup();
			$this->data['class'] = "alert alert-success";
		}
		$this->data['activepage'] = 'advert';
		$this->data['advert'] = $this->advert_mdl->getadvert();
		
		$this->load->view('admin/adminheader', $this->data);
		$this->load->view('admin/menu', $this->data);
		$this->load->view('admin/'.$page, $this->data);
		$this->load->view('admin/adminfooter', $this->data);
	}
	
	public function viewalert($id1=' ___ ')
	{
		list($action, $id) = explode("___", $id1);
		$page = 'viewalert';
		$this->data['content']='';$this->data['class']='';
        if ( ! file_exists(APPPATH.'/views/admin/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

		$this->data['title'] = 'Notification';

		if($action==="delete"){
			$this->data['content'] = $this->alert_mdl->deletealert($id);
			$this->data['class'] = 'alert alert-success';
		}
		
		if($action==="changestatus"){
			$this->data['content'] = "Sorry! You are not allowed to perform the requested operation";
			$this->data['class'] = "alert alert-danger";
		}

		if($this->input->post('delete')!==null){
			$this->data['content'] = $this->alert_mdl->alertdeletegroup($id);
			$this->data['class'] = 'alert alert-success';
		}

		if($this->input->post('deactivate')!==null){
			$this->data['content'] = "Sorry! You are not allowed to perform the requested operation";
			$this->data['class'] = "alert alert-danger";
		}

		$this->data['alert'] = $this->alert_mdl->viewalerts();
		
		$this->load->view('admin/adminheader', $this->data);
		$this->load->view('admin/menu', $this->data);
		$this->load->view('admin/'.$page, $this->data);
		$this->load->view('admin/adminfooter', $this->data);
	}
	
	public function viewdeals($id1=' ___ ')
	{
		list($action, $id) = explode("___", $id1);
		$page = 'viewdeals';
		$this->data['class']='';
		$this->data['content']='';
		$this->data['activepage'] = 'deals';
        if ( $_POST)
        {
              redirect(base_url()."admin/adddeals");
        }

		if($action==="changestatus"){
			$this->data['content'] = $this->post_mdl->deals_changestatus($id);
			$this->data['class'] = "alert alert-success";
		}

		$this->data['title'] = ucfirst($page); // Capitalize the first letter
		
		$this->data['deals'] = $this->post_mdl->getdeals();
		$this->load->view('admin/adminheader', $this->data);
		$this->load->view('admin/menu', $this->data);
		$this->load->view('admin/'.$page, $this->data);
		$this->load->view('admin/adminfooter', $this->data);
	}

	public function viewdeals_active($id1=' ___ ')
	{
		list($action, $id) = explode("___", $id1);
		$page = 'viewdeals';
		$this->data['class']='';
		$this->data['content']='';
        if ( $_POST)
        {
              redirect(base_url()."admin/adddeals");
        }

		if($action==="changestatus"){
			$this->data['content'] = $this->post_mdl->deals_changestatus($id);
			$this->data['class'] = "alert alert-success";
		}

		$this->data['title'] = ucfirst($page); // Capitalize the first letter
		$this->data['activepage'] = 'deals';
		$this->data['deals'] = $this->post_mdl->getdeals(1);
		$this->load->view('admin/adminheader', $this->data);
		$this->load->view('admin/menu', $this->data);
		$this->load->view('admin/'.$page, $this->data);
		$this->load->view('admin/adminfooter', $this->data);
	}


	public function viewcategory($action = '', $id='')
	{
		$page = 'category';
		$this->data['class']='';
		$this->data['content']='';
        if ( $_POST)
        {
              redirect(base_url()."admin/addcategory");
        }

		if($action==="changestatus"){
			$this->data['content'] = $this->post_mdl->categorychangestatus($id);
			$this->data['class'] = "alert alert-success";
		}
		$this->data['activepage'] = 'posts';
		$this->data['title'] = ucfirst($page); // Capitalize the first letter
		
		$this->data['category'] = $this->post_mdl->getcategory();
		$this->load->view('admin/adminheader', $this->data);
		$this->load->view('admin/menu', $this->data);
		$this->load->view('admin/'.$page, $this->data);
		$this->load->view('admin/adminfooter', $this->data);
	}

	public function viewenquiries($id1=" ___ ")
	{
		list($action, $id) = explode("___", $id1);
		$page = 'viewcontactform';
		$this->data['contact']='';
		
		if($action==="delete"){
			$this->page_model->contactdelete($id);
			$this->data['content']=$this->session->flashdata('content');
			$this->data['class']=$this->session->flashdata('class');
		}
		$this->data['activepage'] = 'enquiries';
		$this->data['title'] = ucfirst($page); // Capitalize the first letter
		$this->data['contact'] = $this->page_model->getenquiries();
		
		$this->load->view('admin/adminheader', $this->data);
		$this->load->view('admin/menu', $this->data);
		$this->load->view('admin/'.$page, $this->data);
		$this->load->view('admin/adminfooter', $this->data);
	}

	public function viewpages($id1=' ___ ')
	{
		list($action, $id) = explode("___", $id1);
		$page = 'viewpages';
		$this->data['content']=''; $this->data['class']='';
        if ( ! file_exists(APPPATH.'/views/admin/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

		if($action==="delete"){
			$this->page_model->pagedelete($id);
			$this->data['content']=$this->session->flashdata('content');
			$this->data['class']=$this->session->flashdata('class');
		}
		
		if($action==="changestatus"){
			$this->page_model->pagechangestatus($id);
			$this->data['content']=$this->session->flashdata('content');
			$this->data['class']=$this->session->flashdata('class');
		}

		if($this->input->post('delete')!==null){
			$this->page_model->pagedeletegroup($id);
			$this->data['content']=$this->session->flashdata('content');
			$this->data['class']=$this->session->flashdata('class');
		}

		if($this->input->post('deactivate')!==null){
			$this->page_model->pagechangestatusgroup();
			$this->data['content']=$this->session->flashdata('content');
			$this->data['class']=$this->session->flashdata('class');
		}

		$this->data['title'] = ucfirst($page); // Capitalize the first letter
		$this->data['pages'] = $this->page_model->getpages();
		$this->data['activepage'] = 'pages';
		$this->load->view('admin/adminheader', $this->data);
		$this->load->view('admin/menu', $this->data);
		$this->load->view('admin/'.$page, $this->data);
		$this->load->view('admin/adminfooter', $this->data);
	}

	public function viewpost($id1=' ___ ')
	{
		list($action, $id) = explode("___", $id1);
		$page = 'viewpost';
		$this->data['content']='';$this->data['class'] = "";
        if ( ! file_exists(APPPATH.'/views/admin/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

		//$this->data['post'] = $this->getpost(); // Get Post from DB
		$this->data['title'] = ucfirst($page); // Capitalize the first letter

		if($action==="delete"){
			$this->data['content'] = $this->post_mdl->postdelete($id);
			$this->data['class'] = "alert alert-success";
		}
		
		if($action==="changestatus"){
			$this->data['content'] = $this->post_mdl->postchangestatus($id);
			$this->data['class'] = "alert alert-success";
		}

		if($this->input->post('delete')!==null){
			$this->data['content'] = $this->post_mdl->postdeletegroup($id);
			$this->data['class'] = "alert alert-success";
		}

		if($this->input->post('deactivate')!==null){
			$this->data['content'] = $this->post_mdl->postchangestatusgroup();
			$this->data['class'] = "alert alert-success";
		}

		$this->data['posts'] = $this->post_mdl->getallpost();
		$this->data['activepage'] = 'posts';
		$this->load->view('admin/adminheader', $this->data);
		$this->load->view('admin/menu', $this->data);
		$this->load->view('admin/'.$page, $this->data);
		$this->load->view('admin/adminfooter', $this->data);
	}
	
	public function viewprofile()
	{
		$page = 'profile';
		$this->data['activepage'] = $page;
		$this->data['content']='';
        if ( ! file_exists(APPPATH.'/views/admin/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

		$this->data['title'] = ucfirst($page); // Capitalize the first letter
		$this->data['user'] = $this->users_mdl->getusers($_SESSION['username']);
		
		$this->load->view('admin/adminheader', $this->data);
		$this->load->view('admin/menu', $this->data);
		$this->load->view('admin/'.$page, $this->data);
		$this->load->view('admin/adminfooter', $this->data);
	}

}
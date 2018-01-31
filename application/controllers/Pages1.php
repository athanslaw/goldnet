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
		$this->data['adverts'] = $this->advert_mdl->getadvert();
		$this->data['popularpost'] = $this->post_mdl->getpopularpost();
		$this->data['featuredpost'] = $this->post_mdl->getfeaturedpost();
		$this->data['pagess'] = $this->page_model->getpages(1);
		$this->data['postcategory'] = $this->post_mdl->getcategory(1);
		$this->data['favicon'] = base_url().'images/ico/'.$this->page_model->getcms('icon');
		$this->data['logo'] = base_url().'images/'.$this->page_model->getcms('logo');
		$this->data['showpostupdate'] = true;
	}

	public function about($page = 'about')
	{
		$this->data['title'] = ucfirst($page.' - '.founder()->organization.' | Software Development / Hosting / Maintenance| Web design | Database Analysis and Devt | Project Management | Software Installation and Troubleshooting | Networking Services | Graphics Design | Bulk SMS'); // Capitalize the first letter
		$this->load->view('general/header', $this->data);
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

		$this->data['post'] = $this->post_mdl->getsinglepost($id); // Get Post from DB
		$this->data['comment'] = $this->post_mdl->getcommentactive($id); // Get Comment from DB
		$this->data['title'] = ucfirst($this->data['post']->title.' - '.founder()->short_name); // Capitalize the first letter

		
		$this->load->view('general/header', $this->data);
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
			$this->data['books'] = $this->post_mdl->getpost();
		}
		$this->data['categories'] = $this->post_mdl->getcategory_array(1);
		$this->data['title'] = ucfirst('library - '.founder()->organization); // Capitalize the first letter
		$this->load->view('general/header', $this->data);
		if($category !== ""){
			$this->load->view('general/'.$page, $this->data);
		}else{
			$this->load->view('general/books_all', $this->data);
		}
		//$this->load->view('general/rightnav', $this->data);
		$this->load->view('general/footer', $this->data);
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
		$this->load->view('general/header', $this->data);
		$this->load->view('general/'.$page, $this->data);
		$this->load->view('general/rightnav', $this->data);
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
		$this->load->view('general/header', $this->data);
		$this->load->view('general/'.$page, $this->data);
		$this->load->view('general/footer', $this->data);
	}
	
	public function lga($state)
	{
        $sc=$this->page_model->lga($state);
        echo $sc;
	}
	
	public function page($slug)
	{
		$page = 'page';
		$this->data['content']='';
		$this->data['page']=$this->page_model->getpagebyslug($slug);
		$this->data['showpostupdate']=true;
		$this->data['showfounder']=true;
		$this->data['title'] = ucfirst($this->data['page']->page_title.' - '.founder()->organization); // Capitalize the first letter
		$this->load->view('general/header', $this->data);
		$this->load->view('general/'.$page, $this->data);
		$this->load->view('general/rightnav', $this->data);
		$this->load->view('general/footer', $this->data);
	}

	public function products($page = 'products')
	{
		$this->data['title'] = ($page.' - '.founder()->organization.' | Info Tech Consultancy Services | ICT Thesis / Project Development | Content Management System (CMS) | SEO / Search Engine Optimization | School Management System | Church Portal Devt'); 
		$this->load->view('general/header', $this->data);
		$this->load->view('general/'.$page, $this->data);
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
		$this->data['categories'] = $this->post_mdl->getcategory_array(1);
        $this->data['title'] = ucfirst(founder()->organization."::Home::"); // Capitalize the first letter
		$this->data['adverts'] = $this->advert_mdl->getadvert(1);
//        $this->data['url'] = str_replace('.site.ng','',$_SERVER['HTTP_HOST']);
		//$this->data['url'] = $this->config->item('business_url_id');
        $this->load->view('general/header', $this->data);
        $this->load->view('general/'.$page, $this->data);
		$this->load->view('general/footer', $this->data);
	}

}
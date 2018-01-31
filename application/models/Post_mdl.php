<?php
class Post_mdl extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

	public function deals_add()
	{
		//Deals: id, date_from, date_to, url, org_name, previous_amount, current_amount, status
		$date_from = $this->input->post('date_from');
		$date_to = $this->input->post('date_to');
		$url = $this->input->post('url');
		$org_name = $this->input->post('org_name');
		$previous_amount = "";//$this->input->post('previous_amount');
		$current_amount = "";//$this->input->post('current_amount');
		$image_url = $this->input->post('image_url');
		$status = $this->input->post('status') != null? $this->input->post('status'):0;
		$data1 = array('date_from' => $date_from, 'date_to'=>$date_to, 'url'=>$url, 'image_url'=>$image_url, 'org_name'=>$org_name, 
		'previous_amount'=>$previous_amount, 'current_amount'=>$current_amount, 'status'=>$status);
		
		$data['query'] = $this->db->insert("deals", $data1);
		if($data['query']==1){
			$this->session->set_flashdata('content', 'Good! Deal Successfully Added! Awaiting approval');
			$this->session->set_flashdata('class', 'alert alert-success');
		}else{
			$this->session->set_flashdata('content', 'Operation failed due to internal error!');
			$this->session->set_flashdata('class', 'alert alert-danger');
		}
	}

	public function deals_changestatus($id = "")
	{
		$query = $this->db->get_where('deals', array('id' => $id));
		$query = $query->row();
		$query1 = $this->db->where('id', $id);
		$query1 = $this->db->update('deals', array('status' =>!($query->status)));
		$status = $query->status?'Deactivated':'Activated';
		return "Deals Successfully ".$status;
	}

	public function deals_edit($id = "")
	{
		$id = $this->input->post('id');
		$date_from = $this->input->post('date_from');
		$date_to = $this->input->post('date_to');
		$url = $this->input->post('url');
		$org_name = $this->input->post('org_name');
		$image_url = $this->input->post('image_url');
		$data1 = array('date_from' => $date_from, 'date_to'=>$date_to, 'url'=>$url, 'org_name'=>$org_name, 'image_url'=>$image_url);
		
		$data['query'] = $this->db->update("deals", $data1, array('id' => ($id)));
		if($data['query']==1){
			$this->session->set_flashdata('content', 'Thanks. Deals Successfully Updated!');
			$this->session->set_flashdata('class', 'alert alert-success');
		}else{
			$this->session->set_flashdata('content', 'Operation failed due to internal error!');
			$this->session->set_flashdata('class', 'alert alert-danger');
		}
		return "Deals Successfully Modified";
	}

	public function categoryadd()
	{
		$name = $this->input->post('name');
		$description = $this->input->post('description');
		$status = $this->input->post('status');
		$data1 = array('name' => $name, 'description'=>$description, 'status'=>$status);
		
		$data['query'] = $this->db->insert("category", $data1);
		if($data['query']==1){
			$this->session->set_flashdata('content', 'Good! Category Successfully Added!');
			$this->session->set_flashdata('class', 'alert alert-success');
		}else{
			$this->session->set_flashdata('content', 'Operation failed due to internal error!');
			$this->session->set_flashdata('class', 'alert alert-danger');
		}
	}

	public function categorychangestatus($id = "")
	{
		$query = $this->db->get_where('category', array('id' => $id));
		$query = $query->row();
		$query1 = $this->db->where('id', $id);
		$query1 = $this->db->update('category', array('status' =>!($query->status)));
		$status = $query->status?'Deactivated':'Activated';
		return "Category Successfully ".$status;
	}

	public function categoryedit($id = "")
	{
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$description = $this->input->post('description');
		$data1 = array('name' => $name, 'description'=>$description);
		
		$data['query'] = $this->db->update("category", $data1, array('id' => ($id)));
		if($data['query']==1){
			$this->session->set_flashdata('content', 'Thanks. Category Successfully Updated!');
			$this->session->set_flashdata('class', 'alert alert-success');
		}else{
			$this->session->set_flashdata('content', 'Operation failed due to internal error!');
			$this->session->set_flashdata('class', 'alert alert-danger');
		}
		return "Category Successfully Modified";
	}

	public function commentchangestatus($id = "")
	{
		$query = $this->db->get_where('comment', array('id' => $id));
		$query = $query->row();
		$query1 = $this->db->where('id', $id);
		$query1 = $this->db->update('comment', array('status' =>!($query->status)));
		$this->alert_mdl->update_alert("admin/article/".$query->post_id);
		return "Comment Successfully Modified";
	}

	public function commentchangestatusgroup()
	{
	if($this->input->post('comment_id')!=null){
		foreach($this->input->post('comment_id') as $id){
			$query = $this->db->get_where('comment', array('id' => $id));
			$query = $query->row();
			$query1 = $this->db->where('id', $id);
			$query1 = $this->db->update('comment', array('status' =>!($query->status)));
			$this->update_alert("admin/article/".$query->post_id);
		}
		return "Comment Successfully Modified";
	}
	}

	public function commentdelete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('comment');
		
		return "<div class='alert alert-success'>Comment Successfully Deleted</div>";
	}
	
	public function commentdeletegroup()
	{if($this->input->post('comment_id')!=null){
		foreach($this->input->post('comment_id') as $id){
			$this->db->where('id', $id);
			$this->db->delete('comment');
		}
		return "<div class='alert alert-success'>Comments Successfully Deleted</div>";
	}}

	function editcategory($id=''){
		$name = trim($this->input->post('name')); 
		$description = trim($this->input->post('description')); 
		$id = trim($this->input->post('id')); 
		$data1 = array('name' => $name, 'description' => $description);

		$data['query'] = $this->db->update("category", $data1, array('id' => ($id)));
		if($data['query']==1){
			$this->session->set_flashdata('content', 'Category Successfully Updated!');
			$this->session->set_flashdata('class', 'alert alert-success');
		}else{
			$this->session->set_flashdata('content', 'Operation failed due to internal error!');
			$this->session->set_flashdata('class', 'alert alert-danger');}
	}

	function editdeal($id=''){
		$org_name = trim($this->input->post('org_name')); 
		$url = trim($this->input->post('url')); 
		$id = trim($this->input->post('id')); 
		$image_url = trim($this->input->post('image_url')); 
		//$current_amount = trim($this->input->post('current_amount')); 
		$data1 = array('org_name' => $org_name, 'url' => $url, 'image_url' => $image_url);

		$data['query'] = $this->db->update("deals", $data1, array('id' => ($id)));
		if($data['query']==1){
			$this->session->set_flashdata('content', 'Deals Successfully Updated!');
			$this->session->set_flashdata('class', 'alert alert-success');
		}else{
			$this->session->set_flashdata('content', 'Operation failed due to internal error!');
			$this->session->set_flashdata('class', 'alert alert-danger');}
	}

	function editpost($slug=''){
		$title = trim($_POST['title']); 
		$message = '<h3>'.trim($_POST['message']).'</h3>';
		$posted_by = isset($_SESSION['username'])?$_SESSION['username']:$_SESSION['userid'];
		$category = trim($_POST['category']);
        $author_name = $this->input->post('author_name')!=null?trim($this->input->post('author_name')):"";
        $author_email = $this->input->post('author_email')!=null?trim($this->input->post('author_email')):"";
        $author_site = $this->input->post('author_site')!=null?trim($this->input->post('author_site')):"";
        $paid_status = $this->input->post('paid_status')!=null?trim($this->input->post('paid_status')):"";
        $amount = $this->input->post('amount')!=null?trim($this->input->post('amount')):"";
		$content = '';
		$id = $this->getpostid($slug);
		if(isset($_FILES['file']['name']) && $_FILES['file']['name']!=''){

			if($_FILES['file']['error']==0){
				$ext=preg_replace("/.*\.([^.]+)$/","\\1", $_FILES['file']['name']);
				$config['file_name'] = $id;
				$config['upload_path'] = './images/blog/books/';
				$config['overwrite'] = true;
				$config['allowed_types'] = '*';
				$this->load->library('upload');
				$this->upload->initialize($config);
				$this->upload->do_upload('file');
				
				$upload_data = $this->upload->data();
				$img_name = $upload_data['file_name'];
				$file_type = $upload_data['file_type'];
				$file_size = $upload_data['file_size'];
				
				//Code to resize image and get a thumbnail
					$config1 = array(
						'source_image'      => './images/blog/books/'.$img_name,
						'new_image'         => './images/blog/books/coverpage/'.$img_name,
						'maintain_ratio'    => true,
						'width'             => 784,
						'height'            => 560
					);
				//here is the second thumbnail, notice the call for the initialize() function again
				$this->load->library('image_lib',$config1);
				$this->image_lib->initialize($config1);
				$this->image_lib->resize();
							
				//End of resize code
				$data1 = array('pix' => $img_name, 'paid_status' => $paid_status, 'amount' => $amount, 'title' => $title, 'author_name' => $author_name, 'author_site' => $author_site, 'author_email' => $author_email, 'message'=>$message, 'posted_by'=>$posted_by, 'category'=>$category);
			}

		}else{
			$data1 = array('title' => $title, 'paid_status' => $paid_status, 'amount' => $amount, 'author_name' => $author_name, 'author_site' => $author_site, 'author_email' => $author_email, 'message'=>$message, 'posted_by'=>$posted_by, 'category'=>$category);
		}

		$data['query'] = $this->db->update("post", $data1, array('id' => ($id)));

		if($data['query']==1){
			$this->alert_mdl->send_alert('admin', "Library updated on ".date('Y-n-d')." by ".$posted_by, 
			"viewpost/", 1);
			$this->session->set_flashdata('class', 'alert alert-success');
			$this->session->set_flashdata('content', 'Success! Book Updated Successfully!');
		}else{
			$this->session->set_flashdata('class', 'alert alert-danger');
			$this->session->set_flashdata('content', 'Operation failed due to internal error!');
		}
	}

	public function getallcomment()
	{
		$query = $this->db->order_by('id DESC');
        $query = $this->db->get('comment');
        $query = $query->result();
		return $query;
	}
	
	public function getallpost($category = "")
	{
		$query = $this->db->order_by('id DESC');
        if ($category === "")
        {
                $query = $this->db->get('post');
                return $query->result();
        }
        $query = $this->db->get_where('post', array('category' => $category));
        $query = $query->result();
		return $query;
	}
	
	public function getdeals($status = "")
	{
        if ($status === "")
        {
                $query = $this->db->get('deals');
                return $query->result();
        }

        $query = $this->db->get_where('deals', array('status' => $status));
        $query = $query->result();
		return $query;
	}
	
	public function getdeals_array($status = "")
	{
        if ($status === "")
        {
                $query = $this->db->get('deals');
                return $query->result_array();
        }

        $query = $this->db->get_where('deals', array('status' => $status));
        $query = $query->result_array();
		return $query;
	}
	
	public function getdealdetails($id)
	{
        $query = $this->db->get_where('deals', array('id' => $id));
        $query = $query->row();
		return $query;
	}
	
	public function getcategory($status = "")
	{
        if ($status === "")
        {
                $query = $this->db->get('category');
                return $query->result();
        }

        $query = $this->db->get_where('category', array('status' => $status));
        $query = $query->result();
		return $query;
	}
	
	public function getcategory_array($status = "")
	{
        if ($status === "")
        {
                $query = $this->db->get('category');
                return $query->result_array();
        }

        $query = $this->db->get_where('category', array('status' => $status));
        $query = $query->result_array();
		return $query;
	}
	
	public function getcategorydetails($id)
	{
        $query = $this->db->get_where('category', array('id' => $id));
        $query = $query->row();
		if($query->id==null){
			$query->id=0;
			$query->name="";
			$query->description="";
			$query->status=0;
		}
		return $query;
	}
	
	public function getcomment($id = "")
	{
        $query = $this->db->get_where('comment', array('post_id' => $id));
        $query =  $query->result();
        return $query;
	}
	
	public function getcommentactive($id = "")
	{
        $query = $this->db->get_where('comment', array('post_id' => $this->getpostid($id), 'status'=>1));
        $query =  $query->result();
        return $query;
	}
	
	public function getfeaturedpost()
	{
        $query = $this->db->get_where('post', array('featuredpost' => 1));
        $query =  $query->row();
        return $query;
	}
	
	public function getlastpost($id = "")
	{
		$query = $this->db->order_by('id DESC');
        $query = $this->db->get('post');
        $query = $query->row();
		return $query;
	}
	
	public function getmyposts($category = "")
	{
		$query = $this->db->order_by('id DESC');
        if ($category === "")
        {
			$posted_by = isset($_SESSION['username'])?$_SESSION['username']:$_SESSION['userid'];
            $query = $this->db->get_where('post', array('posted_by' => $posted_by));
            return $query->result();
        }

        $query = $this->db->get_where('post', array('category' => $category));
        $query = $query->result();
		return $query;
	}
	
	public function getpost($category = "")
	{
     	$query = $this->db->order_by('id DESC');
        if ($category === "")
        {
                $query = $this->db->get_where('post', array('status' => 1));
                return $query->result();
        }

        $query = $this->db->get_where('post', array('status' => 1, 'category' => $category));
        $query = $query->result();
		return $query;
	}

	public function getpostid($slug = "")
	{
        $query = $this->db->get_where('post', array('slug' => $slug));
        $query = $query->row();
		return $query->id;
	}

	public function getpopularpost()
	{
		$select =   array('post.id', 'post.slug', 'post.title', 'post.posted_by', 'post.pix', 'count(comment.id) as total');
		$query = $this->db
			->select($select)->from('post')
			->join('comment', 'post.id = comment.post_id', 'left')->where('comment.status',1)->where('post.status',1)
			->group_by('comment.post_id')->order_by('total')->limit(3)->get()->result();
        return $query;
	}
	
	public function getrecentpost()
	{
		$this->db->order_by('id DESC');
		$this->db->where(array('status' => 1));
		$query=$this->db->get('post',3);
        $query = $query->result();
        return $query;
	}
	
	public function getsinglepost($id = "")
	{
        $query = $this->db->get_where('post', array('slug' => $id));
        $query = $query->row();
		return $query;
	}
	
	public function getsinglepostbyid($id = "")
	{
        $query = $this->db->get_where('post', array('id' => $id));
        $query = $query->row();
		return $query;
	}
	
	public function postchangestatus($id = "")
	{
		$query = $this->db->get_where('post', array('id' => $id));
		$query = $query->row();
		$query1 = $this->db->update('post', array('status' =>!($query->status)), array('id' => ($id)));
		return "Library Successfully Modified";
	}
	
	public function postchangestatusgroup()
	{if($this->input->post('post_id')!=null){
		foreach($this->input->post('post_id') as $id){
			$query = $this->db->get_where('post', array('id' => $id));
			$query = $query->row();
			$query1 = $this->db->where('id', $id);
			$query1 = $this->db->update('post', array('status' =>!($query->status)), array('id' => ($id)));
		}
		return "Library Successfully Modified";
	}}

	public function postcomment()
	{
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $website = $this->input->post('website');
        $description = $this->input->post("description");

		if($this->input->post("comment")!=null && $this->input->post("description")!=null){
			
			$data1 = array('post_id' => $id, 'name' => $name, 'description' => $description,'status' => 0);
			$data['query'] = $this->db->insert("comment", $data1);
			$this->alert_mdl->send_alert($this->getsinglepostbyid($id)->posted_by, "Comment received on ".date('Y-n-d')." you need to moderate this comment and act duly", 
			"admin/article/".$id, 0);
			if($data['query']==1){
				$this->session->set_flashdata('class', 'alert alert-success');
				$this->session->set_flashdata('content', 'Thanks. Comment Posted successfully. Your comment will be published after moderation!');
			}else{
				$this->session->set_flashdata('class', 'alert alert-danger');
				$this->session->set_flashdata('content', 'Operation failed due to internal error!');
			}
		}
	}
	
	public function postdelete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('post');
		$this->db->where('post_id', $id);
		$this->db->delete('comment');
		
		return "<div class='alert alert-success'>Book Successfully Deleted</div>";
	}
	
	public function postdeletegroup()
	{
		if($this->input->post('post_id')!=null){
			foreach($this->input->post('post_id') as $id){
				$this->db->where('id', $id);
				$this->db->delete('post');
				$this->db->where('post_id', $id);
				$this->db->delete('comment');
			}
			return "<div class='alert alert-success'>Book Successfully Deleted</div>";
		}
	}

	function setfeaturedpost(){
		$data = array('featuredpost' => 0);
		$data1 = array('featuredpost' => 1);
        $id = $this->input->post('featuredpost');
        $post_id = $this->input->post('post_id');
		$this->db->where('id', $id);
		$this->db->update('post', $data);
		$this->db->where('id', $post_id);
		$query = $this->db->update('post', $data1);
	}
	
	function uploadpost(){
		$date = date("Y-n-d H:i:s", time());
        $title = trim($this->input->post('title'));
        $author_name = $this->input->post('author_name')!=null?trim($this->input->post('author_name')):"";
        $author_email = $this->input->post('author_email')!=null?trim($this->input->post('author_email')):"";
        $author_site = $this->input->post('author_site')!=null?trim($this->input->post('author_site')):"";
        $paid_status = $this->input->post('paid_status')!=null?trim($this->input->post('paid_status')):"";
        $amount = $this->input->post('amount')!=null?trim($this->input->post('amount')):"";
		$slug = strtolower(str_replace(' ','_',trim($_POST['title'])));
		$message = '<h3>'.trim($_POST['message']).'</h3>';
		$posted_by = isset($_SESSION['username'])?$_SESSION['username']:$_SESSION['userid'];
		$status = 0;
		$category = trim($_POST['category']);
		$content = '';
		if(isset($_FILES['file']['name']) && $_FILES['file']['name']!=''){
			
			$id = count($this->getlastpost())>0? ($this->getlastpost()->id)+1:1;
			if($_FILES['file']['error']==0){
				$ext=preg_replace("/.*\.([^.]+)$/","\\1", $_FILES['file']['name']);
				//$file=($this->getlastpost()->id)+1;//time().str_replace(' ','_',trim($_FILES['file']['name']));
				$config['file_name'] = $id;
				$config['upload_path'] = './images/blog/books/';
				$config['overwrite'] = true;
				$config['allowed_types'] = '*';
				$this->load->library('upload');
				$this->upload->initialize($config);
				$this->upload->do_upload('file');
				
				$upload_data = $this->upload->data();
				$img_name = $upload_data['file_name'];
				$file_type = $upload_data['file_type'];
				$file_size = $upload_data['file_size'];
			}
				
				
				if(isset($_FILES['document']['name']) && $_FILES['document']['name']!=''){
					if($_FILES['document']['error']==0){
						
						//Code to resize image and get a thumbnail
						  $config1 = array(
								'source_image'      => './images/blog/books/'.$img_name,
								'new_image'         => './images/blog/books/coverpage/'.$img_name,
								'maintain_ratio'    => true,
								'width'             => 784,
								'height'            => 560
								);
							//here is the second thumbnail, notice the call for the initialize() function again
							$this->load->library('image_lib',$config1);
							$this->image_lib->initialize($config1);
							$this->image_lib->resize();
							
							//End of resize code
							
						$ext=preg_replace("/.*\.([^.]+)$/","\\1", $_FILES['document']['name']);
						//$file=($this->getlastpost()->id)+1;//time().str_replace(' ','_',trim($_FILES['file']['name']));
						$config['file_name'] = $id;
						$config['upload_path'] = './images/blog/books/documents/';
						$config['overwrite'] = true;
						$config['allowed_types'] = '*';
						$this->load->library('upload');
						$this->upload->initialize($config);
						$this->upload->do_upload('document');
						
						$upload_data1 = $this->upload->data();
						$document_name = $upload_data1['file_name'];
						$file_type = $upload_data1['file_type'];
						$file_size = $upload_data1['file_size'];
					}
					$data1 = array('id' => $id, 'pix' => $img_name, 'paid_status' => $paid_status, 'amount' => $amount, 'date' => $date, 'author_name' => $author_name, 'author_site' => $author_site, 'author_email' => $author_email, 'title' => $title, 'message'=>$message, 'posted_by'=>$posted_by, 'status' => $status,
					'category'=>$category, 'slug'=>$slug, 'document_name'=>$document_name);
				
		}
				
		}else{
			$data1 = array('id' => $id, 'pix' => '0', 'paid_status' => $paid_status, 'amount' => $amount, 'date' => $date, 'title' => $title, 'author_name' => $author_name, 'author_site' => $author_site, 'author_email' => $author_email, 'message'=>$message, 'posted_by'=>$posted_by, 'status' => $status,
				'category'=>$category, 'slug'=>$slug, 'document_name'=>'');
		}

		$data['query'] = $this->db->insert("post", $data1);
		$this->alert_mdl->send_alert('admin', "Book posted on ".date('Y-n-d')." by ".$posted_by, 
			"viewpost/", 1);

		if($data['query']==1){
				$this->session->set_flashdata('class', 'alert alert-success');
				$this->session->set_flashdata('content', 'Success! Book successfully forwarded. Awaiting approval!');
		}else{
				$this->session->set_flashdata('class', 'alert alert-danger');
				$this->session->set_flashdata('content', 'Operation failed due to internal error!');
		}
	}
	
}
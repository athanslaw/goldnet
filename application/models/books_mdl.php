<?php
class Books_mdl extends CI_Model {

    public function __construct()
    {
        $this->load->database();
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

	function editbooks($slug=''){
		$date = date("Y-n-d H:i:s", time());
		$title = trim($_POST['title']); 
		$id = $this->getpostid($slug);
		$slug = str_replace(' ','_',trim($_POST['title']));
		$message = '<h3>'.trim($_POST['message']).'</h3>';
		$posted_by = $_SESSION['username'];
		$category = trim($_POST['category']);
		if(isset($_FILES['file']['name']) && $_FILES['file']['name']!=''){
			if($_FILES['file']['error']==0){
				$ext=preg_replace("/.*\.([^.]+)$/","\\1", $_FILES['file']['name']);
				//$file=($this->getlastpost()->id)+1;//time().str_replace(' ','_',trim($_FILES['file']['name']));
				$config['file_name'] = ($id);
				$config['upload_path'] = './images/blog/dummy/';
				$config['allowed_types'] = '*';
				$config['overwrite'] = true;
				$this->load->library('upload');
				$this->upload->initialize($config);
				$this->upload->do_upload('file');
				
				$upload_data = $this->upload->data();
				$img_name = $upload_data['file_name'];
				$file_type = $upload_data['file_type'];
				$file_size = $upload_data['file_size'];
			}
			$data1 = array('pix' => $img_name, 'title' => $title, 'message'=>$message, 'posted_by'=>$posted_by,
				'category'=>$category, 'slug'=>$slug);
		}else{
			$data1 = array('title' => $title, 'message'=>$message, 'posted_by'=>$posted_by,
				'category'=>$category, 'slug'=>$slug);
		}

		$data['query'] = $this->db->update("post", $data1, array('id' => ($id)));
		if($data['query']==1){
			$this->session->set_flashdata('content', 'Thanks. Post Successfully Updated!');
			$this->session->set_flashdata('class', 'alert alert-success');
			$this->session->set_flashdata('slug', $slug);
		}else{
			$this->session->set_flashdata('content', 'Operation failed due to internal error!');
			$this->session->set_flashdata('class', 'alert alert-danger');}
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
                $query = $this->db->get_where('post', array('posted_by' => $_SESSION['username']));
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
		return "Posts Successfully Modified";
	}
	
	public function postchangestatusgroup()
	{if($this->input->post('post_id')!=null){
		foreach($this->input->post('post_id') as $id){
			$query = $this->db->get_where('post', array('id' => $id));
			$query = $query->row();
			$query1 = $this->db->where('id', $id);
			$query1 = $this->db->update('post', array('status' =>!($query->status)), array('id' => ($id)));
		}
		return "Posts Successfully Modified";
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
		
		return "<div class='alert alert-success'>Post Successfully Deleted</div>";
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
			return "<div class='alert alert-success'>Posts Successfully Deleted</div>";
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
		$title = trim($_POST['title']); 
		$slug = str_replace(' ','_',trim($_POST['title']));
		$message = '<h3>'.trim($_POST['message']).'</h3>';
		$posted_by = $_SESSION['username'];
		$status = 1;
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
				$this->session->set_flashdata('class', 'alert alert-success');
				$this->session->set_flashdata('content', 'Post Uploaded successfully!');
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
						$this->session->set_flashdata('class', 'alert alert-success');
						$this->session->set_flashdata('content', 'Post Uploaded successfully!');
					}
					$data1 = array('id' => $id, 'pix' => $img_name, 'date' => $date, 'title' => $title, 'message'=>$message, 'posted_by'=>$posted_by, 'status' => $status,
					'category'=>$category, 'slug'=>$slug, 'document_name'=>$document_name);
				
		}
				
		}else{
			$data1 = array('id' => $id, 'pix' => '0', 'date' => $date, 'title' => $title, 'message'=>$message, 'posted_by'=>$posted_by, 'status' => $status,
				'category'=>$category, 'slug'=>$slug, 'document_name'=>'');
				$this->session->set_flashdata('class', 'alert alert-success');
				$this->session->set_flashdata('content', 'Post Uploaded successfully!');
		}

		$data['query'] = $this->db->insert("post", $data1);
		$this->alert_mdl->send_alert('admin', "Article posted on ".date('Y-n-d')." by ".getName($_SESSION['username']), 
			"viewpost/", 1);

		if($data['query']==1){
				$this->session->set_flashdata('class', 'alert alert-success');
				$this->session->set_flashdata('content', 'Success! Post successfully forwarded. Awaiting approval!');
		}else{
				$this->session->set_flashdata('class', 'alert alert-danger');
				$this->session->set_flashdata('content', 'Operation failed due to internal error!');
		}
	}
	
}
<?php
class Advert_mdl extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

	public function advertchangestatus($id = "")
	{
		$query = $this->db->get_where('advert', array('id' => $id));
		$query = $query->row();
		$query1 = $this->db->update('advert', array('status' =>!($query->status)), array('id' => ($id)));
		return "Advert Successfully Modified";
	}
	
	public function advertchangestatusgroup()
	{
		if($this->input->post('id')!=null){
			foreach($this->input->post('id') as $id){
				$query = $this->db->get_where('advert', array('id' => $id));
				$query = $query->row();
				$query1 = $this->db->update('advert', array('status' =>!($query->status)), array('id'=>($id)));
			}
			return "Advert Successfully Modified";
		}
	}

	public function advertdelete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('advert');
		return "<div class='alert alert-success'>Advert Successfully Deleted</div>";
	}
	
	public function advertdeletegroup()
	{
	if($this->input->post('id')!=null){
		foreach($this->input->post('id') as $id){
			$this->db->where('id', $id);
			$this->db->delete('advert');
		}
		return "<div class='alert alert-success'>Advert Successfully Deleted</div>";
	}
	}
	
	function editadvert($id=''){
		$title = trim($_POST['title']); 
		$slug = str_replace(' ','_',trim($_POST['title']));
		$message = str_replace('<h3></h3>','',trim($_POST['message']));
		$img_name = "";
		$link = trim($_POST['link']); 
		if(isset($_FILES['file']['name']) && $_FILES['file']['name']!=''){
			if($_FILES['file']['error']==0){
				$ext=preg_replace("/.*\.([^.]+)$/","\\1", $_FILES['file']['name']);
				$config['file_name'] = $slug;
				$config['upload_path'] = './images/blog/advert/';
				$config['allowed_types'] = '*';
				$config['overwrite'] = true;
				$this->load->library('upload');
				$this->upload->initialize($config);
				$this->upload->do_upload('file');
				
				$upload_data = $this->upload->data();
				$img_name = $upload_data['file_name'];
				$file_type = $upload_data['file_type'];
				$file_size = $upload_data['file_size'];
				
				//$this->upload->do_upload('file');
				if ($this->upload->do_upload('file')) {
				  //Code to resize image and get a thumbnail
				  $config1 = array(
						'source_image'      => './images/blog/advert/'.$img_name,
						'new_image'         => './images/blog/advert/thumbnails/'.$img_name,
						'maintain_ratio'    => true,
						'width'             => 336,
						'height'            => 280
						);
					//here is the second thumbnail, notice the call for the initialize() function again
					$this->load->library('image_lib',$config1);
					$this->image_lib->initialize($config1);
					$this->image_lib->resize();
				}
				//End of resize code
			}
		}
		$data1 = array('title' => $title, 'description'=>$message, 'link'=>$link, 'slug'=>$slug, 'image'=>$img_name);

		$data['query'] = $this->db->update("advert", $data1, array('id' => ($id)));
		if($data['query']==1){
			$this->session->set_flashdata('content', 'Thanks. Brand Successfully Updated!');
			$this->session->set_flashdata('class', 'alert alert-success');
		}else{
			$this->session->set_flashdata('content', 'Operation failed due to internal error!');
			$this->session->set_flashdata('class', 'alert alert-danger');}
	}

	public function getadvertsearch($brand = "")
	{
		if ($brand === "")
        {
			$query = $this->db->get_where('advert', array('status' => 1));
            $query = $this->db->get('advert');
            return $query->result();
        }
        $query = $this->db->query("SELECT * FROM advert WHERE (`title` LIKE '%".$brand."%' OR `description` LIKE '%".$brand."%') AND `status` = '1' ORDER BY id DESC");
        $query = $query->result();
		return $query;
	}

	public function getadvert($status = "")
	{
		$query = $this->db->order_by('id DESC');
        if ($status === "")
        {
                $query = $this->db->get('advert');
                return $query->result();
        }
        $query = $this->db->get_where('advert', array('status' => $status));
        $query = $query->result();
		return $query;
	}

	public function getmyadvert()
	{
		$username = isset($_SESSION['username'])?$_SESSION['username']:$_SESSION['userid'];
		$query = $this->db->order_by('id DESC');
        $query = $this->db->get_where('advert', array('posted_by' => $username));
        $query = $query->result();
		return $query;
	}

	public function getadvertsingle($id = "")
	{
		$query = $this->db->order_by('id DESC');
        $query = $this->db->get_where('advert', array('id' => $id));
        $query = $query->row();
		if($query->id==null){
			$query->id=0;
			$query->title="";
			$query->description="";
			$query->image="";
			$query->title="";
			$query->link="";
			$query->status=0;
			$query->posted_by="1";
			$query->date="";
			$query->slug="";
		}
		return $query;
	}

	function uploadadvert(){
		$date = date("Y-n-d H:i:s", time());
		$title = trim($_POST['title']); 
		$link = trim($_POST['link']); 
		$slug = str_replace(' ','_',trim($_POST['title']));
		$message = str_replace('<h3></h3>','',trim($_POST['message']));
		$posted_by = isset($_SESSION['username'])?$_SESSION['username']:$_SESSION['userid'];
		$status = 0;
		if($_FILES['file']['error']==0){
			$ext=preg_replace("/.*\.([^.]+)$/","\\1", $_FILES['file']['name']);
			$config['file_name'] = $slug;
			$config['upload_path'] = './images/blog/advert/';
			$config['overwrite'] = true;
			$config['allowed_types'] = '*';
			$this->load->library('upload');
			$this->upload->initialize($config);
			$this->upload->do_upload('file');
			
			$upload_data = $this->upload->data();
			$img_name = $upload_data['file_name'];
			$file_type = $upload_data['file_type'];
			$file_size = $upload_data['file_size'];
			//$this->upload->do_upload('file');
			if ($this->upload->do_upload('file')) {
			  //Code to resize image and get a thumbnail
			  $config1 = array(
					'source_image'      => './images/blog/advert/'.$img_name,
					'new_image'         => './images/blog/advert/thumbnails/'.$img_name,
					'maintain_ratio'    => true,
					'width'             => 336,
					'height'            => 280
					);
				//here is the second thumbnail, notice the call for the initialize() function again
				$this->load->library('image_lib',$config1);
				$this->image_lib->initialize($config1);
				$this->image_lib->resize();
				
				//End of resize code
			}
		}
		$data1 = array('date' => $date, 'title' => $title, 'description'=>$message, 'posted_by'=>$posted_by, 'status' => $status,
			'link'=>$link, 'slug'=>$slug, 'image'=>$img_name);
		$data['query'] = $this->db->insert("advert", $data1);
		if($data['query']==1){
			$this->session->set_flashdata('class', 'alert alert-success');
			$this->session->set_flashdata('content', 'Success! Brand successfully posted. Awaiting confirmation from the admin!');
			send_mail("notify@goldnet.com.ng",$posted_by." just added a brand",$posted_by,'',"Brand confirmation pending!");
		}else{
			$this->session->set_flashdata('class', 'alert alert-danger');
			$this->session->set_flashdata('content', 'Operation failed due to internal error!');
		}
	}

	
}
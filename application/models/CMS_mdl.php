<?php
class CMS_mdl extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
	
	function banner(){
		$image = 'slider1.jpg';
		if($_FILES['file']['error']==0){
			$config['file_name'] = $image;
			$config['file_ext'] = '.jpg';
			$config['image_type'] = 'jpg';
			$config['upload_path'] = './images/';
			$config['allowed_types'] = '*';
			$config['overwrite'] = true;
			
			$this->load->library('upload');
			$this->upload->initialize($config);
			$this->upload->do_upload('file');
		}
		$data1 = array('content'=>$image);
		$data['query'] = $this->db->update("cms", $data1, array('name' => 'banner'));
		if($data['query']==1){
			$this->session->set_flashdata('content', 'Thanks. Banner Successfully Uploaded!');
			$this->session->set_flashdata('class', 'alert alert-success');
		}else{
			$this->session->set_flashdata('content', 'Operation failed due to internal error!');
			$this->session->set_flashdata('class', 'alert alert-danger');}
	}
		
	function icon(){
		$image = 'ped';
		if($_FILES['file']['error']==0){
			$config['file_name'] = $image;
			//$config['file_ext'] = '.png';
			//$config['image_type'] = 'png';
			$config['upload_path'] = './images/';
			$config['allowed_types'] = '*';
			$config['overwrite'] = true;
			
			$this->load->library('upload');
			$this->upload->initialize($config);
			$this->upload->do_upload('file');
			
				$upload_data = $this->upload->data();
				$image = $upload_data['file_name'];
				$file_type = $upload_data['file_type'];
				$file_size = $upload_data['file_size'];
		}
		$data1 = array('content'=>$image);
		$data['query'] = $this->db->update("cms", $data1, array('name' => 'icon'));
		if($data['query']==1){
			$this->session->set_flashdata('content', 'Thanks. Icon Successfully Uploaded!');
			$this->session->set_flashdata('class', 'alert alert-success');
		}else{
			$this->session->set_flashdata('content', 'Operation failed due to internal error!');
			$this->session->set_flashdata('class', 'alert alert-danger');}
	}
	
	function logo(){
		$image = 'mainlogo';
		if($_FILES['file']['error']==0){
			$ext=preg_replace("/.*\.([^.]+)$/","\\1", $_FILES['file']['name']);
			$config['file_name'] = $image;
			//$config['file_ext'] = '.png';
			//$config['image_type'] = 'png';
			$config['upload_path'] = './images/';
			$config['allowed_types'] = '*';
			$config['overwrite'] = true;
			
			$this->load->library('upload');
			$this->upload->initialize($config);
			$this->upload->do_upload('file');
			
				$upload_data = $this->upload->data();
				$image = $upload_data['file_name'];
				$file_type = $upload_data['file_type'];
				$file_size = $upload_data['file_size'];
		}
		$data1 = array('content'=>$image);
		$data['query'] = $this->db->update("cms", $data1, array('name' => 'logo'));
		if($data['query']==1){
			$this->session->set_flashdata('content', 'Thanks. Logo Successfully Uploaded!');
			$this->session->set_flashdata('class', 'alert alert-success');
		}else{
			$this->session->set_flashdata('content', 'Operation failed due to internal error!');
			$this->session->set_flashdata('class', 'alert alert-danger');}
	}
	
	public function updateservice()
	{
		$image = $this->input->post('serviceabove1');
		if($_FILES['file']['error']==0){
			$config['file_name'] = $image;
			$config['file_ext'] = '.png';
			$config['upload_path'] = './images/';
			$config['allowed_types'] = '*';
			$config['overwrite'] = true;
			
			$this->load->library('upload');
			$this->upload->initialize($config);
			$this->upload->do_upload('file');
		}
		$msgtitle = $this->input->post('service');
		$msgcontent = $this->input->post('servicecontent');
		$no = $this->input->post('serviceno');
		$name1 = $no;
		$name2 = $no.'_content';
		$data1 = array('content'=>$msgtitle);
		$data2 = array('content'=>$msgcontent);
		$data['query'] = $this->db->update("cms", $data1, array('name' => $name1));
		$data['query'] = $this->db->update("cms", $data2, array('name' => $name2));
		$this->session->set_flashdata('content', 'Thanks. '.$name1.' Successfully Updated!');
		$this->session->set_flashdata('class', 'alert alert-success');
	}
	
	function uploadserviceimage(){
		$service_name = $this->input->post('servicename');
		if($_FILES['file']['error']==0){
			$ext=preg_replace("/.*\.([^.]+)$/","\\1", $_FILES['file']['name']);
			$config['file_name'] = $service_name;
			$config['file_ext'] = '.jpg';
			$config['image_type'] = 'jpg';
			$config['upload_path'] = './images/';
			$config['allowed_types'] = '*';
			$config['overwrite'] = true;

			$this->load->library('upload');
			$this->upload->initialize($config);
			$this->upload->do_upload('file');
			$this->session->set_flashdata('content', 'Thanks. Service Image Successfully Uploaded!');
			$this->session->set_flashdata('class', 'alert alert-success');
		}
		else{
			$this->session->set_flashdata('content', 'Operation failed due to internal error!');
			$this->session->set_flashdata('class', 'alert alert-danger');}
	}
	
	public function welcome($id = "")
	{
		$msgtitle = $this->input->post('msgtitle');
		$msgcontent = $this->input->post('msgcontent');
		$data1 = array('content'=>$msgtitle);
		$data2 = array('content'=>$msgcontent);
		$data['query'] = $this->db->update("cms", $data1, array('name' => 'welcome_msg_title'));
		$data['query'] = $this->db->update("cms", $data2, array('name' => 'welcome_msg_content'));
		$this->session->set_flashdata('content', 'Thanks. Home Page Welcome Message Successfully Updated!');
		$this->session->set_flashdata('class', 'alert alert-success');
	}
	
}
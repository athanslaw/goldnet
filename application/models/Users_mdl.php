<?php
class Users_mdl extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

	public function changepass()
	{
        $password = md5($this->input->post('npw'));
        $username = ($this->input->post('username'));
		if($username !== $_SESSION['username']){
			return "<div class='alert alert-danger'>Sorry! The username does not correspond with the registered username</div>";
		}

		$data1 = array('password' => $password);
		$data['query'] = $this->db->update("users", $data1, array('username' => ($username)));
		if($data['query']==1){
			return "<div class='alert alert-success'>Password Changed Successfully!</div>";
			//Sorry! The username does not correspond with the registered username
		}else{ return "<div class='alert alert-danger'>Operation failed due to internal error!</div>";}
	}

	public function contact()
	{
        $fullname = $this->input->post('fullname');
        $phone = $this->input->post('phone');
		$email = $this->input->post("email");
		$enquiry = $this->input->post("enquiry");

		$data1 = array('fullname' => $fullname, 'phone' => $phone, 'email' => $email,'enquiry' => $enquiry);
		$data['query'] = $this->db->insert("contact_form", $data1);
		if($data['query']==1){
			return "<div class='alert alert-success'>Thanks. message forwarded successfully!</div>";
		}else{ return "<div class='alert alert-danger'>Operation failed due to internal error!</div>";}
	}

	public function check_user($userid)
	{
        $query = $this->db->get_where('user_profile', array('username' => $userid));
		if($query->num_rows()<1){
			return false;
		}
		else{
			return true;
		}
	}
			
	public function createadmin()
	{
        $username = $this->input->post('username');
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $role = isset($_POST['role'])?$_POST['role']:'general';
		$password = md5($this->input->post("password"));

		if($this->check_user($username)){
			return "<div class='alert alert-danger'>Sorry. Your selected email address is in use. 
			<br>kindly try a different email address</div>";
		}
		
		if($this->input->post("send")!=null){
			$data1 = array('username' => $username, 'fname' => $fname, 'lname' => $lname, 'role' => $role, 'password' => $password, 'ustatus' => 1);
			$data['query'] = $this->db->insert("admins", $data1);
			if($data['query']==1){
				$this->session->set_flashdata('class', 'alert alert-success');
				$this->session->set_flashdata('content', 'User successfully created!');
			}else{
				$this->session->set_flashdata('class', 'alert alert-danger');
				$this->session->set_flashdata('content', 'Operation failed due to internal error!');}
		}
	}
	
	public function createuser()
	{
        $username = $this->input->post('username');
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $role = isset($_POST['role'])?$_POST['role']:'general';
		$password = md5($this->input->post("password"));

		if($this->check_user($username)){
			return "<div class='alert alert-danger'>Sorry. Your selected email address is in use. 
			<br>kindly try a different email address</div>";
		}
		
		if($this->input->post("send")!=null){
			$data1 = array('username' => $username, 'fname' => $fname, 'lname' => $lname, 'role' => $role, 'password' => $password, 'ustatus' => 1);
			$data['query'] = $this->db->insert("users", $data1);
			if($data['query']==1){
				$this->session->set_flashdata('class', 'alert alert-success');
				$this->session->set_flashdata('content', 'User successfully created!');
			}else{
				$this->session->set_flashdata('class', 'alert alert-danger');
				$this->session->set_flashdata('content', 'Operation failed due to internal error!');}
		}
	}
	
	public function editfounder()
	{
        $name = trim($_POST['name']); 
        $address = trim($_POST['address']); 
        $phone = trim($_POST['phone']); 
        $biography = trim($_POST['biography']); 
        $short_name = trim($_POST['short_name']); 
        $organization = trim($_POST['organization']); 
		$content = '';
		if(isset($_FILES['file']['name']) && $_FILES['file']['name']!=''){
			if($_FILES['file']['error']==0){
				$ext=preg_replace("/.*\.([^.]+)$/","\\1", $_FILES['file']['name']);
				$config['file_name'] = 'founder';
				$config['upload_path'] = './images/founder/';
				$config['overwrite'] = true;
				$config['allowed_types'] = '*';
				$this->load->library('upload');
				$this->upload->initialize($config);
				$this->upload->do_upload('file');
				$this->session->set_flashdata('class', 'alert alert-success');
				$this->session->set_flashdata('content', 'Information Saved successfully!');
			}
		}
		$data1 = array('name' => $name, 'address' => $address, 'phone' => $phone, 'biography' => $biography, 'organization'=>$organization,
		'short_name'=>$short_name);
		
		$data['query'] = $this->db->update("founder", $data1, array('id' => (1)));
		if($data['query']==1){
				$this->session->set_flashdata('class', 'alert alert-success');
				$this->session->set_flashdata('content', 'Success! Founder successfully saved!');
		}else{
				$this->session->set_flashdata('class', 'alert alert-danger');
				$this->session->set_flashdata('content', 'Operation failed due to internal error!');
		}
	}

	public function founder()
	{
        $query = $this->db->get('founder');
		if($query->num_rows()<1){
			$query->id=0;
			$query->name="";
			$query->address="";
			$query->phone="";
			$query->image="";
			$query->biography="";
			$query->organization="";
			$query->email="";
		}
		else{
			$query= $query->row();
		}
		return $query;
	}

	public function getCountry($id='')
	{
		if($id === ""){
			$query = $this->db->order_by('country_name ASC');
			$query = $this->db->get('countries');
			$query = $query->result();
			return $query;
		}
        $query = $this->db->get_where('countries', array('id' => $id));
        $query = $query->row();
		return $id>0?$query->country_name:'-';
	}

	public function getLga($id = "")
	{
        $query = $this->db->get_where('lga', array('code' => $id));
        $query = $query->row();
		return $id>0?$query->lga:'-';
	}

	public function getName($id = "")
	{
        $query = $this->db->get_where('users', array('username' => $id));
		if($query->num_rows()<1){
			$query->username="";
			$query->role="";
			$query->password="";
			$query->fname="";
			$query->lname="";
			$query->ustatus="";
			$query->phone="";
			$query->description="";
			$query->sex="";
			$query->state="";
			$query->lga="";
			$query->dob="";
			$query->mstatus="";
			$query->town="";
			$query->country="";
		}
		else{
			$query= $query->row();
		}
		return $query->fname.' '.$query->lname;
	}
	
	public function getState($id = "")
	{
		if($id === ""){
			$query = $this->db->order_by('state ASC');
			$query = $this->db->get('stateoforigin');
			$query = $query->result();
			return $query;
		}
        $query = $this->db->get_where('stateoforigin', array('code' => $id));
        $query = $query->row();
		return $id>0?$query->state:'-';
	}
	
	public function getStateByCountry($country = "")
	{
		$query = $this->db->order_by('state ASC');
        $query = $this->db->get_where('stateoforigin', array('country' => $country));
        $query = $query->result();
		return $query;
	}
	
	public function getadmins($username = "")
	{
        if ($username === "")
        {
                $query = $this->db->get('admins');
                return $query->result();
        }
        $query = $this->db->get_where('admins', array('username' => $username));
		if($query->num_rows()<1){
			$query->username="";
			$query->role="";
			$query->password="";
			$query->fname="";
			$query->lname="";
			$query->ustatus="";
			$query->phone="";
			$query->description="";
			$query->sex="";
			$query->state="";
			$query->lga="";
			$query->dob="";
			$query->mstatus="";
			$query->town="";
			$query->country="";
		}
		else{
			$query= $query->row();
		}
        return $query;
	}
		
	public function getusers($username = "")
	{
        if ($username === "")
        {
                $query = $this->db->get('users');
                return $query->result();
        }
        $query = $this->db->get_where('users', array('username' => $username));
		if($query->num_rows()<1){
			$query->username="";
			$query->role="";
			$query->password="";
			$query->fname="";
			$query->lname="";
			$query->ustatus="";
			$query->phone="";
			$query->description="";
			$query->sex="";
			$query->state="";
			$query->lga="";
			$query->dob="";
			$query->mstatus="";
			$query->town="";
			$query->country="";
		}
		else{
			$query= $query->row();
		}
        return $query;
	}
		
	public function signup()
	{
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $role = 'general';
        $ustatus = 0;
        $phone = $this->input->post('phone');
        $password = md5($this->input->post('password'));
		$email = $this->input->post("email");
		$description = $this->input->post("description");
		$state = $this->input->post("state");
		$lga = $this->input->post("lga");
		$town = $this->input->post("town");
		$sex = $this->input->post("sex");
		$country = $this->input->post("country");

		$data1 = array('fname' => $fname, 'lname' => $lname, 'phone' => $phone, 'username' => $email,'description' => $description, 
		'password' => $password, 'role'=>$role, 'state'=>$state, 'lga'=>$lga, 'town'=>$town, 'country'=>$country, 'sex'=>$sex, 'ustatus' =>$ustatus);
		$data['query'] = $this->db->insert("users", $data1);
		if($data['query']==1){
			return "<div class='alert alert-success'>Thanks for your time. Your details have been forwared to the admin for review. 
			You will be notify shortly!</div>";
		}else{ return "<div class='alert alert-danger'>Operation failed due to internal error!</div>";}
	}
	
	public function updateprofile_admin()
	{
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $phone = $this->input->post('phone');
        $password = md5($this->input->post('password'));
		$email = $this->input->post("email");
		$description = $this->input->post("description");
		$state = $this->input->post("state");
		$lga = $this->input->post("lga");
		$town = $this->input->post("town");
		$sex = $this->input->post("sex");
		$country = $this->input->post("country");

		
		if($_FILES['file']['error']==0){
			$ext=preg_replace("/.*\.([^.]+)$/","\\1", $_FILES['file']['name']);
			$config['file_name'] = $_SESSION['username'];
			$config['upload_path'] = './images/users/';
			$config['overwrite'] = true;
			$config['allowed_types'] = '*';
			$this->load->library('upload');
			$this->upload->initialize($config);
			//$this->upload->do_upload('file');
			if ($this->upload->do_upload('file')) {
			  //Code to resize image and get a thumbnail
			  /*$config1 = array(
					'source_image'      => './images/blog/advert/'.$fileName,
					'new_image'         => './images/blog/advert/thumbnails/'.$fileName,
					'maintain_ratio'    => true,
					'width'             => 350,
					'height'            => 240
					);
				//here is the second thumbnail, notice the call for the initialize() function again
				$this->load->library('image_lib',$config1);
				$this->image_lib->initialize($config1);
				$this->image_lib->resize();
				*/
				//End of resize code
				$this->session->set_flashdata('class', 'alert alert-success');
				$this->session->set_flashdata('content', 'Advert Uploaded successfully!');
			}
		}
		
		$data1 = array('fname' => $fname, 'lname' => $lname, 'phone' => $phone, 'description' => $description, 
		'state'=>$state, 'lga'=>$lga, 'town'=>$town, 'country'=>$country, 'sex'=>$sex);
		$data['query'] = $this->db->where('username',$_SESSION['username']);
		$data['query'] = $this->db->update("admins", $data1);
		if($data['query']==1){
			return "<div class='alert alert-success'>Success. Information Saved!</div>";
		}else{ return "<div class='alert alert-danger'>Operation failed due to internal error!</div>";}
	}
	
	public function updateprofile()
	{
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $phone = $this->input->post('phone');
        $password = md5($this->input->post('password'));
		$email = $this->input->post("email");
		$description = $this->input->post("description");
		$state = $this->input->post("state");
		$lga = $this->input->post("lga");
		$town = $this->input->post("town");
		$sex = $this->input->post("sex");
		$country = $this->input->post("country");

		
		if($_FILES['file']['error']==0){
			$ext=preg_replace("/.*\.([^.]+)$/","\\1", $_FILES['file']['name']);
			$config['file_name'] = $_SESSION['username'];
			$config['upload_path'] = './images/users/';
			$config['overwrite'] = true;
			$config['allowed_types'] = '*';
			$this->load->library('upload');
			$this->upload->initialize($config);
			//$this->upload->do_upload('file');
			if ($this->upload->do_upload('file')) {
			  //Code to resize image and get a thumbnail
			  /*$config1 = array(
					'source_image'      => './images/blog/advert/'.$fileName,
					'new_image'         => './images/blog/advert/thumbnails/'.$fileName,
					'maintain_ratio'    => true,
					'width'             => 350,
					'height'            => 240
					);
				//here is the second thumbnail, notice the call for the initialize() function again
				$this->load->library('image_lib',$config1);
				$this->image_lib->initialize($config1);
				$this->image_lib->resize();
				*/
				//End of resize code
				$this->session->set_flashdata('class', 'alert alert-success');
				$this->session->set_flashdata('content', 'Advert Uploaded successfully!');
			}
		}
		
		$data1 = array('fname' => $fname, 'lname' => $lname, 'phone' => $phone, 'description' => $description, 
		'state'=>$state, 'lga'=>$lga, 'town'=>$town, 'country'=>$country, 'sex'=>$sex);
		$data['query'] = $this->db->where('username',$_SESSION['username']);
		$data['query'] = $this->db->update("users", $data1);
		if($data['query']==1){
			return "<div class='alert alert-success'>Success. Information Saved!</div>";
		}else{ return "<div class='alert alert-danger'>Operation failed due to internal error!</div>";}
	}
	
	public function userschangestatus_admin()
	{
		if($this->input->post('username')!=null){
		foreach($this->input->post('username') as $id){
			$query = $this->db->get_where('admins', array('username' => $id));
			$query = $query->row();
			$query1 = $this->db->update('admins', array('ustatus' =>!($query->ustatus)), array('username'=>($id)));
		}
		return "<div class='alert alert-success'>Users Successfully Modified</div>";
		}else {
		return "<div class='alert alert-danger'>Please select at least one record</div>";}
	}

	public function userschangestatus()
	{
		if($this->input->post('username')!=null){
		foreach($this->input->post('username') as $id){
			$query = $this->db->get_where('users', array('username' => $id));
			$query = $query->row();
			$query1 = $this->db->update('users', array('ustatus' =>!($query->ustatus)), array('username'=>($id)));
		}
		return "<div class='alert alert-success'>Users Successfully Modified</div>";
		}else {
		return "<div class='alert alert-danger'>Please select at least one record</div>";}
	}

	public function usersdelete()
	{
		if($this->input->post('username')!=null){
		foreach($this->input->post('username') as $id){
			$this->db->where('username', $id);
			$this->db->delete('users');
		}
		return "<div class='alert alert-success'>Users Successfully Deleted</div>";
		}else {
		return "<div class='alert alert-danger'>Please select at least one record</div>";}
	}
	
	public function usersdelete_admin()
	{
		if($this->input->post('username')!=null){
		foreach($this->input->post('username') as $id){
			$this->db->where('username', $id);
			$this->db->delete('admins');
		}
		return "<div class='alert alert-success'>Users Successfully Deleted</div>";
		}else {
		return "<div class='alert alert-danger'>Please select at least one record</div>";}
	}
}
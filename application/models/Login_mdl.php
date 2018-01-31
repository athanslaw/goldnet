<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_mdl extends CI_Model {

	/**
	 * Constructor
	 *
	 * @access	public
	 */
	public function __construct() {
		parent::__construct();
		$this->load->library('email');
		$config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
	}
	
 	function check_user_login($url_destination="") {
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		
		$query = $this->db->get_where('user_profile', array('email' =>$username,'password'=>$password));
		$view=$query->row();
		$count=$query->num_rows();
			 
			 if($count>0){
			 	if($view->profile_status){
					$row = $query->row();
					$session_data = array('userid' => $row->username, 'logged_in' => TRUE);
					$this->session->set_userdata($session_data);
					$this->session->set_flashdata('success', 'Login Successfully....!');
					if(isset($url_destination) && $url_destination!=""){
							redirect(base_url().urldecode($url_destination));
					}else{
						redirect(base_url()."account/myprofile");
					}
				}
				else{
					$this->session->set_flashdata('error', '<font color="#990">Sorry, your account is not yet activated.</font>');
				}
		   } else {
			   //$this->session->set_userdata($session_data);
			   $this->session->set_flashdata('error', '<font color="#c00">Invalid Login Credentials.</font>');
		   }
	}
	
 	function check_admin_login() {

		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		
		$query = $this->db->get_where('admins', array('username' =>$username,'password'=>$password));
		$view=$query->row();
		$count=$query->num_rows();
			 
			 if($count>0){
			 	if($view->ustatus){
					$row = $query->row();
					$session_data = array('username' => $username, 'role' => $row->role, 'logged_in' => TRUE);
					$this->session->set_userdata($session_data);
					$this->session->set_flashdata('success', 'Login Successfully....!');
					redirect(base_url()."admin/home");
				}
				else{
					$this->session->set_flashdata('error', '<font color="#990">Sorry, your account is not yet activated.</font>');
				}
		   } else {
			   //$this->session->set_userdata($session_data);
			   $this->session->set_flashdata('error', '<font color="#c00">Invalid Login Credentials.</font>');
		   }
	}
	
	function login_details() {
		
		$admin_id = $this->session->userdata('admin_id');
		$query = $this->db->get_where('admin_login', array('id' =>$admin_id));
		return $query->row();
	}
	
	function signup() {
		$username1 = $this->input->post('username');
		$email = $username1;
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
		$date_registered = date("Y-m-d H:i:s");
        $role = "user";
		list($username, $domain) = explode("@", $username1);
		$password = md5($this->input->post("password"));
		
		$query = $this->db->get_where('user_profile', array('email' =>$username1));
		
		$view=$query->row();
		$count=$query->num_rows();
			 
		if($count>0){
			   $this->session->set_flashdata('error', 'Try another username....!');
			   //redirect(base_url()."account/myprofile");
		} else {
			$username .= date('ymdHis');
			$md5_id = md5($username);
		   $data1 = array('username' => $username, 'registration_date' => $date_registered, 'email' => $email, 'first_name' => $fname, 'state' => '1', 
		   'last_name' => $lname, 'password' => $password, 'profile_status' => 1, 'md5_id' => $md5_id, 'dob' => '1488495600', 'country' => '161', 'experience' => '1');
			$data['query'] = $this->db->insert("user_profile", $data1);
			$this->session->set_flashdata('success', 'Account created successfully. Follow the link sent to your mail to activate your account');
			send_mail("notify@goldnet.com.ng",$fname." just signed up",$fname,'',"Signup Notification");
			
			$content = '<table border="0" cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<td>
			<table border="0" cellspacing="0" style="width:80%">
				<tbody>
					<tr>
						<td>
						<p><strong>Hello '.$fname.',</strong></p>

						<p>Thank you for registering on GoldNet Consult. This is your best opportunity of selling yourself and brand.</p>

						<p>Do these 2 things to make the most out of GoldNet Consult:</p>

						<ul>
							<li>Complete your GoldNet profile</li>
							<li>Add your brand</li>
						</ul>

						<p>&nbsp;</p>

						<p><strong>Regards,</strong><br />
						GoldNet Consult</p>
						</td>
					</tr>
				</tbody>
			</table>
			</td>
		</tr>
	</tbody>
</table>';
			send_mail($email,$content,$fname,'',"Welcome to GoldNet Consult");
		}
	}
	
	function update_profile() {
		
		$username = $this->input->post('username');
		$designation = $this->input->post('designation');
 		$admin_id = $this->session->userdata('admin_id');
		$password = $this->input->post('confirm_password');
	
		if(isset($_FILES['photo']['name']) && $_FILES['photo']['name']!=''){
		
			if($_FILES['photo']['error']==0){
			
				$ext=preg_replace("/.*\.([^.]+)$/","\\1", $_FILES['photo']['name']);
				$photo=time().str_replace(' ','_',trim($_FILES['photo']['name']));
				
				$config['file_name'] =$photo;
				$config['upload_path'] = './assets/Backend/photo/';
				$config['allowed_types'] = '*';
				$this->load->library('upload');
				$this->upload->initialize($config);
				$this->upload->do_upload('photo');
			}
			
			 if(isset($password) && $password!=''){
				 $data=array("username"=>$username,	"designation"=>$designation, "image"=>$photo, "password"=>md5($password));
			 }else{
				$data=array("username"=>$username, "designation"=>$designation, "image"=>$photo);
			 }
		}else{
			if(isset($password) && $password!=''){ 
				$data=array("username"=>$username, "designation"=>$designation, "password"=>md5($password));	
			}else{
				$data=array("username"=>$username, "designation"=>$designation);	
			}
		}
		
 		$this->db->where('id',$admin_id);
		$this->db->update('admin_login',$data);
		$this->session->set_flashdata('success', 'Updated Successfully!');
		
	}
}
	
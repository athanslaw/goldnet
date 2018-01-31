<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobseeker_mdl extends CI_Model {
	
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
	
	function applicant_search_result_show_front_details(){
		 
		$where = "where id!=''";
		
		if(isset($_GET['spec']) && $_GET['spec']!=''){
			
			$spec = $_GET['spec'];
			$where.=" and function_area in (".$spec.")";
		}
		
 		if(isset($_GET['experience']) && $_GET['experience']!=''){
			
			$experience = $_GET['experience'];
			$where.=" and experience in (".$experience.")";
		}
		
		if(isset($_GET['education']) && $_GET['education']!=''){
			
			$education = $_GET['education'];
			$where.=" and education in (".$education.")";
		}
		
		if(isset($_GET['salary']) && $_GET['salary']!=''){
			
			$salary = $_GET['salary'];
			$where.=" and expected_salary in (".$salary.")";
		}
		
		if(isset($_GET['state']) && $_GET['state']!=''){
			
			$state = $_GET['state'];
			$where.=" and state in (".$state.")";
		}
		
		if(isset($_GET['carrer_sector']) && $_GET['carrer_sector']!=''){
			
			$carrer_sector = $_GET['carrer_sector'];
			$where.=" and carrer_sector in (".$carrer_sector.")";
		}
		 
		$query = $this->db->query("SELECT * FROM `job_seeker` $where AND `profile_status` = 1 ORDER BY `id` DESC");
		return $query->result();
		 
	}
	
	function user_full_details($id){
		
		$query = $this->db->get_where('user_profile',array('username'=>$id));
	  	return $query->row();
	} 
	
	function get_profile(){
		
		$job_seeker_id = $this->session->userdata('userid');
		$this->db->where('username', $job_seeker_id);
		$query = $this->db->get('user_profile');
		return $query->row();
 	
	}
	
	function get_profile1($username){
		
		$job_seeker_id = $username;
		$this->db->where('username', $job_seeker_id);
		$query = $this->db->get('user_profile');
		return $query->row();
 	
	}
	
	function get_work_experience(){
		
		$job_seeker_id = $this->session->userdata('userid');
		$this->db->where('username', $job_seeker_id);
		$this->db->order_by("exp_from_year", "desc"); 
		$query = $this->db->get('user_work_experience');
		return $query->result();
 	
	}
		
	function get_work_experience1($username){
		
		$job_seeker_id = $username;
		$this->db->where('username', $job_seeker_id);
		$this->db->order_by("exp_from_year", "desc"); 
		$query = $this->db->get('user_work_experience');
		return $query->result();
 	
	}
	
	function work_experience_full_details($jobseeker_id){
		
		$this->db->order_by("id", "desc"); 
		$query = $this->db->get_where('user_work_experience',array('username'=>$jobseeker_id));
	  	return $query->row();
	} 
	
	function get_eduation(){
		
		$job_seeker_id = $this->session->userdata('userid');
		$this->db->where('username', $job_seeker_id);
		$this->db->order_by("date_from", "desc"); 
		$query = $this->db->get('user_education');
		return $query->result();
	}
	
	function get_eduation1($username){
		
		$job_seeker_id = $username;
		$this->db->where('username', $job_seeker_id);
		$this->db->order_by("date_from", "desc"); 
		$query = $this->db->get('user_education');
		return $query->result();
	}
	
	function get_eduation_full_details($id){
		 
		$this->db->where('id', $id); 
		$query = $this->db->get('user_education');
		return $query->row();
 	
	}
	
	function get_work_experience_full_details($id){
		 
		$this->db->where('id', $id); 
		$query = $this->db->get('user_work_experience');
		return $query->row();
 	
	}
	function get_certification_full_details($id){
		 
		$this->db->where('id', $id); 
		$query = $this->db->get('user_certifications');
		return $query->row();
 	
	}
	
	function get_cv(){
		
		$job_seeker_id = $this->session->userdata('userid');
		$this->db->where('username', $job_seeker_id);
		$this->db->order_by("id", "desc"); 
		$query = $this->db->get('user_cv');
		return $query->result();
	}
	
	function get_cv1($username){
		
		$job_seeker_id = $username;
		$this->db->where('username', $job_seeker_id);
		$this->db->order_by("id", "desc"); 
		$query = $this->db->get('user_cv');
		return $query->result();
	}
	
	function get_certifications(){
		$job_seeker_id = $this->session->userdata('userid');
		$this->db->where('username', $job_seeker_id);
		$this->db->order_by("year", "desc"); 
		$query = $this->db->get('user_certifications');
		return $query->result();
	} 
 	
	function get_certifications1($username){
		$job_seeker_id = $username;
		$this->db->where('username', $job_seeker_id);
		$this->db->order_by("year", "desc"); 
		$query = $this->db->get('user_certifications');
		return $query->result();
	} 
 	
	function profile_summary_edit(){
		$txt_profile_summary = mysqli_real_escape_string1($_POST['txt_profile_summary']);
		$job_seeker_id = $this->session->userdata('userid');
		$this->db->where('username',$job_seeker_id);
		$this->db->update('user_profile',array('profile_summary'=>$txt_profile_summary));
		$this->session->set_flashdata('success', "Information save successfully");
	}
	
	function delete_entry($id,$status){
		
		if($status=='certification'){
			$query = $this->db->delete('user_certifications', array('id' => $id));
		}
		if($status=='work_experience'){
			$query = $this->db->delete('user_work_experience', array('id' => $id));
		}
		if($status=='education'){
			$query = $this->db->delete('user_education', array('id' => $id));
		}
		$this->session->set_flashdata('success', 'Deleted Successfully!'); 
	}
	 
	function edit_certification_entry($id){
	 
 		$Certification_Membership = trim(mysqli_real_escape_string1($_POST['certificate_member_ship']));
		$year = trim(mysqli_real_escape_string1($_POST['certificate_year']));  
		$add_date = time();
		
		$data=array(
			"Certification_Membership"=>$Certification_Membership,
			"year"=>$year);
			
			$this->db->where('id',$id);
			$this->db->update('user_certifications',$data);
			$this->session->set_flashdata('success', "Operation successful");
			
	}
	
	function add_certification_entry(){
	
		$job_seeker_id = $this->session->userdata('userid');
		
		$Certification_Membership = trim(mysqli_real_escape_string1($_POST['certificate_member_ship']));
		$year = trim(mysqli_real_escape_string1($_POST['certificate_year']));  
		$add_date = time();
		
		$data=array(
			"username"=>$job_seeker_id,
			"Certification_Membership"=>$Certification_Membership,
			"year"=>$year,
			"add_date"=>$add_date);
			
			$this->db->insert("user_certifications",$data);
			$this->session->set_flashdata('success', "Operation successful");
			
	}
	
	function update_cv(){
	
		if(isset($_FILES['user_cv']['name']) && $_FILES['user_cv']['name']!=''){
	
			if($_FILES['user_cv']['error']==0){
			
				$ext=preg_replace("/.*\.([^.]+)$/","\\1", $_FILES['user_cv']['name']);
				$jobseeker_cv=time().'_'.str_replace(' ','_',trim($_FILES['user_cv']['name']));
				
				$config['file_name'] = $_SESSION['userid'];
				$config['upload_path'] = './images/users/cv/';
				$config['allowed_types'] = '*';
				$config['overwrite'] = true;
				$this->load->library('upload');
				$this->upload->initialize($config);
				$this->upload->do_upload('user_cv');
				
				$job_seeker_id = $this->session->userdata('userid');
				
				$data=array( 
				"cv"=>$_SESSION['userid'].'.'.$ext);
				
				$this->db->where('username',$job_seeker_id);
				$this->db->update('user_profile',$data);
				//$this->db->insert("job_seeker_cv",$data);
				$this->session->set_flashdata('success', "Operation successful");
			}
		} 
	}
	
	function edit_education_entry($id){
	 
		$institution = trim(mysqli_real_escape_string1($_POST['edu_institution']));
		$country = trim(mysqli_real_escape_string1($_POST['edu_country'])); 
		$state = trim(mysqli_real_escape_string1($_POST['edu_states']));
		$education = trim(mysqli_real_escape_string1($_POST['edu_qualification']));
 		
		$date_from = trim(mysqli_real_escape_string1($_POST['edu_date_from_year']));
 		 
		if(isset($_POST['chk_till_date_education']) && $_POST['chk_till_date_education']=='on'){
		
			$date_to = 'Till Date';
		
		}else{
		
			$date_to = trim(mysqli_real_escape_string1($_POST['edu_date_to_year'])); 
			
		} 
		
 		$classification = trim(mysqli_real_escape_string1($_POST['edu_classification']));
		$course_of_study = trim(mysqli_real_escape_string1($_POST['edu_classification']));
		 
		$data=array( 
			"institution"=>$institution,
			"country"=>$country,
			"state"=>$state,
			"education"=>$education,
			"date_from"=>$date_from,
			"date_to"=>$date_to,
			"classification"=>$classification,
			"course_of_study"=>$course_of_study);
			
			$this->db->where('id',$id);
			$this->db->update('user_education',$data);
			$this->session->set_flashdata('success', "Operation successful");
	}
	
	function add_education_entry(){
	
		$job_seeker_id = $this->session->userdata('userid');
		
		$institution = trim(mysqli_real_escape_string1($_POST['edu_institution']));
		$country = trim(mysqli_real_escape_string1($_POST['edu_country'])); 
		$state = trim(mysqli_real_escape_string1($_POST['edu_states']));
		$education = trim(mysqli_real_escape_string1($_POST['edu_qualification']));
 		
		$date_from = trim(mysqli_real_escape_string1($_POST['edu_date_from_year']));
 		 
		if(isset($_POST['chk_till_date_education']) && $_POST['chk_till_date_education']=='on'){
		
			$date_to = 'Till Date';
		
		}else{
		
			$date_to = trim(mysqli_real_escape_string1($_POST['edu_date_to_year'])); 
			
		} 
		
 		$classification = trim(mysqli_real_escape_string1($_POST['edu_classification']));
		$course_of_study = trim(mysqli_real_escape_string1($_POST['edu_classification']));
		$add_date = time();
		
		$data=array(
			"username"=>$job_seeker_id,
			"institution"=>$institution,
			"country"=>$country,
			"state"=>$state,
			"education"=>$education,
			"date_from"=>$date_from,
			"date_to"=>$date_to,
			"classification"=>$classification,
			"course_of_study"=>$course_of_study,
			"add_date"=>$add_date);
			
			$this->db->insert("user_education",$data);
			$this->session->set_flashdata('success', "Operation successful");
	}
	
	function edit_work_experience_entry($id){
	 
		$company = trim(mysqli_real_escape_string1($_POST['work_exp_company_name']));
		$company_size = trim(mysqli_real_escape_string1($_POST['work_exp_company_size'])); 
		$carrer_sector = trim(mysqli_real_escape_string1($_POST['work_exp_carrer_sector']));
		$specialization = trim(mysqli_real_escape_string1($_POST['function_area']));
		$job_level = trim(mysqli_real_escape_string1($_POST['work_exp_joblevel']));
		$job_type = trim(mysqli_real_escape_string1($_POST['work_exp_job_type']));
		$country = '';
		$state = trim(mysqli_real_escape_string1($_POST['work_exp_state']));
		
		$salary = trim(mysqli_real_escape_string1($_POST['work_exp_salary_range']));
		
		$exp_from_month = trim(mysqli_real_escape_string1($_POST['work_exp_date_from_month']));
		$exp_from_year = trim(mysqli_real_escape_string1($_POST['work_exp_date_from_year'])); 
 		 
		if(isset($_POST['chk_till_date']) && $_POST['chk_till_date']=='on'){
		
			$till_date = '1';
			$exp_to_month = '';
			$exp_to_year = '';
		
		}else{
 			
			$till_date = 0;
			$exp_to_month = trim(mysqli_real_escape_string1($_POST['work_exp_date_to_month']));
			$exp_to_year = trim(mysqli_real_escape_string1($_POST['work_exp_date_to_year'])); 
			
		} 
		
 		$responsibilities_and_achievements = trim(mysqli_real_escape_string1($_POST['work_exp_res_ach'])); 
		
		$data=array( 
			"company"=>$company,
			"company_size"=>$company_size,
			"carrer_sector"=>$carrer_sector,
			"specialization"=>$specialization,
			"job_level"=>$job_level,
			"job_type"=>$job_type,
			"country"=>$country,
			"state"=>$state,
			"salary"=>$salary,
			"exp_from_month"=>$exp_from_month,
			"exp_from_year"=>$exp_from_year,
			"exp_to_month"=>$exp_to_month,
			"exp_to_year"=>$exp_to_year,
			"till_date"=>$till_date,
			"responsibilities_and_achievements"=>$responsibilities_and_achievements);
			
			$this->db->where('id',$id);
			$this->db->update('user_work_experience',$data); 
			$this->session->set_flashdata('success', "Operation successful");
	}
	
	function add_work_experience(){
	
		$job_seeker_id = $this->session->userdata('userid');
		$company = trim(mysqli_real_escape_string1($_POST['work_exp_company_name']));
		$company_size = trim(mysqli_real_escape_string1($_POST['work_exp_company_size'])); 
		$carrer_sector = trim(mysqli_real_escape_string1($_POST['work_exp_carrer_sector']));
		$specialization = trim(mysqli_real_escape_string1($_POST['function_area']));
		$job_level = trim(mysqli_real_escape_string1($_POST['work_exp_joblevel']));
		$job_type = trim(mysqli_real_escape_string1($_POST['work_exp_job_type']));
		$country = '';
		$state = trim(mysqli_real_escape_string1($_POST['work_exp_state']));
		
		$salary = trim(mysqli_real_escape_string1($_POST['work_exp_salary_range']));
		
		$exp_from_month = trim(mysqli_real_escape_string1($_POST['work_exp_date_from_month']));
		$exp_from_year = trim(mysqli_real_escape_string1($_POST['work_exp_date_from_year'])); 
 		 
		if(isset($_POST['chk_till_date']) && $_POST['chk_till_date']=='on'){
		
			$till_date = '1';
			$exp_to_month = '';
			$exp_to_year = '';
		
		}else{
 			
			$till_date = 0;
			$exp_to_month = trim(mysqli_real_escape_string1($_POST['work_exp_date_to_month']));
			$exp_to_year = trim(mysqli_real_escape_string1($_POST['work_exp_date_to_year'])); 
			
		} 
		
 		$responsibilities_and_achievements = trim(mysqli_real_escape_string1($_POST['work_exp_res_ach']));
		$add_date = time();
		
		$data=array(
			"username"=>$job_seeker_id,
			"company"=>$company,
			"company_size"=>$company_size,
			"carrer_sector"=>$carrer_sector,
			"specialization"=>$specialization,
			"job_level"=>$job_level,
			"job_type"=>$job_type,
			"country"=>$country,
			"state"=>$state,
			"salary"=>$salary,
			"exp_from_month"=>$exp_from_month,
			"exp_from_year"=>$exp_from_year,
			"exp_to_month"=>$exp_to_month,
			"exp_to_year"=>$exp_to_year,
			"till_date"=>$till_date,
			"responsibilities_and_achievements"=>$responsibilities_and_achievements,
			"add_date"=>$add_date);

			$this->db->insert("user_work_experience",$data);
			$this->session->set_flashdata('success', "Operation successful");
	}

	function career_details_edit(){
	
		$job_type = trim(mysqli_real_escape_string1($_POST['carrer_sum_job_type']));
		$highest_education = trim(mysqli_real_escape_string1($_POST['carrer_sum_education'])); 
		$Specialization = trim(mysqli_real_escape_string1($_POST['carrer_sum_function_area']));
		$expected_salary = trim(mysqli_real_escape_string1($_POST['career_sum_expected_salary']));
		$experience = trim(mysqli_real_escape_string1($_POST['carrer_sum_experience']));
		$professional_skills = trim(mysqli_real_escape_string1($_POST['carrer_sum_skills']));
		$carrer_sum_states = trim(mysqli_real_escape_string1($_POST['carrer_sum_states']));
		
		if(isset($professional_skills) && $professional_skills=='other'){
		
			$carrer_sum_skills_other = trim(mysqli_real_escape_string1($_POST['carrer_sum_skills_other']));
			$data_professional_skills=array("name"=>$carrer_sum_skills_other);
 			$this->db->insert("professional_skills",$data_professional_skills);
			$professional_skills=$this->db->insert_id();
		}
		
		$employment_status = trim(mysqli_real_escape_string1($_POST['carrer_sum_employment_status']));
		
		$job_seeker_id = $this->session->userdata('userid');
		
		$this->db->select('*');
		$this->db->where('username', $job_seeker_id); 
		$query = $this->db->get('user_profile');
		$num = $query->num_rows();
		
		if($num==0){
			
			$data=array(
			"username"=>$job_seeker_id,
			"job_type"=>$job_type,
			"function_area"=>$Specialization,
			"experience"=>$experience,
			"education"=>$highest_education,
			"expected_salary"=>$expected_salary,
			"professional_skills"=>$professional_skills,
			"state"=>$carrer_sum_states,
			"employment_status"=>$employment_status);
			
			$this->db->insert("user_profile",$data);
			
		}else{
		
			$data=array(
			"job_type"=>$job_type,
			"function_area"=>$Specialization,
			"experience"=>$experience,
			"education"=>$highest_education,
			"expected_salary"=>$expected_salary,
			"professional_skills"=>$professional_skills,
			"state"=>$carrer_sum_states,
			"employment_status"=>$employment_status);
 			
			$this->db->where('username',$job_seeker_id);
			$this->db->update('user_profile',$data);
		}
		
		$this->session->set_flashdata('success', "Operation successful");
		
	}
	
	function profile_details_basic_edit(){
	
		$first_name = trim(mysqli_real_escape_string1($_POST['txt_first_name']));
		$last_name = trim(mysqli_real_escape_string1($_POST['txt_last_name'])); 
		$mobile_number = trim(mysqli_real_escape_string1($_POST['txt_mobile']));
		$gender = trim(mysqli_real_escape_string1($_POST['txt_gender']));
		$dob = strtotime(trim(mysqli_real_escape_string1($_POST['txt_dob'])));
		$country = trim(mysqli_real_escape_string1($_POST['txt_country']));
		$nationality = trim(mysqli_real_escape_string1($_POST['txt_nationality']));
		
		if(isset($_FILES['photo']['name']) && $_FILES['photo']['name']!=''){
		
			if($_FILES['photo']['error']==0){
			
				$ext=preg_replace("/.*\.([^.]+)$/","\\1", $_FILES['photo']['name']);
				$photo=time().str_replace(' ','_',trim($_FILES['photo']['name']));
				
				$config['file_name'] =$_SESSION['userid'].$photo;
				$config['upload_path'] = './images/users/';
				$config['allowed_types'] = '*';
				$config['overwrite'] = true;
				$this->load->library('upload');
				$this->upload->initialize($config);
				$this->upload->do_upload('photo');
				
				$upload_data = $this->upload->data();
				$img_name = $upload_data['file_name'];
				$file_type = $upload_data['file_type'];
				$file_size = $upload_data['file_size'];
				
				//$this->upload->do_upload('file');
				if ($this->upload->do_upload('photo')) {
				  //Code to resize image and get a thumbnail
				  $config1 = array(
						'source_image'      => './images/users/'.$img_name,
						'new_image'         => './images/users/passport/'.$img_name,
						'maintain_ratio'    => true,
						'width'             => 173,
						'height'            => 173
						);
					//here is the second thumbnail, notice the call for the initialize() function again
					$this->load->library('image_lib',$config1);
					$this->image_lib->initialize($config1);
					$this->image_lib->resize();
				}
				//End of resize code
			}
			
			$data=array(
			"first_name"=>$first_name,
			"last_name"=>$last_name,
			"mobile_number"=>$mobile_number,
			"gender"=>$gender,
			"dob"=>$dob,
			"country"=>$country,
			"nationality"=>$nationality,
			"profile_pic"=>$_SESSION['userid'].$photo);			
		}else{
			$data=array(
			"first_name"=>$first_name,
			"last_name"=>$last_name,
			"mobile_number"=>$mobile_number,
			"gender"=>$gender,
			"dob"=>$dob,
			"country"=>$country,
			"nationality"=>$nationality);
			
		}
			 
 		$job_seeker_id = $this->session->userdata('userid');
		$this->db->where('username',$job_seeker_id);
		$this->db->update('user_profile',$data);
		$this->session->set_flashdata('success', "Operation successful");
		
	}
		
	function get_job_seeker_show_admin(){
		$this->db->order_by("id", "desc");  
		$query = $this->db->get('user_profile');
		return $query->result();
	}

	function recover_password($md5_id){
	
		$this->db->select('*');
		$this->db->where('md5_id', $md5_id);
		$query = $this->db->get('user_profile');
		$num = $query->num_rows();
		
		if($num>0){
  				
			$row = $query->row();
			$password = md5($this->input->post('confirm_password'));
			$this->db->where('id',$row->id);
			$this->db->update('user_profile',array('password'=>$password));
			$this->session->set_flashdata('success', "Operation successful"); 
			 
		}else{
			$this->session->set_flashdata('error', "Operation failed");
			redirect(base_url()."login/forgot_password");
		}
	}
	
	function newsletter($email_id){
		
		$this->db->select('*');
		$this->db->where('email_address', $email_id); 
		$query = $this->db->get('newsletter');
		$num = $query->num_rows();
		
		if($num==0){
		
			$add_date = date('Y-m-d: H:i:s');
			
			$data=array(
			"email_address"=>$email_id,
			"status"=>1,
			"add_date"=>$add_date);
			
			$this->db->insert("newsletter",$data);
			echo '1';
		}else{
			echo '0';
 		}
	
	}
	
	function forgot_password(){
	
		$email = $this->input->post('userName1');
		
		$this->db->select('*');
		$this->db->where('email', $email); 
		$query = $this->db->get('user_profile');
		$num = $query->num_rows();
		
		if($num>0){
			
			$row = $query->row();
			
			$recover_link = base_url().'login/recover_password/'.$row->md5_id; 
			$first_name = $row->first_name; 
			
			$content = '<table border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td>
					<table border="0" cellspacing="0" style="width:80%">
						<tbody>
							<tr>
								<td>
								<p><strong>Hello '.$first_name.',</strong></p>

								<p>A request was made on GoldNet Consult to reset your password. Kindly ignore if you did not make the request or click on 
								the link below to reset your password.</p>
		<p><a style="background-color: #9bdd04; border-radius: 3px; color: #ffffff; display: block; font-size: 14px; font-weight: bold; margin: 15px 0; 
		padding: 10px; text-align: center; text-decoration: none; width: 260px;" href="'.$recover_link.'">Click Here to change Password</a></p>
								<p style="color: #666666; font-size: 15px;"><strong>Regards,</strong><br />
								GoldNet Consult</p>
								</td>
							</tr>
						</tbody>
					</table>
					</td>
				</tr>
			</tbody>
		</table>';
			send_mail($email,$content,$first_name,'info',"Forgot Password");
			return "success";
		}else{
			return "Failed";
			
		}
	}
	
}
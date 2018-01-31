<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings_mdl extends CI_Model {
	
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
/*
	public function connect(){
	
		$db = new mysqli('localhost', 'root', '', 'skilljob_portal');
		if($db->connect_errno > 0){
			die('unable to connect to database[' . $db->connect_error . ']');
		}
		return $db;

	}
	*/
	public function year_exp_list(){
		
		 $this->db->order_by("id","asc");
		 $query = $this->db->get('year_of_experience');
		 return $query->result();
		
	}
	
	public function year_exp_value($id){
		 
		$this->db->select('*');
		$this->db->where('id', $id); 
		$query = $this->db->get('year_of_experience');
		$row = $query->row();
		return $row->experience; 
	}
	
	public function professional_skills_list(){
		
		 $this->db->order_by("id","asc");
		 $query = $this->db->get('professional_skills');
		 return $query->result();
		
	}
	
	public function professional_skills_name($id){
		 
		$this->db->select('*');
		$this->db->where('id', $id); 
		$query = $this->db->get('professional_skills');
		$row = $query->row();
		return $row->name; 
	}
		
	public function highest_education_list(){
		
		 $this->db->order_by("id","asc");
		 $query = $this->db->get('education');
		 return $query->result();
		
	}
	
	public function add_education(){
		
		$name = trim($this->input->post('name')); 
		
		$data=array(
			"name"=>$name);
		
		$query = $this->db->get_where('education',$data);
		$num = $query->num_rows();
		
		if($num==0){
 			
		 	$this->db->insert("education",$data);
 			$this->session->set_flashdata('success', 'Added successfully!');
			
  		}else{
 		 	 
			$this->session->set_flashdata('error', 'Sorry, this name is already exists!');
			 
		}
  	}
	
	public function education_full_details($id){
		 
		 $query = $this->db->get_where('education',array('id'=>$id));
		 return $query->row();
		
	}
	
 	public function edit_education($id){
		
		$name = trim($this->input->post('name')); 
		
		$data=array("name"=>$name);
		
		$this->db->where('id',$id);
		$this->db->update('education',$data);
		$this->session->set_flashdata('success', 'Updated Successfully!');
  	}
	
	public function education_delete($id){
		
		$query = $this->db->delete('education', array('id' => $id));
		$this->session->set_flashdata('success', 'Deleted Successfully!'); 
		
	} 
	
	public function salary_list(){
		
		 $this->db->order_by("id","asc");
		 $query = $this->db->get('salary_master');
		 return $query->result();
		
	}
	
	public function get_salary_value_helper($id){
		 
		$this->db->select('*');
		$this->db->where('id', $id); 
		$query = $this->db->get('salary_master');
		$row = $query->row();
		return $row->name; 
	}
	
	public function joblevel_list(){
		
		 $this->db->order_by("id","asc");
		 $query = $this->db->get('job_level');
		 return $query->result();
		
	}
	
	public function joblevel_name($id){
		 
		$this->db->select('*');
		$this->db->where('id', $id); 
		$query = $this->db->get('job_level');
		$row = $query->row();
		return $row->name; 
	}
	
	public function joblevel_full_details($id){
		 
		 $query = $this->db->get_where('job_level',array('id'=>$id));
		 return $query->row();
		
	}
	
	public function add_joblevel(){
		
		$name = trim($this->input->post('name')); 
		
		$data=array(
			"name"=>$name);
		
		$query = $this->db->get_where('job_level',$data);
		$num = $query->num_rows();
		
		if($num==0){
 			
		 	$this->db->insert("job_level",$data);
 			$this->session->set_flashdata('success', 'Added successfully!');
			
  		}else{
 		 	 
			$this->session->set_flashdata('error', 'Sorry, this name is already exists!');
			 
		}
  	}
	
	public function edit_job_level($id){
		
		$name = trim($this->input->post('name')); 
		
		$data=array("name"=>$name);
		
		$this->db->where('id',$id);
		$this->db->update('job_level',$data);
		$this->session->set_flashdata('success', 'Updated Successfully!');
  	}
	
	
	public function joblevel_delete($id){
		
		$query = $this->db->delete('job_level', array('id' => $id));
		$this->session->set_flashdata('success', 'Deleted Successfully!'); 
		
	} 
	
	public function email_templates_list(){
		
		 $this->db->order_by("id","desc");
		 $query = $this->db->get('email_templates');
		 return $query->result();
		
	}
	
	public function cv_database_plan_list(){
		
		 $this->db->order_by("id","asc");
		 $query = $this->db->get('cv_database_plan');
		 return $query->result();
		
	}
	
	public function cv_database_plan_full_details($id){
		 
		 $query = $this->db->get_where('cv_database_plan',array('id'=>$id));
		 return $query->row();
		
	}
	
	public function edit_cv_database_plan($id){
		
		$title = trim($this->input->post('title'));
		$price = trim($this->input->post('price'));
		$no_of_cv = trim($this->input->post('no_of_cv'));
		
		$data=array("title"=>$title,"price"=>$price,"no_of_cv"=>$no_of_cv);
		
		$this->db->where('id',$id);
		$this->db->update('cv_database_plan',$data);
		$this->session->set_flashdata('success', 'Updated Successfully!');
  	}
	
	public function advertise_plan_list(){
		
		 $this->db->order_by("id","asc");
		 $query = $this->db->get('advertise_plan');
		 return $query->result();
		
	}
	
	public function advertise_plan_full_details($id){
		 
		 $query = $this->db->get_where('advertise_plan',array('id'=>$id));
		 return $query->row();
		
	}
	
	public function edit_advertise_plan($id){
		
		$title = trim($this->input->post('title'));
		$price = trim($this->input->post('price'));
		$no_of_job_post = trim($this->input->post('no_of_job_post'));
		
		$data=array("title"=>$title,"price"=>$price,"no_of_job_post"=>$no_of_job_post);
		
		$this->db->where('id',$id);
		$this->db->update('advertise_plan',$data);
		$this->session->set_flashdata('success', 'Updated Successfully!');
  	}
	
	public function email_templates_full_details($id){
		 
		 $query = $this->db->get_where('email_templates',array('id'=>$id));
		 return $query->row();
		
	}
	
	public function edit_email_templates($id){
		
		$Subject = trim($this->input->post('Subject'));
		$message = trim($this->input->post('message')); 
		
		$data=array("Subject"=>$Subject,"message"=>$message);
		
		$this->db->where('id',$id);
		$this->db->update('email_templates',$data);
		$this->session->set_flashdata('success', 'Updated Successfully!');
  	}
	
	public function industry_full_details($industry_id){
		 
		 $query = $this->db->get_where('industry',array('industry_id'=>$industry_id));
		 return $query->row();
		
	}
	
	public function add_industry(){
		
		$industry_name = trim($this->input->post('industry_name')); 
		
		$data=array(
			"industry_name"=>$industry_name);
		 
		$query = $this->db->get_where('industry',$data);
		$num = $query->num_rows();
		
		if($num==0){
 			
		 	$this->db->insert("industry",$data);
 			$this->session->set_flashdata('success', 'Added successfully!');
			
  		}else{
 		 	 
			$this->session->set_flashdata('error', 'Sorry, this name is already exists!');
			 
		}
  	}
	
	public function edit_industry($industry_id){
		
		$industry_name = trim($this->input->post('industry_name')); 
		
		$data=array("industry_name"=>$industry_name);
		
		$this->db->where('industry_id',$industry_id);
		$this->db->update('industry',$data);
		$this->session->set_flashdata('success', 'Updated Successfully!');
  	}
	
	
	public function industry_delete($industry_id){
		
		$query = $this->db->delete('industry', array('industry_id' => $industry_id));
		$this->session->set_flashdata('success', 'Deleted Successfully!'); 
		
	} 
	
	public function carrer_sector_list(){
		
		 $this->db->order_by("name","asc");
		 $query = $this->db->get('carrer_sector');
		 return $query->result();
		
	}
	
	function carrer_sector_job_count($id){
 		
 		$current_date = strtotime(date('y-m-d'));
		
		$this->db->where("status","1");
		$this->db->where("application_deadline >=",$current_date);  
		$this->db->where("carrer_sector",$id);
		$query = $this->db->get('post_jobs');
	  	return $query->num_rows();
	}
	
	function salary_filter_list_job_count($id){
 		
 		$current_date = strtotime(date('y-m-d'));
		
		$this->db->where("status","1");
		$this->db->where("application_deadline >=",$current_date);  
		$this->db->where("salary_range",$id);
		$query = $this->db->get('post_jobs');
	  	return $query->num_rows();
	}
	
	function location_filter_list_job_count($id){
 		
 		$current_date = strtotime(date('y-m-d'));
		
		$this->db->where("status","1");
		$this->db->where("application_deadline >=",$current_date);  
		$this->db->where("state",$id);
		$query = $this->db->get('post_jobs');
	  	return $query->num_rows();
	}
	
	function spec_filter_list_job_count($id){
 		
 		$current_date = strtotime(date('y-m-d'));
		
		$this->db->where("status","1");
		$this->db->where("application_deadline >=",$current_date);  
		$this->db->where("function_area",$id);
		$query = $this->db->get('post_jobs');
	  	return $query->num_rows();
	}
	
	public function add_carrer_sector(){
		
		$name = trim($this->input->post('name')); 
		
		$data=array(
			"name"=>$name);
		
		$query = $this->db->get_where('carrer_sector',$data);
		$num = $query->num_rows();
		
		if($num==0){
 			
		 	$this->db->insert("carrer_sector",$data);
 			$this->session->set_flashdata('success', 'Added successfully!');
			
  		}else{
 		 	 
			$this->session->set_flashdata('error', 'Sorry, this name is already exists!');
			 
		}
  	}
	
	public function edit_carrer_sector($id){
		
		$name = trim($this->input->post('name')); 
		
		$data=array("name"=>$name);
		
		$this->db->where('id',$id);
		$this->db->update('carrer_sector',$data);
		$this->session->set_flashdata('success', 'Updated Successfully!');
  	}
	
	public function carrer_sector_delete($id){
	 
		$query = $this->db->delete('carrer_sector', array('id' => $id));
		$this->session->set_flashdata('success', 'Deleted Successfully!'); 
		
	}
	
	public function carrer_sector_full_details($id){
		 
		 $query = $this->db->get_where('carrer_sector',array('id'=>$id));
		 return $query->row();
		
	}
	
	public function carrer_sector_name($id){
		 
		$this->db->select('*');
		$this->db->where('id', $id); 
		$query = $this->db->get('carrer_sector');
		$row = $query->row();
		return $row->name; 
	}
	
	public function function_area_list(){
		
		 $this->db->order_by("name","asc");
		 $query = $this->db->get('functional_area');
		 return $query->result();
		
	}
	
	public function get_speailization_list($id){
		
		 $this->db->order_by("name","asc");
		 $this->db->where('carrier_sector_id', $id); 
		 $query = $this->db->get('functional_area');
		 return $query->result();
		
	}
	
	public function function_area_name($id){
		 
		$this->db->select('*');
		$this->db->where('id', $id); 
		$query = $this->db->get('functional_area');
		$row = $query->row();
		return $row->name; 
	}
	
	
	
	public function country_list(){
		
		 $this->db->group_by('country_name'); 
		 $this->db->order_by("country_name","asc");
		 $query = $this->db->get('hh_tbl_country');
		 return $query->result();
		
	}
	
	public function state_list(){
		
		 $this->db->group_by('state'); 
		 $this->db->order_by("state","asc");
		 $this->db->where('code!=', 0); 
		 $query = $this->db->get('stateoforigin');
		 return $query->result();
		
	}
	
	public function state_name($id){
		 
		$this->db->select('*');
		$this->db->where('code', $id); 
		$query = $this->db->get('stateoforigin');
		$row = $query->row();
		return $row->state; 
	}
	
	public function nationality_list(){
		
		 $this->db->group_by('name'); 
		 $this->db->order_by("name","asc");
		 $query = $this->db->get('nationality');
		 return $query->result();
		
	}
	
	public function country_name($id){
		
		 $this->db->where('id',$id); 
		 $query = $this->db->get('hh_tbl_country');
		 return $query->row();
		
	}
	
	public function social_links_get(){
		
		$this->db->select('*'); 
		$query = $this->db->get('social_links');
		return $row = $query->row(); 
		
	}
	
	public function function_area_full_details($id){
		 
		 $query = $this->db->get_where('functional_area',array('id'=>$id));
		 return $query->row();
		
	}
	
	public function add_function_area(){
		
		$name = trim($this->input->post('name')); 
		$carrier_sector_id = trim($this->input->post('carrer_sector_id')); 
		
		$data=array(
			"name"=>$name,"carrier_sector_id"=>$carrier_sector_id);
		
		$query = $this->db->get_where('functional_area',$data);
		$num = $query->num_rows();
		
		if($num==0){
 			
		 	$this->db->insert("functional_area",$data);
 			$this->session->set_flashdata('success', 'Added successfully!');
			
  		}else{
 		 	 
			$this->session->set_flashdata('error', 'Sorry, this name is already exists!');
			 
		}
  	}
	
	public function edit_function_area($id){
		
		$name = trim($this->input->post('name')); 
		$carrier_sector_id = trim($this->input->post('carrer_sector_id')); 
		
		$data=array("name"=>$name,"carrier_sector_id"=>$carrier_sector_id);
		
		$this->db->where('id',$id);
		$this->db->update('functional_area',$data);
		$this->session->set_flashdata('success', 'Updated Successfully!');
  	}
	
	
	public function function_area_delete($id){
		
		$query = $this->db->delete('functional_area', array('id' => $id));
		$this->session->set_flashdata('success', 'Deleted Successfully!'); 
		
	}
	public function get_social_links(){
		
		$query = $this->db->get('social_links');
		return $query->row();
		
	}
	
	public function get_config(){
		
		$query = $this->db->get('config_setting');
		return $query->row();
		
	}
	
	public function manage_config(){
		
		$emp_job_post_status = trim($this->input->post('emp_job_post_status'));
		  
 		$data=array(
			"job_post_status"=>$emp_job_post_status);
		
		$query = $this->db->get('config_setting');
		$num = $query->num_rows();
		
		if($num==0){
 			
		 	$this->db->insert("config_setting",$data);
			
  		}else{
			 
		 	 $this->db->update('config_setting',$data);
			 
		}
		
		$this->session->set_flashdata('success', 'Updated successfully!');
 		
	}
	
	public function get_paypal_settings(){
		
		$query = $this->db->get('paypal_settings');
		return $query->row();
		
	}
	 
	public function get_voguepay_settings(){
		
		$query = $this->db->get('voguepay_setting');
		return $query->row();
		
	}
	
	public function manage_social_links(){
		
		$facebook = trim($this->input->post('facebook'));
		$twitter = trim($this->input->post('twitter'));
		$youtube = trim($this->input->post('youtube'));
		$google_plus = trim($this->input->post('google_plus'));
		$linkedin = trim($this->input->post('linkedin'));
		
		$data=array(
			"facebook"=>$facebook,
			"twitter"=>$twitter,
			"youtube"=>$youtube,
			"google_plus"=>$google_plus,
			"linkedin"=>$linkedin);
		
		$query = $this->db->get('social_links');
		$num = $query->num_rows();
		
		if($num==0){
 			
		 	$this->db->insert("social_links",$data);
			
  		}else{
			 
		 	 $this->db->update('social_links',$data);
			 
		}
		
		$this->session->set_flashdata('success', 'Updated successfully!');
 		
	}
	
	
	public function manage_paypal_setting(){
		
		$paypal_id = trim($this->input->post('paypal_id'));
		$status = trim($this->input->post('status')); 
		$currency_code = trim($this->input->post('currency_code'));
		
		$data=array(
			"paypal_id"=>$paypal_id,
			"status"=>$status,
			"currency_code"=>$currency_code);
		
		$query = $this->db->get('paypal_settings');
		$num = $query->num_rows();
		
		if($num==0){
 			
		 	$this->db->insert("paypal_settings",$data);
			
  		}else{
			 
		 	 $this->db->update('paypal_settings',$data);
			 
		}
		
		$this->session->set_flashdata('success', 'Updated successfully!');
 		
	}
	
	
	
}
		
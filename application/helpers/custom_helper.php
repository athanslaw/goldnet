<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
	function mysqli_real_escape_string1($id){
		$con=mysqli_connect("localhost","root","","goldnetconsult");

		// Check connection
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$id = mysqli_real_escape_string($con, $id);
		return $id;
	}
	
	function category_details($id){
		$CI = & get_instance();
		$CI->load->model('post_mdl');
		$categorydetails = $CI->post_mdl->getcategorydetails($id);
		return $categorydetails;
	}
	
	function getPostCountByCategory($id){
		$CI = & get_instance();
		$CI->load->model('post_mdl');
		$categorydetails = $CI->post_mdl->getpost($id);
		return $categorydetails;
	}
	
   function founder(){
		$CI = & get_instance();
		$CI->load->model('Users_mdl');
		$founder = $CI->Users_mdl->founder();
		return $founder;
	}
	
	function getalert(){
		$CI = & get_instance();
		$CI->load->model('alert_mdl');
		$name = $CI->alert_mdl->viewalerts(0);
		return count($name);
	}
	
	function getCMS($id){
		$CI = & get_instance();
		$CI->load->model('page_model');
		$name = $CI->page_model->getcms($id);
		return $name;
	}
	
	function getCountry($id){
		$CI = & get_instance();
		$CI->load->model('users_mdl');
		$name = $CI->users_mdl->getCountry($id);
		return $name;
	}
	
	function getCountryList(){
		$CI = & get_instance();
		$CI->load->model('users_mdl');
		$name = $CI->users_mdl->getCountry();
		return $name;
	}
	
	function getLga($id){
		$CI = & get_instance();
		$CI->load->model('users_mdl');
		$name = $CI->users_mdl->getLga($id);
		return $name;
	}
	
	function getName($id){
		$CI = & get_instance();
		$CI->load->model('users_mdl');
		$name = $CI->users_mdl->getName($id);
		return $name;
	}
	
   function get_social_links(){
		$CI = & get_instance();
		$CI->load->model('Settings_mdl');
		$social_links_get = $CI->Settings_mdl->social_links_get();
		return $social_links_get;
	}
	
	function getState($id=""){
		$CI = & get_instance();
		$CI->load->model('users_mdl');
		$name = $CI->users_mdl->getState($id);
		return $name;
	}
	
	function lga($state){
		$CI = & get_instance();
		$name = $CI->page_model->lga(16);
		$option =  '<option value="">Please select...</option>';
		foreach($name as $row)
		{
			$option .= '<option value="'.$row['drink_name'].'">' . $row['drink_name'] . "</option>";
			//echo $row['drink_type'] ."<br/>";
		}
		return $option;
	}
	
	function social($id){
		$CI = & get_instance();
		$name = $CI->page_model->social($id);
		return $name;
	}

	function state($id){
		$CI = & get_instance();
		$name = $CI->page_model->state($id);
		return $name;
	}
	
	
	//From Skill Jobs Today
	
	
 	function get_year_exp_list_helper(){
		$CI = & get_instance();
		$CI->load->model('Settings_mdl');
		$year_exp_list = $CI->Settings_mdl->year_exp_list();
		return $year_exp_list;
	}
	
	function get_year_exp_value_helper($id){
		$CI = & get_instance();
		$CI->load->model('Settings_mdl');
		$year_exp_value = $CI->Settings_mdl->year_exp_value($id);
		return $year_exp_value;
	}
	
	
	function get_joblevel_helper(){
		$CI = & get_instance();
		$CI->load->model('Settings_mdl');
		$joblevel_list = $CI->Settings_mdl->joblevel_list();
		return $joblevel_list;
	}
	
	function get_joblevel_name($id){
		$CI = & get_instance();
		$CI->load->model('Settings_mdl');
		$joblevel_name = $CI->Settings_mdl->joblevel_name($id);
		return $joblevel_name;
	}
	
	function get_highest_education_helper(){
		$CI = & get_instance();
		$CI->load->model('Settings_mdl');
		$highest_education_list = $CI->Settings_mdl->highest_education_list();
		return $highest_education_list;
	}
	
	function get_education_name_helper($id){
		$CI = & get_instance();
		$CI->load->model('Settings_mdl');
		$education_name = $CI->Settings_mdl->education_full_details($id);
		return $education_name;
	}
	
	function get_professional_skills_helper(){
		$CI = & get_instance();
		$CI->load->model('Settings_mdl');
		$professional_skills_list = $CI->Settings_mdl->professional_skills_list();
		return $professional_skills_list;
	}
	
	function get_professional_skills_value_helper($id){
		$CI = & get_instance();
		$CI->load->model('Settings_mdl');
		$professional_skills = $CI->Settings_mdl->professional_skills_name($id);
		return $professional_skills;
	}
	
	function get_salary_helper(){
		$CI = & get_instance();
		$CI->load->model('Settings_mdl');
		$salary_list = $CI->Settings_mdl->salary_list();
		return $salary_list;
	}
	
	function get_salary_value_helper($id){
		$CI = & get_instance();
		$CI->load->model('Settings_mdl');
		$salary = $CI->Settings_mdl->get_salary_value_helper($id);
		return $salary;
	}
	
	function get_carrer_sector_list_helper(){
		$CI = & get_instance();
		$CI->load->model('Settings_mdl');
		$carrer_sector_list = $CI->Settings_mdl->carrer_sector_list();
		return $carrer_sector_list;
	}
	
	function get_carrer_sector_list_count_helper($id){ 
		$CI = & get_instance();
		$CI->load->model('Settings_mdl');
		$carrer_sector_count = $CI->Settings_mdl->carrer_sector_job_count($id);
		return $carrer_sector_count;
	}
	
	function get_salary_filter_list_count_helper($id){ 
		$CI = & get_instance();
		$CI->load->model('Settings_mdl');
		$salary_filter_list_job_count = $CI->Settings_mdl->salary_filter_list_job_count($id);
		return $salary_filter_list_job_count;
	}
	
	function get_state_filter_list_count_helper($id){ 
		$CI = & get_instance();
		$CI->load->model('Settings_mdl');
		$location_filter_list = $CI->Settings_mdl->location_filter_list_job_count($id);
		return $location_filter_list;
	}
	
	function get_spec_filter_list_count_helper($id){ 
		$CI = & get_instance();
		$CI->load->model('Settings_mdl');
		$spec_filter_list_job_count = $CI->Settings_mdl->spec_filter_list_job_count($id);
		return $spec_filter_list_job_count;
	}
	
	function get_carrer_sector_name_helper($id){
		$CI = & get_instance();
		$CI->load->model('Settings_mdl');
		$carrer_sector = $CI->Settings_mdl->carrer_sector_name($id);
		return $carrer_sector;
	}
	
	function get_function_area_list_helper(){
		$CI = & get_instance();
		$CI->load->model('Settings_mdl');
		$function_area_list = $CI->Settings_mdl->function_area_list();
		return $function_area_list;
	}
	
	function get_function_area_name_helper($id){
		$CI = & get_instance();
		$CI->load->model('Settings_mdl');
		$function_area_name = $CI->Settings_mdl->function_area_name($id);
		return $function_area_name;
	}
	
	function helper_employment_status(){
	
		return $helper_employment_status = array('1'=>'Unemployed(Undergraduate/Non Graduate)','2'=>'Unemployed(Graduate)','3'=>'Employed(but searching for another job)','4'=>'Employed(and Not Searching for another Job)','5'=>'Self-employed','6'=>'Retired/Pensioner');
	
	}
	
	function helper_employment_status_value($id){
	
		if($id=='1'){
			return 'Unemployed(Undergraduate/Non Graduate)';
		}else if($id=='2'){
			return 'Unemployed(Graduate)';
		}else if($id=='3'){
			return 'Employed(but searching for another job)';
 		}else if($id=='4'){
			return 'Employed(and Not Searching for another Job)';
 		}else if($id=='5'){
			return 'Self-employed';
 		}else if($id=='6'){
			return 'Retired/Pensioner';
 		} 
	
	} 
	
	function helper_job_type(){
	
		return $helper_job_type = array('1'=>'Full-Time','2'=>'Intern','3'=>'Contract');
	
	}
	
	function helper_job_type_value($id){
	
		if($id=='1'){
			return 'Full-Time';
		}else if($id=='2'){
			return 'Intern';
		}else if($id=='3'){
			return 'Contract';
 		}
	
	}
	
	function company_size_helper(){
	
		return $company_size_helper = array('1'=>'Micro (1 - 10)','2'=>'Small (11 - 50)','3'=>'Medium (51 - 250)','4'=>'Large (251 - 5,000)','5'=>'Multinational (&gt; 5,000)');
	
	}
	
	function classification_helper(){
	
		return $classification_helper = array('1'=>'No classification','2'=>'First Class/Distinction','3'=>'Second Class Upper/Upper Credit','4'=>'Second Class Lower/Lower Credit','5'=>'Third Class','6'=>'Pass');
	
	}
	
	function classification_value_helper($id){
	
		if($id=='1'){
			return 'No classification';
		}else if($id=='2'){
			return 'First Class/Distinction';
		}else if($id=='3'){
			return 'Second Class Upper/Upper Credit';
 		}else if($id=='4'){
			return 'Second Class Lower/Lower Credit';
 		}else if($id=='5'){
			return 'Third Class';
 		}else if($id=='6'){
			return 'Pass';
 		} 
	
	}
	
	function helper_Types_of_Employer_value($id){
	
		if($id=='0'){
			return 'Direct Employer';
		}else if($id=='1'){
			return 'Recruitment Agency';
		} 
	}
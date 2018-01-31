<div class="work_exp">

                        	<div class="mini_title gray"><span>Work Experience</span><a  onclick="return add_work_experience();" class="pro_edit_btn"><i class="fa fa-plus"></i></a></div>

				<div class="work_exp_details_form" >

			 <?php //include(APPPATH.'views/Frontend/account/profile/add_work_exp.php');?>

		</div> 	
  
<?php

if(count($user_work_experience)>0){

$i=1; foreach ($user_work_experience as $work_experience){ ?>

<ul class="education_details">
	<li>
    	<div class="education_box">
        <span class="text_label"><?php
		if($work_experience->till_date==1){
			echo $work_experience->exp_from_month.' '.$work_experience->exp_from_year.' - Till Date';
		
		}else{
		
		 echo $work_experience->exp_from_month.' '.$work_experience->exp_from_year.' - '.$work_experience->exp_to_month.' '.$work_experience->exp_to_year;
		 
		 }
		 ?></span>
	<span class="text_field"><?php echo $work_experience->company;?> <br><?php echo get_function_area_name_helper($work_experience->specialization);?></span>
    <div class="actions_btn">
        <a onclick="return edit_work_experience('<?php echo $work_experience->id;?>');" class="pro_edit_btn"><i class="fa fa-pencil"></i></a>
        <a href="<?php echo base_url();?>account/delete_entry?id=<?php echo $work_experience->id;?>&status=work_experience" onclick="return confirm('Are you want to delete it!')" class="pro_edit_btn"><i class="fa fa-times"></i></a>
    </div>
        </div>
    </li>
	

</ul>

<?php } } ?>

	

		<div class="clearfix"></div>

		
	</div>
 
<script type="text/javascript">

  	function work_exp_company_name_remove(){
	
		$('#work_exp_company_name_error').hide();
		
	}
	
	function check_validation_work_exp_form(){

		var work_exp_company_name = $('#work_exp_company_name').val();
			if(work_exp_company_name==''){
			$('#work_exp_company_name_error').show();
			return false;
		}
		
		var work_exp_company_size = $('#work_exp_company_size').val();
			if(work_exp_company_size==''){
			$('#work_exp_company_size_error').show();
			return false;
		}
		
		var work_exp_carrer_sector = $('#work_exp_carrer_sector').val();
			if(work_exp_carrer_sector==''){
			$('#work_exp_carrer_sector_error').show();
			return false;
		}
		
		var function_area = $('#function_area').val();
			if(function_area==''){
			$('#function_area_error').show();
			return false;
		}
		
		var work_exp_state = $('#work_exp_state').val();
			if(work_exp_state==''){
			$('#work_exp_state_error').show();
			return false;
		}
		
		var work_exp_salary_range = $('#work_exp_salary_range').val();
			if(work_exp_salary_range==''){
			$('#work_exp_salary_range_error').show();
			return false;
		}
		
		var work_exp_date_from_month = $('#work_exp_date_from_month').val();
			if(work_exp_date_from_month==''){
			$('#work_exp_date_from_month_error').show();
			return false;
		}
		var work_exp_date_from_year = $('#work_exp_date_from_year').val();
			if(work_exp_date_from_year==''){
			$('#work_exp_date_from_year_error').show();
			return false;
		}
		
		if(!$('#chk_till_date').attr('checked')) {  
			var work_exp_date_to_month = $('#work_exp_date_to_month').val();
			if(work_exp_date_to_month==''){
				$('#work_exp_date_to_month_error').show();
				return false;
			}
			var work_exp_date_to_year = $('#work_exp_date_to_year').val();
			if(work_exp_date_to_year==''){
				$('#work_exp_date_to_year_error').show();
				return false;
			}
		}
		
		var work_exp_res_ach = $('#work_exp_res_ach').val();
			if(work_exp_res_ach==''){
			$('#work_exp_res_ach_error').show();
			return false;
		}

	}

function chk_till_date_call(){

  		if($('#chk_till_date').attr('checked')) {

  			jQuery('#work_exp_date_to_month').hide();
 			jQuery('#work_exp_date_to_year').hide();
  
		}else{

  			jQuery('#work_exp_date_to_month').show();
 			jQuery('#work_exp_date_to_year').show();
 
		}
 	}

</script>
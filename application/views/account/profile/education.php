<div class="education_summary">
	<div class="mini_title gray"><span>Education</span><a class="pro_edit_btn" onclick="return add_education();"><i class="fa fa-plus"></i></a></div>
	<div class="education_box_edit">
		
	</div>
	<?php
if(count($user_get_eduation)>0){
?>
		<ul class="education_details">
		<?php $i=1; foreach ($user_get_eduation as $get_eduation){ ?>
			<li id="education_box_<?php echo $get_eduation->id;?>">
 				<div class="education_box " >
					<span class="text_label"><?php echo $get_eduation->institution;?></span><span class="text_field"><?php $get_country1 = getCountry($get_eduation->country); echo $get_country1; ?> <br><?php  $get_eduation1 = get_education_name_helper($get_eduation->education); echo $get_eduation1->name; ?> <br><?php echo $get_eduation->date_from;?> - <?php echo $get_eduation->date_to;?></span>
					<div class="actions_btn">
						<a  class="pro_edit_btn" onclick="return edit_education('<?php echo $get_eduation->id;?>');"><i class="fa fa-pencil"></i></a>
						<a href="<?php echo base_url();?>account/delete_entry?id=<?php echo $get_eduation->id;?>&status=education" onclick="return confirm('Are you want to delete it!')"  class="pro_edit_btn"><i class="fa fa-times"></i></a>
					</div>
				</div>
 			</li>
			<?php } ?>
			 
                            </ul> <?php } ?>
                            <div class="clearfix"></div>
                            <div class="education_details_form">
                        		 
                    		</div>
                        </div>
						
						
<script type="text/javascript">

	function check_validation_education_form(){
	 
		var edu_institution = $('#edu_institution').val();
		if(edu_institution==''){
			$('#edu_institution_error').show();
			return false;
		}
		
		var edu_qualification = $('#edu_qualification').val();
		if(edu_qualification==''){
			$('#edu_qualification_error').show();
			return false;
		}
		
		var edu_country = $('#edu_country').val();
		if(edu_country==''){
			$('#edu_country_error').show();
			return false;
		}
		
		var edu_states = $('#edu_states').val();
		if(edu_states==''){
			$('#edu_states_error').show();
			return false;
		}
			
		var edu_date_from_year = $('#edu_date_from_year').val();
		if(edu_date_from_year==''){
			$('#edu_date_from_year_error').show();
			return false;
		}
		
		if(!$('#chk_till_date_education').attr('checked')) {  
			var edu_date_to_year = $('#edu_date_to_year').val();
			if(edu_date_to_year==''){
				$('#edu_date_to_year_error').show();
				return false;
			}
		}
		
		var edu_classification = $('#edu_classification').val();
		if(edu_classification==''){
			$('#edu_classification_error').show();
			return false;
		}
		
		var edu_course_of_study = $('#edu_course_of_study').val();
		if(edu_course_of_study==''){
			$('#edu_course_of_study_error').show();
			return false;
		}  
	}
    
	function chk_till_date_education1(){
	 alert('fds');
		if($('#chk_till_date_education').attr('checked')) {
		
			jQuery('#edu_date_to_year').hide(); 
			
		}else{
			
			jQuery('#edu_date_to_year').show(); 
		
		}
	}
</script>						
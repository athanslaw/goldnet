 
<form id="frm_educ_details" method="post" action="<?php echo base_url();?>account/edit_education_entry?id=<?php echo $education_id;?>">
   
		<div class="form-group">
			<label>Institution*</label>
			<input class="form-control required" type="text" name="edu_institution" id="edu_institution" value="<?php echo $eduation->institution;?>"  />
			<label style="display:none;" generated="true" class="error" id="edu_institution_error">This field is required.</label> 
		</div>
		
		<div class="form-group">
		<label>Type*</label>
			<?php  $highest_education = get_highest_education_helper(); ?>
			<select name="edu_qualification" id="edu_qualification" class="form-control dropdown-toggle required" style="border:1px solid #ccc;">
			<option value="">Select</option>
			<?php for($i=0;$i<count($highest_education);$i++){?>
			<option value="<?php echo $highest_education[$i]->id;?>" <?php if(isset($eduation->education) && $eduation->education==$highest_education[$i]->id){?> selected="selected" <?php }?>><?php echo $highest_education[$i]->name;?></option>
			<?php } ?>
			</select>
			<label style="display:none;" generated="true" class="error" id="edu_qualification_error">This field is required.</label> 
		</div>
		
		<div class="form-group">
			<label>Country*</label>
			<?php  $countries = getCountryList(); ?>
			<select name="edu_country" id="edu_country" class="form-control dropdown-toggle required">
			<option value="">Select</option>
			<?php for($i=0;$i<count($countries);$i++){?>
			<option value="<?php echo $countries[$i]->id;?>" <?php if($countries[$i]->id==150){?> selected="selected"<?php } ?>><?php echo $countries[$i]->country_name;?></option>
			<?php } ?>
			</select>
			<label style="display:none;" generated="true" class="error" id="edu_country_error">This field is required.</label> 
		</div>
		
		<div class="form-group">
			<label>States*</label>
			<?php  $states = getState(); ?>
			<select name="edu_states" id="edu_states" class="form-control dropdown-toggle required">
			<option value="">Select</option>
			<?php for($i=0;$i<count($states);$i++){?>
			<option value="<?php echo $states[$i]->code;?>" <?php if(isset($eduation->state) && $eduation->state==$states[$i]->code){?> selected="selected" <?php }?>><?php echo $states[$i]->state;?></option>
			<?php } ?>
			</select>
			<label style="display:none;" generated="true" class="error" id="edu_states_error">This field is required.</label> 
		</div>
		
		<div class="form-group" style="width:100%">
			<label>Date*</label><br /> 
	From: <select class="required" name="edu_date_from_year" id="edu_date_from_year" aria-invalid="false">
<option value="">Year</option>
<?php for($kl=date('Y');$kl>=1980;$kl--){ ?>
<option <?php if(isset($eduation->date_from) && $eduation->date_from==$kl){?> selected="selected" <?php }?> value="<?php echo $kl;?>"><?php echo $kl;?></option>
<?php } ?> 
</select>
<label style="display:none;" generated="true" class="error" id="edu_date_from_year_error">This field is required.</label> 

To :  <select class="" name="edu_date_to_year" id="edu_date_to_year"  <?php if(isset($eduation->date_to) && $eduation->date_to=='Till Date'){?> style="display:none;" <?php } ?>>
<option value="">Year</option>
<?php for($kl=date('Y');$kl>=1980;$kl--){ ?>
<option <?php if(isset($eduation->date_to) && $eduation->date_to==$kl){?> selected="selected" <?php }?> value="<?php echo $kl;?>"><?php echo $kl;?></option>
<?php } ?> 
</select>
<label style="display:none;" generated="true" class="error" id="edu_date_to_year_error">This field is required.</label> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="checkbox" name="chk_till_date_education"  id="chk_till_date_education" <?php if(isset($eduation->date_to) && $eduation->date_to=='Till Date'){?> checked="checked"<?php } ?> onclick="return chk_till_date_education1();" /> &nbsp;In View.
<label style="display:none;" generated="true" class="error" id="chk_till_date_education_error">This field is required.</label> 

</div>
								 
  		<div class="form-group">
			<label>Classification*</label>
			<?php $classification_list = classification_helper(); ?>
			<select name="edu_classification" id="edu_classification" class="form-control dropdown-toggle ">
			<option value="">Select</option>
			<?php foreach ($classification_list as $key => $val) { ?>
			<option value="<?php echo $key;?>" <?php if(isset($eduation->classification) && $eduation->classification==$key){?> selected="selected" <?php }?>><?php echo $val;?></option>
			<?php } ?>
			</select>
			<label style="display:none;" generated="true" class="error" id="edu_classification_error">This field is required.</label> 
 		</div>
		
		<div class="form-group">
			<label>Course of Study*</label>
			<input class="form-control required" type="text" name="edu_course_of_study" id="edu_course_of_study" value="<?php echo $eduation->course_of_study;?>"  />
			<label style="display:none;" generated="true" class="error" id="edu_course_of_study_error">This field is required.</label> 
		</div>
		
		<div class="form-btns">
			<button class="btn btn-default" type="submit"  onclick="return check_validation_education_form();">Save</button>
			<button class="btn btn-default" type="button" onclick="return education_details_form('close');">Cancel</button>
		</div>
                                </form>
								
							 
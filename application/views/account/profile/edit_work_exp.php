<form id="frm_work_exp_details" method="post" action="<?php echo base_url();?>account/edit_work_experience_entry?id=<?php echo $work_experience_id;?>">
                                	
									
                                	<div class="form-group">
                                    	<label>Company</label>
                                        <input class="form-control required" type="text" name="work_exp_company_name" id="work_exp_company_name" value="<?php echo $work_experience->company;?>" onkeyup="return work_exp_company_name_remove(this.value);" placeholder="Company"/>
										<label style="display:none;" generated="true" class="error" id="work_exp_company_name_error">This field is required.</label>
                                    </div>
									
									<div class="form-group">
                                    	<label>Company Size</label>
                                       <?php $company_size_list = company_size_helper();   ?>
										<select class="form-control dropdown-toggle" id="work_exp_company_size" name="work_exp_company_size">
										<option value="">Select</option>
										<?php foreach ($company_size_list as $key => $val) { ?>
										<option value="<?php echo $key;?>" <?php if(isset($work_experience->company_size) && $work_experience->company_size==$key){?> selected="selected" <?php }?> ><?php echo $val;?></option>
										<?php } ?>
										</select>
										<label style="display:none;" generated="true" class="error" id="work_exp_company_size_error">This field is required.</label>
                                    </div>
									
									<div class="form-group">
                                    	<label>Career Sector</label>
									<?php $carrer_sector_list = get_carrer_sector_list_helper(); ?>
									<select name="work_exp_carrer_sector" id="work_exp_carrer_sector" class="form-control dropdown-toggle required" onchange="return fetch_specilization(this.value);">
									<option value="">Select</option>
									<?php for($i=0;$i<count($carrer_sector_list);$i++){?>
									<option value="<?php echo $carrer_sector_list[$i]->id;?>" <?php if(isset($work_experience->carrer_sector) && $work_experience->carrer_sector==$carrer_sector_list[$i]->id){?> selected="selected" <?php }?>><?php echo $carrer_sector_list[$i]->name;?></option>
									<?php } ?>
									</select>
									<label style="display:none;" generated="true" class="error" id="work_exp_carrer_sector_error">This field is required.</label>
									</div>
									
									<div class="form-group">
                                    	<label>Specialization</label>
									<?php $function_area = get_function_area_list_helper(); ?>
									<select name="function_area" id="function_area" class="form-control dropdown-toggle required">
									<option value="">Select</option>
									<?php for($i=0;$i<count($function_area);$i++){?>
									<option value="<?php echo $function_area[$i]->id;?>" <?php if(isset($work_experience->specialization) && $work_experience->specialization==$function_area[$i]->id){?> selected="selected" <?php }?>><?php echo $function_area[$i]->name;?></option>
									<?php } ?>
									</select>
									<label style="display:none;" generated="true" class="error" id="function_area_error">This field is required.</label>
									</div>
									
									<!--<div class="form-group">
                                    	<label>Job Title</label>
                                    	<input class="form-control required" type="text" name="work_exp_job_title" id="work_exp_job_title" value="" placeholder="Job Title"/>
                                	</div>-->
									
									<div class="form-group">
                                    	<label>Job Level</label>
                                        <?php $joblevel_list = get_joblevel_helper(); ?>
									<select name="work_exp_joblevel" id="work_exp_joblevel" class="form-control dropdown-toggle ">
									<option value="">Job Level *</option>
									<?php for($i=0;$i<count($joblevel_list);$i++){?>
									<option value="<?php echo $joblevel_list[$i]->id;?>" <?php if(isset($work_experience->job_level) && $work_experience->job_level==$joblevel_list[$i]->id){?> selected="selected" <?php }?>><?php echo $joblevel_list[$i]->name;?></option>
									<?php } ?>
									</select>
									<label style="display:none;" generated="true" class="error" id="work_exp_joblevel_error">This field is required.</label>
                                    </div>
									
									   <div class="form-group">
                                    	<label>Job Type</label>
                                    	<?php $job_type_list = helper_job_type();   ?>
										<select class="form-control dropdown-toggle" id="work_exp_job_type" name="work_exp_job_type">
										<option value="">Job Type *</option>
										<?php foreach ($job_type_list as $key => $val) { ?>
										<option value="<?php echo $key;?>" <?php if(isset($work_experience->job_type) && $work_experience->job_type==$key){?> selected="selected" <?php } ?>><?php echo $val;?></option>
										<?php } ?>
										</select>
										<label style="display:none;" generated="true" class="error" id="work_exp_job_type_error">This field is required.</label>
                                	</div>
									
									<div class="form-group">
                                    	<label>Location</label>
										<?php  $states = getState(); ?>
										<select name="work_exp_state" id="work_exp_state" class="form-control dropdown-toggle required">
									<option value="">Select</option>
									<?php for($i=0;$i<count($states);$i++){?>
									<option value="<?php echo $states[$i]->code;?>" <?php if(isset($work_experience->state) && $work_experience->state==$states[$i]->code){?> selected="selected" <?php }?>><?php echo $states[$i]->state;?></option>
									<?php } ?>
									</select>
									<label style="display:none;" generated="true" class="error" id="work_exp_state_error">This field is required.</label>
									</div>
                                	<div class="form-group">
                                    	<label>Salary (Monthly)</label>
										 <?php  $salary_helper = get_salary_helper(); ?>
                                     	<select name="work_exp_salary_range" id="work_exp_salary_range" class="form-control dropdown-toggle" style="border:1px solid #ccc;">
											<option value="">Select</option>
											<?php for($i=0;$i<count($salary_helper);$i++){?>
											<option value="<?php echo $salary_helper[$i]->id;?>" <?php if(isset($work_experience->salary) && $work_experience->salary==$salary_helper[$i]->id){?> selected="selected" <?php }?>><?php echo $salary_helper[$i]->name;?></option>
											<?php } ?>
                                   		</select>
								 <label style="display:none;" generated="true" class="error" id="work_exp_salary_range_error">This field is required.</label>
								 </div>
									
                                     <div class="form-group" style="width:100%">
                                    	<label>Date*</label><br />
										From :
									<select class="required" name="work_exp_date_from_month" id="work_exp_date_from_month" aria-invalid="false">
										<option value="">Month</option>
										<option value="Jan" <?php if(isset($work_experience->exp_from_month) && $work_experience->exp_from_month=='Jan'){?> selected="selected" <?php }?>>Jan</option>
										<option value="Feb" <?php if(isset($work_experience->exp_from_month) && $work_experience->exp_from_month=='Feb'){?> selected="selected" <?php }?>>Feb</option>
										<option value="Mar" <?php if(isset($work_experience->exp_from_month) && $work_experience->exp_from_month=='Mar'){?> selected="selected" <?php }?>>Mar</option>
										<option value="Apr" <?php if(isset($work_experience->exp_from_month) && $work_experience->exp_from_month=='Apr'){?> selected="selected" <?php }?>>Apr</option>
										<option value="May" <?php if(isset($work_experience->exp_from_month) && $work_experience->exp_from_month=='May'){?> selected="selected" <?php }?>>May</option>
										<option value="Jun" <?php if(isset($work_experience->exp_from_month) && $work_experience->exp_from_month=='Jun'){?> selected="selected" <?php }?>>Jun</option>
										<option value="Jul" <?php if(isset($work_experience->exp_from_month) && $work_experience->exp_from_month=='Jul'){?> selected="selected" <?php }?>>Jul</option>
										<option value="Aug" <?php if(isset($work_experience->exp_from_month) && $work_experience->exp_from_month=='Aug'){?> selected="selected" <?php }?>>Aug</option>
										<option value="Sep" <?php if(isset($work_experience->exp_from_month) && $work_experience->exp_from_month=='Sep'){?> selected="selected" <?php }?>>Sep</option>
										<option value="Oct" <?php if(isset($work_experience->exp_from_month) && $work_experience->exp_from_month=='Oct'){?> selected="selected" <?php }?>>Oct</option>
										<option value="Nov" <?php if(isset($work_experience->exp_from_month) && $work_experience->exp_from_month=='Nov'){?> selected="selected" <?php }?>>Nov</option>
										<option value="Dec" <?php if(isset($work_experience->exp_from_month) && $work_experience->exp_from_month=='Dec'){?> selected="selected" <?php }?>>Dec</option>
									</select>
									<label style="display:none;" generated="true" class="error" id="work_exp_date_from_month_error">This field is required.</label>
									<select class="required" name="work_exp_date_from_year" id="work_exp_date_from_year" aria-invalid="false">
<option value="">Year</option>
<?php for($kl=date('Y');$kl>=1980;$kl--){ ?>
<option value="<?php echo $kl;?>" <?php if(isset($work_experience->exp_from_year) && $work_experience->exp_from_year==$kl){?> selected="selected" <?php }?>><?php echo $kl;?></option>
<?php } ?> 
</select>
<label style="display:none;" generated="true" class="error" id="work_exp_date_from_year_error">This field is required.</label>

To : <select class="" name="work_exp_date_to_month" id="work_exp_date_to_month" aria-invalid="false" <?php if(isset($work_experience->till_date) && $work_experience->till_date==1){?> style="display:none;" <?php } ?>> 
										<option value="">Month</option>
										<option value="Jan" <?php if(isset($work_experience->exp_to_month) && $work_experience->exp_to_month=='Jan'){?> selected="selected" <?php }?>>Jan</option>
										<option value="Feb" <?php if(isset($work_experience->exp_to_month) && $work_experience->exp_to_month=='Feb'){?> selected="selected" <?php }?>>Feb</option>
										<option value="Mar" <?php if(isset($work_experience->exp_to_month) && $work_experience->exp_to_month=='Mar'){?> selected="selected" <?php }?>>Mar</option>
										<option value="Apr" <?php if(isset($work_experience->exp_to_month) && $work_experience->exp_to_month=='Apr'){?> selected="selected" <?php }?>>Apr</option>
										<option value="May" <?php if(isset($work_experience->exp_to_month) && $work_experience->exp_to_month=='May'){?> selected="selected" <?php }?>>May</option>
										<option value="Jun" <?php if(isset($work_experience->exp_to_month) && $work_experience->exp_to_month=='Jun'){?> selected="selected" <?php }?>>Jun</option>
										<option value="Jul" <?php if(isset($work_experience->exp_to_month) && $work_experience->exp_to_month=='Jul'){?> selected="selected" <?php }?>>Jul</option>
										<option value="Aug" <?php if(isset($work_experience->exp_to_month) && $work_experience->exp_to_month=='Aug'){?> selected="selected" <?php }?>>Aug</option>
										<option value="Sep" <?php if(isset($work_experience->exp_to_month) && $work_experience->exp_to_month=='Sep'){?> selected="selected" <?php }?>>Sep</option>
										<option value="Oct" <?php if(isset($work_experience->exp_to_month) && $work_experience->exp_to_month=='Oct'){?> selected="selected" <?php }?>>Oct</option>
										<option value="Nov" <?php if(isset($work_experience->exp_to_month) && $work_experience->exp_to_month=='Nov'){?> selected="selected" <?php }?>>Nov</option>
										<option value="Dec" <?php if(isset($work_experience->exp_to_month) && $work_experience->exp_to_month=='Dec'){?> selected="selected" <?php }?>>Dec</option>
									</select>
									<label style="display:none;" generated="true" class="error" id="work_exp_date_to_month_error">This field is required.</label>
									<select class="" name="work_exp_date_to_year" id="work_exp_date_to_year" aria-invalid="false" <?php if(isset($work_experience->till_date) && $work_experience->till_date==1){?> style="display:none;" <?php } ?>>
<option value="">Year</option>
<?php for($kl=2025;$kl>=1980;$kl--){ ?>
<option value="<?php echo $kl;?>" <?php if(isset($work_experience->exp_to_year) && $work_experience->exp_to_year==$kl){?> selected="selected" <?php }?>><?php echo $kl;?></option>
<?php } ?> 
</select>
<label style="display:none;" generated="true" class="error" id="work_exp_date_to_year_error">This field is required.</label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="checkbox" name="chk_till_date"  id="chk_till_date" onclick="return chk_till_date_call();" <?php if(isset($work_experience->till_date) && $work_experience->till_date==1){?> checked="checked"<?php } ?> /> &nbsp;I currently work here.
<label style="display:none;" generated="true" class="error" id="chk_till_date_error">This field is required.</label>
								 </div>
                                     
                                       
                                     
                                     
                                    <div class="form-group" style="width:100%">
                                    	<label>Responsibilities And Achievements in role*</label>
                                       <textarea class="form-control required" name="work_exp_res_ach" id="work_exp_res_ach" ><?php echo $work_experience->responsibilities_and_achievements;?></textarea>
									   <label style="display:none;" generated="true" class="error" id="work_exp_res_ach_error">This field is required.</label>
                                    </div> 
                                    <div class="form-btns">
                                    	<button class="btn btn-default"  onclick="return check_validation_work_exp_form();" type="submit">Save</button>
										<button class="btn btn-default" type="button" onclick="return work_exp_details_form('close');">Cancel</button>
                                    </div>
                                </form>
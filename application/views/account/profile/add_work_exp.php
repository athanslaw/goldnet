<form id="frm_work_exp_details" method="post" action="<?php echo base_url();?>account/add_work_experience_entry">
                                	
									
                                	<div class="form-group">
                                    	<label>Company</label>
                                        <input class="form-control required" type="text" name="work_exp_company_name" id="work_exp_company_name" value="" onkeyup="return work_exp_company_name_remove(this.value);" placeholder="Company"/>
										<label style="display:none;" generated="true" class="error" id="work_exp_company_name_error">This field is required.</label>
                                    </div>
									
									<div class="form-group">
                                    	<label>Company Size</label>
                                       <?php $company_size_list = company_size_helper();   ?>
										<select class="form-control dropdown-toggle" id="work_exp_company_size" name="work_exp_company_size">
										<option value="">Select</option>
										<?php foreach ($company_size_list as $key => $val) { ?>
										<option value="<?php echo $key;?>" ><?php echo $val;?></option>
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
									<option value="<?php echo $carrer_sector_list[$i]->id;?>"><?php echo $carrer_sector_list[$i]->name;?></option>
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
									<option value="<?php echo $function_area[$i]->id;?>"><?php echo $function_area[$i]->name;?></option>
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
									<option value="<?php echo $joblevel_list[$i]->id;?>"><?php echo $joblevel_list[$i]->name;?></option>
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
										<option value="<?php echo $key;?>" <?php if(isset($job_seeker_career_profile->job_type) && $job_seeker_career_profile->job_type==$key){?> selected="selected" <?php } ?>><?php echo $val;?></option>
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
									<option value="<?php echo $states[$i]->code;?>"><?php echo $states[$i]->state;?></option>
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
											<option value="<?php echo $salary_helper[$i]->id;?>" ><?php echo $salary_helper[$i]->name;?></option>
											<?php } ?>
                                   		</select>
								 <label style="display:none;" generated="true" class="error" id="work_exp_salary_range_error">This field is required.</label>
								 </div>
									
                                     <div class="form-group" style="width:100%">
                                    	<label>Date*</label><br />
										From :
									<select class="required" name="work_exp_date_from_month" id="work_exp_date_from_month" aria-invalid="false">
										<option value="">Month</option>
										<option value="Jan">Jan</option>
										<option value="Feb">Feb</option>
										<option value="Mar">Mar</option>
										<option value="Apr">Apr</option>
										<option value="May">May</option>
										<option value="Jun">Jun</option>
										<option value="Jul">Jul</option>
										<option value="Aug">Aug</option>
										<option value="Sep">Sep</option>
										<option value="Oct">Oct</option>
										<option value="Nov">Nov</option>
										<option value="Dec">Dec</option>
									</select>
									<label style="display:none;" generated="true" class="error" id="work_exp_date_from_month_error">This field is required.</label>
									<select class="required" name="work_exp_date_from_year" id="work_exp_date_from_year" aria-invalid="false">
<option value="">Year</option>
<?php for($kl=date('Y');$kl>=1980;$kl--){ ?>
<option value="<?php echo $kl;?>"><?php echo $kl;?></option>
<?php } ?> 
</select>
<label style="display:none;" generated="true" class="error" id="work_exp_date_from_year_error">This field is required.</label>

To : <select class="" name="work_exp_date_to_month" id="work_exp_date_to_month" aria-invalid="false">
										<option value="">Month</option>
										<option value="Jan">Jan</option>
										<option value="Feb">Feb</option>
										<option value="Mar">Mar</option>
										<option value="Apr">Apr</option>
										<option value="May">May</option>
										<option value="Jun">Jun</option>
										<option value="Jul">Jul</option>
										<option value="Aug">Aug</option>
										<option value="Sep">Sep</option>
										<option value="Oct">Oct</option>
										<option value="Nov">Nov</option>
										<option value="Dec">Dec</option>
									</select>
									<label style="display:none;" generated="true" class="error" id="work_exp_date_to_month_error">This field is required.</label>
									<select class="" name="work_exp_date_to_year" id="work_exp_date_to_year" aria-invalid="false">
<option value="">Year</option>
<?php for($kl=2025;$kl>=1980;$kl--){ ?>
<option value="<?php echo $kl;?>"><?php echo $kl;?></option>
<?php } ?> 
</select>
<label style="display:none;" generated="true" class="error" id="work_exp_date_to_year_error">This field is required.</label>
<!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="checkbox" name="chk_till_date"  id="chk_till_date" onclick="return chk_till_date_call();" /> &nbsp;I currently work here.-->
<label style="display:none;" generated="true" class="error" id="chk_till_date_error">This field is required.</label>
								 </div>
                                     
                                       
                                     
                                     
                                    <div class="form-group" style="width:100%">
                                    	<label>Responsibilities And Achievements in role*</label>
                                       <textarea class="form-control required" name="work_exp_res_ach" id="work_exp_res_ach" ></textarea>
									   <label style="display:none;" generated="true" class="error" id="work_exp_res_ach_error">This field is required.</label>
                                    </div> 
                                    <div class="form-btns">
                                    	<button class="btn btn-default"  onclick="return check_validation_work_exp_form();" type="submit">Save</button>
										<button class="btn btn-default" type="button" onclick="return work_exp_details_form('close');">Cancel</button>
                                    </div>
                                </form>
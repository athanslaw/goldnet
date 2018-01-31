<div class="career_summary">
                        	<div class="mini_title gray"><span>Career Summary</span>
							<span class="pro_edit_btn" style="cursor:pointer;"  onclick="return career_details_form('open');"><i class="fa fa-pencil"></i></span></div>
                            <ul class="career_details">
                                <li>
									<span class="text_label">Desired Job Type</span>
									<span class="text_field"><?php echo helper_job_type_value($user_profile->job_type);?></span>
								</li>
                                <li>
									<span class="text_label">Highest Education</span>
									<span class="text_field"><?php  
									if(isset($user_profile->education) && $user_profile->education != '0'){
										$education = get_education_name_helper($user_profile->education); echo $education->name;
									} ?></span>
								</li>
                                <li>
									<span class="text_label">Desired Specialization</span>
									<span class="text_field"><?php echo get_function_area_name_helper($user_profile->function_area);   ?></span>
								</li>
                                <li>
									<span class="text_label">Expected Salary</span>
									<span class="text_field"><?php 
									if(isset($user_profile->expected_salary) && $user_profile->expected_salary != '0'){
										echo get_salary_value_helper($user_profile->expected_salary);
									}?> (Monthly)</span>
								</li>
                                <li>
									<span class="text_label">Years of Experience</span>
									<span class="text_field"><?php echo get_year_exp_value_helper($user_profile->experience);?> </span>
								</li>
                                <li><span class="text_label">Professional Skills</span><span class="text_field"><?php if(isset($user_profile->professional_skills) && $user_profile->professional_skills!=''){ echo get_professional_skills_value_helper($user_profile->professional_skills); }else{ echo '--Not Available--';}?></span></li>
                                <li>
									<span class="text_label">Employment Status</span>
									<span class="text_field"><?php echo helper_employment_status_value($user_profile->employment_status);?></span>
								</li>
                                <li>
									<span class="text_label">State of Origin</span>
									<span class="text_field"><?php echo getState($user_profile->state);?></span>
								</li>
                            </ul>
                            <div class="clearfix"></div>
                            <div class="career_details_form">
                        		<form id="frm_career_details" method="post" action="<?php echo base_url();?>account/career_details_edit">
                                	<div class="form-group">
                                    	<label>Desired Job Type</label> 
										<?php $job_type_list = helper_job_type();   ?>
										<select class="required form-control" id="carrer_sum_job_type" name="carrer_sum_job_type">
										<option value="">Select</option>
										<?php foreach ($job_type_list as $key => $val) { ?>
										<option value="<?php echo $key;?>" <?php if(isset($user_profile->job_type) && $user_profile->job_type==$key){?> selected="selected" <?php } ?>><?php echo $val;?></option>
										<?php } ?>
										</select>
                                	</div>
                                	<div class="form-group">
                                    	<label>Highest Education</label>
                                        <?php  $highest_education = get_highest_education_helper(); ?>
                                     	<select name="carrer_sum_education" class="form-control dropdown-toggle required" style="border:1px solid #ccc;">
                                    	<option value="">Select</option>
                                        <?php for($i=0;$i<count($highest_education);$i++){?>
                                        <option value="<?php echo $highest_education[$i]->id;?>" <?php if(isset($user_profile->education) && $user_profile->education==$highest_education[$i]->id){?> selected="selected" <?php }?>><?php echo $highest_education[$i]->name;?></option>
                                        <?php } ?>
                                   		 </select><?php //echo form_error('carrer_sum_education');?>
                                    </div>
                                    <div class="form-group">
                                    	<label>Desired Specialization</label>
                                        <?php $function_area = get_function_area_list_helper(); ?>
									<select name="carrer_sum_function_area" id="carrer_sum_function_area" class="form-control dropdown-toggle required">
									<option value="">Select</option>
									<?php for($i=0;$i<count($function_area);$i++){?>
									<option value="<?php echo $function_area[$i]->id;?>" <?php if(isset($user_profile->function_area) && $user_profile->function_area==$function_area[$i]->id){?> selected="selected" <?php }?>><?php echo $function_area[$i]->name;?></option>
									<?php } ?>
									</select>
									<?php //echo form_error('function_area');?>
                                    </div>
                                    <div class="form-group">
                                    	<label>Expected Salary</label>
                                        <?php $salary_master = get_salary_helper(); ?>
									<select name="career_sum_expected_salary" id="career_sum_expected_salary" class="form-control dropdown-toggle required">
									<option value="">Select</option>
									<?php for($i=0;$i<count($salary_master);$i++){?>
									<option value="<?php echo $salary_master[$i]->id;?>" <?php if(isset($user_profile->expected_salary) && $user_profile->expected_salary==$salary_master[$i]->id){?> selected="selected" <?php }?>><?php echo $salary_master[$i]->name;?></option>
									<?php } ?>
									</select>
									<?php // echo form_error('career_sum_expected_salary');?>
                                    </div>
                                    <div class="form-group">
                                    	
									
									<label>Years of Experience</label>
                                         <?php
										 $year_exp = get_year_exp_list_helper(); 
										 if(isset($user_profile->experience) && $user_profile->experience != '0'){?>
									<select name="carrer_sum_experience" id="carrer_sum_experience" class="form-control  required">
									<option value="">Total Experience </option>
									<?php for($i=0;$i<count($year_exp);$i++){?>
									<option value="<?php echo $year_exp[$i]->id;?>" <?php if(isset($user_profile->experience) && $user_profile->experience==$year_exp[$i]->id){?> selected="selected" <?php }?>><?php echo $year_exp[$i]->experience;?></option>
									<?php } ?>
										 </select><?php } ?>
                                    </div>
                                    <div class="form-group">
                                    	<label>Professional Skills</label>
                                    	<?php  $professional_skills = get_professional_skills_helper(); ?>
                                     	<select name="carrer_sum_skills" id="carrer_sum_skills" class="form-control dropdown-toggle required" style="border:1px solid #ccc;" onchange="return professional_skills_add(this.value);">
                                    	<option value="">Select</option>
                                        <?php for($i=0;$i<count($professional_skills);$i++){?>
                                        <option value="<?php echo $professional_skills[$i]->id;?>" <?php if(isset($user_profile->professional_skills) && $user_profile->professional_skills==$professional_skills[$i]->id){?> selected="selected" <?php }?>><?php echo $professional_skills[$i]->name;?></option>
                                        <?php } ?>
										<option value="other">Click to add</option>
                                   		</select>
										<input class="form-control" type="text" name="carrer_sum_skills_other" id="carrer_sum_skills_other" value="" placeholder="Enter Skills" style="display:none;"/>
                                	</div>
                                    <div class="form-group">
                                    	<label>Employment Status</label>
										<?php $employment_status = helper_employment_status();   ?>
										<select class="required form-control" id="carrer_sum_employment_status" name="carrer_sum_employment_status">
										<option value="">Select</option>
										<?php foreach ($employment_status as $key => $val) { ?>
										<option value="<?php echo $key;?>" <?php if(isset($user_profile->employment_status) && $user_profile->employment_status==$key){?> selected="selected" <?php } ?>><?php echo $val;?></option>
										<?php } ?>
										</select>
									</div>
									
									 <div class="form-group">
                                    	<label>State of Origin</label>
										  <?php  $states = getState(); ?>
									<select name="carrer_sum_states" class="form-control dropdown-toggle required">
									<option value="">States *</option>
									<?php for($i=0;$i<count($states);$i++){?>
									<option value="<?php echo $states[$i]->code;?>" <?php if(isset($user_profile->state) && $user_profile->state==$states[$i]->code){?> selected="selected" <?php } ?>><?php echo $states[$i]->state;?></option>
									<?php } ?>
									</select> 
									</div>
                                    
                                    <div class="form-btns">
                                    	<button class="btn btn-default" type="submit">Save</button>
										<button class="btn btn-default" type="button"  onclick="return career_details_form('close');">Cancel</button>
                                    </div>
                                </form>
                    		</div>
                        </div>
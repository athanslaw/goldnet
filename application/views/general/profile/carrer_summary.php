<div class="career_summary">
                        	<div class="mini_title gray"><span>Career Summary</span></div>
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
                        </div>
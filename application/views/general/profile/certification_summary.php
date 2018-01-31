<?php
if(count($user_get_certifications)>0){
?>
                            <div class="certification_summary">
                        
						<div class="mini_title gray"><span>Certifications & Professional Association Memberships</span></div>
						  <div class="certification_details_form">
                        		 
                    		</div>
							<ul class="certification_details">
							<?php $i=1; foreach ($user_get_certifications as $get_certifications){ ?>
                                <li>
                                	<div class="education_box">
                                    	<span class="text_label"><?php echo $get_certifications->Certification_Membership;?></span>
										<span class="text_field"><?php echo $get_certifications->year;?> </span>
                                    </div>
                                </li>
								<?php } ?>
                            </ul>
                            <div class="clearfix"></div>
                          
                        </div>
					
							<?php } ?>
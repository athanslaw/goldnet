
	<link href="<?php echo base_url();?>css/jquery.datepick.css" rel="stylesheet"/>
	<script src="<?php echo base_url();?>js/jquery-migrate-1.2.1.min.js"></script>
	
	
	<link href="<?php echo base_url();?>css/style1.css" type="text/css" rel="stylesheet"/><div class="content">
    	<div class="register_section">
        	<div class="container">
            	<div class="row-fluid main_profile clearfix">

					<span class="pro_edit_btn" style="cursor:pointer;"  onclick="return profile_details_form('open');"><i class="fa fa-pencil"></i></span>
                    <div class="profile_details">
                	<div class="col-md-2 col-sm-2 profile_img">
 						<?php if(isset($user_profile->profile_pic) && $user_profile->profile_pic!=''){ ?>
                    	<img class="img-circle" src="<?php echo base_url();?>images/users/passport/<?php echo $user_profile->profile_pic;?>" alt=""/>
						<?php }else{ ?>
						<img class="img-circle" src="<?php echo base_url();?>images/users/no_image.jpg" alt=""/>
						<?php } ?>
                        <span><?php echo $user_profile->first_name.' '.$user_profile->last_name;?></span>
                    </div>
                    <div class="col-md-10 col-sm-10">
                    	<ul class="profile_details">
                        	<li>
                            	<span class="text_label">Email</span>
                                <span class="text_field"><?php echo $user_profile->email;?></span>
                            </li>
                        	<li>
                            	<span class="text_label">Mobile</span>
                                <span class="text_field"><?php echo $user_profile->mobile_number;?></span>
                            </li>
                            <li>
                            	<span class="text_label">Current Location</span>
                                <span class="text_field"><?php  $countrys = getCountry($user_profile->country); echo $countrys; ?> </span>
                            </li>
                            <li>
                            	<span class="text_label">Nationality</span>
                                <span class="text_field"><?php echo $user_profile->nationality;?></span>
                            </li>
							<?php if($user_work_experience>0){
								$i=1; foreach ($user_work_experience as $work_experience){ 
									if($i==1){?>
                            <li>
                            	<span class="text_label">Current Employer</span>
                                <span class="text_field"><?php echo $work_experience->company;?><br />
								<?php  echo $work_experience->exp_from_month.' '.$work_experience->exp_from_year.' - '.$work_experience->exp_to_month.' '.$work_experience->exp_to_year; ?></span>
                            </li>
							<?php } $i++; } }?>
                            <li>
                            	<span class="text_label">Date of Birth</span>
                                <span class="text_field"><?php echo date('d F Y',$user_profile->dob);?></span>
                            </li>
                            <li>
                            	<span class="text_label">Gender</span>
                                <span class="text_field"><?php echo ucfirst($user_profile->gender);?></span>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="profile_details_form">
                        		<form method="post" id="frm_profile_details" action="<?php echo base_url();?>account/profile_details_basic_edit" enctype="multipart/form-data">
                                	<div class="form-group">
                                    	<label>First Name *</label>
                                    	<input class="form-control required" type="text" name="txt_first_name" value="<?php echo $user_profile->first_name;?>" placeholder="First Name"/>
                                	</div>
									<div class="form-group">
                                    	<label>Last Name *</label>
                                    	<input class="form-control required" type="text" name="txt_last_name" value="<?php echo $user_profile->last_name;?>" placeholder="Last Name"/>
                                	</div>
                                	<div class="form-group">
                                    	<label>Email *</label>
                                        <span class="form-control"><?php echo $user_profile->email;?> <a href="#">(Change)</a></span>
                                    </div>
                                    <div class="form-group">
                                    	<label>Mobile *</label>
                                        <input class="form-control number required" type="text" name="txt_mobile" value="<?php echo $user_profile->mobile_number;?>" placeholder="Mobile"/>
                                    </div>
									<div class="form-group">
                                    	<label>Gender *</label>
                                        <select  class="form-control required" id="txt_gender" name="txt_gender">
                                        <option value="">Select Gender</option>
                                        <option value="male" <?php if(isset($user_profile->gender) && $user_profile->gender=='male'){?> selected="selected"<?php }?>>Male</option>
                                        <option value="female" <?php if(isset($user_profile->gender) && $user_profile->gender=='female'){?> selected="selected"<?php }?>>Female</option> 
                                        </select>
                                    </div>
									<div class="form-group">
                                    	<label>Date of Birth (yy-mm-dd)</label>
                                    	<input type="text" class="form-control datep required" name="txt_dob" value="<?php echo date('y-m-d',$user_profile->dob);?>" placeholder="yy-mm-dd">
                                	</div>
                                    
                                    <div class="form-group">
                                    	<label>Current Location *</label>
                                       <?php $countries = getCountryList(); ?>
                                     	<select name="txt_country" class="form-control dropdown-toggle required">
                                    	<option value="">Select Location</option>
                                        <?php foreach($countries as $countries){?>
                                        <option value="<?php echo $countries->id;?>" <?php if(isset($user_profile->country) && $user_profile->country==$countries->id){?> selected="selected" <?php }?>><?php echo $countries->country_name;?></option>
                                        <?php } ?>
                                   		</select><?php // echo form_error('country');?>
                                    </div>
                                    <div class="form-group">
                                    	<label>Nationality *</label>
                                     	<input type="text" class="form-control datep required" name="txt_nationality" value="<?php echo $user_profile->nationality;?>" placeholder="Nationality">
										<?php //echo form_error('nationality');?>
                                    </div>
                                 
                                     <div class="form-group">
                                        <label for="exampleInputFile">Profile Image</label>
                                        <input type="file" id="photo" name="photo">
                                        <p class="help-block">Max. 30kb in size.</p>
                                    </div>
                                    <div class="form-btns">
                                    	<button class="btn btn-default" type="submit">Save</button>
										<button class="btn btn-default" type="button" onclick="return profile_details_form('close');">Cancel</button>
                                    </div>
                                </form>
                    </div>
                    <div class="clearfix"></div>                    
                </div>
                <div class="clearfix"></div>
                <div class="row-fluid no_pad">
                	<div class="col-md-9 col-sm-9 no_pad">
                    	<div class="profile_summary">
                        	<div class="mini_title gray"><span>Profile Summary</span>
							<span class="pro_edit_btn" style="cursor:pointer;"  onclick="return profile_summary('open');"><i class="fa fa-pencil"></i></span></div>
                            <div  class="profile_summary_details">
							<p>
						<?php if(isset($user_profile->profile_summary) && $user_profile->profile_summary!=''){
								 echo $user_profile->profile_summary;
								 }else{ ?>
						Please Enter profile Summary Here.
 							<?php } ?>
							</p>
							</div>
                            <div class="profile_summary_edit">
                            	<form method="post" action="<?php echo base_url();?>account/profile_summary_edit" id="frm">
                                	<div class="form-group">
                                    	<textarea class="required pad-10" style="padding:5px;" name="txt_profile_summary" id="txt_profile_summary"  placeholder="Please Enter profile Summary Here" ><?php echo $user_profile->profile_summary;?></textarea>
                                    </div>
                                    <div class="form-btns">
                                    	<button class="btn btn-default" type="submit">Save</button>
										<button class="btn btn-default" type="button" onclick="return profile_summary('close');">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div><!--profile_summary-->
                        <div class="clearfix"></div>
                        <?php include(APPPATH.'views/account/profile/carrer_summary.php');?><!--career_summary-->
                        <div class="clearfix"></div>
                        <?php include(APPPATH.'views/account/profile/work_experience.php');?><!--work_exp-->
                        <div class="clearfix"></div>
                         <?php include(APPPATH.'views/account/profile/education.php');?><!--education_summary-->
                        <div class="clearfix"></div>
                         <?php include(APPPATH.'views/account/profile/certification_summary.php');?><!--certification_summary-->
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-3 col-sm-3 no_pad pad_lft">
					
					<div class="right_sidebar">
                         <span class="mini_title">My Profile</span>
                            <div class="profile_strength">
                             <span>Your profile strength</span>
                                <div class="progress">
 								<?php
 									 $cnt_jobseeker_profile_status = 30;
									 if(isset($user_profile->profile_pic) && $user_profile->profile_pic!=''){ 
									 	$cnt_jobseeker_profile_status=$cnt_jobseeker_profile_status+10;
									 }
									 if(isset($user_profile->profile_summary) && $user_profile->profile_summary!=''){ 
									 	$cnt_jobseeker_profile_status=$cnt_jobseeker_profile_status+10;
									 }
									 if(isset($user_profile->expected_salary) && $user_profile->expected_salary!=''){ 
									 	$cnt_jobseeker_profile_status=$cnt_jobseeker_profile_status+10;
									 }
									 if($user_get_eduation>0){
									 	$cnt_jobseeker_profile_status=$cnt_jobseeker_profile_status+10;
									 }
 									 if(isset($user_profile->cv) && $user_profile->cv!=''){
									 	$cnt_jobseeker_profile_status=$cnt_jobseeker_profile_status+30;
									 }
								?>
                                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $cnt_jobseeker_profile_status;?>"
                                  aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $cnt_jobseeker_profile_status;?>%"><?php echo $cnt_jobseeker_profile_status;?>%</div>
                                </div>
                                <div class="pro_viewed"><i class="fa fa-eye"></i>Profile Views<span>[16]</span></div>
                            </div>
                            
                        </div>
						
                    	<div class="right_sidebar">
                        	<span class="mini_title">CV</span>
                            <div class="form-group upload_cv">
							<?php  if(isset($user_profile->cv) && $user_profile->cv!=''){ ?>
							Uploaded CV : <a href="<?php echo base_url();?>images/users/cv/<?php echo $user_profile->cv;?>">Download</a>
							<?php }else{ ?>
							 No CV uploaded Yet
							<?php } ?>
							<form method="post" action="<?php echo base_url();?>account/update_cv" id="frm_upload_cv" enctype="multipart/form-data">
                              <label for="exampleInputFile">Upload CV from your computer</label>
                              <input type="file" id="user_cv" name="user_cv" class="required">
                              <p class="help-block">Up to 2MB for file types .pdf .doc .docx .rtf .txt</p>
                              <button type="submit" class="btn btn-default">Upload</button>
                            </div>
							</form>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>        
        </div><!--register_section-->
    </div>
		
<script type="text/javascript">

	  $( ".datep" ).datepick({ dateFormat: "yy-mm-dd",yearRange: "-100:+0" });
	  
	 function edit_education(val){
	 
	 	$('.education_box_edit').html('');
 		$('.education_box_edit').show();
		 
 	   $.ajax({url: "<?php echo base_url();?>/account/edit_education?id="+val,
	   beforeSend: function(){
				$('.education_box_edit').html('<img src="<?php echo base_url();?>images/ajax-loading.gif" class="centered"/>');
			},
		   success: function(result){
 				$('.education_box_edit').html(result);
			}
		});
	 }
	 
	 function add_education(){
	 	$('.education_box_edit').html('');
	   $('.education_box_edit').show();
	   $.ajax({url: "<?php echo base_url();?>/account/add_education", 
	   beforeSend: function(){ 
				$('.education_box_edit').html('<img src="<?php echo base_url();?>images/ajax-loading.gif" class="centered"/>');
			},
		   success: function(result){
			   $('.education_box_edit').html(result);
			}
		});
	 } 
	 
	 function add_certification(){
	 	$('.certification_details_form').html('');
	   $('.certification_details_form').show();
	   $.ajax({url: "<?php echo base_url();?>/account/add_certification", 
	   beforeSend: function(){ 
				$('.certification_details_form').html('<img src="<?php echo base_url();?>images/ajax-loading.gif" class="centered"/>');
			},
		   success: function(result){
			   $('.certification_details_form').html(result);
			}
		});
	 } 
	   
	 function edit_certification(val){
	   $('.certification_details_form').html('');
	   $('.certification_details_form').show();
	   $.ajax({url: "<?php echo base_url();?>/account/edit_certificate?id="+val, 
	   beforeSend: function(){ 
				$('.certification_details_form').html('<img src="<?php echo base_url();?>images/ajax-loading.gif" class="centered"/>');
			},
		   success: function(result){
			   $('.certification_details_form').html(result);
			}
		});
	 } 
	 
	 function add_work_experience(){
	 	$('.work_exp_details_form').html('');
	   	$('.work_exp_details_form').show();
	   $.ajax({url: "<?php echo base_url();?>/account/add_work_experience", 
	   beforeSend: function(){ 
				$('.work_exp_details_form').html('<img src="<?php echo base_url();?>images/ajax-loading.gif" class="centered"/>');
			},
		   success: function(result){
			   $('.work_exp_details_form').html(result);
			}
		});
	 }
	 
	 function edit_work_experience(val){
 	 	$('.work_exp_details_form').html('');
 		$('.work_exp_details_form').show();
  	   $.ajax({url: "<?php echo base_url();?>/account/edit_work_experience?id="+val, 
	   beforeSend: function(){ 
				$('.work_exp_details_form').html('<img src="<?php echo base_url();?>images/ajax-loading.gif" class="centered"/>');
			},
		   success: function(result){
 				$('.work_exp_details_form').html(result);
			}
		});
	 } 
	 
	$(document).ready(function() {
 		$("#frm_profile_details").validate();
		$("#frm_career_details").validate();
		$("#frm_work_exp_details").validate();
		$("#frm_upload_cv").validate();
 	});
	
	function professional_skills_add(val){
		 
		if(val=='other'){
		
			$('#carrer_sum_skills_other').css('margin-top','10px');
			$('#carrer_sum_skills_other').show();
 			
		}else{
		
			$('#carrer_sum_skills_other').hide();
		}
	
	}
	
	function certification_details_form(val){
	
		if(val=='close'){
			$('.certification_details_form').hide();
		}
	}
	
	function education_details_form(val){
	
		if(val=='close'){
			$('.education_box_edit').hide();
		}
	}
	
	function profile_details_form(val){
	
		if(val=='open'){
			$('.profile_details_form').show();
			$('.profile_details').hide();
 		}else{
			$('.profile_details_form').hide();
			$('.profile_details').show();
		}
	}
	
	function career_details_form(val){
	
		if(val=='open'){
			$('.career_details_form').show();
			$('.career_details').hide();
		}else{
			$('.career_details_form').hide();
			$('.career_details').show();
		}
	}
	
	function work_exp_details_form(val){
 		 
		if(val=='open'){
			$('.work_exp_details_form').show(); 
		}else{
			$('.work_exp_details_form').hide(); 
		}
 	}
	
	function profile_summary(val){
	
		if(val=='open'){
 			$('.profile_summary_edit').show();
			$('.profile_summary_details').hide();
		}else{
			$('.profile_summary_edit').hide();
			$('.profile_summary_details').show();
		}
 	}
</script>

	<script src="<?php echo base_url();?>js/jquery-migrate-1.2.1.min.js"></script>
	
	
	<link href="<?php echo base_url();?>css/style1.css" type="text/css" rel="stylesheet"/><div class="content">
    	<div class="register_section">
        	<div class="container">
            	<div class="row-fluid main_profile clearfix">

                    <div class="profile_details">
                	<div class="col-md-2 col-sm-2 profile_img">
 						<?php if(isset($user_profile->profile_pic) && $user_profile->profile_pic!=''){ ?>
                    	<img class="img-circle" src="<?php echo base_url();?>images/users/passport/<?php echo $user_profile->profile_pic;?>" alt=""/>
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
                </div>
                <div class="clearfix"></div>
                <div class="row-fluid no_pad">
                	<div class="col-md-12 col-sm-12 no_pad">
                    	<div class="profile_summary">
                        	<div class="mini_title gray"><span>Profile Summary</span></div>
                            <div  class="profile_summary_details">
							<p>
						<?php if(isset($user_profile->profile_summary) && $user_profile->profile_summary!=''){
								 echo $user_profile->profile_summary;
								 } ?>
							</p>
							</div>
                        </div><!--profile_summary-->
                        <div class="clearfix"></div>
                        <?php include(APPPATH.'views/general/profile/carrer_summary.php');?><!--career_summary-->
                        <div class="clearfix"></div>
                        <?php include(APPPATH.'views/general/profile/work_experience.php');?><!--work_exp-->
                        <div class="clearfix"></div>
                         <?php include(APPPATH.'views/general/profile/education.php');?><!--education_summary-->
                        <div class="clearfix"></div>
                         <?php include(APPPATH.'views/general/profile/certification_summary.php');?><!--certification_summary-->
                        <div class="clearfix"></div>
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
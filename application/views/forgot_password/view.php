<br><br>
    	<div class="inner_page_wrap">
        	<div class="container">
            	<div class="row-fluid">
				<div class="col-md-5 col-sm-5">
					<img src="<?= base_url()?>images/goldnet1.jpg" alt="Avatar image" height="180" class="img-circle">
				</div>
                	<div class="col-md-7 col-sm-7">
						
                    	<div class="reg_from">
						<div class="<?=$class?>"><?=$content?></div>
                        	<span class="title1">Forgot Your Password?</span>
							
							 
                          <form method="post" id="frm_signin" action="">
						  
						  <div class="form-group"><label for="userName1">Enter the email address with which you registered your account below and we will send you recovery link to reset your password.</label></div>
              <div class="form-group">
                <label for="userName1"><b>Email*</b></label>
                <input type="text"   id="userName1" name="userName1" class="form-control email required" placeholder="">
				<?php echo form_error('userName1');?>
              </div>
 			  <input type="submit" name="signin_btn" value="Request Password" class="btn btn-default" />
                
            </form>
            	<div class="clearfix"></div><br><br><br><br>
                <div class="clearfix"></div>
				
                        </div><!--sign_in--form-->
                        <!--<div class="thankyou_block">
                        	<p><strong>Congratulation!</strong> You have successfully activated your account on SkillJobsToday. Please Login to Complete your profile to get maximum profile attention.</p>
                            <a class="btn btn-default" href="#">Sign In Here</a>
                        </div>-->                        
                    </div>
                </div>
            </div>        
        </div><!--register_section-->
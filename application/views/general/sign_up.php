<section class="inner_page_wrap">

	<div class="container">
    	<h1 class="title2">Join <?=founder()->name?>. It's fast, easy and free.</h1>
    	<div class="row sign_up_form">
        	<div class="col-md-5">
				<img src="<?= base_url()?>images/goldnet1.jpg" alt="Avatar image" height="180" class="img-circle">
            </div>
            <div class="col-md-7">
            	<?php 
								echo validation_errors() ?>

					<?php echo form_open('signup'); ?>
						<?=$content?>
                  <div class="form-group"><input type="hidden" name="v1" value="" />
				    <input type="text" placeholder="First Name" maxlength="20" autocomplete="off" required type="text" name="fname" class="form-control" value='<?php echo set_value('fname'); ?>' id="exampleInputname">
                  </div>
                  <div class="form-group">
                    <input placeholder="Last Name" required type="text" autocomplete="off" maxlength="20" name="lname" class="form-control" value='<?php echo set_value('lname'); ?>' id="exampleInputLname">
                  </div>
                  <div class="form-group">
                    <input required type="email" placeholder="Email Address" name="username" autocomplete="off" class="form-control" value='<?php echo set_value('username'); ?>' id="exampleInputEmail1">
                  </div>
                  <div class="form-group">
                    <input required type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <input required type="password" name="passconf" class="form-control" id="exampleInputPasswordC" placeholder="Confirm Password">
                  </div>
                  <div class="form-group">
                    <?=$a?> + <?=$b?> = <input maxlength="7" required name="aut" type="text" autocomplete="off" /><input name="c" type="hidden" value="<?=$c?>" />
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> Send me <?=founder()->name?> newsletters, weekly information and advice on all aspects of running my business 
                    </label>
                  </div>
                  <input type="submit" name="send" class="btn grn_btn" value="Sign Up" />
                  <div class="alrdy_mem">Already a member? <a href="<?=base_url() ?>signin">Sign in</a></div>
                </form>
                <div class="clearfix"></div>
                
            </div>
        </div>
    </div>

</section>

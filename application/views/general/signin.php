<br><br>
<section class="inner_page_wrap">

	<div class="container">
    	<h1 class="title2">Join <?=founder()->name?>. It's fast, easy and free.</h1>
    	<div class="row sign_up_form">
        	<div class="col-md-5">
				<img src="<?= base_url()?>images/goldnet1.jpg" alt="Avatar image" height="180" class="img-circle">
            </div>
            <div class="col-md-7">
			<div class="<?=$class?>" onclick="this.style.display = 'none'" align="center"><?=$content?></div>
            	<form action="" method="post">
                  <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputEmail1" name="username" required placeholder="Email">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required placeholder="Password">
                  </div>
                  <input type="submit" name="send" class="btn grn_btn" value="Sign In" />
			 <a href="<?php echo base_url();?>login/forgot_password" class="btn btn-default">Forgot Password?</a>
                </form>
                <div class="clearfix"></div><br><br><br><br>
                <div class="clearfix"></div>
                
            </div>
        </div>
    </div>

</section>

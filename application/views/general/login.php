  <body>
 	<div class="clearfix"></div><p>&nbsp;</p>
   
        <div class="container coxntentpadding">
		<div class="row"><div class="col-sm-3 col-md-3"></div><div class="col-sm-6 col-md-6 boxed  sticky  push-down-45">
		<br>
            <h1>Login Here</h1>
            <span class="italic" style="text-align:left"> 
			 
          <div class="<?=$class?>" onclick="this.style.display = 'none'" align="center"><?=$content?></div>
			 <form action="" method="post" id="sendemail">
			<input id="name" name="username" type="text" class="form-control" required placeholder="User Name Here" /><br>
			 <input name="password" type="password" class="form-control" required  placeholder="Password Here"/><br>
			 <input type="submit" name="send" value="login" class="form-control btn-primary btn" />
			 <!-- <a href="forgot_password" class="form-control btn-primary btn">Forgot password?</a> -->
			 <a href="<?php echo base_url();?>login/forgot_password">Forgot Password?</a>
            </form>
			</span></div><div class="col-sm-3 col-md-3"></div>
            </div>
            <div class="clearfix"></div>
            
        </div> <!-- container -->
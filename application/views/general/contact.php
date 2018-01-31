  <body>    
        <div class="container contentpadding">
		<div class="row">
			<div class="col-sm-8 col-md-8 boxed  sticky  push-down-45">
            <div class="row">
            <div class="col-sm-1 col-md-1"></div>
			<div class="col-sm-10 col-md-10"><br>
			<h1 class="title2">Let's hear from you</h1>

<span class="italic" style="text-align:left"> 
			 
			<div class="<?=$class?>" onclick="this.style.display = 'none'"><?=$content?></div>
			 <form action="" method="post" id="sendemail">
			 <div align="center">
			 <input id="name" name="name" type="text" placeholder="Full Name" class="form-control" required /><br/>
			 <input type="text" id="phone" name="phone" placeholder="Phone Number" class="form-control" /><br/>
			 <input type="email" id="email" name="email" placeholder="Email Address" class="form-control" required /><br/>
			 <textarea id="message" name="message" rows="8" placeholder="Message Here" required class="form-control" style="resize:none;" maxlength="125" ></textarea><br/>
			 
			 <input type="submit" name="send" value="send" class="form-control btn btn-primary" /><p>&nbsp;</p>
			 </div>
            </form>
			</span></div><div class="col-sm-1 col-md-1"></div></div>
			</div>
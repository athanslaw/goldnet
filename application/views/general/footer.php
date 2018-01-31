
<section id="footer" class=" clear">
	<div class="container">
    	<div class="row">
        	<div class="col-sm-4">
            	<h2>Quick Links</h2>
                <ul class="quick_links">
                    	<li><a href="<?=base_url()?>page/about-us"><i class="fa fa-angle-double-right"></i> About Us</a></li>
                    <li><a href="<?=base_url()?>page/faq"><i class="fa fa-angle-double-right"></i> FAQ's</a></li>
                
                    <li><a href="<?=base_url()?>contact"><i class="fa fa-angle-double-right"></i> Contact Us</a></li>
				</ul>
            </div>
            <div class="col-sm-4">
            	<h2>Contact Info</h2>
                <ul class="cont_link">
                    <li><a href="#"><i class="fa fa-envelope"></i> <?=founder()->email?></a></li>
				</ul>
                <ul class="foot_social"><!--
                	<li><a href="#"><i class="fa fa-facebook"></i></a></li>-->
                    <li><a href="https://twitter.com/goldnetconsults"><i class="fa fa-twitter">Twitter</i></a></li><!--
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>-->
                </ul>
            </div>
            <div class="col-sm-4">
            	<h2>Subscribe Our Newsletter</h2>
                <p>Get Latest updates by us on your email.</p>
                <div class="subscribe_box">
					<input type="text" class="subcribe_email" name="email_newsletter" id="email_newsletter" onkeyup="return email_newsletter_remove();" placeholder=" Enter your Email ID"  />
 					<input type="button" class="submit" name="newsletter_btn" value="Subscribe" onclick="return func_newsletter_btn();"/>
					<br><span id="email_newsletter_error" style="display:none;"></span>
				</div>
				
				
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row-fluid copy">
        	<div class="col-md-8 col-sm-8  col-xs-12">
            	&copy;<?=date('Y')?> <?=founder()->name?> , All Rights Reserved.
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
            	<a href="<?=base_url()?>"><img src="<?=base_url()?>images/footer_logo.png" alt=""/></a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</section>



</body>
<script src="<?=base_url()?>js/jquery.min.js"  type="text/javascript"></script><!--Library-->
<script src="<?=base_url()?>js/bootstrap.min.js"></script><!--Bootstrap-->
<script src="<?=base_url()?>js/custom.js" type="text/javascript"></script><!--Custom-->
<script>

function readURL(input) {
  
	if (input.files && input.files[0]) {

		var reader = new FileReader();

		reader.onload = function (e) {
			$('#blah')
				.attr('src', e.target.result) 
				$('#blah').show();
		};

		reader.readAsDataURL(input.files[0]);
	}
}</script>
</html>

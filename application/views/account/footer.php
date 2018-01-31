
<section id="footer" class=" clear">
	<div class="container">
    	<div class="row">
        	<div class="col-md-4">
            	<h2>Quick Links</h2>
                <ul class="quick_links">
                	<li><a href="<?=base_url()?>page/why-goldnet-consult"><i class="fa fa-angle-double-right"></i> Why <?=founder()->name?></a></li>
                    <li><a href="<?=base_url()?>page/faq"><i class="fa fa-angle-double-right"></i> FAQ's</a></li>
				</ul>
                <ul class="quick_links">
                	<li><a href="<?=base_url()?>page/about-us"><i class="fa fa-angle-double-right"></i> About <?=founder()->name?></a></li>
                    <li><a href="<?=base_url()?>contact"><i class="fa fa-angle-double-right"></i> Contact <?=founder()->name?></a></li>
				</ul>
            </div>
            <div class="col-md-3">
            	<h2>Contact Info</h2>
                <ul class="cont_link">
                    <li><a href="#"><i class="fa fa-envelope"></i> <?=founder()->email?></a></li>
				</ul>
                <ul class="foot_social"><!--
                	<li><a href="#"><i class="fa fa-facebook"></i></a></li>-->
                    <li><a href="https://twitter.com/goldnetconsults"><i class="fa fa-twitter"></i></a></li><!--
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>-->
                </ul>
            </div>
            <div class="col-md-5">
            	<h2>Subscribe Our Newsletter</h2>
                <p>Get Latest updates by us on your email.</p>
                <div class="subscribe_box">
				<div class="<?=$class1?>"><?=$content1?></div>
				<form name="newsletterform" action="<?=base_url()?>pages/newsletter" method="post">
                	<input type="email" name="email" class="form-control" value="" placeholder="Your Email ID"/>
                    <input type="button" name="sends" class="form-control btn btn-success" value="Subscribe Now!" />
				</form>
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
<script src="<?php echo base_url();?>js/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/dataTables.bootstrap.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/carousel.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/jquery.datepick.js"></script>
<script src="<?php echo base_url();?>js/jquery.validate.js"></script>
<script src="<?php echo base_url();?>js/owl.carousel.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript">
  	
    $(document).ready(function() {

		$('.recordList_tbl').dataTable({
			"iDisplayLength": 25,
 			"bPaginate": true,
 			"bLengthChange": true,
 			"bFilter": true,
 			"bSort": true,
 			"bInfo": true,
 			"bAutoWidth": true
 		});

		if($('#editor').length > 0){
 			CKEDITOR.replace( 'editor',{height: '200px',}); 
 		} 
 
		$(".fancybox").fancybox({
 	'width' : '90%',
 	'height' : '95%',
 	'autoScale' : false,
 	'transitionIn' : 'elastic',
 	'transitionOut' : 'elastic',
 	'type' : 'iframe'/*,
 	'onClosed': function() {
 	parent.location.reload(true);
 	}*/
 	}); 

 
      $("#owl-demo").owlCarousel({

        autoPlay: 3000,

        items : 5,

        itemsDesktop : [1199,5],

        itemsDesktopSmall : [979,3],

		itemsMobile : [320,1]

      });

	  //$('.datep').datepick ();

	  $( ".datep" ).datepick({ dateFormat: "yy-mm-dd",yearRange: "-100:+0" });
	  
	   $( ".datep1" ).datepick({ dateFormat: "dd/mm/yy",yearRange: "-100:+0" });

		 $("#frm").validate({

		 rules: {

               new_password: {

                 required: true,

      

               } ,



                   confirm_password: {

                    equalTo: "#new_password",

               }

            }

		

		});

		 $("#frm_signin").validate(); 

    });

    </script>
	</html>

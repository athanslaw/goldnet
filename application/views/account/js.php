<script src="<?php echo base_url();?>js/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/dataTables.bootstrap.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/carousel.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/jquery.datepick.js"></script>
<script src="<?php echo base_url();?>js/jquery.validate.js"></script>
<script src="<?php echo base_url();?>js/owl.carousel.js"></script>
<script src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript">
  	
	function fetch_specilization(val){
 
	if(val!=''){
 		$.ajax({
 			url: "<?php echo base_url(); ?>Register/fetch_specilization?id="+val,
 			type: 'post',
 			beforeSend: function(){
 				$('#function_area').html('<option value="">Please wait, loading data...</option>'); 
 			},
 			success: function(response){   
 				$('#function_area').html(response);
 			}
 		});
 	}else{
  		$('#function_area').html('<option value="">Select Specialization</option>');
 	}
 }  
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
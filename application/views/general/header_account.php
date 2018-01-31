<!doctype html>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title><?=$title?></title>
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"><![endif]-->
<link href="<?=base_url()?>images/ico/favicon.png" rel="shortcut icon">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="<?=base_url()?>css/font-awesome.min.css" rel="stylesheet"><!--Font Awesome css-->
<link href="<?=base_url()?>css/bootstrap.min.css" rel="stylesheet"><!--Bootstrap css-->
<link href="<?=base_url()?>css/main.css" rel="stylesheet"><!--Main css-->
<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'>
<link href="<?=base_url()?>css/responsive.css" rel="stylesheet"><!--Responsive css-->
<style>
/**search-section**/
.mouse { left: 50%; margin-left: -10px; position: absolute; top: -20px; z-index: 9; }
#search_section { background-image: url(<?=base_url()?>images/pattern.jpg); padding: 40px 0; padding-top: 50px; position: relative; }
#search_section::before { content: ''; position: absolute; top: 0px; left: 50%; background-image: url(<?=base_url()?>images/curve.png); background-repeat: no-repeat; width: 119px; margin-left: -60px; height: 27px; }
#state_section { background-image: url(<?=base_url()?>images/states_bg.jpg); position: relative; padding: 30px 0; padding-top: 45px; }

</style>
<!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
<![endif]-->
<style type="text/css">*, *:before, *:after { *behavior: url(image/boxsizing.htc);}</style>





<script type="text/javascript">
	function email_newsletter_remove(){
	$('#email_newsletter_error').html(''); 
	}
	
	function func_newsletter_btn(){
		var email_newsletter = $('#email_newsletter').val();
 		$('#email_newsletter_error').show(); 
		if(email_newsletter==''){
				 
			$('#email_newsletter_error').css('color','red');
			$('#email_newsletter_error').html('This field is required!');
		
		}else{
			
			var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
			if (reg.test(email_newsletter)){
			   
				$.ajax({
					url: "<?php echo base_url(); ?>pages/newsletter?email_id="+email_newsletter,
					type: 'post',
					beforeSend: function(){
						$('#email_newsletter_error').html('<img src="<?php echo base_url();?>images/ajax-loading.gif" class="centered"/>'); 
					},
					success: function(response){ 
						if(response==1){
							$('#email_newsletter').val('');  
							$('#email_newsletter_error').css('color','green'); 
							$('#email_newsletter_error').html('<b>Congrats!</b> you have successfully subscribed to our newsletter services.');
						}else{ 
							$('#email_newsletter_error').css('color','red');
							$('#email_newsletter_error').html('<b>Sorry!</b>, this email already exist.');
						}
					}
				});
			   
			}else{
		   
				$('#email_newsletter_error').css('color','red');
				$('#email_newsletter_error').html('Not a valid e-mail address!'); 
				return false;
			}
				
		}
	}
	
	function advancec_search(){
		var key_words = $('#key_words').val();
		var carrer_sum_function_area = $('#carrer_sum_function_area').val();
		var joblevel = $('#joblevel').val();
		var job_type = $('#job_type').val();
		var salary = $('#salary').val();
		var experience = $('#experience').val();
		var state = $('#state').val();
		var carrer_sector = ''; 
		
		window.location = '<?php echo base_url();?>jobs?kw='+key_words+'&carrer_sector='+carrer_sector+'&spec='+carrer_sum_function_area+'&job_level='+joblevel+'&job_type='+job_type+'&salary='+salary+'&experience='+experience+'&state='+state;
		
	}
	
	function advancec_search_job_seeker(){
		
		var function_area = $('#carrer_sum_function_area').val();
		var carrer_sector = '';
		var salary = '';
		var education = ''; 
		var experience = $('#experience').val();
		var state = $('#state').val();
		
		window.location = '<?php echo base_url();?>employer/search_result?spec='+function_area+'&carrer_sector='+carrer_sector+'&experience='+experience+'&state='+state+'&salary='+salary+'&education='+education;
		
	}
	 
</script>
</head>
<body>

<!--header-->
<section id="head">
	<div class="container">
    	<div class="row-fluid">
        	<div class="col-md-2 col-sm-2"><a class="brand-logo" href="<?=base_url()?>"><img src="<?=$logo?>" alt="Goldnet Consult"/></a></div>
            <div class="col-md-10 col-sm-10">
            	<!--Navigation Start-->
                <nav class="navbar navbar-default outer-width" id="navigation">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a href="javascript:void(0);" class="brand-logo hide"><img src="img/goldnetlogo.png" alt="Logo" title="Logo"></a>
                    </div>
                
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav">
                          <li class="<?=$activepage=="index"?"active":"" ?>"><a href="<?=base_url() ?>">Home</a></li>
                          <li class="<?=$activepage=="profile"?"active":"" ?>"><a href="<?=base_url() ?>account/myprofile">My Profile</a></li>
                          <li class="<?=$activepage=="viewadvert"?"active":"" ?>"><a href="<?=base_url() ?>account/mybrand">My Brand</a></li>
                          <li class="<?=$activepage=="addbrand"?"active":"" ?>"><a href="<?=base_url() ?>account/addbrand">Add Brand</a></li>
                          <li class="<?=$activepage=="viewbooks"?"active":"" ?>"><a href="<?=base_url() ?>account/mybooks">My Books</a></li>
                          <li class="<?=$activepage=="addbooks"?"active":"" ?>"><a href="<?=base_url() ?>account/addbook">Upload Books</a></li>
                          <li class="<?=$activepage=="I-Recharge"?"active":"" ?>"><a href="<?=base_url()?>pages/irecharge">I-Recharge</a></li>
						  <li class="add_busi_btn"><a href="<?php echo base_url()?>account/logout">+ Signout</a></li>
                      </ul>      
                    </div><!-- /.navbar-collapse -->
                </nav>
                <!--Navigation Start-->
            </div>
        </div>
    	
    </div>
</section>
<!--header-end--->


</div>
</header>
<!--Header End-->

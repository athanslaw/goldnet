<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= base_url()?>images/ped.png">

    <title><?=$title?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url()?>css/style.css" type="text/css" rel="stylesheet">
    <link href="<?= base_url()?>css/main.css" type="text/css" rel="stylesheet">
    <link href="<?= base_url()?>css/font-awesome.css" type="text/css" rel="stylesheet">
    <!-- Owl Carousel Assets -->
    <link href="<?= base_url()?>css/owl.carousel.css" rel="stylesheet">
    <link href="<?= base_url()?>css/owl.theme.css" rel="stylesheet">
	
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url()?>dist/css/AdminLTE.min.css">
  

  <link rel="stylesheet" href="<?= base_url()?>dist/css/skins/_all-skins.min.css">
  </head>

  <body>
	<nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?= base_url()?>"><img src="<?= base_url()?>images/mainlogo.png" alt="Roger"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="strip">&nbsp;</div>
	<div class="clearfix"></div><br>
	
	
	
	
<!--<body class="hold-transition login-page">-->
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url().'index'; ?>"><b><?=founder()->organization?></b></a>
  </div>
  <!-- /.login-logo -->
  <div class="form-box animated fadeInDown login-box-body">
    <p class="login-box-msg"><?= $content?></p>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username" required="required" oninvalid="setCustomValidity('Please Enter your Username')" 
	onchange="try{setCustomValidity('')}catch(e){}">
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="pass" required="required" 
	oninvalid="setCustomValidity('Please enter your password')" onchange="try{setCustomValidity('')}catch(e){}">
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="login">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.0 -->
<script src="<?= base_url()?>plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?= base_url()?>bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url()?>plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
<script>
        $(document).ready(function() {
            <?php  if(isset($success_msg) && $success_msg!=''){ ?>
		    setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 8000
                };
                toastr.success('', '<?php echo $success_msg;?>');

            }, 1300);

 		<?php } ?>

 		
		<?php  if(isset($error_msg) && $error_msg!=''){ ?>
		 setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 8000
                };
                toastr.error('', '<?php echo $error_msg;?>');

            }, 1300);

 		<?php } ?>
        }); 
		
		function show_toaster(){ 
		
		toastr.options = {
                     "closeButton": true,
  "debug": false,
  "progressBar": true,
  "preventDuplicates": false,
  "positionClass": "toast-top-right",
  "onclick": null,
  "showDuration": "400000",
  "hideDuration": "100000",
  "timeOut": "700000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
                };
                toastr.error('Responsivefdsafdsfads Admin Theme', 'Welcome to INSPINIA');
				
				}
    </script>
</body>
</html>
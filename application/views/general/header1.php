<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="Lathan Info Tech Solutions is a software development company with extensive experience in Web, Desktop, Database Applications and other Software Applications. Our products are developed using latest technologie in the field of ICT for optimized performance and SEO relevance. We develop our applications using various web development and programming technologies such as PHP, Java, Python, RoR, C++, C#, J2EE, JSE, HTML5 among others">
    <meta name="keywords" content="IT Company, ICT Firm, Information and Communication Technology, LITS, Lathan, Info Tech, ICT Consultancy Services, Rivers State, Port Harcourt, Nigeria, Software development firm, programming company">    <meta name="author" content="Lathan InfoTech Solutions">
    <link href="<?=$favicon?>" rel="shortcut icon">

    <title><?=$title?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>css/style.css" type="text/css" rel="stylesheet">
    <link href="<?=base_url()?>css/font-awesome.css" type="text/css" rel="stylesheet">
    <!-- Owl Carousel Assets -->
    <link href="<?=base_url()?>css/owl.carousel.css" rel="stylesheet">
    <link href="<?=base_url()?>css/owl.theme.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../images/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?=base_url()?>js/ie-emulation-modes-warning.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=1644179805910204";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><img src="<?=$logo?>" alt="Lathan" height="60px"></a>

        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?=base_url()?>">Home</a></li>
            <li><a href="<?=base_url()?>products">Services</a></li>
            <li><a href="<?=base_url()?>about">About Us</a></li>
            <li><a href="<?=base_url()?>projects">Recent Projects</a></li>
            <?php foreach($pagess as $page){?>
            <li><a href="<?php echo base_url()?>page/<?=$page->slug ?>"><?=ucfirst($page->page_title) ?></a></li>
			<?php }?>
            <li><a href="<?=base_url()?>contact">Contact</a></li>
            <li><a href="<?=base_url()?>blog">Blog</a></li>
            
          </ul>
        </div><!--/.nav-collapse -->
		<div class="strip">&nbsp;</div>
      </div>
    </nav>
	
	
	<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
	<div class="clearfix"></div>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 if( !function_exists('send_mail') ) {
	 
 function send_mail($to,$message,$title,$status,$subject) {
	   	
		//$this->load->library('My_PHPMailer');
		  
		$from_title = 'GoldNet Consult - Portal';
        $mail = new PHPMailer();
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
       // $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
	   
        $mail->Host       = "mail.goldnet.com.ng";      // setting GMail as our SMTP server
        $mail->Port       =  "25";                   // SMTP port to connect to GMail
        $mail->Username   = "no-reply@goldnet.com.ng";  // user email address
        $mail->Password   = "5HNB,r-^q?xU";            // password in GMail
        $mail->SetFrom('no-reply@goldnet.com.ng', $from_title);  //Who is sending the email
        //$mail->AddReplyTo("athans4sure@gmail.com",$title);  //email address that receives the response
		
        $mail->Subject    = $subject;
		$messagetop = '<div style="border-style:ridge; padding:2px; width:560px"><a href="http://goldnet.com.ng">
			<div class="widget-author__image-container">
				<div class="widget-author__avatar--blurred">
					<img src="'.base_url().'images/goldnet2.jpg" alt="Avatar image" width="100%">
				</div>
			</div></a><div class="boxed  sticky  push-down-45">
				
					<div class="row">
						<div class="col-xs-10  col-xs-offset-1">
						<section id="state_section" class="clear">
							<h1 class="title2" style="color:#63c">'.$subject.'</h1>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="business_block">
							'.$message.'
							</div>
							</div>
						</section>
								</div>
							</div>
				</div></div>';
        $mail->Body      = $messagetop;
        $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
		//$mail->AddEmbeddedImage(base_url().'assets/Frontend/images/logo.png', 'logo_2u');
		
        $mail->AddAddress($to, $title);

         //$mail->AddAttachment("images/phpmailer.gif");      // some attached files
      //  $mail->AddAttachment("images/phpmailer_mini.gif"); // as many as you want
        if(!$mail->Send()) {
             $data["message"] = "Error: " . $mail->ErrorInfo;
			  
        } else {
            $data["message"] = "Message sent correctly!";
			 
        } 
       // $this->load->view('sent_mail',$data);
	  // die;
    }
	
 }
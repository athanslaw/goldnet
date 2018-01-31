<link href="<?=base_url()?>css/main1.css" rel="stylesheet">
<body><style>
p{text-align:left}
</style>
	<div class="container">
			<div class="row">
			  <div class="col-xs-12  col-md-8">
				<div class="boxed  sticky  push-down-45">
		
                         <div class="thankyou_block">
                            <p><strong>Congratulation!</strong> Thank you for your order. Kindly download the book below.</p> 
                        </div> 
						
							<div class="row">
								<div class="col-xs-10  col-xs-offset-1">
									<div class="post-content--front-page">
										<h2 class="front-page-title">
										<a href="#"><?php  echo $post->title ?></a>
										</h2>
                                        <p align="left">
											<?php echo $post->message ?>
										</p>
										<?php if($post->paid_status) { ?><p align="left">
											Amount: <?php echo $post->amount;
										}?>
										</p>
										<p>
											<div class="fb-like" data-href="<?= base_url().'article/'.$post->slug?>" data-layout="button_count"
											data-action="like" data-show-faces="true" data-share="true"></div>
											
										</p>
									</div>
								 <div class="<?=$class?>" onclick="this.style.display = 'none'"><?= $content?></div>
									
									
								</div>
							</div>
				</div>

					 
					</div>
 

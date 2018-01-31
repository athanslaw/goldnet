<link href="<?=base_url()?>css/main1.css" rel="stylesheet">
<body><style>
p{text-align:left}
</style>
	<div class="container">
			<div class="row">
			  <div class="col-xs-12  col-md-8">
				<div class="boxed  sticky  push-down-45">
				<?php  if($post->pix != '0') { ?>
					<div class="meta">
					  <img class="wp-post-image" src="<?php echo base_url()?>images/blog/books/coverpage/<?=$post->pix?>" alt="" width="748">
							<div class="meta__container">
								<div class="row">
									<div class="col-xs-12  col-sm-8">
										<div class="meta__info">
										<span class="meta__author"><img src="<?php echo base_url()?>images/blog/dummy-licensed/blog.jpg" alt="" width="30" height="30"> <a href="#"><?=founder()->short_name?></a> in <a href="#">News</a> </span>
										<span class="meta__date"><span class="fa fa-calendar"></span> &nbsp; <?php echo $post->id?></span>
										</div>
									</div>
										<div class="col-xs-12  col-sm-4">
											<div class="meta__comments">
												<span class="fa fa-comment"></span> &nbsp;
												<a href="single-post.html#disqus_thread"></a>
											</div>
										</div>
								</div>
							</div>
					</div>

					<div class="sticky__box">
						<span class="sticky__circle"></span>
						<span class="sticky__circle"></span>
						<span class="sticky__circle"></span>
						<span class="sticky__circle"></span>
					</div>
					<?php 
						}else{echo '<br><br>';}
							?>
		
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
											Amount: <?php echo "#".$post->amount;
										}?>
										</p>
										<p>
											<div class="fb-like" data-href="<?= base_url().'article/'.$post->slug?>" data-layout="button_count"
											data-action="like" data-show-faces="true" data-share="true"></div>
											
										</p>
									</div>
								 <div class="<?=$class?>" onclick="this.style.display = 'none'"><?= $content?></div>
<?php if(isset($_SESSION['userid'])){ 
	if($post->paid_status && $checkpaid < 1){ ?>
		<form action="https://voguepay.com/pay/" method="post">
			<input type="hidden" name="v_merchant_id" value="8043-0058794" />
			<input type="hidden" name="item_1" value="<?php  echo "Payment for ".$post->title ?>" />
			<input type="hidden" name="price_1" value="<?=$post->amount ?>" />
			<input type='hidden' name='developer_code' value='pq7778ehh9YbZ' />
			<input type="hidden" name="total" value="<?=$post->amount?>" />
			<input type="hidden" name="merchant_ref " value="<?=$url ?>" />
			<input type="hidden" name="description_1" value="<?="Payment for ".$post->title ?> at <?=$post->amount?>" />
			<input type="hidden" name="memo" value="Payment for <?=$post->title ?>" />
			<input type='hidden' name='developer_code' value='588200063d357' />
			<input type='hidden' name='notify_url' value='http://www.goldnet.com.ng/notification' />
			<input type='hidden' name='success_url' value='http://www.goldnet.com.ng/notification' />
			<input type='hidden' name='fail_url' value='<?="http://www.goldnet.com.ng/article/".$url ?>' />

			<input type="image" style="border: 0;" name="submit" src="http://voguepay.com/images/buttons/buynow_blue.png" alt="Pay with VoguePay" />
		</form>
	<?php } else{ ?><a href="<?= base_url().'images/blog/books/documents/'.$post->document_name?>" target="_blank" class="btn" style="background-color:#000045; color:white" name="comment">Download</a>
	<?php } ?>
<?php } else{ ?>
<a href="<?=base_url()."signin".'?dest='.urlencode($_SERVER['REQUEST_URI']) ?>" class="btn btn-warning">Sign in to view and Download</a>
<?php } ?>
									
									
								</div>
							</div>
				</div>

					 
					</div>
 

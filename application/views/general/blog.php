<link href="<?=base_url()?>css/main1.css" rel="stylesheet">
<style>
p{text-align:left}
</style>
<body>
	<div class="container">
			<div class="row">
			  <div class="col-xs-12 col-md-8">
			  <?php foreach($posts as $post){ ?>
				<div class="boxed  sticky  push-down-45">
				<?php  if($post->pix != '0') { ?>
					<div class="meta">
					  <a href="<?= base_url().'article/'.$post->slug?>"><img class="wp-post-image" src="<?php echo base_url()?>images/blog/books/coverpage/<?=$post->pix?>" alt="<?=$post->title?>"></a>
							<div class="meta__container">
								<div class="row">
									<div class="col-xs-12  col-sm-8">
										<div class="meta__info">
										<span class="meta__author"><img src="<?php echo $favicon?>" alt="Meta avatar" width="30" height="30"> </span>
										<span class="meta__date"><span class="fa fa-calendar"></span> &nbsp; <?php echo isset(category_details($post->category)->name)?(category_details($post->category)->name):''; ?></span>
										</div>
									</div>
										<div class="col-xs-12  col-sm-4">
										<div class="meta__comments">
										<span class="fa fa-comment"></span> &nbsp;
										<a href="#"></a>
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
										<a href="<?= base_url().'article/'.$post->slug?>"><?php  echo $post->title ?></a>
										</h2>
										<div class="fb-like" data-href="<?= base_url().'article/'.$post->slug?>" data-layout="button_count"
											data-action="like" data-show-faces="true" data-share="true"></div>
									</div>
								 
								<a href="<?= base_url()?>article/<?=$post->slug ?>">
									<div class="read-more">
										Continue reading
										<div class="read-more__arrow">
										<span class="fa fa-chevron-right"></span>
										</div>
									</div>
								</a>
								</div>
							</div>
				</div>

<?php  } ?>
					 
					</div>
 
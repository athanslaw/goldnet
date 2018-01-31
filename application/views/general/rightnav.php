<div class="col-xs-12  col-md-4">

		<div class= " boxed sticky push-down-45">
		<div class="widget-author  boxed  push-down-30"><a href="#">
			<div class="widget-author__image-container">#
				<img class="widget-author__avatar" src="<?= base_url()?>images/goldnet1.jpg" alt="Avatar image" width="180" height="90">
			</div>
			<div class="row">
				<div class="col-xs-10  col-xs-offset-1">
					<h4><img src="<?=base_url()?>images/lathanmotto.gif" height="20px" /></h4>
					<p style="text-align:center"><?=founder()->organization?></p>
						</div>
						</div></a>
					</div>
					</div>
					
					<?php if($showpostupdate){ ?>
					<div class= "boxed sticky push-down-45">
						<div class="sidebar  boxed  push-down-30">
						<div class="row">
						<div class="col-xs-10  col-xs-offset-1">
 
											<div class="widget-posts  push-down-30">
											<h6>Recent</h6>
											 
											<ul class="nav  nav-tabs">
											<li class="active">
											<a href="#recent-posts" data-toggle="tab"> <span class="fa fa-spinner fa-spin"></span> &nbsp;Recently Published </a>
											</li>
											
											</ul>
											 
											<div class="tab-content">
											<div class="tab-pane  fade  in  active" id="recent-posts">
											<?php 
											$i = 0;
											foreach($recentpost as $recentpost){ 
											$i+= 1;
											if($i <= 3){?>
											<br/><div class="push-down-15">
											<?php  if($recentpost->pix != '0') { ?>
											<img src="<?php echo base_url()?>images/blog/books/coverpage/<?=$recentpost->pix?>" alt="" width="93" height="127">
											<?php }?>
											<a href="<?php echo base_url().'article/'. $recentpost->slug?>"><h5><?=$recentpost->title?></h5>
											<span class="widget-posts__time"><?=$recentpost->author_name?></span></a>
											</div><br><hr />
											<?php }} ?>
											</div>
											<div class="tab-pane  fade" id="popular-posts">
											
											<?php foreach($popularpost as $popularpost){?>
											<br/><div class="push-down-15">
											<?php  if($popularpost->pix != '0') { ?>
											<img src="<?php echo base_url()?>images/blog/books/coverpage/<?=$popularpost->pix?>" alt="image" width="93" height="127">
											<?php }?>
											<a href="<?php echo base_url().'article/'. $popularpost->slug?>"><h5><?=$popularpost->title?></h5>
											<span class="widget-posts__time"><?=getName($popularpost->posted_by)?></span></a>
											</div>
											<?php }?>
											
											</div>
											</div>
											</div>




										<div class="tags  widget-tags">
										<br><h6>Books Categories</h6>
										<hr>
										<?php foreach($postcategory as $postcategory){
											if(count(getPostCountByCategory($postcategory->id)) <1) continue; ?>
										<a href="<?php echo base_url().'books/'.$postcategory->id; ?>" class="tags__link"> <?php echo $postcategory->name?></a>
										<?php }?>
										</div>
 							
							<div class="social-icons  widget-social-icons  push-down-30">
							<h6>Social Icons</h6>
							<a href="#" class="social-icons__container"> <span class="fa fa-facebook"></span> </a>
							<a href="#" class="social-icons__container"> <span class="fa fa-twitter"></span> </a>
							<a href="#" class="social-icons__container"> <span class="fa fa-youtube"></span> </a>
							<a href="#" class="social-icons__container"> <span class="fa fa-github"></span> </a>
							
							</div>
					</div>
				</div>
		</div>
					</div><?php } ?>
		</div>
</div>
</div>
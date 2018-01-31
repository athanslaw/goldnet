<div class="col-xs-12  col-md-4" style="border: 2px solid #dfdfdf; padding: 2px; border-radius:5px">

		<div class= "boxed sticky push-down-45">
		<div class="widget-author  boxed  push-down-30"><a href="#">
			<div class="widget-author__image-container">
				<div class="widget-author__avatar--blurred">
					<img src="<?= base_url()?>images/goldnet2.jpg" alt="Avatar image" height="160">
				</div>
			</div></a>
					</div>
					</div>
					
					<?php if($showpostupdate){ ?>
					<div>
						<div class="sidebar  boxed  push-down-30">
						<div class="row">
						<div class="col-xs-10  col-xs-offset-1">
						
											<div class="widget-posts  push-down-30">
											
											 
											<ul class="nav  nav-tabs">
											<li class="active">
											<a href="#recent-posts" data-toggle="tab"> <span class="fa fa-spinner fa-spin"></span> &nbsp;Premium Ads </a>
											</li>
											
											</ul>

											<div class="tab-content">
											<div class="tab-pane  fade  in  active" id="recent-posts">
											
											
											<div class="mySlides">
	
		<?php
		$i = 0;
		foreach($adverts as $advert){
			if($i % 3 == 0 && $i > 0){?></div><div class="mySlides"><?php }
			
		?>
    	
											<hr/><div class="push-down-15">
											<table><tr><td valign="top" style="width:100px"><?php  if($advert->image != '0') { ?>
											<img src="<?=base_url()?>images/blog/advert/thumbnails/<?=$advert->image?>" alt="" class="w3-animate-bottom" width="100px" style="padding-right:3px" title="<?=$advert->description?>">
											<?php }?></td><td valign="top">
											<a href="<?=$advert->link ?>" title="<?=$advert->description?>" target="_blank">
											<h5><?=$advert->title?></h5></a>
											<span><?= word_limiter($advert->description,8); ?></span>
											</td></tr></table>
											</div>
		<?php 
			
			$i += 1; 
		}?>
    </div>
	
											</div>
											</div>
											</div>


					</div>
				</div>
		</div>
					</div><?php } ?>
		</div>
</div>
</div>


<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 10500);    
}
</script>

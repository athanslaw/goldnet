
<section id="advert_section" class="container clear">
	<ul class="ads">
		<?php
		//$no = 0;
		foreach($adverts as $advert){
		?>
    	<li><a href="<?=$advert->link?>" title="<?=$advert->title?>" target="_blank"><img class="img-responsive" style="height:140px" src="<?=base_url()?>images/blog/advert/thumbnails/<?=$advert->image?>" alt=""/></a></li>
    	<!--<li><a href="#"><img class="img-responsive" src="<?=base_url()?>images/img1.png" alt=""/></a></li>-->
		<?php 
		}?>
    </ul>
</section>

<section id="green_box" class=" clear">
	<div class="container">
    	<h1>Find Or Add Your Brand Today!</h1>
        <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam convallis interdum neque ac molestie.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam convallis interdum neque ac molestie.</p>-->
        <a class="ylw_btn" href="<?=base_url()?>account/addbrand">+ Add Brand</a>
    </div>
</section>

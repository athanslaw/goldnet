<script>

	function searchbrand(){

		val = document.getElementById('find1').value+"";
		if(val != ""){
			window.location = '<?php echo base_url();?>deals?property='+val+'';
		}else{
			window.location = '<?php echo base_url();?>deals';
		}
	}
	
</script>
<!--Slider Section Start-->
<section id="slider-wrap" class="clear">
<div class="slider-inner outer-width">

<!--Main Slider start-->
<div id="slider" class="carousel slide" data-ride="carousel">

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="<?=base_url()?>/images/goldnetbanner4.jpg" alt="Slider Image">
      <div class="carousel-caption">
        <div class="big_txt"><span>Promote</span> your Brand <br><span>Market</span> Yourself <br><span>Get</span> Informed</span></div>
        <br><a href="<?=base_url() ?>signup" class="grn_btn">Join today & add your brand</a>
      </div>
    </div>
    <div class="item">
      <img src="<?=base_url()?>/images/slider_img1.jpg" alt="Slider Image">
      <div class="carousel-caption">
        <div class="big_txt"><span>What</span> Value <br>do you<span> Bring</span>  <br><span>to the</span> Market?</span></div>
        <br><a href="<?=base_url() ?>signup" class="grn_btn">Join today & Sell yourself</a>
      </div>
    </div>
    <div class="item">
      <img src="<?=base_url()?>/images/books12.jpg" alt="Slider Image">
      <div class="carousel-caption">
        <div class="big_txt"><span>Free</span> books <br>
		Sell <span>your books</span> here<br>at no <span>Cost</span></div>
        <br><a href="<?=base_url() ?>books/" class="grn_btn">Download Now</a>
      </div>
    </div>
     
  </div>
  
  <!--Controls -->
  <!--<div class="controls-wrap">
      <a class="left carousel-control" href="#slider" role="button" data-slide="prev">
        <i class="fa fa-chevron-circle-left"></i>
      </a>
      <a class="right carousel-control" href="#slider" role="button" data-slide="next">
        <i class="fa fa-chevron-circle-right"></i>
       </a>
	</div>-->
	<!--Controls End-->    
    
</div>
<!--Main Slider end-->

</div>
</section>
<!--Slider Section End-->

<section id="search_section" class="clear">
	<a class="mouse" href="#search_section"><img src="<?=base_url()?>images/mouse_icon.png" alt=""/></a>
	<div class="container">
    	<h1 class="title">Africa's Global Marketer</h1>
        <span class="sub-title">Find great products around the corner and across the World.</span>
    	<div class="search_box">
        	<form class="form-inline">
                <input type="text" class="form-control" id="find1" placeholder="Find Brands: Enter key words">
                <!--<input type="text" placeholder="Professional Profiles" id="find2" class="form-control">-->
              <a onclick="searchbrand()" class="btn green_btn">Search</a>
            </form>
        </div>
        <div class="btns_block">
        	<a class="green_btn" href="<?=base_url()?>account/addbrand">+ Add My Brand</a>
            <a class="black_btn" href="<?=base_url()?>page/learn-more">Learn More</a>
        </div>
    </div>
</section>


<section id="sector_section" class="clear">
	<div class="container">
	<div class="row-fluid">
    	<div class="col-md-12">
        	<h1 class="title2">Access our Online Book Store by Category</h1>
        </div>
		
		
		<?php $ttlNo = ceil(count($categories)/4); ?>
		
    	<div class="col-md-3 col-sm-6 col-xs-6">
        	<ul class="sector_list">
				<?php
					for($i = 0; $i < $ttlNo; $i += 1){
						if(isset($categories[$i]['id'])){
				?>
                <li><a href="<?php echo base_url().'books/'.$categories[$i]['id']; ?>"> <?=$categories[$i]['name'] ?><span>(<?=count(getPostCountByCategory($categories[$i]['id']))?>)</span></a></li>
				<?php }
					}
				?>
           </ul>
        </div>
		
    	<div class="col-md-3 col-sm-6 col-xs-6">
        	<ul class="sector_list">
				<?php
				if($ttlNo >= 1)
					for($i = $ttlNo; $i < $ttlNo*2; $i += 1){
						if(isset($categories[$i]['id'])){
				?>
                <li><a href="<?php echo base_url().'books/'.$categories[$i]['id']; ?>"> <?=$categories[$i]['name'] ?><span>(<?=count(getPostCountByCategory($categories[$i]['id']))?>)</span></a></li>
						<?php }
					}?>
           </ul>
        </div>
		
    	<div class="col-md-3 col-sm-6 col-xs-6">
        	<ul class="sector_list">
				<?php
				if($ttlNo >=2)
					for($i = $ttlNo*2; $i < $ttlNo*3; $i += 1){
						if(isset($categories[$i]['id'])){
				?>
                <li><a href="<?php echo base_url().'books/'.$categories[$i]['id']; ?>"> <?=$categories[$i]['name'] ?><span>(<?=count(getPostCountByCategory($categories[$i]['id']))?>)</span></a></li>
						<?php }
					}?>
           </ul>
        </div>
		
    	<div class="col-md-3 col-sm-6 col-xs-6">
        	<ul class="sector_list">
				<?php
				if($ttlNo >=3)
					for($i = $ttlNo*3; $i <= $ttlNo*4; $i += 1){
						if(isset($categories[$i]['id'])){
				?>
                <li><a href="<?php echo base_url().'books/'.$categories[$i]['id']; ?>"> <?=$categories[$i]['name'] ?><span>(<?=count(getPostCountByCategory($categories[$i]['id']))?>)</span></a></li>
						<?php }
					}?>
           </ul>
        </div>
     <div class="clearfix"></div>
    </div>
    </div>
</section>

<div class="row"><div class="col-sm-8 col-md-9">
<!-- deals section starts -->		
<section id="state_section" class="clear">
	<div class="container">
	<div class="row">
    	<div class="col-md-12">
        	<h1 class="title2">Recommended Links</h1>
        </div>
		<?php
			$dealscount = 0;
					foreach($deals as $deal){
						$dealscount += 1;
				?>
		<div class="col-sm-4 col-md-3 col-xs-4">
		
			<div class="business_block">
			<a href="<?php echo $deal->url; ?>" target="_blank"><img class="img-responsive" src="<?=$deal->image_url ?>" style="height:120px" alt=""/></a>
            </div><!--business_block-->
		</div>
					<?php } ?>
        
     <div class="clearfix"></div>
    </div>
    </div>
</section>


<section id="advert_section" class="container clear">
	<div class="mySlides">
	<ul class="ads">
		<?php
		$no = 0;
		foreach($adverts as $advert){
			if($no % 4 == 0 && $no > 0){?></ul></div><div class="mySlides"><ul class="ads"><?php }
		?>
    	<li><a href="<?=$advert->link?>" title="<?=$advert->title?>" target="_blank"><img class="img-responsive w3-animate-top" style="height:120px" src="<?=base_url()?>images/blog/advert/thumbnails/<?=$advert->image?>" alt=""/></a></li>
    	<!--<li><a href="#"><img class="img-responsive" src="<?=base_url()?>images/img1.png" alt=""/></a></li>-->
		<?php
			$no += 1; 
		}?>
    </ul></div>
</section>


</div><div class="col-sm-4 col-md-2">
<!-- IRecharge -->		
<section class="clear">
	<div class="container">
	<div class="row-fluid">
    	<div class="col-md-12">
        	<iframe src="http://irecharge.goldnet.com.ng" width = "350" height = "745"><a href="http://irecharge.goldnet.com.ng">IRecharge</a></iframe>
        </div>
        
     <div class="clearfix"></div>
    </div>
    </div>
</section>
<!-- IRecharge -->
</div></div>
<section id="green_box" class=" clear">
	<div class="container">
    	<h1>Find Or Add Your Brand Today!</h1>
        <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam convallis interdum neque ac molestie.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam convallis interdum neque ac molestie.</p>-->
        <a class="ylw_btn" href="<?=base_url()?>account/addbrand">+ Add Brand</a>
    </div>
</section>


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
    setTimeout(carousel, 7500);    
}
</script>


			  
	<div class="container">
		<div class="row-fluid">
			<div class="col-xs-12  col-md-8">
			<div class="col-md-12">
				<section id="state_section" class="clear">
        	<h1 class="title2">Recommended Links</h1>
        </div>
		<?php
			$dealscount = 0;
					foreach($deals as $deal){
						$dealscount += 1;
				?>
		<div class="col-md-2 col-sm-4 col-xs-4">
		
			<div class="business_block">
			<a href="<?php echo $deal->url; ?>" target="_blank"><img class="img-responsive" src="<?=$deal->image_url ?>" style="width:120px" alt=""/></a>
            </div><!--business_block-->
		</div>
					<?php } ?>
        
			</section>
    </div>


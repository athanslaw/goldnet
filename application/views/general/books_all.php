
<section class="inner_page_wrap">

	<div class="container">
    		
    	<div class="row business_listing">
        	<div class="col-md-8">
            	<?php foreach($category as $category){if(count(getPostCountByCategory($category->id)) <1) continue; ?>
            	<div class="page_details">
                <h1><?=$category->name ?></h1>
                <div class="page_result">GoldNet has <strong><?= count(getPostCountByCategory($category->id)) ?></strong> document(s) under <?=$category->name ?></div>
                </div>
                
                <h1 class="title2"><?=$category->name ?></h1>
				<?php $books = getPostCountByCategory($category->id);
				foreach($books as $books){ ?>
                <div class="business_block">
                	<div class="busi_pic"><?php if($books->pix != '0'){ ?>
					<a href="<?= base_url().'article/'.$books->slug?>"><img class="img-responsive" src="<?=base_url()?>images/blog/books/coverpage/<?=$books->pix ?>" alt=""/></a><?php } ?></div>
                    <div class="busi_details" style="width:300px">
                    	<div class="busi_name"><a href="<?= base_url().'article/'.$books->slug?>"><?=$books->title ?></a></div>
                        <div class="busi_address"><?=$books->message ?></div>
						<ul class="busi_contact">
                            <li><i class="fa fa-envelope"></i> authoremail</li>
                            <li><i class="fa fa-link"></i> <a href="#">author site</a></li>
                        </ul>
                    </div>
                    <div class="rating">
                    	<span class="verified"><img src="<?=base_url()?>images/goldnet_verified.png" alt="GoldNet Verified"/> GoldNet Verified</span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                    <!--<div class="clearfix"></div>-->
                </div>
				<?php } ?><!--business_block-->
                
                <div class="clearfix"></div>
				<?php } ?>
                <ul class="pagination"> <li class="disabled"><a aria-label="Previous" href="#"><span aria-hidden="true">«</span></a></li> <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li> <li><a href="#">2</a></li> <li><a href="#">3</a></li> <li><a href="#">4</a></li> <li><a href="#">5</a></li> <li><a aria-label="Next" href="#"><span aria-hidden="true">»</span></a></li> </ul>
            </div>
            <div class="col-md-4">
            	<div class="side_filter">
                	<div class="fil_title">Filter documents by category</div>
                    <ul class="states_listing">
					<?php foreach($categories as $categories){ 
					if(count(getPostCountByCategory($categories->id)) <1) continue; ?>
                    <li><a href="<?php echo base_url().'books/'.$categories->id; ?>"><?=$categories->name?> <span>[<?=count(getPostCountByCategory($categories->id))?>]</span></a></li>
					<?php } ?>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    
</section>

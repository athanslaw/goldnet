
      <div class="row">
        <div class="col-sm-12">
          
              
              

    <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
        <div class="col-sm-12">
		
			<div class="<?=$class?>"><?=$content?></div>
			<form action = "" method="post" name="frm">
				
				<div class="col-sm-1"></div>
				<div class="table-responsive col-sm-10">
				<div class="alert h1">My Books</div>
				<table class="table table-over">
					<tr>
						<th>SNO</th>
						<th>Cover Page</th>
						<th>Book Title</th>
						<th>Book Review</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
					<?php $no = 0; foreach($posts as $advert){ $no+=1;?>
					<tr>
						<td><b><?=$no?>.</b> 
						</td>
						<td>
							<img class="wp-post-image" src="<?php echo base_url()?>images/blog/books/coverpage/<?=$advert->pix?>" alt="" width="148">
						</td>
						<td><label for="<?= $advert->id?>"><?= $advert->title?></label></td>
						<td><label for="<?= $advert->id?>"><?= $advert->message?></label></td>
						<td><?= $advert->status==1?'Published':'Pending'?></td>
						<td>
							<a href="editbook/<?php  echo $advert->slug ?>"><img src="<?=base_url().'images/edit.png'?>" title="edit this book" height="16"/></a>
						</td>
					</tr>
					<?php  } ?>
					
					<tr>
						<td colspan="6"><?= $no ?> records found</td>
					</tr>
				</table>
				</div>
				<div class="col-sm-1"></div>
		</form>
	</div>
	</div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
    
	</div>

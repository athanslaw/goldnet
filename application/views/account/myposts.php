<section class="content-header">
      <h1>My Books</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Manage Books</a></li>
        <li><a href="#">View my Books</a></li>
      </ol>
</section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-sm-12">
          
              
              

    <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
        <div class="col-sm-12">
		
			<div class="<?=$class?>"><?=$content?></div>
			<form action = "" method="post" name="frm">
								
				<div class="row bg-gray-active">
					<div class="col-sm-1"></div>
					<div class="col-sm-4"><h4><b>Image</b></h4></div>
					<div class="col-sm-4"><h4><b>Book Title</b></h4></div>
					<div class="col-sm-2"><h4><b>Status</b></h4></div>
					<div class="col-sm-1"><h4><b>Action</b></h4></div>
				</div><br>
				<?php $no = 0; foreach($posts as $post){ $no+=1;?>
				<div class="boxed  sticky  push-down-45">
					<div class="row">
						<div class="col-sm-1"><b><?=$no?>.</b> <span style="float:right"><input name="post_id[]" value="<?= $post->id?>" id="<?= $post->id?>" type="checkbox" /></span></div>
						<div class="col-sm-4"><?php  if($post->pix != '1') { ?>
							<img class="wp-post-image" src="<?php echo base_url()?>images/blog/books/coverpage/<?=$post->pix?>" alt="" width="148"><?php }?>
						</div>
						<div class="col-sm-4"><label for="<?= $post->id?>"><?= $post->title?></label></div>
						<div class="col-sm-2"><?= $post->status==1?'Published':'Not Published'?></div>
						<div class="col-sm-1">
						<a href="<?php echo base_url().'admin/myposts/delete/'.$post->id; ?>" onclick="return confirm('You are about to delete a post. Click ok to  continue')">delete</a> 
						<br><a href="<?=base_url().'editpost/'.$post->slug ?>">edit</a><br>
						<a href="<?=base_url().'admin/article/'.$post->id ?>">comments</a></div>
					</div>
					</div><hr />
				<?php  } ?><div class="row">
					<div class="col-sm-4"><input type='submit' value='delete' name='delete' /> <a href="#"><input type='submit' value='deactivate' name='deactivate' /></div></div>
			</form>
        </div>            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
    
    
    
                </div>
                <!-- /.post -->
                </div>
                <!-- /.post -->

              </div>

              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
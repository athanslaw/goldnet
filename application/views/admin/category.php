<section class="content-header">
      <h1>View Categories</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Manage Post Categories</a></li>
        <li><a href="#">View Categories</a></li>
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
								<form action = "" method="post" name="frm">
		<div class="row">
						<div class="col-sm-8"></div><div class="col-sm-4"><a href="<?=base_url().'admin/addcategory'?>" class="btn btn-primary form-control">Add Category</a></div></div>
								<div class="<?=$class?>"><?=$content?></div>
								
									<div class="row bg-gray-active">
									<div class="col-sm-1"></div>
									<div class="col-sm-3"><h4><b>Category Title</b></h4></div>
									<div class="col-sm-5"><h4><b>Description</b></h4></div>
									<div class="col-sm-2"><h4><b>Status</b></h4></div>
									<div class="col-sm-1"><h4><b>Action</b></h4></div>
									</div><br>
									<?php $no = 0; foreach($category as $category){ $no+=1;?>
									<div class="boxed  sticky  push-down-45">
									<div class="row">
									<div class="col-sm-1"><label for="<?= $no?>"><?= $no?></label></div>
									<div class="col-sm-3"><label for="<?= $category->name?>"><?= $category->name?></label></div>
									<div class="col-sm-5"><label for="<?= $category->description?>"><?= $category->description?></label></div>
									<div class="col-sm-2"><?= $category->status==1?'Active':'Not Active'?></div>
									<div class="col-sm-1">
									<a href="<?=base_url().'admin/viewcategory/changestatus/'.$category->id ?>" onclick="return confirm('You are about to <?= $category->status==1?'Deactivate':'Activate'?> this Category. Click ok to  continue')"><?= $category->status==1?'<img src="'. base_url().'images/minus.gif" height="16" title="Deactivate"/>':'<img src="'. base_url().'images/plus.gif" height="16" title="Activate"/>'?></a> 
									<br><a href="<?=base_url()?>admin/editcategory/<?php  echo $category->id ?>"><img src="<?=base_url().'images/edit.png'?>" title="edit this category" height="16"/></a></div>
									</div></div><hr />
						<?php  } ?><div class="row">
						<div class="col-sm-8"></div><div class="col-sm-4"><a href="<?=base_url().'admin/addcategory'?>" class="btn btn-primary form-control">Add Category</a> </div></div>
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
  
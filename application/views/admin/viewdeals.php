<section class="content-header">
      <h1>View Deals</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Manage Deals</a></li>
        <li><a href="#">View Deals</a></li>
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
						<div class="col-sm-8"></div><div class="col-sm-4"><a href="<?=base_url().'admin/adddeals'?>" class="btn btn-primary form-control">Add Deals</a></div></div>
								<div class="<?=$class?>"><?=$content?></div>
									<div class="table-responsive">
									<table class="table table-hover table-strip">
									<tr><th>SNO</th>
									<th>Org. Title</th>
									<!--<th>Date Range</th>-->
									<th>Url</th>
									<th>Image URL</th>
									<th>Status</th>
									<th>Action</th>
									</tr>
									<?php $no = 0; foreach($deals as $deal){ $no+=1;?>
									<tr>
									<td><label for="<?= $no?>"><?= $no?></label></td>
									<td><label for="<?= $deal->id?>"><?= $deal->org_name?></label></td>
									<!--<td><label for="<?= $deal->id?>"><?= $deal->date_from ." to " . $deal->date_to?></label></td>-->
									<td><label for="<?= $deal->id?>"><?= $deal->url?></label></td>
									<td><label for="<?= $deal->id?>"><?= $deal->image_url ?></label></td>
									<td><?= $deal->status==1?'Active':'Not Active'?></td>
									<td>
									<a href="<?=base_url().'admin/viewdeals/delete___'.$deal->id ?>" onclick="return confirm('You are about to delete this Deal. Click ok to  continue')"><img src="<?=base_url().'images/delete.png'?>" height="16" title="Delete"/></a>&nbsp;
									<a href="<?=base_url().'admin/viewdeals/changestatus___'.$deal->id ?>" onclick="return confirm('You are about to <?= $deal->status==1?'Deactivate':'Activate'?> this Deal. Click ok to  continue')"><?= $deal->status==1?'<img src="'. base_url().'images/minus.gif" height="16" title="Deactivate"/>':'<img src="'. base_url().'images/plus.gif" height="16" title="Activate"/>'?></a>
									&nbsp;
									<a href="<?=base_url()?>admin/editdeal/<?php  echo $deal->id ?>"><img src="<?=base_url().'images/edit.png'?>" title="edit this deal" height="16"/></a></td>
									</tr>
						<?php  } ?><tr>
						<td colspan="4"></td><td colspan="2"><a href="<?=base_url().'admin/adddeals'?>" class="btn btn-primary form-control">Add Deals</a> </td></tr>
									</table></form>
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
  
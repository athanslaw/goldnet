<section class="content-header">
      <h1>View Posts</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Manage Alert</a></li>
        <li><a href="#">View Alerts</a></li>
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
									<div class="col-sm-2"><h4><b>Recipient</b></h4></div>
									<div class="col-sm-5"><h4><b>Content</b></h4></div>
									<div class="col-sm-2"><h4><b>Status</b></h4></div>
									<div class="col-sm-2"><h4><b>Action</b></h4></div>
									</div><br>
									<?php $no = 0; foreach($alert as $alert){ $no+=1;?>
									<div class="boxed  sticky  push-down-45">
									<div class="row">
									<div class="col-sm-1"><b><?=$no?>.</b> <span style="float:right">
									<input name="alert_id[]" value="<?= $alert->id?>" id="<?= $alert->id?>" type="checkbox" /></div>
									<div class="col-sm-2"><?= getName($alert->recipient_id)?></div>
									<div class="col-sm-5"><label for="<?= $alert->id?>"><?= $alert->content?></label></div>
									<div class="col-sm-2"><?= $alert->status==1?'Seen':'Not Seen'?></div>
									<div class="col-sm-2"><a href="<?php echo base_url().'admin/viewalert/delete___'.$alert->id; ?>" class="btn btn-default" onclick="return confirm('You are about to delete this alert. Hope you have performed the instruction? Click ok to  continue')">delete</a> 
									<br /><a href="<?=base_url().$alert->link; ?>" class="btn btn-default">Perform Instruction</a></div>
									</div></div><hr />
						<?php  } ?><?php if($no >0){?><div class="row">
						<div class="col-sm-4"><input type='submit' value='delete checked' name='delete' /></div></div><?php }?>
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
  
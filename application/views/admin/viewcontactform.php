<section class="content-header">
      <h1>Contact Form</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Contact Form</a></li>
        <li><a href="#">View Contact Form</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-sm-12">
          
              
              

    <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
		<div class="col-sm-1"></div>
        <div class="col-sm-10">
		
		
									<table class="table">
									<tr>
									<th>SNO</th><th>Full Name</th><th>Phone</th><th>Email</th><th>Enquiry</th><th>Action</th>
									</tr>
									<?php $sno = 0; foreach($contact as $contact){ $sno +=1; ?>
									<tr>
									<td><?= $sno ?></td><td><?= $contact->name?></td><td><?= $contact->phone?></td><td><?= $contact->sender_email?></td>
									<td><?= '<span style="color:#006"><i>'.$contact->subject.'</i></span><br>'.$contact->content?></td>
									<td><a href="<?php echo site_url('admin/viewenquiries/delete___'.$contact->id); ?>" onclick="return confirm('You are about to delete an enquiry. Click ok to  continue')">Delete</a> 
									<!--<a href="<?=site_url('admin/replyenquiry/'.$contact->id); ?>">Reply</a>--> </td>
									</tr>
						<?php  } ?>
									</table>
									
        </div><div class="col-sm-1"></div>            </div>
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
  
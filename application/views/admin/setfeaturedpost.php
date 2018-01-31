<section class="content-header">
      <h1>Featured Post</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Post</a></li>
        <li><a href="#">Featured Post</a></li>
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
        <div class="<?=$class?>"><?=$content?></div>
		
		<h3>Check the post you wish to make your featured post (Best Post)</h3>
								<form action = "" method="post" name="frm">
									<table class="table">
									<tr>
									<th>SNO</th>
									<th><input name="featuredpost" value="<?= $featuredpost->id?>" type="hidden" /></th>
									<th>POST TITLE</th>
									<th>CORRESPONDING IMAGES</th>
									</tr>
									<?php $no = 0; foreach($post as $post){ $no += 1;?>
									<tr>
									<td><?=$no?></td>
									<td><input name="post_id" value="<?= $post->id?>" <?= ($featuredpost->id === $post->id)?'checked':''?> id="<?= $post->id?>" type="radio" /></td>
									<td><label for="<?= $post->id?>"><?= $post->title?></label></td>
									<td><label for="<?= $post->id?>"><img class="wp-post-image" src="<?php echo base_url()?>images/blog/dummy/<?=$post->pix?>" alt="" height="100px" /></label></td>
									</tr>
						<?php  } ?><tr>
									<td colspan="4"><input name="send" value="save" class='btn btn-primary form-control' type="submit" /></td>
									</tr>
									</table></form>
								</div>
							</div>
				</div>

					 
			  </div></div>
 

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
  
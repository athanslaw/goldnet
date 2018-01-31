
      <div class="row">
        <div class="col-sm-12">
          

    <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
		<div class="col-sm-1"></div>
        <div class="col-sm-10">
        <div class="<?=$class?>"><?=$content?></div>
			<form action="" method="post" name="frm" enctype="multipart/form-data">
				<img id="blah" src="<?php echo base_url()?>images/blog/advert/<?=$advert->slug.'.jpg'?>" alt="" width="153"><br><br>
				<input type="file" name="file" id="file" onchange="readURL1(this,'blah');" /><br>
								
				<input type="text" name="title" class="form-control" required="required" value="<?=$advert->title?>" /><br>
				<input type="text" name="link" class="form-control" required="required" value="<?=$advert->link?>" /><br>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="form-group">
						<textarea id="compose-textarea" class="form-control" name="message" style="height: 200px" required="required">
							<?=$advert->description?>
						</textarea>
					</div>
				</div>
				<!-- /.box-body -->
            	<input type="submit" name="submit" id="button" class="btn bg-primary" value="Submit" /><br><br>
			</form>
							
        </div><div class="col-sm-1"></div>            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
    
    
    
                </div>
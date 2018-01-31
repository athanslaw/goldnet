
   
      <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10"><br>
          <h1>Profiling <div class="<?=$class?>"><?=$content?></div></h1>

    <!-- Profile Image -->
          <div class="box box-primary">
           
		
		<div class="box-body box-profile" style="border-style:bridge; border-width:2px">
		<div class="col-sm-1"></div>
        <div class="col-sm-10 bg-gray">
			<form action="" method="post" name="frm" enctype="multipart/form-data">
				<br><img src="<?=base_url().'images/'.getCMS('banner')?>" alt="" width="853" id="blah2"><br><h3>Upload Banner</h3>
				<input type="file" name="file" id="file" onchange="readURL1(this,'blah2');" /><br>
				<!-- /.box-body -->
            	<input type="submit" name="bannerbtn" id="button" class="btn bg-primary" value="Submit" /><br><br>
			</form>

        </div>
		<div class="col-sm-1"></div>            </div>
		
		<div class="box-body box-profile">
		<div class="col-sm-4 bg-gray">
		<form action="" method="post" name="service1frm" enctype="multipart/form-data">
				<br><img src="<?= base_url()?>images/whoweare.png" alt="" width="153" id="blahh"><br><h3>Above Service 1 </h3>(png files only)
				<input type="file" name="file" id="file" onchange="readURL1(this,'blahh');" />
				<input type="hidden" name="serviceabove1" value="whoweare"/><br>
				<h3>Title</h3>
				<input type="text" name="service" value="<?=getCMS('service1')?>" class="form-control" />
				<input type="hidden" name="serviceno" value="service1" /><br>
				<textarea id="compose-textarea" class="form-control" name="servicecontent" style="height: 200px" required="required">
					<?=getCMS('service1_content')?>
				</textarea>

				<!-- /.box-body -->
            	<input type="submit" name="servicebtn" id="button" class="btn bg-primary" value="Submit" /><br><br>
			</form></div>
        <div class="col-sm-4 bg-gray-active">
			<form action="" method="post" name="service2frm" enctype="multipart/form-data">
				<br><img src="<?= base_url()?>images/whatwedo.png" alt="" width="153" id="blahh1"><br><h3>Above Service 2 </h3>(png files only)
				<input type="file" name="file" id="file" onchange="readURL1(this,'blahh1');" />
				<input type="hidden" name="serviceabove1" value="whatwedo"/><br>
				<h3>Title</h3>
				<input type="text" name="service" value="<?=getCMS('service2')?>" class="form-control" /><br>
				<input type="hidden" name="serviceno" value="service2" />
				<textarea id="compose-textarea1" class="form-control" name="servicecontent" style="height: 200px" required="required">
					<?=getCMS('service2_content')?>
				</textarea>

				<!-- /.box-body -->
            	<input type="submit" name="servicebtn" id="button" class="btn bg-primary" value="Submit" /><br><br>
			</form>
        </div>
		<div class="col-sm-4 bg-gray">
			<form action="" method="post" name="service3frm" enctype="multipart/form-data">
				<br><img src="<?= base_url()?>images/takeaction.png" alt="" width="153" id="blahh2"><br><h3>Above Service 3 </h3>(png files only)
				<input type="file" name="file" id="file" onchange="readURL1(this,'blahh2');" />
				<input type="hidden" name="serviceabove1" value="takeaction"/><br>
				<h3>Title</h3>
				<input type="text" name="service" value="<?=getCMS('service3')?>" class="form-control" /><br>
				<input type="hidden" name="serviceno" value="service3" />
				<textarea id="compose-textarea2" class="form-control" name="servicecontent" style="height: 200px" required="required">
					<?=getCMS('service3_content')?>
				</textarea>

				<!-- /.box-body -->
            	<input type="submit" name="servicebtn" id="button" class="btn bg-primary" value="Submit" /><br><br>
			</form></div>
		</div
		<div class="box-body box-profile">
		<div class="col-sm-4 bg-gray">
			<form action="" method="post" name="service1frm" enctype="multipart/form-data">
				<h3>Service 1 Image</h3><br><img src="<?=base_url().'images/'.getCMS('service1_image')?>" alt="" id="blah3" width="153"><br>
				(jpg files only)<input type="file" name="file" id="file" onchange="readURL1(this,'blah3');" /><br>
				<input type="hidden" name="servicename" value="pedrochild1.jpg" />
				<!-- /.box-body -->
            	<input type="submit" name="serviceimgbtn" id="button" class="btn bg-primary" value="Submit" /><br><br>
			</form></div>
        <div class="col-sm-4 bg-gray-active">
			<h3>Service 2 Image</h3>
			<form action="" method="post" name="service2frm" enctype="multipart/form-data">
				<br><img src="<?=base_url().'images/'.getCMS('service2_image')?>" alt="" width="153" id="blah4"><br>(jpg files only)<br>
				<input type="file" name="file" id="file" onchange="readURL1(this,'blah4');" /><br>
				<input type="hidden" name="servicename" value="pedrochild2.jpg" />
				<!-- /.box-body -->
            	<input type="submit" name="serviceimgbtn" id="button" class="btn bg-primary" value="Submit" /><br><br>
			</form>
        </div>
		<div class="col-sm-4 bg-gray">
			<h3>Service 3 Image</h3>
			<form action="" method="post" name="service3frm" enctype="multipart/form-data">
				<br><img src="<?=base_url().'images/'.getCMS('service3_image')?>" alt="" width="153" id="blah5"><br>(jpg files only)<br>
				<input type="file" name="file" id="file" onchange="readURL1(this,'blah5');" /><br>
				<input type="hidden" name="servicename" value="pedrochild3.jpg" />
				<!-- /.box-body -->
            	<input type="submit" name="serviceimgbtn" id="button" class="btn bg-primary" value="Submit" /><br><br>
			</form>
		</div>
		</div>
		
		<div class="box-body box-profile">
			<div class="col-sm-12 bg-gray">
				<form action="" method="post" name="msgfrm">
					<br><br><h3>Welcome Message Title</h3>
					<input type="text" name="msgtitle" class="form-control" value="<?=getCMS('welcome_msg_title')?>" /><br>
					<br><h3>Welcome Message Content</h3>
					<div class="box-body">
						<div class="form-group">
							<textarea class="form-control" id="compose-textarea3" name="msgcontent" style="height: 200px" required="required">
							<?=getCMS('welcome_msg_content')?>
							</textarea>
						</div>
					</div>
									
					<!-- /.box-body -->
					<input type="submit" name="wlcbtn" id="button" class="btn bg-primary" value="Submit" /><br><br>
				</form>

			</div>
		</div>
		
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
    
    
    
                </div>
				<div class="col-sm-1"></div>
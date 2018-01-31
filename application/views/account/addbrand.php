
      <div class="row">
        <div class="col-sm-12">
          
    <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
						<div class="col-sm-2"></div>
						<div class="col-sm-8">
						<br><h1>Add Brand</h1><br><div class="<?=$class?>"><?= $content?></div>
							<form action="" method="post" name="frm" enctype="multipart/form-data">
								Brand banner. <i>(Prefered size: width - 336; height - 280)</i><input type="file" name="file" id="file" onchange="readURL(this);" required="required" /><br>
								<img id="blah" src="" alt="" style="float:left; margin:auto; display:block; width:336px; padding-bottom:15px"/>
								
								<input type="text" name="title" title="Brand Title" class="form-control" placeholder="Brand name" required="required" /><br>
								<input type="text" name="link" title="Brand Web Address" class="form-control" placeholder="link" value="http://www." required="required" /><br>
								<!-- /.box-header -->
								<div class="box-body">
										<textarea name="message" title="Brand Overview" style="height: 150px;" class="form-control" required="required">
										<?=trim("About my brand")?>
										</textarea>
								</div>
								<!-- /.box-body -->
            					<input type="submit" name="send" id="button" class="btn bg-primary" value="Submit" /><br>
								<br>
							</form>
						</div>
						<div class="col-sm-2"></div>
					</div>
				</div>
			</div>
		</div>
		
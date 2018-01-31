
      <div class="row">
        <div class="col-sm-12">
          

    <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
		<div class="col-sm-1"></div>
        <div class="col-sm-10">
        <div class="<?=$class?>"><?=$content?></div>
			<form action="" method="post" name="frm" enctype="multipart/form-data">
				<?php  if($books->pix != '0') { ?>
							<img id="blah" src="<?php echo base_url()?>images/blog/books/coverpage/<?=$books->pix?>" alt=""  style="width:336px; padding-bottom:15px"><br><br>
							<?php }?>
							<span>Cover Page</span>
								<input type="file" name="file" id="file"  onchange="readURL(this);" /><br>
								
								<select name="category" required="required">
									<option value selected>-Select Category-</option>
									<?php
									foreach($categories as $categories){
									?>
										<option value="<?=$categories->id ?>" <?=($books->category!="" && $books->category == $categories->id )? "selected":"" ?> ><?=$categories->name ?>
										</option>
									<?php }?>
								</select><br><br>
								<input type="text" name="title" title="Book Title" class="form-control" required="required" value="<?=$books->title?>" /><br>
								<input type="text" name="author_name" title="Author's Name" class="form-control" value="<?=$books->author_name?>" placeholder="Author name" /><br>
								<input type="text" name="author_site" title="Author's Site" class="form-control" value="<?=$books->author_site?>" placeholder="Author site" /><br>
								<input type="email" name="author_email" title="Author's Email" class="form-control" value="<?=$books->author_email?>" placeholder="Author email" /><br>
								<input type="radio" name="paid_status" id="paid_status" value="0" <?=$books->paid_status=='0'?"checked":""?> /><label for="paid_status">Free</label> &nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="paid_status" id="paid_status1" value="1" <?=$books->paid_status=='1'?"checked":""?> /><label for="paid_status1">Paid</label><br>
								<input type="text" name="amount" title="Amount" class="form-control" value="<?=$books->amount?>" />
								<!-- /.box-header -->
								<div class="box-body">
								  <div class="form-group">
										<textarea id="compose-textarea" class="form-control" name="message" style="height: 200px" required="required">
										<?=$books->message?>
										</textarea>
								  </div>
								</div>
								<!-- /.box-body -->
            					<input type="submit" name="send" id="button" class="btn bg-primary" value="Submit" /><br><br>
			</form>
							
        </div><div class="col-sm-1"></div>            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
    
    
    
                </div>
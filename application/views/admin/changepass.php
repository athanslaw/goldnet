<script type="text/javascript">
	function checkform(){
		//alert('ds');
		if(document.frm.npw.value != document.frm.cnpw.value){
			document.frm.cnpw.value = '';
			document.getElementById('cnpw').innerHTML = 'Please Check the Confirm Password again';
			return false;
		}
		else{
			document.getElementById('cnpw').innerHTML = '';
			document.getElementById('uerror').innerHTML = '';
			return true;
		}
	}
</script>
<section class="content-header">
      <h1>Change Password</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Change Password</a></li>
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
		
		
		<form action="" method="post" name="frm" enctype="multipart/form-data">
			<input type="text" name="username" class='form-control' required="required" placeholder="Enter Username" /><br>
			<input type="password" name="npw" class='form-control' required="required" placeholder="Enter New Password" /><br>
			<input type="password" name="cnpw" class='form-control' required="required" placeholder="Confirm New Password" />
			<div id='cnpw'></div><br>
			<!-- /.box-body -->
			<input type="submit" name="send" id="button" class="btn bg-primary" value="Submit" onclick='return checkform()' /><br><br>
		</form>
							
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
  
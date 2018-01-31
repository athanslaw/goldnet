 <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.2
    </div>
    <strong>Copyright &copy;<?=date('Y') ?> <a href="#"><?=$headername?></a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="<?= base_url()?>plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?= base_url()?>bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url()?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url()?>plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url()?>dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url()?>dist/js/demo.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= base_url()?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Page Script -->
<script>
$("#modal-container-666931").on('hidden.bs.modal', function(e){window.location.reload(); });
</script>
<script type="text/javascript">

function fetch_lga(val){
  
	if(val!=''){
 		$.ajax({
 			url: "<?php echo base_url(); ?>pages/fetch_lga?id="+val,
 			type: 'post',
 			beforeSend: function(){
 				$('#lga').html('<option value="">Please wait, loading data...</option>'); 
 			},
 			success: function(response){
 				$('#lga').html(response);
 			}
 		});
 	}else{
  		$('#lga').html('<option value="">LGA</option>');
 	}
 }  
 
function readURL(input) {
  
	if (input.files && input.files[0]) {

		var reader = new FileReader();

		reader.onload = function (e) {
			$('#blah')
				.attr('src', e.target.result) 
				$('#blah').show();
		};

		reader.readAsDataURL(input.files[0]);
	}
}
function readURL1(input, id) {
  
	if (input.files && input.files[0]) {

		var reader = new FileReader();

		reader.onload = function (e) {
			$('#'+id)
				.attr('src', e.target.result) 
				$('#blah1').show();
		};

		reader.readAsDataURL(input.files[0]);
	}
}
</script>
<script>
  $(function () {
    //Add text editor
    $("#compose-textarea").wysihtml5();
  });
  $(function () {
    //Add text editor
    $("#compose-textarea1").wysihtml5();
  });
  $(function () {
    //Add text editor
    $("#compose-textarea2").wysihtml5();
  });
  $(function () {
    //Add text editor
    $("#compose-textarea3").wysihtml5();
  });
  
  
function fetch_lga(val){
  
	if(val!=''){
 		$.ajax({
 			url: "<?php echo base_url(); ?>pages/fetch_lga?id="+val,
 			type: 'post',
 			beforeSend: function(){
 				$('#lga').html('<option value="">Please wait, loading data...</option>'); 
 			},
 			success: function(response){
 				$('#lga').html(response);
 			}
 		});
 	}else{
  		$('#lga').html('<option value="">LGA</option>');
 	}
 }  
 
function fetch_state(val){
  
	if(val!=''){
 		$.ajax({
 			url: "<?php echo base_url(); ?>pages/fetch_state?id="+val,
 			type: 'post',
 			beforeSend: function(){
 				$('#state').html('<option value="">Please wait, loading data...</option>'); 
 			},
 			success: function(response){
 				$('#state').html(response);
 			}
 		});
 	}else{
  		$('#state').html('<option value="">State</option>');
 	}
 }
 
function insertrecord(val){
  
	if(val!=''){
 		$.ajax({
 			url: "<?php echo base_url(); ?>pages/fetch_lga?id="+val,
 			type: 'post',
 			beforeSend: function(){
 				$('#lga').html('<option value="">Please wait, loading data...</option>'); 
 			},
 			success: function(response){
 				$('#lga').html(response);
 			}
 		});
 	}else{
  		$('#lga').html('<option value="">LGA</option>');
 	}
 }
</script>
<iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="resources/popcalendar/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
</body>
</html>

<form id="frm_educ_details" method="post" action="<?php echo base_url();?>account/edit_certification_entry?id=<?php echo $certificate_id;?>">
  
		<div class="form-group">
			<label>Certification/Membership Title*</label>
			<input class="form-control required" type="text" name="certificate_member_ship" id="certificate_member_ship" value="<?php echo $certification->Certification_Membership;?>"  />
			<label style="display:none;" generated="true" class="error" id="certificate_member_ship_error">This field is required.</label> 
		</div>
		
 		<div class="form-group"  >
			<label>Year*</label><br /> 
	 <select class="required form-control" name="certificate_year" id="certificate_year" aria-invalid="false">
<option value="">Year</option>
<?php for($kl=1970;$kl<=2050;$kl++){ ?>
<option <?php if(isset($certification->year) && $certification->year==$kl){?> selected="selected" <?php }?> value="<?php echo $kl;?>"><?php echo $kl;?></option>
<?php } ?> 
</select>
<label style="display:none;" generated="true" class="error" id="certificate_year_error">This field is required.</label> 
 
</div>
   		 
 		<div class="form-btns">
			<button class="btn btn-default" type="submit"  onclick="return check_validation_certification_form();">Save</button>
			<button class="btn btn-default" type="button" onclick="return certification_details_form('close');">Cancel</button>
		</div>
		
</form>
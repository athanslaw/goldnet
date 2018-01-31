<div class="certification_summary">
                        
						<div class="mini_title gray"><span>Certifications & Professional Association Memberships</span><a onclick="return add_certification();" class="pro_edit_btn"><i class="fa fa-plus"></i></a></div>
						  <div class="certification_details_form">
                        		 
                    		</div>
							<?php
if($user_get_certifications>0){
?>
                            <ul class="certification_details">
							<?php $i=1; foreach ($user_get_certifications as $get_certifications){ ?>
                                <li>
                                	<div class="education_box">
                                    	<span class="text_label"><?php echo $get_certifications->Certification_Membership;?></span>
										<span class="text_field"><?php echo $get_certifications->year;?> </span>
                                <div class="actions_btn">
                                	<a onclick="return edit_certification('<?php echo $get_certifications->id;?>');" class="pro_edit_btn"><i class="fa fa-pencil"></i></a>
                                    <a href="<?php echo base_url();?>account/delete_entry?id=<?php echo $get_certifications->id;?>&status=certification" onclick="return confirm('Are you want to delete it!')" class="pro_edit_btn"><i class="fa fa-times"></i></a>
                                </div>
                                    </div>
                                     
                                </li>
								<?php } ?>
                            </ul>
							<?php } ?>
                            <div class="clearfix"></div>
                          
                        </div>
						
<script type="text/javascript">

function check_validation_certification_form(){

	var certificate_member_ship = $('#certificate_member_ship').val();
		if(certificate_member_ship==''){
		$('#certificate_member_ship_error').show();
		return false;
	}
	
	var certificate_year = $('#certificate_year').val();
		if(certificate_year==''){
		$('#certificate_year_error').show();
		return false;
	}

}

</script>						
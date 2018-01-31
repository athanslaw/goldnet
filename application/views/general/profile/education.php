<?php
if(count($user_get_eduation)>0){
?><div class="education_summary">
	<div class="mini_title gray"><span>Education</span></div>
	<div class="education_box_edit">
		
	</div>
	
		<ul class="education_details">
		<?php $i=1; foreach ($user_get_eduation as $get_eduation){ ?>
			<li id="education_box_<?php echo $get_eduation->id;?>">
 				<div class="education_box " >
					<span class="text_label"><?php echo $get_eduation->institution;?></span><span class="text_field"><?php $get_country1 = getCountry($get_eduation->country); echo $get_country1; ?> <br><?php  $get_eduation1 = get_education_name_helper($get_eduation->education); echo $get_eduation1->name; ?> <br><?php echo $get_eduation->date_from;?> - <?php echo $get_eduation->date_to;?></span>
					<div class="actions_btn">
						<a  class="pro_edit_btn" onclick="return edit_education('<?php echo $get_eduation->id;?>');"><i class="fa fa-pencil"></i></a>
						<a href="<?php echo base_url();?>account/delete_entry?id=<?php echo $get_eduation->id;?>&status=education" onclick="return confirm('Are you want to delete it!')"  class="pro_edit_btn"><i class="fa fa-times"></i></a>
					</div>
				</div>
 			</li>
			<?php } ?>
			 
                            </ul> 
                            <div class="clearfix"></div>
                            <div class="education_details_form">
                        		 
                    		</div>
                        </div><?php } ?>
											
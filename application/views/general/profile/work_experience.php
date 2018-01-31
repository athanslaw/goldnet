<?php 
if(count($user_work_experience)>0){ ?><div class="work_exp">

                        	<div class="mini_title gray"><span>Work Experience</span></div>

				<div class="work_exp_details_form" >

			 <?php //include(APPPATH.'views/Frontend/account/profile/add_work_exp.php');?>

		</div> 	
  
<?php

$i=1; foreach ($user_work_experience as $work_experience){ ?>

<ul class="education_details">
	<li>
    	<div class="education_box">
        <span class="text_label"><?php
		if($work_experience->till_date==1){
			echo $work_experience->exp_from_month.' '.$work_experience->exp_from_year.' - Till Date';
		
		}else{
		
		 echo $work_experience->exp_from_month.' '.$work_experience->exp_from_year.' - '.$work_experience->exp_to_month.' '.$work_experience->exp_to_year;
		 
		 }
		 ?></span>
	<span class="text_field"><?php echo $work_experience->company;?> <br><?php echo get_function_area_name_helper($work_experience->specialization);?></span>
        </div>
    </li>
	

</ul>

<?php } ?>

	

		<div class="clearfix"></div>

		
	</div>
<?php } ?>
 
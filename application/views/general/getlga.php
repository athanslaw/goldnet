<option value="">LGA</option>
<?php 
if($lga) { foreach($lga as $lga_list){ ?>
<option value="<?php echo $lga_list->code;?>" ><?php echo trim(strtoupper($lga_list->lga));?></option>
<?php } } ?>
<option value="0">Other</option>
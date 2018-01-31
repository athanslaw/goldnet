<option value="">State</option>
<?php 
if($state) { foreach($state as $state_list){ ?>
<option value="<?php echo $state_list->code;?>" ><?php echo trim(strtoupper($state_list->state));?></option>
<?php } } ?>
<option value="0">Other</option>
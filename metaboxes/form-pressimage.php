<div class="my_meta_control">


    <?php $mb->the_field('credit'); ?>
    <label for="credit">Credit - Name</label>
        <input type="text" id="credit" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />     
  </p>
 <p>
    <?php $mb->the_field('creditsite'); ?>
    <label for="creditsite">Credit - Website</label>
        <input type="text" id="creditsite" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />     
  </p>

 
 
  
	<input type="submit" class="button-primary" name="save" value="Save">

</div>

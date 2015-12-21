<div class="my_meta_control">
<p><?php $mb->the_field('stars'); ?>
 <label for="stars">Stars</label>
 	<select id="stars" name="<?php $mb->the_name(); ?>">
		<option value="">Select...</option>
		<option value="5"<?php $mb->the_select_state('5'); ?>>5</option>
		<option value="4"<?php $mb->the_select_state('4'); ?>>4</option>
		<option value="3"<?php $mb->the_select_state('3'); ?>>3</option>
		<option value="2"<?php $mb->the_select_state('2'); ?>>2</option>		
		<option value="1"<?php $mb->the_select_state('1'); ?>>1</option>
	</select>
</p>


 <p>
    <?php $mb->the_field('quote'); ?>
    <label for="quote">Quote</label>
        <input type="text" id="quote" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />     
  </p>

 <p>
    <?php $mb->the_field('attribution'); ?>
    <label for="attribution">Attribution</label>
    <input type="text" id="attribution" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" /> 
  
  </p>
 
  
	<input type="submit" class="button-primary" name="save" value="Save">

</div>

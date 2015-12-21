<div class="my_meta_control">
 <p>
    <?php $mb->the_field('slide_type'); ?>
    <label for="slide_type">Type</label>
        <input type="text" id="slide_type" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />     
  </p>

 <p>
    <?php $mb->the_field('slide_fixed'); ?>
    <label for="slide_fixed">Always show this if there's room?</label>
    <input type="checkbox" id="slide_fixed" name="<?php $metabox->the_name(); ?>" value="1"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/>
  
  </p>
  <p>
		<?php $mb->the_field('url'); ?>
    <label style="display:block" for="slide-url">Url</label>
		<input type="text" id="slide-url" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" /> 
	</p>
  
	<input type="submit" class="button-primary" name="save" value="Save">

</div>

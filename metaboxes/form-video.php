<div class="my_meta_control">

 <p>
    <?php $mb->the_field('vidurl'); ?>
    <label for="vidurl">YouTube URL</label>
        <input type="text" id="vidurl" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />     
  </p>

  
	<input type="submit" class="button-primary" name="save" value="Save">

</div>

<div class="my_meta_control">



 <p>
    <?php $mb->the_field('description'); ?>
    <label for="format">Description</label>
        <input type="text" id="description" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />     
  </p>
   
 <p>
    <?php $mb->the_field('commissioned'); ?>
    <label for="commissioned">Commissioned By</label>
        <input type="text" id="commissioned" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />     
  </p>

<p>
    <?php $mb->the_field('sidebarlinks'); ?>
    <label for="sidebarlinks">Sidebar Links</label>

    <textarea id ="sidebarlinks" name="<?php $mb->the_name(); ?>" rows="3"><?php $mb->the_value(); ?></textarea>
    <span>Paste in sidebar links (new line for each)</span>
  </p>
  
	<input type="submit" class="button-primary" name="save" value="Save">

</div>

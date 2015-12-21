<div class="my_meta_control">


 <p>
    <?php $mb->the_field('format'); ?>
    <label for="format">Format (e.g. Catalogue, DVD)</label>
        <input type="text" id="format" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />     
  </p>
<p>
    <?php $mb->the_field('price'); ?>
    <label for="price">Price</label>
    <input type="text" id="price" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" /> 
  
  </p>
 <p>
    <?php $mb->the_field('buybuttontext'); ?>
    <label for="buybuttontext">Buy Button text (if blank, will just print 'Buy')</label>
    <input type="text" id="buybuttontext" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" /> 
  
  </p>
  <p>
    <?php $mb->the_field('buybuttonlink'); ?>
    <label for="buybuttonlink">Buy Button link (if blank, no buy button will print out)</label>
    <input type="text" id="buybuttonlink" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" /> 
  
  </p>
  
	<input type="submit" class="button-primary" name="save" value="Save">

</div>

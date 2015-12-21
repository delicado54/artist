<div class="my_meta_control">


<p><a href="#" class="docopy-docs button">Add Product</a></p>
  <p>
  	<?php $mb->the_field('products'); ?>
  	<label for="products">Products</label>
  	<select id="products" name="<?php $mb->the_name(); ?>">
  	<option value="">-- Select a Product --</option>
  	<?php 
  	global $wpdb;
	$results = $wpdb->get_results( 'SELECT id,title from wp_shopify_products ORDER BY title' );
	//print_r($results);
	//exit;
	foreach ($results as $result){
  		?><option<?php if($mb->get_the_value() == $result->id): ?> selected="selected"<?php endif; ?> value="<?php echo $result->id; ?>">
  		<?php echo $result->title; ?></option>
    	<?php
  	}
  	
  	?></select>
  	
   
        
        <p>
		<?php $mb->the_field('url'); ?>
                <label style="display:block" for="office-url">Url</label>
		<input type="text" id="office-url" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" /> 
	</p>
  
	<input type="submit" class="button-primary" name="save" value="Save">

</div>

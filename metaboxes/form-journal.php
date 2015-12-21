<div class="my_meta_control">

  <p>
		<?php $mb->the_field('location'); ?>
    <label style="display:block" for="journal-location">Location</label>
		<input type="text" id="journal-location" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" /> 
	</p>

	<label>Products to add to this article.</label><br/>

	<?php while($mb->have_fields_and_multi('products_group')): ?>
	<?php $mb->the_group_open(); ?>
		<?php $mb->the_field('productID'); ?>
		<select name="<?php $mb->the_name(); ?>">
			<option value="">Select...</option><?php
			global $wpdb; 
	$results = $wpdb->get_results( 'SELECT id,title from wp_shopify_products ORDER BY title' );
	//print_r($results);
	//exit;
			foreach ($results as $result){
		  		?><option value="<?php echo $result->id; ?>"<?php $mb->the_select_state($result->id); ?>>
		  		<?php echo $result->title; ?></option>
		    	<?php
		  	}
  
    ?></select>
	<?php $mb->the_group_close(); ?>
	<?php endwhile; ?>

	<p><a href="#" class="docopy-products_group button">Add</a></p>
  
	<input type="submit" class="button-primary" name="save" value="Save">

	<p>Note - in order for this product to display on the live site, a landscape image needs to be uploaded to Shopify and the database needs to be updated via the 'update database' option in Shopify Products after this image has been uploaded.</p>

</div>

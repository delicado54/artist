<div class="my_meta_control">


  <p>
        <?php $mb->the_field('productID'); ?>
        <label for="productID">Products</label>
        <select id="productID" name="<?php $mb->the_name(); ?>">
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
      
      ?>
      </select>
    
  	<input type="submit" class="button-primary" name="save" value="Save">


    <p>
      <?php $mb->the_field('new'); ?>
      <label for="new">New product?</label>
      &nbsp;&nbsp;<input type="checkbox" id="new-product" name="<?php $metabox->the_name(); ?>" value="1"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/>
    </p>

    
<!--     
    <p>
      <?php $mb->the_field('on-sale'); ?>
      <label for="on-sale">On sale?</label>
      &nbsp;&nbsp;<input type="checkbox" id="on-sale-product" name="<?php $metabox->the_name(); ?>" value="1"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/>
    </p>
 -->

</div>

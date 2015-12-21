<div class="my_meta_control">

<style type="text/css">
  .map-hold{cursor:crosshair;position:relative;width:1000px;min-width:1000px;height:669px;display:block;background:url(/content/themes/herblester/images/herb-lester-map.jpg);}
  .flag {overflow:hidden;-webkit-backface-visibility:hidden;-webkit-transform:translateZ(0) scale(1.0,1.0);width:18px;height:34px;background: url(/content/themes/herblester/images/flag.png) 0 5px no-repeat;line-height:2000em;-webkit-transition:background-position .15s ease-in-out;-moz-transition:background-position .15s ease-in-out;-o-transition:background-position .15s ease-in-out;transition:background-position .15s ease-in-out}
  .flag:after{width:7px;height:7px;content:"";background:#0e3379;border-radius:20px;bottom:0px;left:0px}
  .flag,.flag:after{position:absolute;display:block;z-index:2}
  .flag:hover{background-position:0 0}
</style>

<?php /*
  <p>
    <?php $mb->the_field('url'); ?>
    <label style="display:block" for="url">URL</label>
    <input type="text" id="url" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" /> 
  </p>*/?>
  <p>
    <?php $mb->the_field('continent'); ?>
    <label style="display:block" for="continent">Continent (for category listing on smaller devices)</label>
    <?php $value = $mb->get_the_value(); ?>
    <select  id="continent" name="<?php $mb->the_name(); ?>">
      <option value="Africa" <?php if($value=='Africa'){echo 'selected="selected"';};?>>Africa</option>
      <option value="Asia" <?php if($value=='Asia'){echo 'selected="selected"';};?>>Asia</option>
      <option value="Australia" <?php if($value=='Australia'){echo 'selected="selected"';};?>>Australia</option>
      <option value="Europe" <?php if($value=='Europe'){echo 'selected="selected"';};?>>Europe</option>
      <option value="North America" <?php if($value=='North America'){echo 'selected="selected"';};?>>North America</option>
      <option value="South America" <?php if($value=='South America'){echo 'selected="selected"';};?>>South America</option>
      <option value="Outer Space" <?php if($value=='Outer Space'){echo 'selected="selected"';};?>>Outer Space</option>
    </select> 
  </p>
  <p>
    <label style="display:block" for="xpos">Click on the map to place the flag</label>
  </p>

  <div class="map-hold">
    <div class="flag"></div>
  </div>
  
  <?php $mb->the_field('xpos'); ?>
  <input type="hidden" id="xpos" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" /> 
 
  <?php $mb->the_field('ypos'); ?>
  <input type="hidden" id="ypos" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" /> 
  
  <label>Products to add to this pin.</label><br/>

  <?php while($mb->have_fields_and_multi('products_group')): ?>
  <?php $mb->the_group_open(); ?>
    <?php $mb->the_field('productID'); ?>
    <select name="<?php $mb->the_name(); ?>">
      <option value="">Select...</option>
      <option value="">Remove product</option>
      <?php
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
</div>

<script type="text/javascript">
  jQuery(document).ready(function(){
    var xpos=jQuery('#xpos').val()+'px';
    var ypos=jQuery('#ypos').val()+'px';
    jQuery('.flag').css({'left':xpos,'top':ypos});
    jQuery('.map-hold').click(function(e){
      var parentOffset=jQuery(this).offset(); 
      var relX=e.pageX-parentOffset.left;
      var relY=(e.pageY-parentOffset.top)-34;
      jQuery('#xpos').val(relX);
      jQuery('#ypos').val(relY);
      jQuery('.flag').css({'left':relX,'top':relY})
    });
  });
</script>

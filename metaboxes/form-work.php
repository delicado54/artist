
<style type="text/css">
/* custom editor styles */
 
.my_meta_control .customEditor
{ margin:15px 6px; border:1px solid #ccc; }
 
.my_meta_control .customEditor textarea
{ border:0; }
 
#post-body .my_meta_control .customEditor .mceStatusbar a.mceResize
{ top:-2px; }
 
/* extra styles used in other WPAlchemy meta boxes */
 
.my_meta_control .description
{ display:none; }
  
.my_meta_control label
{ display:block; font-weight:bold; margin:6px; margin-bottom:0; margin-top:12px; }
  
.my_meta_control label span
{ display:inline; font-weight:normal; }
  
.my_meta_control span
{ color:#999; }
  
.my_meta_control textarea, .my_meta_control input[type='text']
{ margin-bottom:3px; width:99%; }
  
.my_meta_control h4
{ color:#999; font-size:1em; margin:15px 6px; text-transform:uppercase; }
</style>
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
    <label for="sidebarlinks">Sidebar</label>

    
    <?php 
    wp_editor(format_for_editor($metabox->get_the_value()), 'sidebarlinks'); ?>



    <span>Paste in sidebar links (new line for each)</span>
  </p>
  
	<input type="submit" class="button-primary" name="save" value="Save">

</div>

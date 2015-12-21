<?php 
get_header();
if ( have_posts() ) : the_post(); 
?>
<div class="container clearfix">  
  <div class="wrapper clearfix">
    
      <?php the_content(); ?>
    
  </div>
  
</div>
<?php
endif;
get_footer();
?>
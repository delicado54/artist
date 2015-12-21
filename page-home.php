<?php 
get_header();
if ( have_posts() ) : the_post(); 
?>
<div class="container clearfix">
  
  <h1><?php the_title(); ?></h1>
  
  <div class="wrapper clearfix">
    
      <?php the_content(); ?>
    Some images of featured work in a carousel.
    news items (latest 3)
  </div>
  
</div>
<?php
endif;
get_footer();
?>
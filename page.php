<?php 
get_header();
if ( have_posts() ) : the_post(); 
?>
<div class="container clearfix">  
  <div class="wrapper clearfix">
    <article class="work">
      <?php the_content(); ?>
      </article>
    
  </div>
  
</div>
<?php
endif;
get_footer();
?>
<?php 
get_header(); 
if ( have_posts() ): the_post();
?>
<div class="container clearfix">
       
    <div class="container clearfix">

        <article class="post" id="post-<?php the_id(); ?>">
        
            <h1><?php the_title(); ?></h1>

            <span class="meta">Posted <?php the_time('F jS Y') ?></span>

            <?php the_content(); ?>
          
        </article>
  <?php include('sidebar.php'); ?>
        
    </div>
  
</div>
	
<?php
endif;
get_footer();
?>
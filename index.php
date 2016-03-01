<?php 
/*
The posts loop. Fetches 'loop-posts.php' to output the posts themselves.
*/

get_header(); 

if ( have_posts() ): 
?>
<div class="container clearfix">
    <ul id="news-items">
    <?php get_template_part('loop', 'posts'); ?>
  </ul>
</div>
	
<?php
endif;

get_footer(); ?>
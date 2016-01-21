<?php 
/*
The posts loop. Fetches 'loop-posts.php' to output the posts themselves.
*/

get_header(); 

if ( have_posts() ): 
?>
<div class="container clearfix">

<?php 
$loop = new WP_Query(array('post_type' => 'post', 'posts_per_page' => '10', 'order' =>'DESC' )); ?>

<?php 
 while ($loop->have_posts()) : $loop->the_post();
 ?>
<article class="post" id="post-<?php the_id(); ?>">

    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>


    <?php the_excerpt(); ?>

</article>
<?php endwhile; ?>
  
</div>
	
<?php
endif;

get_footer(); ?>
<?php 
/*
The posts loop. Fetches 'loop-posts.php' to output the posts themselves.
*/

get_header(); 

if ( have_posts() ): 
?>
<div class="container clearfix">

<?php 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$loop = new WP_Query(array('post_type' => 'post', 'order' =>'DESC' , 'paged' => $paged)); ?>

<ul id="news-items">
<?php 
 while ($loop->have_posts()) : $loop->the_post();
     $imageurl = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'medium' );

?><li class="news-item">
<a href="<?php echo get_permalink($post->ID); ?>"><div class="news-thumb-holder">	
<img src="<?php if($imageurl[0]!=''): echo $imageurl[0]; else: bloginfo('template_url'); ?>/img/news_placeholder.png<?php endif;	 ?>" alt="<?php echo $post->post_title; ?>" /></a></div>
<h3><a href="<?php echo get_permalink($post->ID); ?>"><?php 
echo $post->post_title; ?></a></h3></li>
<?php endwhile; ?>					
<li><?php
	// Previous/next page navigation.
 next_posts_link('&laquo; Older Posts', $loop->max_num_pages);
 previous_posts_link('Newer Posts &raquo;'); 
		?></li><?php
			?>
</ul>

  <?php include('sidebar.php'); ?>

	
<?php
endif;

get_footer(); ?>

<?php 
/*
The posts loop. Fetches 'loop-posts.php' to output the posts themselves.
*/

get_header(); 

if ( have_posts() ): 
?>
<div class="container clearfix">

<?php 
$loop = new WP_Query(array('post_type' => 'post', 'posts_per_page' => '9', 'order' =>'DESC' )); ?>
<ul id="grid">
<?php 
 while ($loop->have_posts()) : $loop->the_post();
     $imageurl = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'artist-thumb' );

?><li class="item">
<a href="<?php echo get_permalink($post->ID); ?>"><div class="thumb-holder">	
<img src="<?php if($imageurl[0]!=''): echo $imageurl[0]; else: bloginfo('template_url'); ?>/img/news_placeholder.png<?php endif;	 ?>" alt="<?php echo $post->post_title; ?>" /></div>
<h3><em><?php 
echo $post->post_title; ?></em></h3>
<?php if(isset($description)):echo $description; endif; ?></a></li>
						<?php endwhile; ?>					
		
</ul>


  
</div>
	
<?php
endif;

get_footer(); ?>
<?php while ( have_posts() ): the_post(); ?>
<?php
       $imageurl = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'medium' );

?><li class="news-item">
<a href="<?php echo get_permalink($post->ID); ?>"><div class="news-thumb-holder">	
<img src="<?php if($imageurl[0]!=''): echo $imageurl[0]; else: bloginfo('template_url'); ?>/img/news_placeholder.png<?php endif;	 ?>" alt="<?php echo $post->post_title; ?>" <?php if($imageurl[2]>260): echo 'class="portrait-thumb"'; endif; ?>/></a></div>
<h3><a href="<?php echo get_permalink($post->ID); ?>"><?php 
echo $post->post_title; ?></a></h3></li>
<?php endwhile; ?>
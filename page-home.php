<?php 
get_header();
if ( have_posts() ) : the_post(); 
?>
<div class="container clearfix">
 
    <div class="wrapper clearfix">
    
      <?php the_content(); ?>

      <?php // check if there are any home slides ?>
<article class="work">      
 <ul class="bxslider">
 <?php // pull out all home slides 
$loop = new WP_Query(array('post_type' => 'home-slide', 'order' =>'ASC', 'posts_per_page' => 10)); 

 while ($loop->have_posts()) : $loop->the_post();
  $imageurl = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'home-slide' );
    if(count($imageurl)<1): continue; endif; ?><li class="item"><a href="#"><?php
?><img src="<?php echo $imageurl[0]; ?>" /></a><p class="image-caption"><?php if($post->post_content !=''): echo $post->post_content; endif; ?></p></li>
<?php endwhile; ?>
</ul>
</article>
<div class="sidebar">
<h3>Latest Updates</h3>
<ul class="news">
<?php 
$loop = new WP_Query(array('post_type' => 'home-link', 'order' =>'ASC', 'posts_per_page' => 3)); 

 while ($loop->have_posts()) : $loop->the_post();

?><li class="item">
<a href="<?php echo get_permalink($post->ID); ?>"><h3><em><?php 
echo $post->post_content;  ?></em></h3></a></li>
<?php endwhile; ?>	    
      </ul>
      </div>
  </div>
              <article class="work home-text">
              <p><?php bloginfo('description'); ?> &#8230; <a href="/about">more</a></p>
              </article>

  
</div>
<?php
endif;
get_footer();
?>
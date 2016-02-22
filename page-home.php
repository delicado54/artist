<?php 
get_header();
if ( have_posts() ) : the_post(); 
?>
<div class="container clearfix">
 
    <div class="wrapper clearfix">
    
      <?php the_content(); ?>
<article class="work">      
 <ul class="bxslider">
<li><a href="#"><img src="http://fm.zarmi.com/wp-content/uploads/2015/12/05_smallspace.jpg" title="05_smallspace" /></a><p class="image-caption">Over The Threshold, 2011. Soho, London. Photo: French&Mottershead/Adrian Wood</p></li>
<li><a href="#"><img src="http://fm.zarmi.com/wp-content/uploads/2015/12/laura.jpg"  /></a><p class="image-caption">The Shops Project: Laura (Fashion Boutique), 2009. Ljubljana, Slovenia. Photo: French&Mottershead/Urska Boljkovac</p></li>
<li><a href="#"><img src="http://fm.zarmi.com/wp-content/uploads/2015/12/tuulastus.jpg" /></a><p class="image-caption">Understory 9: Tuulastas (night fishing), 2012. Kuopio, Finland. Photo: Pekka Makinen</p></li>
<li><a href="#"><img src="http://fm.zarmi.com/wp-content/uploads/2015/12/psecho1.jpg"  /></a><p class="image-caption">The Echo Newspapers, 2007 &amp; 2010.</p></li>
</ul>
</article>
<div class="sidebar">
<h3>Latest Updates</h3>
<ul class="news">
<?php 
$loop = new WP_Query(array('post_type' => 'post', 'order' =>'DESC', 'posts_per_page' => 3)); 

 while ($loop->have_posts()) : $loop->the_post();

?><li class="item">
<a href="<?php echo get_permalink($post->ID); ?>"><h3><em><?php 
echo $post->post_title;  ?></em></h3>
<?php if($post->post_excerpt !=''): echo $post->post_excerpt; endif; ?></a></li>
<?php endwhile; ?>	    
      </ul>
      </div>
  </div>
              <h2 class="strap"><?php bloginfo('description'); ?></h2>

  
</div>
<?php
endif;
get_footer();
?>
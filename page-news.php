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
<?php
	// Previous/next page navigation.
if(get_the_posts_pagination()):?><li><?php
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
				'next_text'          => __( 'Next page', 'twentyfifteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
			) );
		?></li><?php
endif;
			?>
</ul>
<div class="blog-sidebar">
  <?php include('sidebar.php'); ?>
   <h4>Archives</h4>
   <ul>
   <?php wp_get_archives(); ?>
   </ul>
                        <h4>Subjects</h4>
                        <div class="cat-list">
                         <ul>
                         <?php 
                         $args = array('orderby' => 'count', 'title_li' => '', 'number' =>15);
                         wp_list_categories( $args ); ?> 
                                     </ul>
                        </div>
                    </div>
</div>
	
<?php
endif;

get_footer(); ?>
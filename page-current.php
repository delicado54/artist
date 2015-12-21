<?php 
get_header();
if ( have_posts() ) : the_post(); 
?>
<div class="container clearfix">
      
    <div class="wrapper clearfix group">
		
		
<?php the_content(); ?>
		<ul id="grid">
<?php 
	
	// pull out all works
	// (continue of no thumbnail)
		

$loop = new WP_Query(array('post_type' => 'works', 
'tax_query'	=> array(
        array(
            'taxonomy'  => 'work-type',
            'field'     => 'slug',
            'terms'     => 'current', // exclude media posts in the news-cat custom taxonomy
            'operator'  => 'IN'
            )
       )

	, 'posts_per_page' => 200, 'order' =>'ASC','orderby'=> 'menu_order' )); 
$count=0;
global $post;
if ($loop->have_posts()) : 
    while ($loop->have_posts()) : $loop->the_post(); 
    $imageurl = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'artist-thumb' );
    if(count($imageurl)<1): continue; endif;					
?><li class="item" data-groups='["all"<?php $cats = get_the_terms($post->ID, 'work-type');  if($cats){
foreach($cats as $id => $cat){
	echo ', "'.$cat->name .'"';
}} 
?>]'>
<a href="<?php echo get_permalink($post->ID); ?>"><div class="thumb-holder">	
<img src="<?php echo $imageurl[0]; ?>" alt="<?php echo $post->post_title; ?>" /></div>
<h3><em><?php 
echo $post->post_title; ?></em></h3>
<?php if(isset($description)):echo $description; endif; ?></a></li>
						<?php endwhile; ?>					
		<?php endif; ?>
</ul>

  
</div>
<?php
endif;
get_footer();
?>
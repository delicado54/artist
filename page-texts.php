<?php 
get_header();
if ( have_posts() ) : the_post(); 
?>
	<ul id="filter">
		<li><a href="#grid" data-group="all" class="active">All</a></li>
		<?php // pull out categories
		$cats = get_terms('work-type'); 
		//print_r($cats);
		foreach($cats as $cat):			
		?><li><a href="#grid" data-group="<?php echo $cat->name; ?>"><strong><?php echo $cat->name; ?></strong><?php //echo $cat->description; ?></a></li>
		<?php endforeach; ?>
		</ul>	
<div class="container clearfix works-container">
      
    <div class="wrapper clearfix group">
		
		
		<input type="hidden" value="" name="q" id="q">
<?php the_content(); ?>
		<ul id="grid">
<?php 
	
	// pull out all works
	// (continue if no thumbnail)
wp_reset_query();		
$loop = new WP_Query(array('post_type' => 'works'/*, 
'tax_query'	=> array(
        array(
            'taxonomy'  => 'work-type',
            'field'     => 'slug',
            'terms'     => 'current', // exclude media posts in the news-cat custom taxonomy
            'operator'  => 'NOT IN'
            )
       )*/, 'posts_per_page' => 200, 'order' =>'ASC','orderby'=> 'menu_order' )); 
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
<?php 
get_header();
if ( have_posts() ) : the_post(); 
?>
	<ul id="filter">
		<li><a href="#grid" data-group="all" class="active">All</a></li>
		<?php // pull out categories
		$cats = get_terms('text-type'); 
		//print_r($cats);
		foreach($cats as $cat):			
		?><li><a href="#grid" data-group="<?php echo $cat->name; ?>"><?php echo $cat->name; ?><?php //echo $cat->description; ?></a></li>
		<?php endforeach; ?>
		</ul>	
<div class="container clearfix texts-container">
      
    <div class="wrapper clearfix group">
		
		
		<input type="hidden" value="" name="q" id="q">
<?php the_content(); ?>
		<ul id="texts-grid">
<?php 
	
	// pull out all texts
	// (continue if no thumbnail)
wp_reset_query();		
$loop = new WP_Query(array('post_type' => 'texts'/*, 
'tax_query'	=> array(
        array(
            'taxonomy'  => 'text-type',
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
    $query_pdf_args = array(
    'post_type' => 'attachment',
    'post_mime_type' =>'application/pdf',
    'post_status' => 'inherit',
    'numberposts' => 1,
    'posts_per_page' => -1,
    'post_parent'   => $post->ID
	);
	$query_pdf = new WP_Query( $query_pdf_args );
    $pdfurl = $query_pdf->posts[0]->guid;
    if(count($imageurl)<1): continue; endif;					
?><li class="text" data-groups='["all"<?php $cats = get_the_terms($post->ID, 'text-type');  if($cats){
foreach($cats as $id => $cat){
	echo ', "'.$cat->name .'"';
}} 
?>]'><div class="text-thumb-holder"><a target="_blank" href="<?php if($pdfurl !=''): echo $pdfurl; else: echo '#'; endif; ?>">	
<img src="<?php echo $imageurl[0]; ?>" alt="<?php echo $post->post_title; ?>" /></a></div>
<h3><a target="_blank" href="<?php if($pdfurl !=''): echo $pdfurl; else: echo '#'; endif; ?>"><?php 
echo $post->post_title; ?></a></h3>
<?php if(isset($description)):echo $description; endif; ?></a></li>
						<?php endwhile; ?>					
		<?php endif; ?>
</ul>

  
</div>
<?php
endif;
get_footer();
?>
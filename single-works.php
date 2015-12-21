<?php 
get_header(); 
if ( have_posts() ): the_post();
?>
<div class="container clearfix">
       

        <article class="work" id="post-<?php the_id(); ?>">
        	<div class="inner-wrapper">
            <h1><em><?php the_title(); ?></em></h1>

            <?php the_content(); ?>
			</div>     
        </article>
        <div class="sidebar">
        <?php        
        // output the sidebar links
        
		$sidebarlinks = get_post_meta($post->ID,'sidebarlinks', true);
		echo apply_filters('the_content',$sidebarlinks);
        ?>
        
        </div>
        
  
</div>
	
<?php
endif;
get_footer();
?>
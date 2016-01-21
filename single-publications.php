<?php 
get_header(); 
if ( have_posts() ): the_post();


<div class="container clearfix">
       
            <h1><em><?php the_title(); ?></em></h1>

        <article class="publication<?php if($sidebarlinks ==''):?> nosidebar<?php endif ?>" id="post-<?php the_id(); ?>">
        	<div class="inner-wrapper">

            <?php the_content(); ?>
			</div>     
        </article>
        <?php if($sidebarlinks !=''):?>
        <div class="sidebar">
        <?php        
        // output the sidebar links
        
		echo apply_filters('the_content',$sidebarlinks);
        ?>        
        </div>
    <?php endif; ?>
        
  
</div>
	
<?php
endif;
get_footer();
?>
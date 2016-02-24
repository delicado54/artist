<?php 
get_header();
if ( have_posts() ) : the_post(); 
?>
	
<div class="container clearfix texts-container">
      
    <div class="wrapper clearfix group">
				
<?php the_content(); ?>
	    <h4>Subjects</h4>
                        <div class="cat-list">
                         <ul>
                         <?php 
                         $args = array('orderby' => 'count', 'title_li' => '', 'number' =>515);
                         wp_list_categories( $args ); ?> 
                                     </ul>

  
</div>
<?php
endif;
get_footer();
?>
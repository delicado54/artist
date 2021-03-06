<?php 
get_header(); 
if ( have_posts() ): the_post();

$sidebarlinks = get_post_meta($post->ID,'sidebarlinks', true);
   $terms = wp_get_post_terms($post->ID, 'work-type');
        /*$current = false;
        foreach($terms as $term):
            if($term->slug=='current'):
                $current = true;
                break;
            endif;
        endforeach;
    */
    //if(!$current):
?>
<ul id="filter" class="subnav">
        <li><a href="/work/" data-group="all">All</a></li>
        <?php // pull out categories
        $cats = get_terms('work-type'); 
        //print_r($cats);
        foreach($cats as $cat):
            if($cat->slug=='current'):

                continue;
            endif;
        ?><li><a href="/work/?c=<?php echo $cat->name; ?>"><?php echo $cat->name; ?><?php //echo $cat->description; ?></a></li>
        <?php endforeach; ?>
        </ul>  
<?php // endif; ?> 
<div class="workholder clearfix">
       
            <h1><em><?php the_title(); ?></em></h1>
<?php // output info line if there is one 
$description = get_post_meta($post->ID,'description', true);
if($description !=''):
?><h2><?php echo $description; ?></h2><?php endif; ?>
        <article class="work<?php if($sidebarlinks ==''):?> nosidebar<?php endif ?>" id="post-<?php the_id(); ?>">
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
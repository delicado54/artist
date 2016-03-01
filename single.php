<?php 
get_header(); 
if ( have_posts() ): the_post();
?>
<div class="container clearfix">


        <article class="post" id="post-<?php the_id(); ?>">
        
            <h1><?php the_title(); ?></h1>

            <span class="meta">Posted <?php the_time('j F Y');  $categories = get_the_category();
$separator = ' ';
$output = '';
if ( ! empty( $categories ) ) {
	echo ' in ';
    foreach( $categories as $category ) {
        $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
    }
    echo trim( $output, $separator );
}?></span>

            <?php the_content(); ?>
          
        </article>
  <?php include('sidebar.php'); ?>
        
    </div>
  
</div>
	
<?php
endif;
get_footer();
?>
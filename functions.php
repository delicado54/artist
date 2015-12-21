<?php

include_once 'metaboxes/setup.php';

function disable_wp_emojicons() {

  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );

add_filter('embed_oembed_html', 'my_embed_oembed_html', 99, 4);
function my_embed_oembed_html($html, $url, $attr, $post_id) {
  return '<div class="video-container">' . $html . '</div>';
}


function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}


/* add custom post types to search */

function filter_search($query) {
    if ($query->is_search) {
  $query->set('post_type', array('post', 'works', 'page'));
    };
    return $query;
};
add_filter('pre_get_posts', 'filter_search');

/* ---- Custom Post Types and Taxonomies ---- */


function register_post_types(){

  register_post_type( 'works',
  	array(
      'labels' => array(
        'name' => __( 'Works' ),
        'singular_name' => __( 'Work' )
    	),
    	'public' => true,
    	'has_archive' => true,
    	'supports' => array('title', 'editor', 'thumbnail') 
  	)
  );

  register_post_type( 'publications',
    array(
      'labels' => array(
        'name' => __( 'Publications' ),
        'singular_name' => __( 'Publication' )
      ),
      'public' => true,
      'has_archive' => true,
      'supports' => array('title', 'editor', 'thumbnail') 
    )
  );  

  register_post_type( 'publications',
    array(
      'labels' => array(
        'name' => __( 'Publications' ),
        'singular_name' => __( 'Publication' )
      ),
      'public' => true,
      'has_archive' => true,
      'supports' => array('title', 'editor', 'thumbnail') 
    )
  );    
register_post_type( 'articles',
    array(
      'labels' => array(
        'name' => __( 'Articles' ),
        'singular_name' => __( 'Article' )
      ),
      'public' => true,
      'has_archive' => true,
      'supports' => array('title', 'editor', 'thumbnail') 
    )
  );      

}

function register_taxonomies(){

  register_taxonomy('work-type', array('works'),
    array(
      'labels' => array(
        'name' => __( 'Types of Work' ),
        'singular_name' => __( 'Work Type' )
      ),
      'hierarchical' => true,
      'show_ui' => true,
      'query_var' => true
    )
  );
}

add_action( 'init', 'register_post_types', 0 );
add_action( 'init', 'register_taxonomies', 0 );


/* ---- Post Thumbnails ---- */


add_theme_support('post-thumbnails', array('post','articles','works','publications'));
set_post_thumbnail_size( 208, 150, false );
add_image_size("artist-thumb",  208, 150, false);


/* ---- Sidebar ---- */

/*
if ( function_exists('register_sidebar') ){
	register_sidebar(array(
	'name' => 'sidebar1',
	'before_widget' => '<div class="widget">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
	));
}
*/

/* ---- Scripts ---- */

/* Scripts */

function enqueue_scripts(){
    
    wp_enqueue_script(
        "modernizr",
        get_template_directory_uri()."/js/libs/modernizr-2.6.2.min.js",
        null,
        null,
        false
    );
    wp_enqueue_script(
        "jquery",
        get_template_directory_uri()."/js/libs/jquery-1.9.1.min.js", //(fallback)
        null,
        null,
        true
    );
    wp_enqueue_script(
        "plugins",
        get_template_directory_uri()."/js/plugins.js",
        null,
        null,
        true
    ); 
    wp_enqueue_script(
        "scripts",
        get_template_directory_uri()."/js/scripts.js",
        null,
        null,
        true
    );
}


add_action('init', 'enqueue_scripts');

/* ---- Other ---- */

//add excerpt field into pages
add_post_type_support( 'page', 'excerpt' );

//add custom menu support 
add_action('init', 'register_custom_menu');

function register_custom_menu() {
  register_nav_menu('custom_menu', __('Custom Menu'));
}

//replacement text for 'read more' after excerpts
function new_excerpt_more($more) {
  global $post;
	return ' <a class="moretag" href="'. get_permalink($post->ID) . '">Read more</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

?>
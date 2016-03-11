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
  $html = str_replace ('" width="500" height="400" frameborder="0" title="','?title=0&byline=0&portrait=0&color=ffffff" width="500" height="400" frameborder="0" title="',$html);
  return '<div class="video-container">' . $html . '</div>';
}

add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '<h1 class="page-title">Subject: ' );       

        }

    return $title;

});


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
 
register_post_type( 'texts',
    array(
      'labels' => array(
        'name' => __( 'Texts' ),
        'singular_name' => __( 'Text' )
      ),
      'public' => true,
      'has_archive' => true,
      'supports' => array('title', 'editor', 'thumbnail') 
    )
  );      
}

register_post_type( 'home-slide',
            array(
                'labels' => array(
                    'name' => __( 'Homepage Slides' ),
                    'singular_name' => __( 'Homepage Slide' )
                ),
                'public' => true,
                'has_archive' => false,
                'supports' => array('title', 'thumbnail','editor', 'page-attributes'),
                'exclude_from_search' => true,
                'menu_icon'=>'dashicons-images-alt'
            )
        );

register_post_type( 'home-link',
            array(
                'labels' => array(
                    'name' => __( 'Homepage Links' ),
                    'singular_name' => __( 'Homepage Link' )
                ),
                'public' => true,
                'has_archive' => false,
                'supports' => array('title', 'thumbnail','editor', 'page-attributes'),
                'exclude_from_search' => true,
                'menu_icon'=>'dashicons-images-alt'
            )
        );

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
  register_taxonomy('text-type', array('texts'),
    array(
      'labels' => array(
        'name' => __( 'Types of Text' ),
        'singular_name' => __( 'Text Type' )
      ),
      'hierarchical' => true,
      'show_ui' => true,
      'query_var' => true
    )
  );  
}
add_action( 'init', 'register_post_types', 0 );
add_action( 'init', 'register_taxonomies', 0 );


add_filter('next_posts_link_attributes', 'posts_link_attributes_1');
add_filter('previous_posts_link_attributes', 'posts_link_attributes_2');
add_filter( 'jpeg_quality', create_function( '', 'return 100;' ) );
function posts_link_attributes_1() {
    return 'class="prev-post"';
}
function posts_link_attributes_2() {
    return 'class="next-post"';
}
/* ---- Post Thumbnails ---- */

add_theme_support('post-thumbnails', array('post','articles','works','publications','texts','home-slide'));
set_post_thumbnail_size( 208, 150, false );
add_image_size("artist-thumb",  208, 150, false);
add_image_size("work-portrait",  431, 643, false);
add_image_size("home-slide", 643, 431, true);

/* ---- Sidebar ---- */

if ( function_exists('register_sidebar') ){
	register_sidebar(array(
	'name' => 'sidebar1',
  'id' => 'sidebar-1',
	'before_widget' => '<div class="widget">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
	));
}

add_filter( 'pre_option_link_manager_enabled', '__return_true' );


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

add_filter('use_default_gallery_style', '__return_false');
add_filter('post_gallery', 'wpq_wp_gallery', 1, 2);
function wpq_wp_gallery($empty, $attr){
   $post = get_post();
   
   if( ! empty( $attr['ids'] ) ) {
      if( empty( $attr['orderby'] ) ) $attr['orderby'] = 'post__in';
      $attr['include'] = $attr['ids'];
   }
   
   if( isset( $attr['orderby'] ) ) {
      $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
      if( !$attr['orderby'] ) unset( $attr['orderby'] );
   }
   
   extract(shortcode_atts(array(
      'order' => 'ASC',
      'orderby' => 'menu_order ID',
      'id' => $post ? $post->ID : 0,
      'captiontag' => '',
      'include' => '',
      'exclude' => '',
      'columns' => '1'
   ), $attr, 'gallery'));
   
   $id = intval($id);
  
   if( !empty($include) ) {
      $_attachments = get_posts( array(
         'include' => $include,
         'post_status' => 'inherit',
         'post_type' => 'attachment',
         'post_mime_type' => 'image',
         'order' => $order,
         'orderby' => $orderby
      ) );
      $attachments = array();
      foreach ( $_attachments as $key => $val ) {
         $attachments[$val->ID] = $_attachments[$key];
      }
   }
   elseif( !empty($exclude) ) {
      $attachments = get_children( array(
         'post_parent' => $id,
         'exclude' => $exclude,
         'post_status' => 'inherit',
         'post_type' => 'attachment',
         'post_mime_type' => 'image',
         'order' => $order,
         'orderby' => $orderby
      ) );
   }
   else {
      $attachments = get_children( array(
         'post_parent' => $id,
         'post_status' => 'inherit',
         'post_type' => 'attachment',
         'post_mime_type' => 'image',
         'order' => $order,
         'orderby' => $orderby
      ) );
   }
   
   if( empty($attachments) ) 
      return '';
    
   if( is_feed() ) {
      $output = "\n";
      foreach ( $attachments as $att_id => $attachment )
         $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
      return $output;
   }
   $output = '';
   $output .= '<ul class="bxslider">';
   foreach ( $attachments as $att_id => $attachment ) {
      $output .= '<li><img src="'.wp_get_attachment_url( $att_id ).'" title="'.esc_attr($attachment->post_title).'" /><p class="image-caption">'.$attachment->post_excerpt.'</p></li>'; 
   }
   $output .= '</ul>';
   return $output;
}

add_action('wp_enqueue_scripts', 'wpq_scripts_bxslider' , 999);
function wpq_scripts_bxslider() {
   wp_enqueue_style('bxslider-css', 'http://bxslider.com/lib/jquery.bxslider.css', '', '4.1.2', true);
   wp_enqueue_script('bxslider-js', 'http://bxslider.com/lib/jquery.bxslider.js', array('jquery'), '4.1.2', true);
}

add_filter('wp_footer', 'wpq_footer_bxslider', 9999);
function wpq_footer_bxslider() {
   ?>
   <script type="text/javascript">
   jQuery(document).ready(function($){
      $('.bxslider').bxSlider({
         mode: 'fade',
         auto: true,
         pause: 6500,
         nextText: '&gt;',
         prevText: '&lt;',
         pager: false
      });   
   });//jQuery(document)
   </script>
   <?php
}

?>
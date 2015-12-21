<?php

include_once WP_CONTENT_DIR . '/wpalchemy/MetaBox.php';
include_once WP_CONTENT_DIR . '/wpalchemy/MediaAccess.php';


// global styles for the meta boxes
if (is_admin()) add_action('admin_enqueue_scripts', 'metabox_style');

function metabox_style() {
	wp_enqueue_style('wpalchemy-metabox', get_stylesheet_directory_uri() . '/metaboxes/meta.css');
}

$wpalchemy_media_access = new WPAlchemy_MediaAccess();

$work_meta = new WPAlchemy_MetaBox(array
(
    "id" => "_work_meta",
    "title" => "Work Details",
    "template" => get_stylesheet_directory() . '/metaboxes/form-work.php',
    "types" => array('works'),
    "mode" => WPALCHEMY_MODE_EXTRACT
)       
);
 



$pub_meta = new WPAlchemy_MetaBox(array
(
    "id" => "_publication_meta",
    "title" => "Publication Details",
    "template" => get_stylesheet_directory() . '/metaboxes/form-publication.php',
    "types" => array('publications'),
    "mode" => WPALCHEMY_MODE_EXTRACT
)           
);

/* eof */
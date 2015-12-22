<!doctype html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
    <title><?php wp_title('|',true,'right'); bloginfo('name'); ?></title>
		
	<meta name="author" content="">
    <meta name="description" content="<?php bloginfo('description'); ?>">

	<meta name="viewport" content="width=device-width,initial-scale=1">
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />			
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/img/favicon.ico">
	<link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/img/apple-touch-icon.png">
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,400italic,700|Raleway:700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('title'); ?> RSS Feed" href="/feed/" />
    
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <div class="container<?php 
    // if it's a single work in the archive category, output a class to indicate this
    //print_r($post);
    if($post->post_type =='works'):
    $terms = wp_get_post_terms($post->ID, 'work-type');
        $current = false;
        foreach($terms as $term):
            if(in_array('current',$term)):
                $current = true;
                break;
            endif;
        endforeach;
        if($current):
            echo ' archiveitem';
        endif;
    endif; 
    ?>" id="body-container">

        <header class="clearfix">
            <a id="header-logo" title="<?php bloginfo('title'); ?>" href="/"><img src="<?php bloginfo('template_url'); ?>/img/header_logo.png" alt="<?php bloginfo('title'); ?>" /></a>
            <h2 class="strap"><?php bloginfo('description'); ?></h2>
             <div id="search-container" class="search-box-wrapper hide">
                    <div class="search-box">
                    <?php get_search_form(); ?>
                    </div>
            </div> 
            <nav>
                <!-- Main page nav -->
                <ul>
                    <?php
                    $nav_args = array(
                        'sort_column' => 'menu_order, post_title',
                        'title_li' => ''
                    );
                    wp_list_pages($nav_args);
                    ?>
                </ul>                        
            </nav>
        </header>

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
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700|Raleway:700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('title'); ?> RSS Feed" href="/feed/" />
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#348085">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="/mstile-144x144.png">
    <meta name="theme-color" content="#ffffff">
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
            if($term->slug=='current'):
                $current = true;
                break;
            endif;
        endforeach;
        if(!$current):
            echo ' archiveitem';
        else:
            echo ' currentitem';
        endif;
    endif; 
    ?>" id="body-container">

        <header class="clearfix">
            <a id="header-logo" title="<?php bloginfo('title'); ?>" href="/"><img src="<?php bloginfo('template_url'); ?>/img/header_logo.jpg" alt="<?php bloginfo('title'); ?>" /></a>
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

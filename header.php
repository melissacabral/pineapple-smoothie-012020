<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>">

  <?php wp_head(); //hook. required for plugins and the admin bar to work ?>
</head>
<body <?php body_class(); ?>>
<header class="header">
  <div class="header-bar">

    <?php 
    //you must activate this in functions.php with add_theme_support
    the_custom_logo(); ?>

    <h1 class="site-title"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
    <h2><?php bloginfo('description'); ?></h2>
   

    <?php 
    //Main Navigation Bar
    //step 2 of adding WP menus (see functions.php for step 1)
    wp_nav_menu( array(
      'theme_location'  => 'main_nav', //registered in functions.php
      'container'       => 'nav',      //wrap with <nav>
      'container_class' => 'main-menu',
      'fallback_cb'     => false,     //no default menu
    ) ); ?>


    <?php 
    //Social Media Icon Menu
    wp_nav_menu( array(
      'theme_location'  => 'social_icons',
      'container_class' => 'social-navigation',
      'fallback_cb'     => false, 
      'link_before'     => '<span class="screen-reader-text">', //to hide the text but keep the icon
      'link_after'      => '</span>',
    ) );
    ?>


   <?php get_search_form(); //require searchform.php or do default form ?>
    
  </div>
</header>
<div class="wrapper">
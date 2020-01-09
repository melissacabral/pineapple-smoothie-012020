<!DOCTYPE html>
<html lang="<?php bloginfo( 'language' ); ?>">
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
    <nav>
      <ul class="nav">
        <?php 
        wp_list_pages( array(
            'title_li' => '',  //gets rid of "pages" heading
        ) ); 
        ?>
      </ul>
    </nav>

   <?php get_search_form(); //require searchform.php or do default form ?>
    
  </div>
</header>
<div class="wrapper">
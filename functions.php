<?php
//max width of youtube embeds and others
if ( ! isset( $content_width ) ) $content_width = 700;

//allows you to add featured image to each post
add_theme_support( 'post-thumbnails' );

//background customization (will automatically apply to the <body>)
add_theme_support( 'custom-background' );


//Custom Logo. You also need to display the logo in your header file (or any tempate)
$logo_args = array(
	'width' 		=> 200,
	'height' 		=> 200,
	'flex-height' 	=> true,
    'flex-width'  	=> true,
);
add_theme_support( 'custom-logo', $logo_args );

//Make the page <title> SEO and human friendly
//DEV: do NOT hard code the <title> in your header
add_theme_support( 'title-tag' );

//Turn on modern HTML5 markup for WP generated forms, etc.
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

//make the RSS feeds more useful. 
//DEV: Use this if your site has a blog or news section
add_theme_support( 'automatic-feed-links' );

//allow bloggers to choose a format for their post besides "standard". 
//DEV: delete the ones you don't plan on styling
add_theme_support( 'post-formats', array('quote', 'image', 'video', 'audio', 'gallery', 
					'aside', 'status', 'link', 'chat' ) );


//Override the default "gutenberg" editor colors
add_theme_support( 'editor-color-palette', array(
		array(
			'name' 	=> 'Pineapple Yellow',
			'slug'	=> 'pineapple-yellow',
			'color'	=> '#EDD614',
		),
		array(
			'name' 	=> 'Leaf Green',
			'slug'	=> 'leaf-green',
			'color'	=> '#55AF24',
		),
		array(
			'name' 	=> 'Warm Gray',
			'slug'	=> 'warm-gray',
			'color'	=> '#574F47',
		),
		array(
			'name' 	=> 'White',
			'slug'	=> 'white',
			'color'	=> '#fff',
		),
) );

//Change the length of default excerpts (FILTER HOOK EXAMPLE)
function pineapple_ex_length(){
	return 20; //words
}
add_filter( 'excerpt_length', 'pineapple_ex_length' );




function pineapple_readmore(){
	return ' <a href="' . get_the_permalink() . '">Read More&hellip;</a>';
}
add_filter( 'excerpt_more', 'pineapple_readmore' );


//Example of an action hook
function pineapple_foot(){
	echo 'Whatever you want!!! <br>';
}
//										high number causes this to run last
//add_action( 'wp_footer', 'pineapple_foot', 999 );


function pineapple_otherfoot(){
	echo 'I want this to show up first <br>';
}
//											low number causes this to run first
//add_action( 'wp_footer', 'pineapple_otherfoot', 0);


//hook a function onto loop_start
function pineapple_loopy(){
	echo 'HERE COMES THE LOOP:';
}
//										high number causes this to run last
//add_action( 'loop_start', 'pineapple_loopy' );


//Attach the comment reply javascript (better UX when replying to comments)
function pineapple_commentreply(){
	//only on posts or pages that are open to comments
	if( is_singular() AND comments_open() ){
		wp_enqueue_script( 'comment-reply' );
	}
	//put our icon font stylesheet on the page
	wp_enqueue_style( 'genericons', get_stylesheet_directory_uri() . '/genericons/genericons.css' );
}
add_action( 'wp_enqueue_scripts', 'pineapple_commentreply' );


//Create all the needed menu areas for this theme (step 1)
add_action( 'init', 'pineapple_menu_areas' );
function pineapple_menu_areas(){
	register_nav_menus( array(
		'main_nav' 		=> 'Main Navigation',
		'social_icons'	=> 'Social Media Icons',
	) );
}


//Custom function to handle all types of loop pagination (single/archive/etc)
function pineapple_pagination(){
	//if looking at a single page or post
	if( is_singular() ){
		previous_post_link( '%link', '&larr; %title'  );
		next_post_link( '%link', '%title &rarr;' );		
	}else{
		//archive pagination
		if( wp_is_mobile() ){
			//mobile  (prev/next buttons)
			previous_posts_link();
			next_posts_link();
		}else{
			//desktop (numbered pagination)
			the_posts_pagination(array(
				'prev_text' => '&larr; Previous',
				'next_text' => 'Next Page &rarr;',
				'mid_size'	=> 10,
			));
		}		
	}
}

//Register as many Widget Areas (Dynamic sidebars) as this theme needs
add_action( 'widgets_init', 'pineapple_widget_areas' );
function pineapple_widget_areas(){
	register_sidebar( array(
		'name' 	=> 'Blog Sidebar',
		'id' 	=> 'blog-sidebar',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</section>',
	) );

	register_sidebar( array(
		'name' 	=> 'Page Sidebar',
		'id' 	=> 'page-sidebar',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</section>',
	) );

	register_sidebar( array(
		'name' 	=> 'Footer Area',
		'id' 	=> 'footer-area',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</section>',
	) );
}

//Change the comment count to only include real comments
add_filter( 'get_comments_number', 'pineapple_comment_count' );
function pineapple_comment_count(){
	global $id;
	//array containing all comments and pings
	$comments = get_approved_comments($id);
	$count = 0;
	foreach( $comments as $comment ){
		//if it's a real comment, increase the count
		if( $comment->comment_type == '' ){
			$count++;
		}
	}
	return $count;
}


//Count all the pingbacks and trackbacks on this post
function pineapple_pings_count(){
	global $id;
	//array containing all comments and pings
	$comments = get_approved_comments($id);
	$count = 0;
	foreach( $comments as $comment ){
		//if it's not a real comment, increase the count
		if( $comment->comment_type != '' ){
			$count++;
		}
	}
	return $count;
}


//no close php
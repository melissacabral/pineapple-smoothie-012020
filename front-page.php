<?php get_header(); //todo: make a special header for home ?>


<main class="wide-content">
	<?php //The Loop
	if( have_posts() ){ 
		while( have_posts() ){ 
			the_post();
	?>

	<section class="intro">
		<h2><?php the_title(); ?></h2>

		<div class="page-content">
			<?php the_content(); ?>
		</div>
	</section>

	<section class="featured-work">
		PUT FEATURED WORK HERE SOMEDAY
	</section>

	<section class="services">
		PUT 3 SERVICES HERE
	</section>

	<?php 
		} //end while
	}else{ ?>

	<div class="noposts">
		<h2>Sorry, no page found</h2>
	</div>

	<?php } ?>
</main>


<?php get_footer(); ?>
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



			<?php 
		} //end while
	}else{ ?>

		<div class="noposts">
			<h2>Sorry, no page found</h2>
		</div>

	<?php } //end of main loop ?>


<?php //Custom Query to get one piece of work
$portfolio = new WP_Query( array(
	'post_type' 		=> 'portfolio_piece',
	'posts_per_page' 	=> 1,
	'tax_query'			=> array(
							array(
								'taxonomy'	=> 'work_type',
								'field'		=> 'slug',
								'terms'		=> 'web-design'
							),
						),
) );
//custom loop
if( $portfolio->have_posts() ){
 ?>	
	<section class="featured-work">
		<h2>Featured Work</h2>
		<?php while( $portfolio->have_posts() ){
			$portfolio->the_post();
		 ?>
		<div class="portfolio-piece">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'medium' ); ?>					
			</a>
				<h3><?php the_title(); ?></h3>
				<p><?php the_excerpt(); ?></p>			
		</div>
		<?php } ?>
	</section>
<?php }//end custom portfolio loop ?>


	<section class="services">
		PUT 3 SERVICES HERE
	</section>

</main>


<?php get_footer(); ?>
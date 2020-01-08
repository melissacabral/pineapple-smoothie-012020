<?php get_header(); //require header.php ?>
  <main class="content">
    
  	<?php 
  	//THE LOOP
  	//if there are posts, show them
  	if( have_posts() ){
  		while( have_posts() ){
  			the_post(); 
  	?>

    <article class="post">
      <h2 class="entry-title"> 
					<?php the_title(); ?> 
			</h2>
      <div class="entry-content">
      	 <?php the_content(); ?>
      </div>
     
    </article>
    <!-- end .post -->

	<?php
		} //end while
	 }else{ ?>
		
		<div class="noposts">
			<h2>Sorry, no posts found</h2>
		</div>

   <?php } //end if posts found ?>
  </main>
  <!-- end #content -->

<?php get_sidebar(); //require sidebar.php ?>

<?php get_footer(); //require footer.php ?>
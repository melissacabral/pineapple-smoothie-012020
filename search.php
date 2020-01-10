<?php get_header(); //require header.php ?>
  <main class="content">
    
  	<?php 
  	//THE LOOP
  	//if there are posts, show them
  	if( have_posts() ){
    ?>

     <h1>Search Results for "<?php echo get_search_query(); ?>"</h1>

    <?php
  		while( have_posts() ){
  			the_post(); 
  	?>

    <article class="post">
      <h2 class="entry-title"> 
				<a href="<?php the_permalink(); ?>"> 
					<?php the_title(); ?> 
				</a>
			</h2>
      <div class="entry-content">
      	 <?php the_excerpt(); //short version of the content ?>
      </div>
      <div class="postmeta">
        <span class="author">by: <?php the_author(); ?> </span>
        <span class="date"> <?php the_date(); ?> </span>
        <span class="num-comments"> <?php comments_number(); ?> </span>
        <span class="categories"> 
			   <?php the_category( ', ' ); ?>
		    </span>
        <span class="tags"><?php the_tags(); ?></span>
      </div>
      <!-- end .postmeta -->
    </article>
    <!-- end .post -->

	<?php
		} //end while


    //custom function for pagination
    pineapple_pagination();

	 }else{ ?>
		
		<div class="noposts">
			<h2>Sorry, no posts found</h2>
		</div>

   <?php } //end if posts found ?>
  </main>
  <!-- end #content -->

<?php get_sidebar(); //require sidebar.php ?>

<?php get_footer(); //require footer.php ?>
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
      <?php 
      //this supports posts with page breaks
      wp_link_pages(); 
      ?>
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

 <?php comments_template(); //require comments.php ?>

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
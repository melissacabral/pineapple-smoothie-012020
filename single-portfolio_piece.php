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

    <div class="overlay">
      <?php 
//Featured Image. We activated this feature in functions.php
//'thumbnail', 'medium', 'large' or 'full'
      the_post_thumbnail( 'medium' );  ?>


      <?php the_terms( $post->ID, 'work_type', '<h4>', ', ', '</h4>' ); ?>

      <h2 class="entry-title"> 
        <a href="<?php the_permalink(); ?>"> 
          <?php the_title(); ?> 
        </a>
      </h2>

      <?php 
      //how to show individual custom fields without ACF
      $client = get_post_meta( $post->ID, 'client', true ); 
      $year = get_post_meta(  $post->ID, 'year', true );
      if( $client OR $year ){  ?>
        <h3>
          <?php echo $client . ' &ndash; ' . $year; ?>
        </h3>
      <?php } ?>

    </div>

    <div class="entry-content">
      <?php the_content(); ?>
      <?php 
      //this supports posts with page breaks
      wp_link_pages(); 
      ?>
    </div>

  </article>
  <!-- end .post -->



  <?php
		} //end while

    //custom function for pagination
    pineapple_pagination();

  }else{ ?>

    <div class="noposts">
     <h2><?php _e('Sorry, no posts found', 'pineapple-smoothie'); ?></h2>
   </div>

 <?php } //end if posts found ?>
</main>
<!-- end #content -->


<?php get_footer(); //require footer.php ?>
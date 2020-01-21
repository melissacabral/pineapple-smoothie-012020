<?php get_header(); //require header.php ?>
<main class="content">

  <?php 
//THE LOOP
//if there are posts, show them
  if( have_posts() ){  ?>

    <h1 class="page-title">Portfolio</h1>

    <?php while( have_posts() ){
      the_post(); 
      ?>

      <article <?php post_class(); ?>>

        <div class="overlay">
          <?php 
//Featured Image. We activated this feature in functions.php
//'thumbnail', 'medium', 'large' or 'full'
          the_post_thumbnail( 'medium' );  ?>

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
          <?php the_excerpt(); ?>
        </div>

      </article>
      <!-- end .post -->

      <?php
} //end while

//custom function
pineapple_pagination();

}else{ ?>

  <div class="noposts">
    <h2>Sorry, no posts found</h2>
  </div>

<?php } //end if posts found ?>
</main>
<!-- end #content -->


<?php get_footer(); //require footer.php ?>
<aside class="sidebar">
    
    <?php //if there are widgets in the widget area, show them, otherwise show fallback stuff
    if( ! dynamic_sidebar( 'blog-sidebar' ) ){
    ?>    

    <section id="categories" class="widget">
      <h3 class="widget-title"> Categories </h3>
      <ul>
       <?php 
       //show the 10 most used categories with post counts
       wp_list_categories( array(
        'show_count'  => 1,
        'orderby'     => 'count',
        'order'       => 'DESC',
        'number'      => 10,
        'title_li'    => '',
       ) ); ?>
      </ul>
    </section>
    <section id="archives" class="widget">
      <h3 class="widget-title"> Archives </h3>
      <ul>
        <?php 
        //link to archives by year
        wp_get_archives( array(
            'type' => 'yearly',
            'limit' => 10,
            'show_post_count' => 1,
        ) ); ?>
      </ul>
    </section>

    <section id="tags" class="widget">
      <h3 class="widget-title"> Tags </h3>
     <?php wp_tag_cloud( array(
        'smallest'   => 1,
        'largest'    => 1,
        'unit'       => 'em',

     ) ); ?>
    </section>

    <section id="meta" class="widget">
      <h3 class="widget-title"> Meta </h3>
      <ul>
        <?php wp_register(); //depending on settings, show a link to admin, register form, or nothing ?>
        <li><?php wp_loginout(); ?></li>
      </ul>
    <?php 
    if( ! is_user_logged_in() ){
         wp_login_form(); 
    }
    ?>
    </section>
    <?php } ?>
  </aside>
  <!-- end #sidebar -->
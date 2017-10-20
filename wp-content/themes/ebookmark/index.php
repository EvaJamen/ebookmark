<?php get_header(); //appel du template header.php  ?>

<div id="content" class="container">
    
  <div class="main">
  <div class="impact">
    <h1 class='page_title'>Livres à la Une</h1>
  </div>
      
  <div >
  <?php
  $args= array(
    'post_type' => 'ebook',
    'posts_per_page' => 4
  );
  $the_query = new WP_Query( $args );
    // The Loop
      
    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
    ?>
      
      <article>
          <div class="bloc">
        <h1 class="article_title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
        <h2 class="date">Posté le <?php the_time('j F, Y') ?></h2>
        <p><?php the_excerpt(); ?></p>
          </div>
          
          <div class="thumbnail">
          <?php
            if(has_post_thumbnail())
            {
              the_post_thumbnail("hub_article_thumbnail");
            }
          ?>
        </div>
      </article>
      <hr>
            <?php
          }
             /* Restore original Post Data */
             wp_reset_postdata();
         }
          ?>
  </div>
  <div class="row pagination">
    <div>
      <?php wp_pagenavi(array( 'query' => $the_query )); ?>
    </div>
  </div>
        </div>
</div> <!-- /content -->

<?php get_footer(); //appel du template footer.php ?>


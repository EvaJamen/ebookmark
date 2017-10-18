<?php get_header(); //appel du template header.php  ?>

<div id="content" class="container">
  <div class="row">
    <h1 id="impact" class="col-md-12">Livres à la Une</h1>
  </div>
  <div class="row">
  <?php
  $args= array(
    'post_type' => 'ebook',
    'posts_per_page' => 3
  );
  $the_query = new WP_Query( $args );
    // The Loop
    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
    ?>
      <article class="col-md-4 resume">
        <div class="thumbnail">
          <?php
            if(has_post_thumbnail())
            {
              the_post_thumbnail("hub_article_thumbnail");
            }
          ?>
        </div>
        <h1 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
        <h2>Posté le <?php the_time('F jS, Y') ?></h2>
        <p><?php the_excerpt(); ?></p>
      </article>
            <?php
          }
             /* Restore original Post Data */
             wp_reset_postdata();
         }
          ?>
  </div>
  <div class="row pagination">
    <div class="col-sm-12">
      <?php wp_pagenavi(array( 'query' => $the_query )); ?>
    </div>
  </div>
</div> <!-- /content -->

<?php get_footer(); //appel du template footer.php ?>

<?php get_header(); //appel du template header.php  ?>

<div id="content" class="container">
    
  <div class="main">
  <div class="single_impact">
    <h1 class='single_title'>Fiche de lecture</h1>
  </div>
      
  <div >
  <?php
  $args= array(
    'post_type' => 'ebook',
    'posts_per_page' => 1
  );
  $the_query = new WP_Query( $args );
    // The Loop
      
    if (have_posts()){
        while (have_posts()){
            the_post();
    ?>
      <article class="single_article">
          <div class="bloc">
        <h1 class="article_title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
        <h2 class="date">Posté le <?php the_time('j F, Y') ?></h2>
        <p><?php the_content(); ?></p>
              <hr>
              <p class="postmetadata">Posted in <?php the_taxonomies(', '); ?></p>
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
            <?php
          }
             /* Restore original Post Data */
             wp_reset_postdata();
         }
          ?>
      
  </div>
        </div>
</div> <!-- /content -->

<?php get_footer(); //appel du template footer.php ?>

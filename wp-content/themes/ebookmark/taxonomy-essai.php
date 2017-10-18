<?php
/*
Template Name: Genre
*/
?>
<?php get_header(); //appel du template header.php  ?>

<div id="content" class="container">
    <div class="row">
       
        <?php
            // Cette fonction récupère le nom de la taxonomie sélectionnée.
            // Il faudrait la mettre dans inc > create_user.php ou create_film dans le cas de Léna
            function get_current_archive_taxonomy(){
                $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
                $current_taxo = $term->name;
                return $current_taxo;
            }
        ?>
        <h1 class="col-sm-12 col-md-12">
            <?php echo 'LES '.get_current_archive_taxonomy(); ?>
        </h1>
    </div>
    <div class="row">
        <?php
            // Ici je dis quel type de contenu récupérer
            $args= array(
                'post_type' => 'user',
                'genre' => get_current_archive_taxonomy()
            );
            
            $the_query = new WP_Query( $args );
            
            // The Loop
            if ( $the_query->have_posts() )
            {
                while ( $the_query->have_posts() ) 
                {
                    $the_query->the_post();
        ?>
                    <article class="col-sm-12 col-md-3">
                        <div class="article-wrapper">
                            <div class="thumbnail">
                                <?php
                                    if(has_post_thumbnail())
                                    {
                                        the_post_thumbnail("hub_movie_thumbnail");
                                    }
                                ?>
                            </div>
                            <h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
                            <h2>Posté le <?php the_time('F jS, Y') ?></h2>
                            <p><?php the_excerpt(); ?></p>
                        </div>
                    </article>
        <?php
                }
             /* Restore original Post Data */
             wp_reset_postdata();
            }
        ?>
  </div>
  <h3>Derniers articles</h3>
<ul>
<?php
    $args = array(
    'post_type' => 'user',
    'genre' => get_current_archive_taxonomy(),
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => 10
     );
$query = new WP_Query( $args ); 
?>
<?php while ($query->have_posts()) : $query->the_post(); ?>
    <li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); the_post_thumbnail("hub_movie_thumbnail");?></a></li>
<?php endwhile; ?>
</ul>
  <div class="row pagination">
    <div class="col-sm-12">
<!--      <?php wp_pagenavi(array( 'query' => $the_query )); ?>-->
    </div>
  </div>
</div> <!-- /content -->

<?php get_footer(); //appel du template footer.php ?>
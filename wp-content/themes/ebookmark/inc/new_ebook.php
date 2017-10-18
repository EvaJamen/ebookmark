<?php
function ajout_custom_type_init() {
$post_type = "ebook";
$labels = array(
      'name'               => 'Ebooks',
      'singular_name'      => 'Ebook',
      'all_items'          => 'Tous les ebooks',
      'add_new'            => 'Ajouter un ebook',
      'add_new_item'       => 'Ajouter un nouveau ebook',
      'edit_item'          => "Editer un ebook",
      'new_item'           => 'Nouveau ebook',
      'view_item'          => "Lire le ebook",
      'search_items'       => 'Chercher un ebook',
      'not_found'          => 'Pas de résultat',
      'not_found_in_trash' => 'Pas de résultat',
      'parent_item_colon'  => 'Ebook parent :',
      'menu_name'          => 'Ebooks',
  );
  $args = array(
      'labels'              => $labels,
      'hierarchical'        => false,
      'supports'            => array( 'title','thumbnail','editor', 'excerpt', 'revisions'),
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'menu_position'       => 0,
      'menu_icon'           => 'dashicons-book',
      'show_in_nav_menus'   => true,
      'publicly_queryable'  => true,
      'exclude_from_search' => false,
      'has_archive'         => false,
      'query_var'           => true,
      'can_export'          => true,
      'rewrite'             => array( 'slug' => $post_type )
  );
  register_post_type($post_type, $args );
  $taxonomy="genre";
  $object_type = array("ebook");
  $args = array(
          'label' => __( 'Genre' ),
          'rewrite' => array( 'slug' => 'genre' ),
          'hierarchical' => true,
      );
  register_taxonomy( $taxonomy, $object_type, $args );
  $taxonomy="style";
  $object_type = array("ebook");
  $args = array(
          'label' => __( 'Style' ),
          'rewrite' => array( 'slug' => 'style' ),
          'hierarchical' => true,
      );
    register_taxonomy( $taxonomy, $object_type, $args );
      $taxonomy="auteur";
  $object_type = array("ebook");
  $args = array(
          'label' => __( 'Auteur' ),
          'rewrite' => array( 'slug' => 'auteur' ),
          'hierarchical' => true,
      );
    register_taxonomy( $taxonomy, $object_type, $args );
    
}
add_action( 'init', 'ajout_custom_type_init' );

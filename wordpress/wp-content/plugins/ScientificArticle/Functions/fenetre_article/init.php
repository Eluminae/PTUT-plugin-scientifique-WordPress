<?php
/**
 * Created by PhpStorm.
 * User: noke
 * Date: 17/01/16
 * Time: 12:42
 */

// empeche d'acceder à cette page via l'url !
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

require_once ( dirname( __FILE__ ) . '/create_MetaBoxes.php' );
require_once ( dirname( __FILE__ ) . '/publish.php' );

function ScientificArticle_article_init(){
    // setup postType article
    ScientificArticle_article_setup_post_type();

    add_action("add_meta_boxes", "ScientificArticle_cree_custom_metaboxes");

    add_action("save_post", "ScientificArticle_article_save");
}

function ScientificArticle_article_setup_post_type()
{

    // post type des articles
    $labels = array(
        'name' => 'Article scientifique', // nom du type de post
        'menu_name' => 'Articles scientifiques', // nom affiché
        'edit_item' => 'Editer un article', // ce qui est ecrit sur les boutons pour modifier un post
        'new_item' => 'Ajouter un article', // aucune idée
        'add_new' => 'Ajouter un article', // ce qui est ecrit sur les boutons pour ajouter un post
        'add_new_item' => 'Ajouter un article', // aucune idée encore
        'search_items' => 'Rechercher un article' // ce qui est ecrit sur le bouton de recherche
    );

    register_post_type('SA_article', array( // 'SA_article' car ScientificArticle_article est trop long ^^
        'public' => true,
        'publicity_queryable' => false,
        'labels' => $labels,
        'supports' => array('title', 'thumbnail', 'editor')
    ));
}
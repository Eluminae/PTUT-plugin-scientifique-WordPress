<?php
/**
 * Created by PhpStorm.
 * User: noke
 * Date: 17/01/16
 * Time: 12:43
 */

// empeche d'acceder à cette page via l'url !
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

require_once ( dirname( __FILE__ ) . '/create_MetaBoxes.php' );
require_once ( dirname( __FILE__ ) . '/publish.php' );

function ScientificArticle_auteur_init(){
    // setup postType auteur
    ScientificArticle_auteur_setup_post_type();

    // on indique le script à executer lors de la creation des MataBoxes
    add_action("add_meta_boxes", "ScientificArticle_auteur_create_metaboxes");

    // on indique le script à executer lors du save
    add_action("save_post", "ScientificArticle_auteur_save");

}


function ScientificArticle_auteur_setup_post_type($post)
{
    // post type des auteurs
    $labels = array(
        'name' => 'Auteur scientifique', // nom du type de post
        'menu_name' => 'Auteurs scientifiques', // nom affiché
        'edit_item' => 'Modifier un auteur', // ce qui est ecrit sur les boutons pour modifier un post
        'new_item' => 'Modifier un auteur', // aucune idée
        'add_new' => 'Ajouter un auteur', // ce qui est ecrit sur les boutons pour ajouter un post
        'add_new_item' => 'Ajouter un auteur', // aucune idée encore
        'search_items' => 'Rechercher un auteur' // ce qui est ecrit sur le bouton de recherche
    );

    register_post_type('auteur', array(
        'public' => true,
        'publicity_queryable' => false,
        'labels' => $labels,
        'supports' => array('title', 'thumbnail')
    ));
}
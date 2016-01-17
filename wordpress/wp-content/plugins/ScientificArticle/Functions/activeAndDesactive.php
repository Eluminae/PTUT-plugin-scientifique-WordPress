<?php
/**
 * Created by PhpStorm.
 * User: noke
 * Date: 17/01/16
 * Time: 10:23
 */

// empeche d'acceder à cette page via l'url !
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

function ScientificArticle_setup_post_type() {

    $labels=array(
        'singular_name'=>'Article scientifique',
        'menu_name'=>'Articles scientifiques',
        'edit_item'=>'Editer un article',
        'new_item'=>'Ajouter un article',
        'add_new' => 'Ajouter un article',
        'add_new_item' => 'Ajouter un article',
        'search_items'=>'Rechercher un article'
    );

    register_post_type('article',array(
        'public' =>true,
        'publicity_queryable'=>false,
        'labels' => $labels,
        'supports' => array('title','thumbnail')
    ));


}
add_action( 'init', 'ScientificArticle_setup_post_type' );

function ScientificArticle_install(){


    // Clear the permalinks after the post type has been registered
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'ScientificArticle_install' );



function ScientificArticle_uninstall(){
    // Clear the permalinks to remove our post type's rules
    flush_rewrite_rules();
}
register_deactivation_hook(__FILE__, 'ScientificArticle_uninstall' );


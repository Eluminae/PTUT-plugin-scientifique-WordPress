<?php
/**
 * Created by PhpStorm.
 * User: noke
 * Date: 17/01/16
 * Time: 10:23
 */


// on inclu les deux init
require_once ( dirname( __FILE__ ) . '/fenetre_article/init.php' );



// on setup les deux fenetres article et auteur
function ScientificArticle_setup_post_type(){
    ScientificArticle_article_init();
}
// permet d'executer cette fonction automatiquement à chaque load de page (en gros)
add_action( 'init', 'ScientificArticle_setup_post_type' );


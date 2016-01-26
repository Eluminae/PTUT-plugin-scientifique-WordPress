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







// fonction executée à l'activation du plugin
function ScientificArticle_activation(){




    // Clear the permalinks after the post type has been registered
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'ScientificArticle_activation' );


// fonction executée à la desactivation du plugin
function ScientificArticle_desactivation(){




    // Clear the permalinks to remove our post type's rules
    flush_rewrite_rules();
}
register_deactivation_hook(__FILE__, 'ScientificArticle_desactivation' );


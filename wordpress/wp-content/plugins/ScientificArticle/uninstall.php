<?php
/**
 * Created by PhpStorm.
 * User: noke
 * Date: 17/01/16
 * Time: 11:11
 */

// code qui sera executé lors de la desinstallation du plugin
// suppression de la DB

$args = array(
    'numberposts' => -1,
    'post_type' =>'sa_article'
);
$posts = get_posts( $args );
if (is_array($posts)) {
    foreach ($posts as $post) {
        wp_delete_post( $post->ID, true);
    }
}



<?php
/**
 * Created by PhpStorm.
 * User: noke
 * Date: 17/01/16
 * Time: 13:29
 */


// ici on vas devoir enregistrer l'auteur dans la future BD
function ScientificArticle_auteur_save($post_id){

    if (get_post_type($post_id) == "sa_auteur") {
        // Checks for input and sanitizes/saves if needed
        if (isset($_POST['auteur_nom'])) {
            update_post_meta($post_id, '_ScientificArticle_auteur_nom', sanitize_text_field($_POST['auteur_nom']));
        }
        if (isset($_POST['auteur_prenom'])) {
            update_post_meta($post_id, '_ScientificArticle_auteur_prenom', sanitize_text_field($_POST['auteur_prenom']));
        }
        if (isset($_POST['auteur_profession'])) {
            update_post_meta($post_id, '_ScientificArticle_auteur_profession', sanitize_text_field($_POST['auteur_profession']));
        }
        if (isset($_POST['auteur_affiliation'])) {
            update_post_meta($post_id, '_ScientificArticle_auteur_affiliation', sanitize_text_field($_POST['auteur_affiliation']));
        }
        if (isset($_POST['auteur_site'])) {
            update_post_meta($post_id, '_ScientificArticle_auteur_site', sanitize_text_field($_POST['auteur_site']));
        }
    }
}

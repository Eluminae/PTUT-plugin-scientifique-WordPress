<?php
/**
 * Created by PhpStorm.
 * User: noke
 * Date: 25/01/16
 * Time: 10:46
 */



function ScientificArticle_article_save($post_id)
{

    if (get_post_type($post_id) == "sa_article") {
        if (isset($_POST['meta-checkbox'])) {

            foreach($_POST['meta-checkbox'] as $row){
                $liste_auteur[] = $row;
            }

            update_post_meta($post_id, '_ScientificArticle_article_auteurs', serialize($liste_auteur));
        }
        else {
            // ici il faut supprimer le champ s'il existe
            delete_post_meta($post_id, '_ScientificArticle_article_auteurs');
        }

    }
    

}


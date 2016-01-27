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

        if (is_super_admin()){
            // ici il faut supprimer le champ s'il existe car le super admin peut n'avoir mis aucun auteur scientifique
            delete_post_meta($post_id, '_ScientificArticle_article_auteurs');
        }


        foreach($_POST['meta-checkbox'] as $row){
            $liste_auteur[] = $row;
        }

        update_post_meta($post_id, '_ScientificArticle_article_auteurs', serialize($liste_auteur));


    }
    

}


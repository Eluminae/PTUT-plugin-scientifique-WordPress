<?php
/**
 * Created by PhpStorm.
 * User: noke
 * Date: 25/01/16
 * Time: 10:46
 */

// ici on vas devoir enregistrer l'auteur dans la future BD

function ScientificArticle_pdf_meta_save( $post_id ){
    
    update_post_meta($post_id, "_url_pdf", $_POST["url_pdf"]);
    
    if(!empty($_FILES['url_pdf']['name'])){
        $override['action'] = 'editpost';
        $uploaded_file = wp_handle_upload($_FILES['product_image'], $override);
        update_post_meta($post_id, "product_image", $uploaded_file['url']);
    }
}

function ScientificArticle_article_save($post_id)
{

    if (get_post_type($post_id) == "sa_article") {
        if (isset($_POST['meta-checkbox'])) {

            foreach($_POST['meta-checkbox'] as $row){
                $liste_auteur[] = $row;
            }

            update_post_meta($post_id, '_ScientificArticle_article_auteurs', serialize($liste_auteur));
        }

        ScientificArticle_pdf_meta_save($post_id);
    }
    

}


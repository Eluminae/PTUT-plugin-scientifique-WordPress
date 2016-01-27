
<?php

// empeche d'acceder à cette page via l'url !
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
// implemente entre autre la fonction add_meta_box
include_once($_SERVER["DOCUMENT_ROOT"].'/wp-admin/includes/template.php');


//ajoute toutes les meta_boxes
function ScientificArticle_cree_custom_metaboxes()
{
    //changement du nom de la feature image box
    remove_meta_box( 'postimagediv', 'rotator', 'side' );
    add_meta_box('postimagediv', 'Miniature', 'post_thumbnail_meta_box','SA_article', 'advanced', 'high');

    add_meta_box('postAuteur', 'Auteurs de cet article', 'ScientificArticle_article_metabox_addauteur','SA_article', 'advanced', 'high');


    add_action("save_post", "ScientificArticle_pdf_meta_save");
}


function ScientificArticle_article_metabox_addauteur($post){

    $list_user =get_users( 'role=auteur_scientifique' );

    //print_r($list_user);

    // on recupere les anciens champs
    $auteurs  = get_post_meta($post->ID,'_ScientificArticle_article_auteurs',true);
    $auteurs = unserialize($auteurs);

    $current_user = wp_get_current_user();
    $id_curr_user = $current_user->ID;
    $chaine = "$current_user->first_name $current_user->last_name";


    // on gere l'ajout de l'id de l'user current


    ?>


    <input name="meta-checkbox[]" type="checkbox" value="<?php echo $id_curr_user ?>" disabled="disabled" checked>
    <label><?php echo esc_html($chaine); ?></label><br/>
    

    <?php
    foreach ( $list_user as $user ) {
        $id = $user->ID;

        if ($id_curr_user != $id) {

            $first_name = get_user_meta($id, 'first_name', true);
            $last_name = get_user_meta($id, 'last_name', true);

            $chaine = "$first_name $last_name";

            ?>


            <input name="meta-checkbox[]" type="checkbox" value="<?php echo $id ?>"

                <?php


                if ($auteurs) {
                    // si il est un auteur, on pré-check la checkbox

                    if (in_array($id, $auteurs)) {
                        echo "checked";
                    }
                }


                ?>

            >
            <label><?php echo esc_html($chaine); ?></label><br/>
            <?php
        }


    }



}
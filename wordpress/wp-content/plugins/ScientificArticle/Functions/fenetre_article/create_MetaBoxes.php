
<?php

// empeche d'acceder à cette page via l'url !
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
// implemente entre autre la fonction add_meta_box
include_once($_SERVER["DOCUMENT_ROOT"].'/wp-admin/includes/template.php');


//contenu de la boite avec l'upload de fichier pdf
function ScientificArticle_article_pdf_metabox($post){
    $url=  get_post_meta( $post->ID, '_url_pdf', true );
    if($url!=null){
        ?>  <label>Fichier actuellement lié:  <?php echo basename($url);?></label></br> <?php
    }
    ?>
    <input class="file" type="file" id="url_pdf" name="url_pdf" value=""/>
  <?php
}


//ajoute toutes les meta_boxes
function ScientificArticle_cree_custom_metaboxes()
{
    //changement du nom de la feature image box
    remove_meta_box( 'postimagediv', 'rotator', 'side' );
    add_meta_box('postimagediv', 'Miniature', 'post_thumbnail_meta_box','SA_article', 'advanced', 'high');

    add_meta_box('postAuteur', 'Auteurs de cet article', 'ScientificArticle_article_metabox_addauteur','SA_article', 'advanced', 'high');

    //boite pour lier un fichier pdf à l'article
    add_meta_box( "url_du_pdf", "Fichier à télécharger", "ScientificArticle_article_pdf_metabox",'SA_article', 'advanced', 'high' );
    
    add_action("save_post", "ScientificArticle_pdf_meta_save");
}


function ScientificArticle_article_metabox_addauteur($post){

    $list_user =get_users( 'role=auteur_scientifique' );

    //print_r($list_user);

    // on recupere les anciens champs
    $auteurs  = get_post_meta($post->ID,'_ScientificArticle_article_auteurs',true);
    $auteurs = unserialize($auteurs);

    foreach ( $list_user as $user ) {
        $id = $user->ID;

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
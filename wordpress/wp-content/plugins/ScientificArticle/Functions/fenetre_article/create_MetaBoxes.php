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
        $type = 'SA_auteur';
        $args=array(
        'post_type' => $type,
        'post_status' => 'draft',
        'posts_per_page' => -1,
        'caller_get_posts'=> 1);


        // on cherche à obtenir la liste de tous les auteurs
        $my_query = new WP_Query($args);

        if ( $my_query->have_posts() ) {

            while ( $my_query->have_posts() ) {
                $my_query->the_post();
                $author = get_post_meta(get_the_id(), "_ScientificArticle_auteur_nom");


               // on recupere les anciens champs
                $auteurs  = get_post_meta($post->ID,'_ScientificArticle_article_auteurs',true);

                $auteurs = unserialize($auteurs);


                ?>

                    <input name="meta-checkbox[]" type="checkbox" value="<?php echo esc_html(get_the_id()) ?>"

                        <?php
                            // si il est un uteur, on pré-check la checkbox
                            if (in_array(get_the_id(), $auteurs)){
                                echo "checked";
                            }
                        ?>

                    >
                <label><?php echo $author[0]; ?></label><br/>

                <?php
            }

            ?>
            <?php
        }
        ?>
<?php
}
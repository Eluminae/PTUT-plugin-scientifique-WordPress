<?php

// empeche d'acceder à cette page via l'url !
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
// implemente entre autre la fonction add_meta_box
include_once($_SERVER["DOCUMENT_ROOT"].'/wp-admin/includes/template.php');

//contenu de la boite avec l'upload de fichier pdf
function ScientificArticle_article_GAS_pdf_metabox($post){

  $url_pdf = get_post_meta( $post->ID, '_url_pdf', true );
  ?>
  <input id="upload_pdf_button" class="button button-primary button-large" type="button" value="Télécharger un document pdf" />
  <input id="url_pdf" style="width: 450px;" type="text" name="url_pdf" value="<?php
                                                                                         $path = esc_url($url_pdf);
                                                                                         $file = basename($path);
                                                                                         echo $file;?>" />
  <?php //du js pour l'upload du fichier?>
  <script>
        jQuery(document).ready(function($) {
            // on initialise une variable qui nous permettra de détecter le champ à remplir
            var formfield = null;
            // on détecte un clic sur le bouton
            $('#upload_pdf_button').click(function() {
                $('html').addClass('pdf');
                // on cible notre champ
                formfield = $('#url_pdf').attr('name');
                // on charge la fenêtre
                tb_show('', 'media-upload.php?type=image&TB_iframe=true');
                // on empêche toute action supplémentaire
                return false;
            });
            // on duplique la function send_to_editor
            window.original_send_to_editor = window.send_to_editor;
            // notre fonction
            window.send_to_editor = function(html){
            // la varible qui contient notre url DE FICHIER
            var fileurl;
            // si la fenetre est bien chargé à partir du bouton
                if (formfield != null) {
                    // on récupère l'url (si besoin, pour comprendre, vous pouvez faire un console.log de html)
                    fileurl = $(html).filter('a').attr('href');
                    // on écrit l'URL dans notre champ texte
                    $('#url_pdf').val(fileurl);
                    // on shoot la boite
                    tb_remove();
                    // on vire la classe pdf
                    $('html').removeClass('pdf');
                    // on vide la variable formfield
                    formfield = null;
                } else {
                    // si la fenêtre n'est pas chargée à partir du bouton, alors comportement normal
                    window.original_send_to_editor(html);
                }
            };
            return false;
        });
    </script>
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
    add_meta_box( "url_du_pdf", "Fichier à télécharger", "ScientificArticle_article_GAS_pdf_metabox",'SA_article', 'advanced', 'high' );

    //on sauvegarde les données du pdf
    add_action( 'save_post', 'pdf_meta_save' );
}
function pdf_meta_save( $post_ID ){
  if ( isset( $_POST[ 'url_pdf' ] ) ) {
    update_post_meta( $post_ID, '_url_pdf', esc_url_raw( $_POST[ 'url_pdf' ] ) );
  }
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
                            if ($auteurs) {
                                // si il est un auteur, on pré-check la checkbox
                                if (in_array(get_the_id(), $auteurs)) {
                                    echo "checked";
                                }
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
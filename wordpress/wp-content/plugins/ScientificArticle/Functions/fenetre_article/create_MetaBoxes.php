<?php

// empeche d'acceder � cette page via l'url !
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
// implemente entre autre la fonction add_meta_box
include_once($_SERVER["DOCUMENT_ROOT"].'/wp-admin/includes/template.php');

//contenu de la boite avec l'upload de fichier pdf
function ScientificArticle_article_GAS_pdf_metabox($post){

  $url_pdf = get_post_meta( $post->ID, '_url_pdf', true );
  ?>
  <input id="upload_pdf_button" class="button button-primary button-large" type="button" value="T�l�charger un document pdf" />
  <input id="url_pdf" style="width: 450px;" type="text" name="url_pdf" disabled="disabled" value="<?php echo $url_pdf;?>" />
  <?php //du js pour l'upload du fichier?>
  <script>
        jQuery(document).ready(function($) {
            // on initialise une variable qui nous permettra de d�tecter le champ � remplir
            var formfield = null;
            // on d�tecte un clic sur le bouton
            $('#upload_pdf_button').click(function() {
                $('html').addClass('pdf');
                // on cible notre champ
                formfield = $('#url_pdf').attr('name');
                // on charge la fen�tre
                tb_show('', 'media-upload.php?type=image&TB_iframe=true');
                // on emp�che toute action suppl�mentaire
                return false;
            });
            // on duplique la function send_to_editor
            window.original_send_to_editor = window.send_to_editor;
            // notre fonction
            window.send_to_editor = function(html){
            // la varible qui contient notre url DE FICHIER
            
            // si la fenetre est bien charg� � partir du bouton
                if (formfield != null) {
                    // on r�cup�re l'url (si besoin, pour comprendre, vous pouvez faire un console.log de html)
                    // on �crit l'URL dans notre champ texte
                    $('#url_pdf').val(html);
                    // on shoot la boite
                    tb_remove();
                    // on vire la classe pdf
                    $('html').removeClass('pdf');
                    // on vide la variable formfield
                    formfield = null;
                } else {
                    // si la fen�tre n'est pas charg�e � partir du bouton, alors comportement normal
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

    //boite pour lier un fichier pdf � l'article
    add_meta_box( "url_du_pdf", "Fichier � t�l�charger", "ScientificArticle_article_GAS_pdf_metabox",'SA_article', 'advanced', 'high' );

    //on sauvegarde les donn�es du pdf
    add_action( 'save_post', 'pdf_meta_save' );
}
function pdf_meta_save( $post_ID ){
  if ( isset( $_POST[ 'url_pdf' ] ) ) {
    update_post_meta( $post_ID, '_url_pdf', esc_url_raw( $_POST[ 'url_pdf' ] ) );
  }
}
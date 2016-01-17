<?php

// empeche d'acceder à cette page via l'url !
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


// implemente entre autre la fonction add_meta_box
include_once($_SERVER["DOCUMENT_ROOT"].'/wp-admin/includes/template.php');


if (is_admin()){
    GAS_add_custom_meta_box();
}


//contenu de la boite auteur
function GAS_MetaBox_callback($post)
{
    wp_nonce_field( basename( __FILE__ ), 'auteur_nonce' );
    ?>
   <ul>
        <li>
            <label>Nom: </label><br/>
            <input name="auteur_name" type="text" value="">
        </li>
        <li>
            <label>Profession: </label><br/>
            <input name="auteur_job" type="text" value="">
        </li>
        <li>
            <label>Affiliation: </label><br/>
            <input name="auteur_affiliation" type="text" value="">
        </li>
        <li>
            <label>Site Web: </label><br/>
            <input name="auteur_site" type="text" value="">
        </li>
    <ul/>
    <?php
}

//contenu de la boite avec l'upload de fichier pdf
function GAS_pdf_metabox($post){
    
  $url_pdf = get_post_meta( $post->ID, 'url_pdf', true );
  ?>
  <input id="upload_pdf_button" class="button button-primary button-large" type="button" value="Télécharger un document pdf" />
  <label for="url_pdf"></label><input id="url_pdf" style="width: 450px;" type="text" name="url_pdf" value="<?php echo esc_url( $url_pdf ); ?>" />
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
        });
    </script>
  <?php
}
//ajoute toutes les meta_boxes
function GAS_add_custom_meta_box()
{
    add_meta_box("auteur", "Auteur", "GAS_MetaBox_callback",'article','side','high');
    //changement du nom de la feature image box
    remove_meta_box( 'postimagediv', 'rotator', 'side' );
    add_meta_box('postimagediv', __('Miniature'), 'post_thumbnail_meta_box','article', 'advanced', 'high');
    //boite pour lier un fichier pdf à l'article
    add_meta_box( "url_du_pdf", "Fichier à télécharger", "GAS_pdf_metabox",'article', 'advanced', 'high' );
}



//on sauvegarde les données du pdf
add_action( 'save_post', 'pdf_meta_save' );
function pdf_meta_save( $post_ID ){
  if ( isset( $_POST[ 'url_pdf' ] ) ) {
    update_post_meta( $post_ID, '_url_pdf', esc_url_raw( $_POST[ 'url_pdf' ] ) );
  }
}

//sauvegarde les données de l'auteur
add_action( 'save_post', 'auteur_meta_save' );
function auteur_meta_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'auteur_nonce' ] ) && wp_verify_nonce( $_POST[ 'auteur_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'auteur_name' ] ) ) {
        update_post_meta( $post_id, 'auteur_name', sanitize_text_field( $_POST[ 'auteur_name' ] ) );
    }
    if( isset( $_POST[ 'auteur_job' ] ) ) {
        update_post_meta( $post_id, 'auteur_job', sanitize_text_field( $_POST[ 'auteur_job' ] ) );
    }
    if( isset( $_POST[ 'auteur_affiliation' ] ) ) {
        update_post_meta( $post_id, 'auteur_affiliation', sanitize_text_field( $_POST[ 'auteur_affiliation' ] ) );
    }
    if( isset( $_POST[ 'auteur_site' ] ) ) {
        update_post_meta( $post_id, 'auteur_site', sanitize_text_field( $_POST[ 'auteur_site' ] ) );
    }
 
}


<?php

if (is_admin()){
    add_action('init','GAS_MetaBox_init');
    add_action("add_meta_boxes", "GAS_add_custom_meta_box");
}
 function GAS_MetaBox_init($post){

    $labels=array(
        'singular_name'=>'Article scientifique',
        'menu_name'=>'Articles scientifiques',
        'edit_item'=>'Editer un article',
        'new_item'=>'Ajouter un article',
        'add_new' => 'Ajouter un article',
        'add_new_item' => 'Ajouter un article',
        'search_items'=>'Rechercher un article'
    );

    register_post_type('article',array(
        'public' =>true,
        'publicity_queryable'=>false,
        'labels' => $labels,
        'supports' => array('title','thumbnail')
    ));
    add_image_size('article',1000,300,true);
}

//contenu de la boite auteur
function GAS_MetaBox_callback($post)
{
    wp_nonce_field( basename( __FILE__ ), 'auteur_nonce' );
    $metaBoxAuteur_stored_meta = get_post_meta( $post->ID );
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

  <?php
  // les dépendances
    wp_enqueue_script( 'media-upload' );
    wp_enqueue_script( 'thickbox' );
    wp_enqueue_script( 'quicktags' );
    wp_enqueue_script( 'jquery-ui-resizable' );
    wp_enqueue_script( 'jquery-ui-draggable' );
    wp_enqueue_script( 'jquery-ui-button' );
    wp_enqueue_script( 'jquery-ui-position' );
    wp_enqueue_script( 'jquery-ui-dialog' );
    wp_enqueue_script( 'wpdialogs' );
    wp_enqueue_script( 'wplink' );
    wp_enqueue_script( 'wpdialogs-popup' );
    wp_enqueue_script( 'wp-fullscreen' );
    wp_enqueue_script( 'editor' );
    wp_enqueue_script( 'word-count' );
    wp_enqueue_style( 'thickbox' );
    wp_enqueue_script( 'pdf-meta-box', get_bloginfo('template_url').'/js/upload_pdf.js', array( 'jquery','media-upload','thickbox' ) );
}
//ajoute toutes les meta_boxes
function GAS_add_custom_meta_box($post)
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
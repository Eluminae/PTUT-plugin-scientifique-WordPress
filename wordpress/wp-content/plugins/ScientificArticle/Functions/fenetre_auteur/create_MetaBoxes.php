<?php

// empeche d'acceder à cette page via l'url !
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


// implemente entre autre la fonction add_meta_box
include_once($_SERVER["DOCUMENT_ROOT"].'/wp-admin/includes/template.php');


//contenu de la boite auteur
function ScientificArticle_auteur_metabox_champs($post)
{

    // on recupere les valeurs si on modifie un article
    $nom      = get_post_meta($post->ID,'_auteur_nom',true);
    $prenom   = get_post_meta($post->ID,'_auteur_prenom',true);
    $profession  = get_post_meta($post->ID,'_auteur_profession',true);
    $affiliation = get_post_meta($post->ID,'_auteur_affiliation',true);
    $site  = get_post_meta($post->ID,'_auteur_site',true);

    ?>
    <ul>
    <li>
        <label>Nom: </label><br/>
        <input name="auteur_nom" type="text" value="<?php echo esc_html($nom) ?>">
    </li>
    <li>
        <label>Prenom: </label><br/>
        <input name="auteur_prenom" type="text" value="<?php echo esc_html($prenom) ?>">
    </li>
    <li>
        <label>Profession: </label><br/>
        <input name="auteur_profession" type="text" value="<?php echo esc_html($profession) ?>">
    </li>
    <li>
        <label>Affiliation: </label><br/>
        <input name="auteur_affiliation" type="text" value="<?php echo esc_html($affiliation) ?>">
    </li>
    <li>
        <label>Site Web: </label><br/>
        <input name="auteur_site" type="text" value="<?php echo esc_html($site) ?>">
    </li>
    <ul/>
    <?php
}


//ajoute toutes les meta_boxes
function ScientificArticle_auteur_create_metaboxes()
{
    add_meta_box(
        "auteur", // id unique à la meta box
        "Auteur", // titre affiché
        "ScientificArticle_auteur_metabox_champs", // fonction affichage
        'SA_auteur', // postType id
        'advanced', // position de base
        'high'
    );

}




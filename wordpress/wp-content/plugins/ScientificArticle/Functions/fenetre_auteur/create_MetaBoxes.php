<?php

// empeche d'acceder à cette page via l'url !
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


// implemente entre autre la fonction add_meta_box
include_once($_SERVER["DOCUMENT_ROOT"].'/wp-admin/includes/template.php');


//contenu de la boite auteur
function ScientificArticle_auteur_metabox_champs()
{
    wp_nonce_field( basename( __FILE__ ), 'auteur_nonce' );
    ?>


    <ul>
        <li>
            <label>Nom: </label><br/>
            <input name="auteur_name" type="text" value=""/>
        </li>
        <li>
            <label>Profession: </label><br/>
            <input name="auteur_job" type="text" value=""/>
        </li>
        <li>
            <label>Affiliation: </label><br/>
            <input name="auteur_affiliation" type="text" value=""/>
        </li>
        <li>
            <label>Site Web: </label><br/>
            <input name="auteur_site" type="text" value=""/>
        </li>
    </ul>


    <?php
}


//ajoute toutes les meta_boxes
function ScientificArticle_auteur_create_metaboxes()
{
    add_meta_box(
        "auteur", // id unique à la meta box
        "Auteur", // titre affiché
        "ScientificArticle_auteur_metabox_champs", // fonction affichage
        'auteur', // postType id
        'advanced', // position de base
        'high'
    );

}




<?php
/*
    Plugin Name: ScientificArticle
    Plugin URI: ptut.fr
    Description: Ce plugin permet la création, la gestion, et l'affichage d'article scientifique. Il gère également les auteurs.
    Version: 0.1
    Author: IUT Informatique Lyon 1
    Author URI: http://iut.univ-lyon1.fr/
    License:     GPL2

    {Plugin Name} is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 2 of the License, or
    any later version.

    {Plugin Name} is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with {Plugin Name}. If not, see {License URI}.
*/

// empeche d'acceder à cette page via l'url !
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

require_once ( dirname( __FILE__ ) . '/Functions/activeAndDesactive.php' );


function ScientificArticle_activate() {


    add_role( 'auteur_scientifique', 'Auteur Scientifique' );


    $role = get_role( 'auteur_scientifique' );
    $role->add_cap( 'publish_as_articles' );
    $role->add_cap( 'edit_as_articles' );
    $role->add_cap( 'read_private_as_articles' );
    $role->add_cap( 'edit_as_article' );
    $role->add_cap( 'delete_as_article' );
    $role->add_cap( 'read_as_article' );
    $role->add_cap( 'upload_files' );


    $role = get_role( 'administrator' );
    $role->add_cap( 'publish_as_articles' );
    $role->add_cap( 'edit_as_articles' );
    $role->add_cap( 'edit_others_as_articles' );
    $role->add_cap( 'read_private_as_articles' );
    $role->add_cap( 'edit_as_article' );
    $role->add_cap( 'delete_as_article' );
    $role->add_cap( 'delete_others_as_article' );
    $role->add_cap( 'read_as_article' );


    // Clear the permalinks to remove our post type's rules
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'ScientificArticle_activate' );



function ScientificArticle_deactivate() {
    remove_role( 'auteur_scientifique' );


    $role = get_role( 'administrator' );
    $role->remove_cap( 'publish_as_articles' );
    $role->remove_cap( 'edit_as_articles' );
    $role->remove_cap( 'edit_others_as_articles' );
    $role->remove_cap( 'read_private_as_articles' );
    $role->remove_cap( 'edit_as_article' );
    $role->remove_cap( 'delete_as_article' );
    $role->remove_cap( 'delete_others_as_article' );
    $role->remove_cap( 'read_as_article' );

    // Clear the permalinks to remove our post type's rules
    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'ScientificArticle_deactivate' );

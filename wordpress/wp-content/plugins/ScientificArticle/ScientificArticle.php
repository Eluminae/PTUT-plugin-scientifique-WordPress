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


// script à executer à l'activation et à la desactivation du plugin
// dans l'objectif de créer les DB
require_once ( dirname( __FILE__ ) . '/Functions/activeAndDesactive.php' );

// création du menu çà gauche ( appel à la fonction ScientificArticle_setup_post_type() )
//add_action( 'init', 'ScientificArticle_setup_post_type' );
/*
register_activation_hook(__FILE__, 'ScientificArticle_install' );
register_deactivation_hook(__FILE__, 'ScientificArticle_uninstall' );
*/

// creation des boites de la fenetre nouvel article
require_once('Functions/create_MetaBoxes.php');

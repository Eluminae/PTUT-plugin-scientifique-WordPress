<?php get_header();
$error_type = _go('error_type') ? _go('error_type') : 1;
get_template_part( 'theme_includes/404' , $error_type );
get_footer();
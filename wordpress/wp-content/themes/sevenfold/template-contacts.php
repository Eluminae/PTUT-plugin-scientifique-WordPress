<?php
/*
	Template Name: Contact
*/
?>
<?php get_header(); ?>
<?php tt_gmap('contact_map','content-map','content-map','false'); ?>
<?php if (have_posts()) : 
    while(have_posts()) : the_post(); ?>
    <div class='container'>
        <?php the_content(); ?>
    </div>
    <?php endwhile; ?>
<?php endif; ?>
<?php tt_form_location('contact_page') ?>
<?php get_footer(); ?>
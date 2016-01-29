<?php
/*
    Template Name: Events
*/
get_header();?>
<div class="site-title-center">
    <div class="container">
        <h3><?php the_title( ); ?></h3>
        <ul class="content-arrows">
            <li class="prev"><i class="icon-517" title="517"></i></li>
            <li class="next"><i class="icon-501" title="501"></i></li>
        </ul>
    </div> 
</div>
<?php echo Tesla_slider::get_slider_html('events');?>

<?php if (have_posts()) : 
    while(have_posts()) : the_post(); ?>
    <div class='container'>
        <?php the_content(); ?>
    </div>
    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer();
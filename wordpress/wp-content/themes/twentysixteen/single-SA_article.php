<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php
        // Start the loop.
        //
        while (have_posts()) : the_post();
            echo 'Début de l\'affichage d\'un seul article';
            /*
              // Include the single post content template.
              get_template_part('template-parts/content', 'single');

              // If comments are open or we have at least one comment, load up the comment template.
              if (comments_open() || get_comments_number()) {
              comments_template();
              }
             */
            echo '<br />////////////<br />';
            ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                <h1>
                    <?php
                    echo the_title();
                    ?>
                    <br /></h1>
                <?php
                $attachments = get_children(array('post_parent' => get_the_ID(), 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order'));
                if (!is_array($attachments))
                    continue;
                $count = count($attachments);
                $first_attachment = array_shift($attachments);
                echo wp_get_attachment_image($first_attachment->ID, array(200, 200)); //afiche l'image en 500x500
                ?></a>'<?php
                echo get_the_content();

                echo '<br />////////////<br />';

                if (is_singular('attachment')) {
                    // Parent post navigation.
                    the_post_navigation(array(
                        'prev_text' => _x('<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentysixteen'),
                    ));
                } elseif (is_singular('post')) {
                    // Previous/next post navigation.
                    the_post_navigation(array(
                        'next_text' => '<span class="meta-nav" aria-hidden="true">' . __('Next', 'twentysixteen') . '</span> ' .
                        '<span class="screen-reader-text">' . __('Next post:', 'twentysixteen') . '</span> ' .
                        '<span class="post-title">%title</span>',
                        'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __('Previous', 'twentysixteen') . '</span> ' .
                        '<span class="screen-reader-text">' . __('Previous post:', 'twentysixteen') . '</span> ' .
                        '<span class="post-title">%title</span>',
                    ));
                }
                echo 'Fin de l\'affichage d\'un seul article';

            // End of the loop.
            endwhile;
            ?>

    </main><!-- .site-main -->

    <?php get_sidebar('content-bottom'); ?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

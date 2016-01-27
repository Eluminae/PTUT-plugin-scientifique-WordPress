<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



get_header();

if (have_posts()) : while (have_posts()) : the_post();
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

    endwhile;
endif;

get_footer();
?>

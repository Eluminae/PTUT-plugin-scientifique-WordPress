<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



get_header();

if (have_posts()) : while (have_posts()) : the_post();

        echo '<br /><br />';
        ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
            <h1>

                <?php
                echo the_title();
                ?>

                <br/></h1>
            <?php $tab = get_post_meta(get_the_ID(), '_ScientificArticle_article_auteurs', true); // a modifier pour afficher l'autheur et non l'admina ?>
            <?php
            $ids = unserialize($tab);
            if ($ids != null) {
                
                foreach ($ids as $id) {
                    $count ++;
                }
                echo 'Auteurs: ';
                foreach ($ids as $id) {
                    $user = get_user_by('id', $id);
                    
                    echo "$user->first_name $user->last_name  | ";
                }
            } else {
                echo 'Pas d\'auteur pour cet article';
            }
            ?>

            <br/>
            <br/>
        <?php
        $attachments = get_children(array('post_parent' => get_the_ID(), 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order'));
        if (!is_array($attachments))
            continue;
        $count = count($attachments);
        $first_attachment = array_shift($attachments);
        echo wp_get_attachment_image($first_attachment->ID, array(200, 200)); //afiche l'image en 500x500
        ?></a><?php
             $resum=get_the_content();
                    
            echo substr($resum,0,25);

            echo '<br /><br />';

        endwhile;
    endif;

    get_footer();
    ?>

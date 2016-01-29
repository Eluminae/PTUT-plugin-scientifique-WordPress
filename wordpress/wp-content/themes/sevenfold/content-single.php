<div <?php post_class("blog-entry"); ?>>
    <div class="entry-header">
        <h1><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>
    </div>
    <div class="entry-cover">
        <?php tt_video_or_image_featured()?>
    </div>
    <div class="entry-content">
        <div class="entry-details">

            <ul>
                <li class="entry-details-comments"><a href="<?php the_permalink() ?>"><i class="icon-327" title="<?php _ex('Comments','blog','sevenfold')?>"></i>(<?php comments_number( '0', '1', '%' ) ?>)</a></li>
                <li class="entry-details-date"><?php the_time( 'j \<\b\r\/\> M' ); ?></li>
                <li class="entry-details-autor"><?php echo get_avatar( get_the_author_meta( 'ID' ), 84 ); ?></li>
                <li class="entry-details-data">
                    <p><span><?php _e('Author','sevenfold' ); ?></span> : <?php the_author_link(); ?>  <span class="distance"><?php _e('Category','sevenfold' ); ?></span> : <?php the_category( ', ' ); ?></p>
                    <p class="entry-details-data-italic"><span><?php _e("Tags","sevenfold" ) ?></span> : <?php the_tags('',', ','') ?></p>
                </li>
            </ul>
        </div>
        <?php
                the_content();
        ?>
        <?php tt_share(); ?>
        <div class="post_pagination">
            <?php wp_link_pages(array(
                'before'           => '<ul class="page-numbers center">',
                'after'            => '</ul>',
                'link_before'      => '',
                'link_after'       => '',
                'next_or_number'   => 'number',
                'separator'        => '</li><li>',
                'nextpagelink'     => __( 'Next page','sevenfold' ),
                'previouspagelink' => __( 'Previous page','sevenfold' ),
                'pagelink'         => '%',
                'echo'             => 1
            )); ?>
        </div>
    </div>
    <?php comments_template( ); ?>
</div>
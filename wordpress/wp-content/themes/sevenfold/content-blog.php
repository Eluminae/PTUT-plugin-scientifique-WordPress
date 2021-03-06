<div id="post-<?php the_ID(); ?>" <?php post_class("blog-entry"); ?>>
    <div class="entry-header">
        <h1><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>
    </div>
    <?php tt_video_or_image_featured()?>
    <div class="entry-content">
        <div class="entry-details">
            <ul>
                <li class="entry-details-comments"><a href="<?php the_permalink() ?>"><i class="icon-327" title="<?php _ex('Comments','blog','sevenfold')?>"></i>(<?php comments_number( '0', '1', '%' ) ?>)</a></li>
                <li class="entry-details-date"><?php the_time( 'd' ); echo "<br>"; the_time('M')?></li>
                <li class="entry-details-autor"><?php echo get_avatar( get_the_author_meta( 'ID' ), 84 ); ?></li>
                <li class="entry-details-data">
                    <p><span><?php _e('Author','sevenfold' ); ?></span> : <?php the_author_link(); ?>  <span class="distance"><?php _e('Category','sevenfold' ); ?></span> : <?php the_category( ', ' ); ?></p>
                    <p class="entry-details-data-italic"><span><?php _e("Tags","sevenfold" ) ?></span> : <?php the_tags('',', ','') ?></p>
                </li>
            </ul>
        </div>
        <?php
            $excerpt = get_the_excerpt();
            if(!empty($excerpt)){
                the_excerpt();
                echo '<a href="'.get_the_permalink().'" class="button-3">' . __('Read more','sevenfold') . '</a>';
            }else{
                the_content('<a href="'.get_the_permalink().'" class="button-3">'. __('Read more','sevenfold') .'</a>');
            }
        ?>
    </div>
</div>
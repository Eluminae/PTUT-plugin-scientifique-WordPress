<div class="col-md-6">
    <div id="post-<?php the_ID(); ?>" <?php post_class("blog-entry"); ?>>
        <div class="entry-cover">
            <div class="entry-date-comments"><?php the_time( 'd' );?><span><?php the_time('M')?></span>
                <span class="entry-com">
                    <a href="<?php the_permalink(); ?>"><i class="icon-325" title="<?php _ex('Comments','blog','sevenfold')?>"></i> (<?php comments_number( '0', '1', '%' ) ?>)</a>
                </span>
            </div>
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail(  ); ?>
            </a>
        </div>
        <div class="entry-content">
            <div class="entry-content-details">
                <h1><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>
                <p><span><?php _e("Tags","sevenfold" ) ?></span> : <?php the_tags('',', ','') ?>
            </div>
            <?php
                $excerpt = get_the_excerpt();
                if(!empty($excerpt)){
                    the_excerpt();
                }else{
                    the_content('');
                }
            ?>
            <div class="entry-author"><?php _e('Author','sevenfold' ); ?></span> : <?php the_author_link(); ?></div>
            <a href="<?php the_permalink() ?>" class="entry-link"><?php _e('Read more','sevenfold') ?></a>
        </div>
    </div>
</div>
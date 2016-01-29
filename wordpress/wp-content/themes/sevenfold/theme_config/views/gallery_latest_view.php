<?php 
    $nr = $shortcode['nr'];
    $columns = $shortcode['columns'];
?>
<?php get_template_part( 'theme_includes/container' , 'close' ); ?>
<div class="gallery-photos">
    <div class="row no-margin">
        <?php foreach ($slides as $slide_nr => $slide) : 
            if( $slide_nr >= $nr )
                break;
            $span = 12 / $columns;?>
            <div class="col-md-<?php echo $span?> no-padding">
                <div class="gallery-item">
                    <div class="gallery-item-hover">
                        <h3><?php echo get_the_title($slide['post']->ID) ?></h3>
                        <ul>
                            <li><span><?php _e('Category','sevenfold') ?></span> - <?php echo implode(', ', array_keys($slide['categories'])); ?></li>
                            <li><span><?php _e('Author','sevenfold') ?></span> - <?php echo get_the_author( $slide['post']->ID); ?></li>
                            <li><span><?php _e('Date','sevenfold') ?></span> - <?php echo get_the_time('d M Y',$slide['post']->ID) ?></li>
                        </ul>
                        <a href="<?php echo $slide['options']['full_image']; ?>" class="gallery-item-zoom swipebox"><i class="icon-336" title="336"></i></a>
                        <a href="<?php echo $slide['options']['link']?>" class="gallery-item-link"><i class="icon-411" title="411"></i></a>
                    </div>
                    <img src="<?php echo $slide['options']['cover_image']; ?>" alt="gallery image" />
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php get_template_part( 'theme_includes/container' , 'open' ); ?>
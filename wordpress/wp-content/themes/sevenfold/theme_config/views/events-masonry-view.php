<?php 
    $columns_meta = get_post_meta( get_the_ID(), 'sevenfold_portfolio_columns', true );
    $columns = ($columns_meta) ? $columns_meta : $shortcode['columns'] ;
?>
<div class="event-type-1 event-type-2">
    <div class="container">
        <div class="row" data-tesla-plugin="masonry">
            <?php foreach ($slides as $slide_nr => $slide) : 
                $span = 12 / $columns;?>
            <div class="col-md-<?php echo $span;?>">
                <div class="event">
                    <div class="event-cover">
                        <img src="<?php echo $slide['options']['cover_image']; ?>" alt="event cover" />
                    </div>
                    <div class="event-content">
                        <h2><a href="<?php echo !empty($slide['options']['link']) ? $slide['options']['link'] : get_permalink($slide['post']->ID); ?>"><?php echo get_the_title($slide['post']->ID); ?></a></h2>
                        <p><?php echo $slide['options']['small_description']; ?></p>
                        <a href="<?php echo !empty($slide['options']['link']) ? $slide['options']['link'] : get_permalink($slide['post']->ID); ?>" class="event-read">Read more <i class="icon-501" title="501"></i></a>
                        <div class="event-time"><?php echo get_the_time( 'd M', $slide['post']->ID ); ?></div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>            
</div>
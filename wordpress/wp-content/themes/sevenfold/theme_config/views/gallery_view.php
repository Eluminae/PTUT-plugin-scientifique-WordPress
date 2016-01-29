<?php 
    $columns_meta = get_post_meta( get_the_ID(), 'sevenfold_portfolio_columns', true );
    $columns = ($columns_meta) ? $columns_meta : $shortcode['columns'] ;
?>
    <?php if($shortcode['title']) : ?>
        <div class="content-path-1">
            <h1><?php echo $shortcode['title'] ?></h1>
        </div>
    <?php endif; ?>
    <div class="filter-area type-2">
        <div class="filter-box">
            <ul class="filter tesla_filters" data-tesla-plugin="filters"<?php if(_go('portfolio_filters_single')) echo ' data-tesla-multiple="false"'?>>
                <li><a data-category="" class="active" href="#"><?php _e('All','sevenfold' ); ?></a></li>
                <?php foreach($all_categories as $category_slug => $category_name): ?>
                    <li>
                        <a href="#" data-category="<?php echo $category_slug; ?>"><?php echo $category_name; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <div class="row" data-tesla-plugin="masonry">
                <?php foreach ($slides as $slide_nr => $slide) : 
                    $span = 12 / $columns;?>
                    <div class="col-xs-6 col-md-<?php echo $span?> <?php echo implode(' ', array_keys($slide['categories'])); ?>">
                        <div class="row">
                            <div class="filter-item">
                                <div class="filter-item-cover">
                                    <div class="filter-item-cover-hover">
                                        <div class="filter-item-cover-elements">
                                            <div class="filter-item-details">
                                                <h1><a href="<?php echo get_permalink($slide['post']->ID); ?>"><?php echo get_the_title($slide['post']->ID); ?></a></h1>
                                                <p><?php echo implode(', ', array_keys($slide['categories'])); ?></p>
                                            </div>
                                            <a href="<?php echo $slide['options']['full_image']; ?>" class="swipebox"><i class="icon-336" title="336"></i></a>
                                            <?php if(!empty($slide['options']['link'])) : ?>
                                                <a href="<?php echo $slide['options']['link'] ?>"><i class="icon-411" title="411"></i></a>    
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <img src="<?php echo $slide['options']['cover_image']; ?>" alt="item image" />
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php get_template_part('nav','main') ?>
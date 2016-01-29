<?php $slide = $slides[0]; ?>
<div class="breadcrumbs-2">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4><?php the_title( ); ?></h4>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumbs-arrows">
                    <li class="prev"><a class="project-left" href="<?php echo get_permalink(get_adjacent_post(false,'',true)); ?>"><i class="icon-517" title="517"></i></a></li>
                    <li class="next"><a class="project-right" href="<?php echo get_permalink(get_adjacent_post(false,'',false)) ?>"><i class="icon-501" title="501"></i></a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <a href="<?php echo site_url( '/' ); ?>" class="close-project">x</a>    
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="project">
        <div class="row">
            <div class="col-md-6">
                <!-- START SLIDER -->
                <div class="the-slider project-slider" data-tesla-plugin="slider" data-tesla-item=".slide" data-tesla-next=".slide-right" data-tesla-prev=".slide-left" data-tesla-container=".slide-wrapper">
                    <div class="slide-arrows">
                        <div class="slide-left"><i class="icon-517" title="517"></i></div>
                        <div class="slide-right"><i class="icon-501" title="501"></i></div>
                    </div>
                    <ul class="slide-wrapper" style="position: relative; height: 488px;">
                        <?php foreach($slide['options']['image_slider'] as $project_image) : ?>
                            <li class="slide">
                                <img src="<?php echo $project_image ?>" class="slider-image" alt="project image" />
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <ul class="the-bullets-dots" data-tesla-plugin="bullets">
                        <?php foreach($slide['options']['image_slider'] as $image_nr => $project_image) : ?>
                            <li<?php if($image_nr===0) echo ' class="active"'?>><span></span></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <!-- END SLIDER --> 
            </div>
            <div class="col-md-6">
                <div class="project-details">
                    <?php the_content() ?>
                    <br/>
                    <h5><?php _e('Details','sevenfold') ?> :</h5>
                    <ul class="project-data">
                        <li><?php _ex('Author','single-project','sevenfold') ?> : <?php the_author( ); ?></li>
                        <li><?php _ex('Category','single-project','sevenfold') ?> : <?php echo implode(', ', $slide['categories']); ?></li>
                        <li><?php _ex('Date','single-project','sevenfold') ?> : <?php the_date(get_option('date_format' )) ?></li>
                        <?php $posttags = get_the_tags();
                                        if (!empty($posttags)) : ?>
                                            <li><?php _ex('Tags','single-project','sevenfold') ?> :
                                              <?php foreach($posttags as $tag) {
                                                echo $tag->name . " "; 
                                              }?>
                                            </li>
                                        <?php endif;?>
                    </ul>
                    <?php tt_share() ?>
                </div>
            </div>
        </div>
    </div>
    <?php if(_go('show_related_projects') && count($slide['related'])) : ?>

        <div class="releated-products">
            <h4><?php _e('Related products','sevenfold') ?></h4>
            <div class="filter-area">
                <div class="row" data-tesla-plugin="masonry">
                    <?php foreach($slide['related'] as $nr => $related): if ($nr >= 4) break;?>
                        <div class="col-md-3 col-xs-6">
                            <div class="filter-item">
                                <div class="filter-item-cover">
                                    <div class="filter-item-cover-hover">
                                        <div class="filter-item-cover-elements">
                                            <a href="<?php echo $related['options']['full_image']; ?>" class="swipebox"><i class="icon-336" title="336"></i></a>
                                            <a href="<?php echo get_permalink($related['post']->ID); ?>"><i class="icon-411" title="411"></i></a>    
                                        </div>
                                    </div>
                                    <img src="<?php echo $related['options']['cover_image']; ?>" alt="item image" />
                                </div>

                                <div class="filter-item-details">
                                    <h1><a href="<?php echo get_permalink($related['post']->ID); ?>"><?php echo get_the_title($related['post']->ID); ?></a></h1>
                                    <p><?php echo implode(', ', $related['categories']); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>                    
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
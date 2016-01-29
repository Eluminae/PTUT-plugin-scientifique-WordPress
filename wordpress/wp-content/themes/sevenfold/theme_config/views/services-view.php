<?php 
if($shortcode['nr'])
    $slides = array_slice($slides, 0, (int)$shortcode['nr']);?>
<!-- START SERVICES -->
<div class="services-type-1">
    <div class="row">
        <?php
        foreach($slides as $i => $slide):
            $title_color = !empty($slide['options']['title_color']) ? ' style="color:' . $slide['options']['title_color'] . '"' : '';
            $icon_bg_color = !empty($slide['options']['icon']['def_icon']['bg_color']) ? 'background-color:' . $slide['options']['icon']['def_icon']['bg_color'] . ';' : '';
            //$custom_icon_fix = !empty($slide['options']['icon']['custom_icon']) ? 'padding-top:0;' : '';
            $service_style = !empty($icon_bg_color) ? ' style="'.$icon_bg_color.'"':'';
            $icon_color = !empty($slide['options']['icon']['def_icon']['icon_color']) ? ' style="color:'.$slide['options']['icon']['def_icon']['icon_color'].'"' : '';
            if($i && !($i%3)):?>
                </div><div class="row">
            <?php endif;?>
            <div class="col-md-4">
                <div class="service">
                    <div class="service-cover"<?php echo $service_style ?>>
                        <?php if(!empty($slide['options']['icon']['custom_icon'])) : ?>
                            <img src="<?php echo $slide['options']['icon']['custom_icon'] ?>" alt="">
                        <?php else: ?>
                            <span><i class="icon-<?php echo $slide['options']['icon']['def_icon']['icon_nr']?>"<?php echo $icon_color ?>></i></span>
                        <?php endif; ?>
                    </div>
                    <h3<?php echo $title_color ?>><?php echo get_the_title($slide['post']->ID); ?></h3>
                    <?php echo apply_filters( 'the_content' ,$slide['post']->post_content);?>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>
<!-- END SERVICES -->
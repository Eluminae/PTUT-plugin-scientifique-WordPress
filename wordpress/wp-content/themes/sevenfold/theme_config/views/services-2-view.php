<?php get_template_part( 'theme_includes/container' , 'close' ); ?>
<!-- START SERVICES TYPE 2 -->
<div class="services-type-2 <?php echo $shortcode['class']?>">
    <div class="container">
        <div class="row">
            <?php foreach($slides as $i => $slide) : 
                $title_color = !empty($slide['options']['title_color']) ? ' style="color:' . $slide['options']['title_color'] . '"' : '';
                $icon_bg_color = !empty($slide['options']['icon']['def_icon']['bg_color']) ? 'background-color:' . $slide['options']['icon']['def_icon']['bg_color'] . ';' : '';
                $icon_color = !empty($slide['options']['icon']['def_icon']['icon_color']) ? 'color:'.$slide['options']['icon']['def_icon']['icon_color'].';' : '';
                $icon_style = !empty($icon_bg_color) || !empty($icon_color) ? " style='$icon_bg_color$icon_color'" :'';
                if($i && !($i%4)):?>
                    </div><div class="row">
                <?php endif;?>
                <div class="col-md-3">
                    <div class="service">
                        <div class="service-icon color-1"<?php echo $icon_bg_color ? ' style="'.$icon_bg_color.'"' : ''?>>
                            <?php if(!empty($slide['options']['icon']['custom_icon'])) : ?>
                                <img src="<?php echo $slide['options']['icon']['custom_icon'] ?>" alt="">
                            <?php else: ?>
                                <i class="icon-<?php echo $slide['options']['icon']['def_icon']['icon_nr']?>"<?php echo 'style="'.$icon_color.'"'; ?>></i>
                            <?php endif; ?>
                        </div>
                        <h3<?php echo $title_color ?>><?php echo get_the_title($slide['post']->ID); ?></h3>
                        <?php echo apply_filters( 'the_content' ,$slide['post']->post_content);?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>       
</div>
<!-- END SERVICES TYPE 2 -->
<?php get_template_part( 'theme_includes/container' , 'open' ); ?>
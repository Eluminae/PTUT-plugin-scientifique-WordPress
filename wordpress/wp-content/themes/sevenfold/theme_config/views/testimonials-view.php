<div class="testimonials <?php echo $shortcode['class']?>" data-tesla-plugin="slider" data-tesla-item=".testimonial" data-tesla-next=".testimonial-right" data-tesla-prev=".testimonial-left" data-tesla-container=".testimonials-wrapper" data-tesla-autoplay-speed="4000">
    <ul class="testimonials-wrapper" style="position: relative; height: 383px;">
        <?php foreach($slides as $i => $slide): ?>
            <li class="testimonial" style="position: absolute; top: 0px; left: 0px; right: 0px;">
                <div class="testimonials-author">
                    <div class="testimonials-cover">
                        <?php echo get_the_post_thumbnail( $slide['post']->ID ); ?>
                    </div>
                    <h3><?php echo get_the_title($slide['post']->ID); ?></h3>
                    <ul class="testimonials-rate">
                        <?php for($i=1;$i<=5;$i++) : 
                            $icon = $i <= $slide['options']['stars'] ? '423' : '421'?>
                            <li><i class="icon-<?php echo $icon ?>" title="star"></i></li>
                        <?php endfor; ?>
                    </ul>
                </div>
                <div class="testimonials-entry">
                    <?php echo apply_filters('the_content', $slide['post']->post_content); ?>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
    <ul class="testimonials-dots" data-tesla-plugin="bullets">
        <?php foreach($slides as $i => $slide): ?>
            <li<?php if($i==0) echo ' class="active"'?>><span></span></li>
        <?php endforeach; ?>
    </ul>
</div>
</div>
<div class="our-team-b <?php echo $shortcode['class']?>">
    <div class="container">
        <?php if(!empty($shortcode['title']) || !empty($shortcode['description'])) : ?>
            <div class="our-team-b-title">
                <h1><?php echo $shortcode['title'] ?></h1>
                <p><?php echo $shortcode['description'] ?></p>
            </div>
        <?php endif; ?>
        <?php foreach($slides as $i => $slide):?>
            <div class="our-team-b-member">
                <div class="our-team-b-member-cover">
                    <?php echo get_the_post_thumbnail($slide['post']->ID, 'full'); ?>
                </div>
                <div class="our-team-b-member-details">
                    <h3><?php echo get_the_title($slide['post']->ID); ?></h3>
                    <?php echo apply_filters('the_content', $slide['post']->post_content); ?>
                    <ul class="our-team-b-member-details-socials">
                        <?php foreach($slide['options']['social'] as $social): $social_type = key($social); $social_data = current($social); ?>
                            <?php if($social_type!=='custom'): ?>
                                <li><a href="<?php echo $social_data; ?>"><i class="socials-<?php echo $social_type; ?>" title="<?php echo $social_type; ?>"></i></a></li>
                            <?php else: ?>
                                <li><a href="<?php echo $social_data['url']; ?>"><img src="<?php echo $social_data['icon']; ?>" /></a></li>
                            <?php endif; ?>
                        <?php endforeach; ?>                           
                    </ul>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="container">
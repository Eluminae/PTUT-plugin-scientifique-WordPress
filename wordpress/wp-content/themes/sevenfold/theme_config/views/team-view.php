</div>
<div class="our-team-a <?php echo $shortcode['class']?>">
    <div class="container">
        <?php if(!empty($shortcode['title']) || !empty($shortcode['description'])) : ?>
            <div class="our-team-a-title">
                <h1><?php echo $shortcode['title'] ?></h1>
                <p><?php echo $shortcode['description'] ?></p>
            </div>
        <?php endif; ?>
        <div class="row">
            <?php foreach($slides as $slide_nr => $slide):?>
            <?php if($slide_nr && $slide_nr % 3 === 0) : ?>
            </div>
            <div class="row">
            <?php endif; ?>
            <div class="col-md-4 col-xs-6">
                <div class="our-team-a-member">
                    <div class="our-team-a-member-cover">
                        <?php echo get_the_post_thumbnail($slide['post']->ID, 'full'); ?>
                    </div>
                    <div class="our-team-a-name">
                        <h3><?php echo get_the_title($slide['post']->ID); ?></h3>
                        <span><?php echo $slide['options']['position']; ?></span>
                    </div>
                    <?php echo apply_filters('the_content', $slide['post']->post_content); ?>
                    <ul class="our-team-a-member-social">
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
</div>
<div class="container">
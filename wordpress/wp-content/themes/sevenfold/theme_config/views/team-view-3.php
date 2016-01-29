</div>
<div class="our-team-c <?php echo $shortcode['class']?>">
    <div class="container">
        <?php if(!empty($shortcode['title']) || !empty($shortcode['description'])) : ?>
            <div class="our-team-c-title">
                <h1><?php echo $shortcode['title'] ?></h1>
                <p><?php echo $shortcode['description'] ?></p>
            </div>
        <?php endif; ?>
        <div class="row">
            <?php foreach($slides as $i => $slide):
            $type = $i % 2 === 0 ? 'male' : 'female';
            ?>
                <div class="col-md-4">
                    <div class="our-team-c-member">
                        <div class="our-team-c-member-cover">
                            <?php echo get_the_post_thumbnail($slide['post']->ID, 'full'); ?>
                        </div>
                        <div class="our-team-c-member-details our-team-c-member-<?php echo $type?>">
                            <div>
                                <h4><?php echo get_the_title($slide['post']->ID); ?></h4>
                                <h5><?php echo $slide['options']['position']; ?></h5>
                            </div>
                        </div>
                        <ul class="our-team-c-member-socials our-team-c-member-socials-<?php echo $type?>">
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
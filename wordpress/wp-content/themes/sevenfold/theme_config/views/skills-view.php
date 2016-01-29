<?php get_template_part( 'theme_includes/container' , 'close' ); ?>
<!-- START SKILLS -->
<div class="skills-c <?php echo $shortcode['class']?>">
    <div class="container">
        <?php if(!empty($shortcode['title']) || !empty($shortcode['subtitle'])) : ?>
            <div class="skills-c-title">
                <h1><?php echo $shortcode['title']; ?></h1>
                <p><?php echo $shortcode['subtitle']; ?></p>
            </div>
        <?php endif; ?>
        <div class="row">
            <?php foreach ($slides as $slide_nr => $slide) : ?>
                <div class="col-md-4">
                    <div class="skills-c-skill">
                        <div class="skills-c-skill-cover" style="background-color: <?php echo $slide['options']['color']?>"><span><?php echo $slide['options']['skill_level'];?></span></div>
                        <h3><?php echo get_the_title($slide['post']->ID); ?></h3>
                        <?php echo apply_filters('the_content', $slide['post']->post_content); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- END SKILLS -->
<?php get_template_part( 'theme_includes/container' , 'open' ); ?>
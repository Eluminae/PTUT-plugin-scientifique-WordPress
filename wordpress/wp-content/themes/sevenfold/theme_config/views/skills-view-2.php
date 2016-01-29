<?php get_template_part( 'theme_includes/container' , 'close' ); ?>
<!-- START SKILLS 2-->
<div class="skills-a <?php echo $shortcode['class']?>">
    <div class="container">
        <div class="skills-a-title">
            <?php if(!empty($shortcode['title']) || !empty($shortcode['subtitle'])) : ?>
                <div class="skills-c-title">
                    <h1><?php echo $shortcode['title']; ?></h1>
                    <p><?php echo $shortcode['subtitle']; ?></p>
                </div>
            <?php endif; ?>
        </div>
        <div class="row">
            <?php foreach ($slides as $slide_nr => $slide) : ?>
                <div class="col-md-4">
                    <div class="skills-a-skill">
                        <div class="skills-a-skill-cover" style="background-color: <?php echo $slide['options']['color']?>"><div style="height: <?php echo (int)$slide['options']['skill_level'];?>%; width: <?php echo (int)$slide['options']['skill_level'];?>%;"><p><?php echo $slide['options']['skill_level'];?></p></div></div>
                        <h1><?php echo get_the_title($slide['post']->ID); ?></h1>
                        <?php echo apply_filters('the_content', $slide['post']->post_content); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- END SKILLS 2-->
<?php get_template_part( 'theme_includes/container' , 'open' ); ?>
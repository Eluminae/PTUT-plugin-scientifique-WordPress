<?php get_template_part( 'theme_includes/container' , 'close' ); ?>
<!-- START SKILLS 3-->
<div class="skills-b <?php echo $shortcode['class']?>">
    <div class="container">
        <div class="skills-b-title">
            <h1><?php echo $shortcode['title']; ?></h1>
            <p><?php echo $shortcode['subtitle']; ?></p>
        </div>
        <?php foreach ($slides as $slide_nr => $slide) : ?>
            <div class="skills-b-bar">
                <div class="skills-b<?php if($slide_nr&1) echo "-2" ?>-skill">
                    <div class="skills-b-skill-bg">
                        <div class="skills-b-skill-cover" style="background-color: <?php echo $slide['options']['color']?>"><span style="background-color: <?php echo $slide['options']['color']?>"><?php echo $slide['options']['skill_level'];?></span></div>
                        <h3><?php echo get_the_title($slide['post']->ID); ?></h3>
                        <?php echo apply_filters('the_content', $slide['post']->post_content); ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- END SKILLS 3-->
<?php get_template_part( 'theme_includes/container' , 'open' ); ?>
<!-- =====================================================================
                                START OUR BRANDS
====================================================================== -->

<div class="our-partners" data-tesla-plugin="carousel" data-tesla-container=".tesla-carousel-items" data-tesla-item="&gt;div" data-tesla-rotate="false" data-tesla-autoplay="false" data-tesla-hide-effect="false">
    <div class="site-title">
        <span class="next"></span>
        <span class="prev disabled"></span>
        <h1><?php echo $shortcode['title']; ?></h1>
    </div>

    <div class="row tesla-carousel-items">
        <div class="col-md-6 col-xs-12">
            <?php foreach ($slides as $slide_nr => $slide) : ?>
                <?php if($slide_nr && $slide_nr % 2 === 0) : ?>
                    </div><div class="col-md-6 col-xs-12">
                <?php endif; ?>
                <a href="<?php echo $slide['options']['link'] ?>">
                    <?php echo get_the_post_thumbnail($slide['post']->ID, 'full'); ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- =====================================================================
                                 END OUR BRANDS
====================================================================== -->
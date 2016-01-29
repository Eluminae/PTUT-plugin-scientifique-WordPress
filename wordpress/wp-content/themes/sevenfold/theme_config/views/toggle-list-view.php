<!-- START ACCORDION -->
<?php
global $tesla_toggle_list;
if(isset($tesla_toggle_list))
    $tesla_toggle_list++;
else
    $tesla_toggle_list = 0;
?>

<div id="accordion" class="accordion <?php echo $shortcode['class']?>">
    <?php foreach($slides as $i => $slide): ?>
        <div class="accordion-group">
            <div class="accordion-heading<?php echo !$i?' active':''; ?>">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-<?php echo $i ."-" . $tesla_toggle_list; ?>" href="#content_<?php echo $i ."-" .$tesla_toggle_list; ?>">
                    <span class="plus"><?php echo !$i?'-':'+'; ?></span><?php echo get_the_title($slide['post']->ID); ?>
                </a>
            </div>
            <div id="content_<?php echo $i ."-" .$tesla_toggle_list; ?>" class="accordion-body collapse<?php echo !$i?' in':''; ?>">
                <div class="accordion-inner">
                    <?php echo apply_filters('the_content', $slide['post']->post_content); ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<!-- END ACCORDION -->
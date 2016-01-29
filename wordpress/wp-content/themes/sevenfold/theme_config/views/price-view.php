<?php
  $columns_meta = get_post_meta( get_the_ID(), 'sevenfold_portfolio_columns', true );
  $columns = ($columns_meta) ? $columns_meta : $shortcode['columns'] ;
  $max = floor(12/(int)$columns);
?>
<div class="row">
	<?php foreach($slides as $i => $slide): ?>
  	<?php if($i&&!($i%$max)): ?>
          </div>
          <div class="row">
  	<?php endif; ?>
    <div class="col-md-<?php echo $shortcode['size']; ?> col-xs-6">

        <div class="pricing-table<?php if(in_array('outlined', $slide['options']['outlined'])) echo ' pricing-table-current'; ?>">
          <div class="pricing-table-head"><?php echo get_the_title($slide['post']->ID); ?></div>
          <div class="pricing-table-price"><?php echo $slide['options']['price'] ?></div>
          <ul>
            <?php foreach($slide['options']['features'] as $feature): ?>
              <li><?php echo do_shortcode($feature); ?></li>
            <?php endforeach; ?>
            <li><span class="button-cover"><a href="<?php echo $slide['options']['link'] ?>" class="button-3"><?php echo $slide['options']['link_text'] ? $slide['options']['link_text'] : __('Buy now','sevenfold')?></a></span></li>
          </ul>
        </div>

    </div>
	<?php endforeach; ?>
</div>
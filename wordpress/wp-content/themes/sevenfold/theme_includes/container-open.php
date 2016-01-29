<?php
$sidebar = get_post_meta( get_the_id(),'sevenfold_sidebar_position', true );
$sidebar = $sidebar === '' ? 'full_width' : $sidebar;
if($sidebar === 'full_width') : ?>
	<div class="container">
<?php endif;?>
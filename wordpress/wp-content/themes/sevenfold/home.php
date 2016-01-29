<?php get_header(); 
if(get_query_var('page_id')){
	$sidebar = get_post_meta( get_query_var('page_id'),'sevenfold_sidebar_position', true );
	$share = get_post_meta( get_query_var('page_id'),'sevenfold_page_share', true );
	$sidebar = $sidebar === '' ? 'full_width' : $sidebar;
}else{
	$sidebar = 'right'; //if front page is blog
}

?>
<div class="container">
	<?php if($sidebar !== 'full_width') : ?>
		<div class="row">
	<?php endif; ?>
	<?php if($sidebar ==='left') : ?>
		<div class="col-md-4">
			<?php get_sidebar(); ?>
		</div>
	<?php endif; ?>
	<?php if($sidebar !== 'full_width') : ?>
		<div class="col-md-8">
	<?php endif; ?>
	<?php if (have_posts()) : 
	    while(have_posts()) : the_post();

	    	get_template_part('content','blog');

	    endwhile; ?>
	<?php endif; ?>
	<?php get_template_part('nav','main')?>
	<?php if($sidebar !== 'full_width') : ?>
		</div>
	<?php endif; ?>
	<?php if($sidebar ==='right') : ?>
		<div class="col-md-4">
			<?php get_sidebar(); ?>
		</div>
	<?php endif; ?>
	<?php if($sidebar !== 'full_width') : ?>
		</div>
	<?php endif; ?>
</div>
<?php get_footer(); ?>
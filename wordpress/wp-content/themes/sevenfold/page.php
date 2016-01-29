<?php get_header(); 
$sidebar = get_post_meta( get_the_id(),'sevenfold_sidebar_position', true );
$share = get_post_meta( get_the_id(),'sevenfold_page_share', true );
$sidebar = $sidebar === '' ? 'full_width' : $sidebar;
if(get_post_meta( get_the_id(),'sevenfold_show_breadcrumbs', true )):?>

<?php else: ?>
	<div class="breadcrumbs"<?php if (_go('breadcrumbs_image')) echo " style='background-image:url("._go('breadcrumbs_image').")'"?>>
	    <div class="container">
	        <h1><?php the_title() ?></h1>
	    </div>
	</div>
	<style>
		.page-template-default .content {
			padding-top: 0;
		}
	</style>
<?php endif; ?>
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

	    	the_content();

	    endwhile; ?>
	<?php endif; ?>
	<?php if($share)
		tt_share() ?>
	<?php comments_template( ); ?>
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

</div><!-- End Container of page -->
<?php get_footer(); ?>
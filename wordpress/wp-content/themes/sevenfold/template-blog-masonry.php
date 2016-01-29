<?php
/*
    Template Name: Blog Masonry
*/
get_header(); 
$sidebar = get_post_meta( get_the_id(),'sevenfold_sidebar_position', true );
$share = get_post_meta( get_the_id(),'sevenfold_page_share', true );
$sidebar = $sidebar === '' ? 'full_width' : $sidebar;?>
<div class="container blog-masonry">
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
	<?php 
		if ( get_query_var('paged') ) 
			{ $paged = get_query_var('paged'); }
		elseif ( get_query_var('page') ) 
			{ $paged = get_query_var('page'); }
		else { $paged = 1; }
		$args = array(
			//Type & Status Parameters
			'post_type'   => 'post',
			'post_status' => 'publish',
			
			//Order & Orderby Parameters
			'order'               => 'DESC',
			'orderby'             => 'date',
			
			//Pagination Parameters
			'posts_per_page'         => get_option( 'posts_per_page' ),
			'paged'                  => $paged,			
		);
	global $tt_query;
	$tt_query = new WP_Query( $args );
	
	if ($tt_query->have_posts()) : ?>
		<div class="row" data-tesla-plugin="masonry">
	    	<?php while($tt_query->have_posts()) : $tt_query->the_post();?>
			
	    		<?php get_template_part('content','blog-masonry');?>
    		
	    	<?php endwhile; ?>
	    </div>
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
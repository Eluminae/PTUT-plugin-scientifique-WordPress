<?php $body_class = _go('site_layout') == 'Boxed Layout'? 'boxed' : '' ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title('-', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
     <!-- Pingbacks -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php echo "<script type='text/javascript'>var TemplateDir='".TT_THEME_URI."'</script>" ?>
	<!-- Favicon -->
	<?php if(_go('favicon')): ?>
		<link rel="shortcut icon" href="<?php _eo('favicon') ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class($body_class);?>>
    <div class="boxed-fluid">
        <!-- ======================================================================
                                        START HEADER
        ======================================================================= -->
        <?php 
        $header_type = _go('header_type') ? _go('header_type') : '1';
        get_template_part( 'theme_includes/header', $header_type ); ?>
        <!-- ======================================================================
                                        START CONTENT
        ======================================================================= -->
        <div class="content">
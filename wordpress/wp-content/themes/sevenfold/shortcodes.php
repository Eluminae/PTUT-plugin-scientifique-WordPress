<?php 
	
/***********************************************************************************************/
/* Shortcodes */
/***********************************************************************************************/


/* Shorcode row (Template structure)
============================================*/
    add_shortcode('container', 'container');

function container($atts, $content = null) {
    extract(shortcode_atts(array(
        'addclass' => ''
    ), $atts));
    
    return '<div class="container '.$addclass.'">'. do_shortcode($content) .'</div>';
}

	add_shortcode('row', 'row');

function row($atts, $content = null) {
	extract(shortcode_atts(array(
		'addclass' => ''
	), $atts));
	
	return '<div class="row '.$addclass.'">'. do_shortcode($content) .'</div>';
}


/* Shorcode fluid (Template structure)
============================================*/
	add_shortcode('fluid', 'fluid');

function fluid($atts, $content = null) {
	extract(shortcode_atts(array(
		'addclass' => ''
	), $atts));

	return '<div class="row-fluid '.$addclass.'">'. do_shortcode($content) .'</div>';
}

/* Shorcode span (Template structure)
============================================*/

	add_shortcode('column', 'column');

function column($atts, $content = null) {
	extract(shortcode_atts(array(
		'size' => '12',
		'addclass' => ''
	), $atts));

	$content = wpautop(trim($content));
	
	return '<div class="col-md-'.$size.' '.$addclass.'">'. do_shortcode($content) .'</div>';
}


/* Shorcode alert (Typography)
============================================*/

add_shortcode('alert', 'alert');

function alert($atts, $content = null) {
	extract(shortcode_atts(array(
		'type' => 'warning'
	), $atts));
    return '<div class="alert alert-'.$type.'">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<p>'.do_shortcode($content).'</p>
			</div>';
}
//=================BASIC SHORTCODES===========================================
function button($atts, $content = 'Button') {
    extract(shortcode_atts(array(
                'type' => '1',
                'link' => '#'
                    ), $atts));
    $output = "<a href='{$link}' class='button-{$type}'>" . do_shortcode($content) . "</a>";
    return $output;
}

add_shortcode('button', 'button');

function tesla_title($atts, $content = null) {
    extract(shortcode_atts(array(
                'under_title' => '',
                    ), $atts));
    return '<div class="title">
                <h1 class="title-type-1">' . do_shortcode($content) . '</h1>
                <p class="title-under-1">'.$under_title.'</p>
            </div>';
}
add_shortcode('tesla_title', 'tesla_title');

function tesla_call_action($atts, $content = null) {
    extract(shortcode_atts(array(
                'title' => '',
                'link' => '#',
                'label' => 'buy now'
                    ), $atts));
    ob_start();?>
    </div>
    <div class="buy-theme">
        <div class="container">
            <div class="col-md-9">
                <?php if ($title) : ?>
                    <h2><?php echo $title ?></h2>
                <?php endif; ?>
                <p><?php echo do_shortcode( $content ); ?></p>
            </div>
            <div class="col-md-3">
                <div class="buy-theme-button">
                    <a href="<?php echo $link ?>" class="button-2"><?php echo $label ?></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
    <?php
    return ob_get_clean() ;
}

add_shortcode('tesla_call_action', 'tesla_call_action');

function tesla_presentation($atts, $content = null) {
    extract(shortcode_atts(array(
                'bg_img' => '',
                'img' => '',
                    ), $atts));
    ob_start();?>
    </div>
    <div class="custom-type-1" style="background-image:<?php echo $bg_img ? "url('$bg_img')" : 'url(\'//www.placehold.it/1920x480\')'?>">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="aligncenter">
                        <img src="<?php echo $img ? $img : '//www.placehold.it/380x421'?>" alt="presentation">
                    </div>
                </div>
                <div class="col-md-6">
                    <?php echo do_shortcode( $content ); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
    
    <?php
    return ob_get_clean() ;
}

add_shortcode('tesla_presentation', 'tesla_presentation');

function tesla_custom_bg($atts, $content = null) {
    extract(shortcode_atts(array(
                'img' => '',
                'mask' => '',
                'type' => 2
                    ), $atts));
    ob_start();?>
    </div><!-- Close Container -->
    <div class="custom-type-<?php echo $type?>" style="background-image:<?php echo $img ? "url('$img')" : 'url(\'//www.placehold.it/1920x480\')'?>">
        <?php if($mask) : ?>
            <div class="custom-cover">
        <?php endif; ?>
            <div class="container">
                <?php echo do_shortcode( $content ); ?>
            </div>
        <?php if($mask) : ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="container"> <!-- Open Container by tesla_custom_bg -->
    
    <?php
    return ob_get_clean() ;
}

add_shortcode('tesla_custom_bg', 'tesla_custom_bg');

function tesla_features($atts, $content = null) {
    extract(shortcode_atts(array(
                'size' => '6',
                'type' => 'ul-features'
                    ), $atts));
    $type = $type == 'ul-features' ? 'ul-features' : 'huge-ul-black';
    return '<div class="'.$type.' col-md-' . $size . '">'. do_shortcode($content) .'</div>';
}
add_shortcode('tesla_features', 'tesla_features');
//Lists=====================
function tesla_list($atts, $content = null) {
    extract(shortcode_atts(array(
                'type' => '1',
                    ), $atts));
    $output = "<div class='ul-type-$type'>" . do_shortcode($content) . "</div>";
    return $output;
}
add_shortcode('tesla_list', 'tesla_list');
//=============Tabs=================================
add_shortcode('tesla_posts_tabs', 'tesla_posts_tabs');
function tesla_posts_tabs($atts, $content = null) {
    extract(shortcode_atts(array(
                'nr_posts' => '3',
                'type' => ''
                    ), $atts));
    global $tab_id;
    $tab_id++;
    ob_start();?>
        <div class="tabs-box<?php echo "-".$type ?>">
            <ul class="navigation-tab">
                <li class="active"><a href="#New-<?php echo $tab_id ?>" data-toggle="tab"><?php _e('New','sevenfold')?></a></li>
                <li><a href="#Popular-<?php echo $tab_id ?>" data-toggle="tab"><?php _e('Popular','sevenfold')?></a></li>
                <li><a href="#Latest-<?php echo $tab_id ?>" data-toggle="tab"><?php _e('Comments','sevenfold')?></a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="New-<?php echo $tab_id ?>">
                    <?php 
                    $args = array(
                        //Type & Status Parameters
                        'post_type'   => 'post',
                        'post_status' => 'publish',
                        
                        //Order & Orderby Parameters
                        'order'               => 'DESC',
                        'orderby'             => 'date',
                        'ignore_sticky_posts' => true,
                        
                        //Pagination Parameters
                        'posts_per_page'         => $nr_posts,
                    );
                    
                    $query = new WP_Query( $args );
                    if ($query->have_posts()) :?>
                        <ul>
                            <?php while($query->have_posts()) : $query->the_post();?>
                                <li>
                                    <div class="item">
                                        <a href="#" class="item-image">
                                            <?php the_post_thumbnail( 'thumbnail' ); ?>
                                        </a>
                                        <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                                        <p><?php the_time('d M') ?></p>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <div class="tab-pane fade" id="Popular-<?php echo $tab_id ?>">
                    <?php 
                    $args = array(
                        //Type & Status Parameters
                        'post_type'   => 'post',
                        'post_status' => 'publish',
                        
                        //Order & Orderby Parameters
                        'order'               => 'DESC',
                        'ignore_sticky_posts' => true,
                        
                        //Pagination Parameters
                        'posts_per_page'         => $nr_posts,
                        'meta_key' => 'tt_post_views_count',
                        'orderby' => 'meta_value_num',
                    );
                    
                    $query = new WP_Query( $args );
                    if ($query->have_posts()) :?>
                        <ul>
                            <?php while($query->have_posts()) : $query->the_post();?>
                                <li>
                                    <div class="item">
                                        <a href="#" class="item-image">
                                            <?php the_post_thumbnail( 'thumbnail' ); ?>
                                        </a>
                                        <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                                        <p><?php the_time('d M') ?></p>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <div class="tab-pane fade" id="Latest-<?php echo $tab_id ?>">
                    <ul class="tabs_ul">
                        <?php
                        $recent_comments = get_comments(array(
                            'number' => $nr_posts,
                            'status' => 'approve'
                                ));
                        ?>
                            <?php foreach ($recent_comments as $recent_comment) : ?>
                                <li>
                                    <div class="item">
                                        <a href="#" class="item-image">
                                            <?php echo get_avatar( $recent_comment, 50, false,'avatar image' ); ?>
                                        </a>
                                        <h3><?php echo $recent_comment->comment_author ?></h3> on <a href="<?php echo get_permalink($recent_comment->comment_post_ID) ?>"><?php echo get_post($recent_comment->comment_post_ID)->post_content ?></a>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                </div>
            </div>
        </div>
        <?php
    wp_reset_postdata();
    return ob_get_clean() ;
}
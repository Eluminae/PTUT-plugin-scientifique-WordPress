<?php
define('IMAGES', get_template_directory_uri() . '/images/');
/***********************************************************************************************/
/*  Tesla Framework */
/***********************************************************************************************/
require_once(get_template_directory() . '/tesla_framework/tesla.php');

/***********************************************************************************************/
/*  Register Plugins */
/***********************************************************************************************/
if ( is_admin() && current_user_can( 'install_themes' ) ) {
    require_once( get_template_directory() . '/plugins/tgm-plugin-activation/register-plugins.php' );
}

/***********************************************************************************************/
/* Load JS and CSS Files - done with TT_ENQUEUE */
/***********************************************************************************************/

/***********************************************************************************************/
/* Google fonts + Fonts changer */
/***********************************************************************************************/
TT_ENQUEUE::$base_gfonts = array('://fonts.googleapis.com/css?family=Roboto:100,400,400italic,300,300italic,700,700italic,900');
TT_ENQUEUE::$gfont_changer = array(
        _go('logo_text_font'),
        _go('main_content_text_font'),
        _go('sidebar_text_font'),
        _go('menu_text_font')
    );
TT_ENQUEUE::add_css(array('//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css'));
TT_ENQUEUE::add_js(array('http://w.sharethis.com/button/buttons.js'));
/***********************************************************************************************/
/* Custom CSS */
/***********************************************************************************************/
add_action('wp_enqueue_scripts', 'tesla_custom_css', 99);
function tesla_custom_css() {
    $custom_css = _go('custom_css') ? _go('custom_css') : '';
    wp_add_inline_style('tt-main-style', $custom_css);
}

add_action('wp_enqueue_scripts', 'tt_style_changers',99);
function tt_style_changers(){
    $background_color = _go('bg_color') ;
    $background_image = _go('bg_image') ;
    if($background_image || $background_color)
        wp_add_inline_style('tt-main-style', "body{background-color: $background_color;background-image: url('$background_image')}");

    $colopickers_css = '';
    if (_go('site_color')) : 
        $colopickers_css .= '
            .form-submit input,
            .button-2 {
                background-color: ' . _go('site_color') . ';
            }
            .title .title-type-1 {
                color: ' . _go('site_color') . ';
            }
            .tagcloud li a:hover {
                color: ' . _go('site_color') . ';
            }
            .blog-masonry .blog-entry .entry-cover .entry-date-comments span.entry-com a:hover i,
            .blog-masonry .blog-entry .entry-cover .entry-date-comments span.entry-com a:hover {
                color: ' . _go('site_color') . ';
            }
            .blog-masonry .blog-entry .entry-content .entry-content-details h1 a:hover {
                color: ' . _go('site_color') . ';  
            }
            .share-it li i {
                background-color: ' . _go('site_color') . ';
            }
            .pricing-table.pricing-table-current {
                border-color: ' . _go('site_color') . ';
            }
            .pricing-table .pricing-table-head {
                background-color: ' . _go('site_color') . ';
            }
            .gallery-photos .gallery-item:hover .gallery-item-hover,
            .pricing-table.pricing-table-current .pricing-table-price {
                background-color: ' . _go('site_color') . ';
            }
            .our-partners .tesla-carousel-items img:hover {
                border-color: ' . _go('site_color') . ';
            }
            .the-slider.project-slider .slide-arrows .slide-right {
                color: ' . _go('site_color') . ';
            }
            .the-slider.project-slider .slide-arrows .slide-left {
                color: ' . _go('site_color') . ';
            }
            .the-slider.project-slider .slide-arrows .slide-right:hover,
            .the-slider.project-slider .slide-arrows .slide-left:hover {
                background-color: ' . _go('site_color') . ';
            }
            .the-slider.project-slider .the-bullets-dots li.active { 
                border-color: ' . _go('site_color') . ';
            }
            .services-type-2 .service .service-icon {
                background-color: ' . _go('site_color') . ';
            }
            .testimonials .testimonials-dots li.active {
                background-color: ' . _go('site_color') . ';
            }
            .accordion .accordion-heading.active {
                background-color: ' . _go('site_color') . ';
                border-color: ' . _go('site_color') . ';
            }
            .accordion .accordion-heading a span {
                background-color: ' . _go('site_color') . ';
            }
            .accordion .accordion-heading.active a span {
                color: ' . _go('site_color') . ';
            }
            .widget .widget-title {
                color: ' . _go('site_color') . ';
            }
            .footer-model-1.footer-color-white .widget .widget-sitemap li a,
            .footer-model-1.footer-color-white .widget .widget-latest-post p,
            .footer-model-1.footer-color-white .widget .widget-about-us li a:hover,
            .widget .widget-about-us li a:hover,
            .widget .widget-latest-post h4 a:hover {
                color: ' . _go('site_color') . ';
            }
            .widget .widget-sitemap li a:hover {
                color: ' . _go('site_color') . ';
            }
            .navigation-tab li a {
                color: ' . _go('site_color') . ';
            }
            .navigation-tab li a:hover,
            .navigation-tab li.active a {
                background-color: ' . _go('site_color') . ';
            }
            .tab-content ul li .item h3 a:hover {
                color: ' . _go('site_color') . ';
            }
            .gallery-photos .gallery-pagination li:hover,
            .gallery-photos .gallery-pagination li.active {
                background-color: ' . _go('site_color') . ';
            }
            .header-model-1 .header-top-line ul li a:hover {
                color: ' . _go('site_color') . ';
            }
            .header-model-1 .header-top-line ul li.header-cart i:hover {
                color: ' . _go('site_color') . ';
            }
            .header-model-1 .header-top-line ul li.header-social a:hover {
                background-color: ' . _go('site_color') . ';
            }
            .header-model-1 .menu ul li.active a,
            .header-model-1 .menu ul li a:hover {
                background-color: ' . _go('site_color') . ';
            }
            .header-model-1.header-model-3 .header-top-line {
                background-color: ' . _go('site_color') . ';
            }
            .header-model-1.header-model-4 .menu-cover {
                background-color: ' . _go('site_color') . ';
            }
            .header-model-1.header-model-4 .menu ul li.active a,
            .header-model-1.header-model-4 .menu ul li a:hover {
                color: ' . _go('site_color') . ';
            }
            .header-model-1 .header-search i:hover {
                background-color: ' . _go('site_color') . ';
            }
            .header-model-1.header-model-3.header-color-dark .header-top-line {
                background-color: ' . _go('site_color') . ';
            }
            .header-model-1.header-model-4.header-color-dark .header-search button i:hover {
                background-color: ' . _go('site_color') . ';
            }

            .header-model-1 .menu>ul>li:hover {
                background-color: ' . _go('site_color') . ';
            }
            .header-model-1 .menu ul li ul li {
                background-color: ' . _go('site_color') . ';
            }
            .menu ul li.current_page_item a,
            .menu ul li a:hover{
                background: ' . _go('site_color') . ';
            }
            .header-model-1.header-model-4 .menu ul>li:hover>a {
                color: ' . _go('site_color') . ';
            }
            .header-model-1.header-model-4 .menu ul li ul li,
            .header-model-1.header-model-4 .menu ul li ul li a {
                background-color: ' . _go('site_color') . ';
            }
            .header-model-1.header-color-dark .menu ul li ul li:hover,
            .header-model-1.header-color-dark .menu ul li ul li a:hover,
            .header-model-1.header-model-4 .menu ul li ul li:hover,
            .header-model-1.header-model-4 .menu ul li ul li a:hover {
                background-color: ' . _go('site_color') . ';
            }
            .header-model-1.header-model-3.header-color-dark .menu ul>li:hover>a,
            .header-model-1.header-model-3.header-color-dark .menu ul li ul li a:hover {
                background-color: ' . _go('site_color') . ';
            }
            .filter-area .filter-box .filter li a.active,
            .filter-area .filter-box .filter li a:hover {
                background-color: ' . _go('site_color') . ';
            }
            .filter-area .filter-item .filter-item-details h1 a {
                color: ' . _go('site_color') . ';
            }
            .page-numbers li .current,
            .page-numbers li a:hover {
                background-color: ' . _go('site_color') . ';
                border-color: ' . _go('site_color') . ';
            }
            .our-team-c .our-team-c-member .our-team-c-member-socials.our-team-c-member-socials-male li a {
                color: ' . _go('site_color') . ';
            }
            .skills-a .skills-a-title h1 {
                color: ' . _go('site_color') . ';
            }
            .skills-a .skills-a-skill .skills-a-skill-cover {
                background-color: ' . _go('site_color') . ';
            }
            .skills-b .skills-b-title h1 {
                color: ' . _go('site_color') . ';
            }
            .our-team-b .our-team-b-member .our-team-b-member-details,
            .skills-c .skills-c-skill .skills-c-skill-cover {
                background-color: ' . _go('site_color') . ';
            }
            .our-team-b .our-team-b-member .our-team-b-member-details .our-team-b-member-details-socials li a,
            .ul-type-5 li:before,
            .ul-type-6 li:before,
            .huge-ul-black ul li:before,
            .ul-features li:before,
            .our-team-b .our-team-b-title h1,
            .site-title-center h3,
            .event-type-1 .event .event-content .event-read,
            .event-type-1 .event .event-content .event-time,
            .widget a:hover,
            .pricing-table .pricing-table-price,
            .blog-entry .entry-header h1 a:hover,
            .footer-model-1 .footer-bottom-line .footer-socials li a:hover,
            .footer-model-1 .footer-bottom-line .footer-copyright a:hover {
                color: ' . _go('site_color') . ';
            }
            .footer-model-1.footer-color-white {
                border-top-color: ' . _go('site_color') . ';
            }
            .button-2:hover,
            .filter-area .filter-item .filter-item-cover:hover .filter-item-cover-hover{
                background: ' . hex2rgba(_go('site_color'), 0.8) . ';
            }
            .header-model-1 .menu ul li ul li{
                border-bottom: 1px solid #'. darker_color(_go('site_color'),85) .';
                border-top: 1px solid '. hex2rgba(_go('site_color'), 0.75) .';
            }
            ';
    endif;
    if (_go('site_color_2')) :
        $colopickers_css .= '
            a:hover {
                color: ' . _go('site_color_2') . ';
            }
            .blog-entry .entry-content .entry-details ul li.entry-details-comments a:hover i,
            .blog-entry .entry-content .entry-details ul li.entry-details-comments a:hover {
                color: ' . _go('site_color_2') . ';
            }

            .widget button,
            .widget .button,
            .widget input[type="button"],
            .widget input[type="reset"],
            .widget input[type="submit"] {
                background-color: ' . _go('site_color_2') . ';
            }';
    endif;

    wp_add_inline_style('tt-main-style', $colopickers_css);

    //Custom Fonts Changers
    wp_add_inline_style('tt-main-style', tt_text_css('main_content_text','.content p','px'));
    wp_add_inline_style('tt-main-style', tt_text_css('sidebar_text','.sidebar,.sidebar li,.sidebar a,.sidebar p,.sidebar .widget-title','px'));
    wp_add_inline_style('tt-main-style', tt_text_css('menu_text','[class *= "header-model-"] .menu ul li a','px'));
    //Custom Styler
    wp_add_inline_style('tt-main-style', _gcustom_styler('Custom Styler'));
}

/***********************************************************************************************/
/* Custom JS */
/***********************************************************************************************/
add_action('wp_footer', 'tesla_custom_js', 99);
function tesla_custom_js() {
    ?>
    <script type="text/javascript"><?php _eo('custom_js') ?></script>
    <?php
}
/***********************************************************************************************/
/* Register Contact Form Locations */
/***********************************************************************************************/
TT_Contact_Form_Builder::add_form_locations(array(
    'contact_page'=>'Contact Page',
    'footer'=>'Foooter'
));

/***********************************************************************************************/
/* Add Menus */
/***********************************************************************************************/

function tt_register_menus(){
    register_nav_menus(
        array(
            'main_menu'    => _x('Main menu', 'dashboard','sevenfold'),
        )
    );
}
add_action('init', 'tt_register_menus');

/***********************************************************************************************/
/* Add Shortcodes */
/***********************************************************************************************/

get_template_part('shortcodes');

/***********************************************************************************************/
/* Add Widgets */
/***********************************************************************************************/

get_template_part('widgets/widget','subscription');
get_template_part('widgets/widget','popular');
get_template_part('widgets/widget','contact');
get_template_part('widgets/widget','twitter');
get_template_part('widgets/widget','flickr');
get_template_part('widgets/widget','recent-posts');

/* ========================================================================================================================

  Comments

  ======================================================================================================================== */
 
function tt_custom_comments( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
?>

    <<?php echo $tag ?> id="comment-<?php comment_ID() ?>">
        <?php if ( 'div' != $args['style'] ) : ?>
            <div id="div-comment-<?php comment_ID() ?>" <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?>>
        <?php endif; ?>
        <span class="comment-image">
            <?php if ($args['avatar_size'] != 0)
                echo get_avatar( $comment, $args['avatar_size'], false,'avatar image' ); ?>
        </span>
        <?php if ($comment->comment_approved == '0') : ?>
            <em class="comment-awaiting-moderation">
                <?php _e('Your comment is awaiting moderation.','sevenfold') ?>
            </em>
            <br />
        <?php endif; ?>

        <span class="comment-info">
            <?php echo get_comment_author_link() ?>
            <span><?php echo get_comment_time('d M Y') ?></span>
            
            <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'],'reply_text'=> __('Reply','sevenfold') . '<i class="icon-501" title="501"></i>'))) ?>
            
            <?php edit_comment_link(__('(Edit)','sevenfold'),'  ','' );?>
            
        </span>
        <?php comment_text() ?>
        <?php if ( 'div' != $args['style'] ) : ?>
            </div>
        <?php endif; 

}

function tt_custom_comments_closed( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
    
    if($comment->comment_type == 'pingback' || $comment->comment_type == 'trackback'):?>
        <<?php echo $tag ?> id="comment-<?php comment_ID() ?>">
        <?php if ( 'div' != $args['style'] ) : ?>
            <div id="div-comment-<?php comment_ID() ?>" <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?>>
        <?php endif; ?>
        <span class="comment-image">
            <?php if ($args['avatar_size'] != 0)
                echo get_avatar( $comment, $args['avatar_size'], false,'avatar image' ); ?>
        </span>
        <?php if ($comment->comment_approved == '0') : ?>
            <em class="comment-awaiting-moderation">
                <?php _e('Your comment is awaiting moderation.','sevenfold') ?>
            </em>
            <br />
        <?php endif; ?>

        <span class="comment-info">
            <?php echo get_comment_author_link() ?>
            <span><?php echo get_comment_time('d M Y') ?></span>
            
            <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'],'reply_text'=> __('Reply','sevenfold') . '<i class="icon-501" title="501"></i>'))) ?>
            
            <?php edit_comment_link(__('(Edit)','sevenfold'),'  ','' );?>
            
        </span>
        <?php comment_text() ?>
        <?php if ( 'div' != $args['style'] ) : ?>
            </div>
        <?php endif;
    endif;

}

/***********************************************************************************************/
/* Add Sidebar Support */
/***********************************************************************************************/
function tt_register_sidebars(){
    if (function_exists('register_sidebar')) {
        register_sidebar(
            array(
                'name'           => __('Blog Sidebar', 'sevenfold'),
                'id'             => 'blog',
                'description'    => __('Blog Sidebar Area', 'sevenfold'),
                'before_widget'  => '<div class="widget %2$s">',
                'after_widget'   => '</div>',
                'before_title'   => '<h3 class="widget-title">',
                'after_title'    => '</h3>'
            )
        );
        register_sidebar(
            array(
                'name'           => __('Page', 'sevenfold'),
                'id'             => 'page',
                'description'    => __('Page Sidebar Area', 'sevenfold'),
                'before_widget'  => '<div class="widget %2$s">',
                'after_widget'   => '</div>',
                'before_title'   => '<h3 class="widget-title">',
                'after_title'    => '</h3>'
            )
        );
        register_sidebar(
            array(
                'name'           => __('Footer', 'sevenfold'),
                'id'             => 'footer',
                'description'    => __('Footer Area', 'sevenfold'),
                'before_widget'  => '<div class=" "><div class="widget %2$s">',
                'after_widget'   => '</div></div>',
                'before_title'   => '<h3 class="widget-title">',
                'after_title'    => '</h3>'
            )
        );
    }
}
add_action('widgets_init','tt_register_sidebars');

//calculates width for each widget in footer area 
global $first_footer_widget;
$first_footer_widget == false;
function tt_footer_sidebar_params($params) {
    $sidebar_id = $params[0]['id'];

    if ( $sidebar_id == 'footer' ) {
        $total_widgets = wp_get_sidebars_widgets();
        $sidebar_widgets = count($total_widgets[$sidebar_id]);
        $params[0]['before_widget'] = str_replace('class=" ', 'class="col-md-' . floor(12 / $sidebar_widgets), $params[0]['before_widget']);
        global $first_footer_widget;
        if(!$first_footer_widget && _go('footer_logo')){
            $footer_logo = '<div class="footer-logo"><a href="'.site_url( ).'"><img src="'. _go('footer_logo') .'" alt="seven fold logo"></a></div>';
            $params[0]['before_widget'] = str_replace('<div class="widget', $footer_logo.'<div class="widget',$params[0]['before_widget']);
            $first_footer_widget = true;
        }
    }

    return $params;
}
add_filter('dynamic_sidebar_params','tt_footer_sidebar_params');
// add post-formats to post
//add_theme_support('post-formats', array('quote', 'gallery', 'video', 'audio', 'image'));


function tt_share(){
    $share_this = _go('share_this');
    if(isset($share_this) && is_array($share_this)): ?>
        <ul class="share-it">
            <li><?php _ex('Share','single-post','sevenfold'); ?>:</li>
            <?php foreach($share_this as $val): ?>
                <li>
                    <a href="#"><span class='st_<?php echo $val ?>_large' displayText='<?php echo ucfirst($val) ?>'></span></a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif;
}

/*==== Function Call custom meta boxex ====*/
function tt_video_or_image_featured($echo = false) {
    global $post;
    $embed_code = get_post_meta($post->ID , THEME_NAME . '_video_embed', true);
    $patern = '<div class="entry-cover">%s</div>';

    if($echo){

        if(!empty($embed_code)) {
            return sprintf($patern, $embed_code);
        }else {
            if( has_post_thumbnail() && ! post_password_required() ){
                return sprintf($patern, get_the_post_thumbnail());
            }
        }

    }else{

        if(!empty($embed_code)) {
            printf($patern, $embed_code);
        }else {
            if( has_post_thumbnail() && ! post_password_required() ){
                printf($patern, get_the_post_thumbnail());
            }
        }

    }
}

function tt_ajax_contact_form () {
    $receiver_mail = (_go('email_contact')) ? _go('email_contact') : get_bloginfo( 'admin_email' );

    if (!empty($_POST['name']) && !empty($_POST ['email']) && !empty($_POST ['message'])) {
        $subject = (!empty($_POST['website'])) ? $_POST['name'] . ' from ' . $_POST['website'] : ' from ' . get_bloginfo( 'name' ) . ' Contact form';
        $email = $_POST['email'];
        $message = $_POST['message'];
        $message = wordwrap($message, 70, "\r\n");
        $header []= 'From: '. $_POST['name'] .'<' . $_POST ['email'] . '>';
        $header []= 'Reply-To: ' . $email;
    
        if ( wp_mail( $receiver_mail, $subject, $message, $header ) )
            $result = __('Message successfully sent.', 'sevenfold');
        else
            $result = __('Message could not be sent.', 'sevenfold');
    }else
        $result = __('Please fill all the fields','sevenfold');
    die($result);
}
add_action('wp_ajax_tt_ajax_contact_form', 'tt_ajax_contact_form');           // for logged in user  
add_action('wp_ajax_nopriv_tt_ajax_contact_form', 'tt_ajax_contact_form');    // if user not logged in

//Search page
function cut_shortcodes($content) {
    return preg_replace('@\[.*?\]@', '', $content);
}

function tt_related_posts($the_post){
    //for use in the loop, list 5 post titles related to first tag on current post
    $tags = wp_get_post_tags($the_post->ID);
    if ($tags) {
        $first_tag = $tags[0]->term_id;
        $args=array(
            'tag__in' => array($first_tag),
            'post__not_in' => array($the_post->ID),
            'posts_per_page'=>5,
            'caller_get_posts'=>1
        );
        $related_query = new WP_Query($args);
        if( $related_query->have_posts() ) : ?>
            <div class="site-title">
                <div class="site-inside">
                    <span><?php _e('Related posts','sevenfold') ?></span>
                </div>
            </div>
            <div class="row">
                <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
                    <div class="col-md-3 col-xs-6">
                        <div class="related-post">
                            <div class="related-post-cover">
                                <?php if(has_post_thumbnail( )) 
                                        the_post_thumbnail( ); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>"><?php the_title( ); ?></a>
                        </div>
                    </div>
                <?php endwhile;?>
            </div>
        <?php endif;
        wp_reset_query();
    }

}

//====================View count for single posts===========================
function tt_set_post_views($postID) {
    $count_key = 'tt_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function tt_get_post_views($postID) {
    $count_key = 'tt_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count . ' Views';
}

//For shortcodes to work in widgets
add_filter('widget_text', 'do_shortcode');
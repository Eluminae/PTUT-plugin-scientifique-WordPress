<div class="header-model-1 <?php _eo('header_theme') ?>">
    <div class="header-top-line">
        <div class="container">
            <ul>
                <?php if(_go('email_contact')) : ?>
                    <li class="header-mail"><a href="mailto:<?php _eo('email_contact') ?>"><i class="icon-42" title="email"></i><?php _eo('email_contact') ?></a></li>
                <?php endif; ?>
                <?php if(_go('contact_phone')) : ?>
                    <li class="header-phone"><i class="icon-298" title="phone"></i><?php _eo('contact_phone') ?></li>
                <?php endif; ?>
                <?php $social_platforms = array(
                    'facebook',
                    'twitter',
                    'linkedin',
                    'youtube',
                    'vimeo',
                    'pinterest',
                    'google',
                    'dribble',
                    'rss');
                    foreach($social_platforms as $platform): 
                        if (_go('social_platforms_' . $platform)):?>
                            <li class="header-social">
                                <a href="<?php echo _go('social_platforms_' . $platform) ?>"><i class="socials-<?php echo $platform ?>" title="<?php echo $platform ?>"></i></a>
                            </li>
                        <?php endif;
                    endforeach;?>
            </ul>
            <p><?php _eo('header_text') ?></p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php if(_go('logo_wrapper_size')) {
                $logo_width = _go('logo_wrapper_size');
                $menu_width = 12 - (int)_go('logo_wrapper_size');
            }else{
                $logo_width = 4;
                $menu_width = 8;
            }?>
            <div class="col-md-<?php echo $logo_width?>">
                <div class="header-logo">
                    <a href="<?php echo home_url() ?>" style="<?php _estyle_changer('logo_text') ?>" >
                        <?php if(_go('logo_text')): ?>
                            <?php _eo('logo_text') ?>
                        <?php elseif(_go('logo_image')): ?>
                            <img src="<?php _eo('logo_image') ?>" alt="<?php echo THEME_PRETTY_NAME ?> logo">
                        <?php else: ?>
                            <?php echo THEME_PRETTY_NAME; ?>
                        <?php endif; ?>
                    </a>
                </div>
            </div>
            <div class="col-md-<?php echo $menu_width?>">
                <div class="menu">
                    <div class="responsive-menu"><?php _e('Menu','sevenfold') ?></div>
                    <ul>
                        <?php wp_nav_menu( array( 
                                    'title_li'=>'',
                                    'theme_location' => 'main_menu',
                                    'container' => false,
                                    'items_wrap' => '%3$s',
                                    'fallback_cb' => 'wp_list_pages'
                                ) );?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ======================================================================
                                END HEADER
======================================================================= -->
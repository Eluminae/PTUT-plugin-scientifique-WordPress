<div class="header-model-1 header-model-4 <?php _eo('header_theme') ?>">
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
                <div class="header-search">
                    <form class="search-form" action="<?php echo site_url( ); ?>">
                        <input type="text" class="search-line" placeholder="Search" name="s">
                        <button type="submit"><i class="icon-335" title="335"></i></button>
                        <input type="submit" value="" class="search-button">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-cover">
        <div class="container">
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
<!-- ======================================================================
                                END HEADER
======================================================================= -->
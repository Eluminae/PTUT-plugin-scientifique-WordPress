        <!-- ======================================================================
                                        START FOOTER
        ======================================================================= -->
        <div class="footer-model-1 footer-color-dark">
            <?php if(is_active_sidebar('footer' )) : ?>
                <div class="container">
                    <div class="row">
                        <?php dynamic_sidebar( 'footer' ); ?>
                    </div>
                </div>
            <?php endif; ?>
            
            <div class="footer-bottom-line">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="footer-copyright">
                                <?php _eo('copyright_message') ?> Designed by <a href="http://www.teslathemes.com" target="_blank">TT</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <ul class="footer-socials">
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
                                            <li>
                                                <a href="<?php echo _go('social_platforms_' . $platform) ?>"><i class="socials-<?php echo $platform ?>" title="<?php echo $platform ?>"></i></a>
                                            </li>
                                        <?php endif;
                                    endforeach;?>                             
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ======================================================================
                                        END FOOTER
        ======================================================================= -->
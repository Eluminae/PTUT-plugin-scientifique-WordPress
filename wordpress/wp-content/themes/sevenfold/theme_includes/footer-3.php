<!-- ======================================================================
                                        START FOOTER
        ======================================================================= -->
        <div class="footer-model-2">
            <div class="location-map">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <?php tt_form_location('footer') ?>
                        </div>
                    </div>
                </div>
                <?php tt_gmap('contact_map','google-map','google-map','false'); ?>
            </div>            
            <div class="footer-bottom-line">
                <div class="container">
                    <ul class="all-socials">
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
        <!-- ======================================================================
                                        END FOOTER
        ======================================================================= -->
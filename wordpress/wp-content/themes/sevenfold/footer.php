            </div>
            <!-- ======================================================================
                                            END CONTENT
            ======================================================================= -->
            <?php $footer_type = _go('footer_type') ? _go('footer_type') : '1';
            get_template_part( 'theme_includes/footer', $footer_type ); ?>
        </div><!-- /#boxed -->
        <!-- ======================================================================
                                        START SCRIPTS
        ======================================================================= -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <?php _eo('tracking_code'); ?>
        <?php wp_footer();?>
    </body>
</html>
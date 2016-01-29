<div class="container">
    <div class="error-404-v3"<?php if (_go('error_image')) echo " style='background-image:url(\" ". _go('error_image') . "\");'" ?>>
        <div class="error-content">
            <div class="error-head">
                <?php get_search_form( ); ?>
            </div>
            <h1><?php _e('404','sevenfold') ?></h1>
            <h3><?php 
            if (_go('error_title')) 
                _eo('error_title'); 
            else 
                _e('OOps! something went wrong','sevenfold') ?></h3>
            <p><?php if (_go('error_message')) 
                    _eo('error_message'); 
                else 
                    _e('The page you are trying to access seems to no longer exists.','sevenfold') ?></p>
        </div>
    </div>
</div>
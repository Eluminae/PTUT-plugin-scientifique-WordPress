<div class="container">
    <div class="error-404-v2">
        <div class="row">
            <div class="col-md-7">
                <div class="error-content">
                    <?php 
                    if (_go('error_title')) 
                        _eo('error_title'); 
                    else 
                        _e('OOps! something went wrong','sevenfold') ?></h3>
                    <p><?php if (_go('error_message'))
                        _eo('error_message'); 
                    else
                        _e('The page you are trying to access seems to no longer exists.','sevenfold') ?></p>
                    <?php get_search_form( ); ?>
                </div>
            </div>
            <div class="col-md-5">
                <div class="error-404-image"<?php if (_go('error_image')) echo " style='background-image:url(\" ". _go('error_image') . "\");'" ?>></div>
            </div>
        </div>
    </div>
</div>
<div class="error-404-v1"<?php if (_go('error_image')) echo " style='background-image:url(\" ". _go('error_image') . "\");'" ?>>
    <div class="container">
        <div class="error-404-image"></div>
        <div class="error-content">
            <h3><?php 
                                if (_go('error_title')) 
                                    _eo('error_title'); 
                                else 
                                    _e('OOps! something went wrong','sevenfold') ?></h3>
            <p><?php if (_go('error_message')) 
                _eo('error_message'); 
            else  _e('The page you are trying to access seems to no longer exists.','sevenfold') ?></p>
            <a href="javascript:history.go(-1)" onMouseOver="self.status=document.referrer;return true" class="error-button"><?php _ex('back','error404','sevenfold' );?></a>
        </div>
    </div>
</div>
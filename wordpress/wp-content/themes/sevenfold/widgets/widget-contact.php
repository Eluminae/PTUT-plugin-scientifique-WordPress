<?php

class Tesla_contact_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
                'tesla_contact_widget',
                '['.THEME_PRETTY_NAME.'] Contact',
                array(
                    'description' => __('Displays contact information', 'sevenfold'),
                    'classname' => 'tesla_contact_widget',
                )
        );
    }

    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', $instance['title'], $instance, $this->id_base);
        if(defined('ICL_SITEPRESS_VERSION')){
            if(function_exists('icl_translate')){
                $phone = icl_translate( 'sevenfold', 'contact_widget_phone', $instance['phone']);
                $fax =  icl_translate( 'sevenfold', 'contact_widget_tax', $instance['fax']);
                $email = icl_translate( 'sevenfold', 'contact_widget_email', $instance['email']);
                $address = icl_translate( 'sevenfold', 'contact_widget_address', $instance['address']);
            }
        } else {
            $phone = $instance['phone'];
            $fax = $instance['fax'];
            $email = $instance['email'];
            $address = $instance['address'];
        }

        $before_widget = str_replace('widget">', '">', $before_widget);
        echo $before_widget;
        if (!empty($title))
            echo $before_title . $title . $after_title;?>
        <ul class="widget-about-us">
            <?php 
            if(!empty($email)) : ?>
                <li class="widget-about-mail">
                    <?php if(!empty($email)) : ?>
                        <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                    <?php endif; ?>
                </li>
            <?php endif;
            if(!empty($phone)): ?>
                <li class="widget-about-phone">
                    <?php echo $phone; ?>
                </li>
            <?php endif;
             if(!empty($fax)): ?>
                <li class="widget-about-phone">
                    <?php echo $fax; ?>
                </li>
            <?php endif;
            if(!empty($address)) :?>
                <li class="widget-about-location">
                    <?php echo $address; ?>
                </li>
            <?php endif;?>
        </ul>
        <?php
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = $new_instance['title'];
        $instance['phone'] = $new_instance['phone'];
        $instance['fax'] = $new_instance['fax'];
        $instance['email'] = $new_instance['email'];
        $instance['address'] = $new_instance['address'];

        return $instance;
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('title' => '', 'phone' => '', 'fax' => '', 'email' => '', 'address' => ''));
        $title = esc_attr($instance['title']);
        $phone = esc_attr($instance['phone']);
        $fax = esc_attr($instance['fax']);
        $email = esc_attr($instance['email']);
        $address = esc_attr($instance['address']);
        ?>
        <p>
            <label><?php _e('Title:','sevenfold'); ?><input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label>
            <label><?php _e('Phone:','sevenfold'); ?><input class="widefat" name="<?php echo $this->get_field_name('phone'); ?>" type="text" value="<?php echo $phone; ?>" /></label>
            <label><?php _e('Fax:','sevenfold'); ?><input class="widefat" name="<?php echo $this->get_field_name('fax'); ?>" type="text" value="<?php echo $fax; ?>" /></label>
            <label><?php _e('E-mail:','sevenfold'); ?><input class="widefat" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" /></label>
            <label><?php _e('Address:','sevenfold'); ?><input class="widefat" name="<?php echo $this->get_field_name('address'); ?>" type="text" value="<?php echo $address; ?>" /></label>
        </p>
        <?php
    }
}

add_action('widgets_init', create_function('', 'return register_widget("Tesla_contact_widget");'));
<?php

class Tesla_flickr_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
                'tesla_flickr_widget',
                '['.THEME_PRETTY_NAME.'] Flickr',
                array(
                    'description' => __('Displays a list of latest photos', 'sevenfold'),
                    'classname' => 'tesla_flickr_widget',
                )
        );
    }

    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', $instance['title'], $instance, $this->id_base);
        $user = $instance['user'];
        $nr = $instance['nr'];

        echo $before_widget;
        if (!empty($title)){
            echo $before_title ;
            if($args['id'] !=='footer')
                echo '<i class="icon-151" title="flickr"></i>';
            echo $title . $after_title;
        }

        echo '<ul class="flickr_widget" data-userid="'.$user.'" data-items="'.$nr.'">';

        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = $new_instance['title'];
        $instance['user'] = $new_instance['user'];
        $instance['nr'] = (int)$new_instance['nr'];

        return $instance;
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('title' => '', 'user'=>'97073871@N04', 'nr'=>4));
        $title = esc_attr($instance['title']);
        $user = esc_attr($instance['user']);
        $nr = $instance['nr'];
        ?>
        <p>
            <label><?php _e('Title:','sevenfold'); ?><input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label> 
            <label><?php _e('Flickr id:','sevenfold'); ?><input class="widefat" name="<?php echo $this->get_field_name('user'); ?>" type="text" value="<?php echo $user; ?>" /></label> 
            <label for="<?php echo $this->get_field_id('nr'); ?>">
                <?php _e('Number of photos to show:','sevenfold'); ?>
                <input id="<?php echo $this->get_field_id('nr'); ?>" name="<?php echo $this->get_field_name('nr'); ?>" type="text" value="<?php echo $nr; ?>" size="3" />
            </label>
        </p>
        <?php
    }
}
add_action('widgets_init', create_function('', 'return register_widget("Tesla_flickr_widget");'));
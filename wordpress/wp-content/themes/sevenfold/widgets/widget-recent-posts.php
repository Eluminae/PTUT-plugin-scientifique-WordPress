<?php
/*
  Plugin Name: Posts and Comments
  Plugin URI: http://red-sky.pl/
  Description: Displays Posts and Comments  tabs
  Author: Red-Sky
  Version: 1
  Author URI: http://red-sky.pl/
 */

class RecentPostsWidget extends WP_Widget {

    function RecentPostsWidget() {
        $widget_ops = array(
            'classname' => 'tesla_recent_posts', 
            'description' => 'Displays Recent Posts with Featured Images.'
            );
        $this->WP_Widget('RecentPostsWidget', '['.THEME_PRETTY_NAME.'] Recent Posts', $widget_ops);
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('nr_posts' => 3,'title'=>''));
        $nr_posts = $instance['nr_posts'];
        $title = $instance['title'];
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="title" value="<?php echo esc_attr($title); ?>" /></label></p>
        <p><label for="<?php echo $this->get_field_id('nr_posts'); ?>">Nr of posts to show: <input class="widefat" id="<?php echo $this->get_field_id('nr_posts'); ?>" name="<?php echo $this->get_field_name('nr_posts'); ?>" type="title" value="<?php echo esc_attr($nr_posts); ?>" /></label></p>
        <?php
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['nr_posts'] = $new_instance['nr_posts'];
        $instance['title'] = $new_instance['title'];
        return $instance;
    }

    function widget($args, $instance) {
        extract($args, EXTR_SKIP);
        $nr_posts = empty($instance['nr_posts']) ? 3 : $instance['nr_posts'];
        $title = empty($instance['title']) ? '' : $instance['title'];
        echo $before_widget;
        if(!empty($title))
            echo $before_title . $title . $after_title;
        ?>
        
                                
                    <?php 
                    $args = array(
                        //Type & Status Parameters
                        'post_type'   => 'post',
                        'post_status' => 'publish',
                        
                        //Order & Orderby Parameters
                        'order'               => 'DESC',
                        'orderby'             => 'date',
                        'ignore_sticky_posts' => true,
                        
                        //Pagination Parameters
                        'posts_per_page'         => $nr_posts,
                    );
                    
                    $query = new WP_Query( $args );
                    if ($query->have_posts()) :
                        while($query->have_posts()) : $query->the_post();?>
                            <div class="widget-latest-post<?php if(!has_post_thumbnail( )) echo ' no-image' ; else ' with-image'?>">
                                <div class="widget-latest-post-cover">
                                    <a href="<?php the_permalink() ?>">
                                        <?php the_post_thumbnail( 'thumbnail' ); ?>
                                    </a>
                                </div>
                                <h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
                                <p><?php the_time('j.n.Y') ?></p>
                            </div>
                        <?php endwhile;
                    endif; ?>
        <?php
        echo $after_widget;
        wp_reset_postdata();
    }

}

add_action('widgets_init', create_function('', 'return register_widget("RecentPostsWidget");'));
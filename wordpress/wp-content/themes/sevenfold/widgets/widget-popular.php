<?php
/*
  Plugin Name: Posts and Comments
  Plugin URI: http://red-sky.pl/
  Description: Displays Posts and Comments  tabs
  Author: Red-Sky
  Version: 1
  Author URI: http://red-sky.pl/
 */

class PostsCommentsWidget extends WP_Widget {

    function PostsCommentsWidget() {
        $widget_ops = array('classname' => 'PostsCommentsWidget', 'description' => 'Displays Posts and Comments tabs.');
        $this->WP_Widget('PostsCommentsWidget', '['.THEME_PRETTY_NAME.'] Posts and Comments', $widget_ops);
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
        global $tab_id;
        $tab_id++;
        echo $before_widget;
        if(!empty($title))
            echo $before_title . '<i class="icon-220" title="220"></i>' . $title . $after_title;
        ?>
        <div class="tabs-box">
            <ul class="navigation-tab">
                <li class="active"><a href="#New-<?php echo $tab_id ?>" data-toggle="tab"><?php _e('New','sevenfold')?></a></li>
                <li><a href="#Popular-<?php echo $tab_id ?>" data-toggle="tab"><?php _e('Popular','sevenfold')?></a></li>
                <li><a href="#Latest-<?php echo $tab_id ?>" data-toggle="tab"><?php _e('Comments','sevenfold')?></a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="New-<?php echo $tab_id ?>">
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
                    if ($query->have_posts()) :?>
                        <ul>
                            <?php while($query->have_posts()) : $query->the_post();?>
                                <li>
                                    <div class="item">
                                        <a href="#" class="item-image">
                                            <?php the_post_thumbnail( 'thumbnail' ); ?>
                                        </a>
                                        <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                                        <p><?php the_time('d M') ?></p>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <div class="tab-pane fade" id="Popular-<?php echo $tab_id ?>">
                    <?php 
                    $args = array(
                        //Type & Status Parameters
                        'post_type'   => 'post',
                        'post_status' => 'publish',
                        
                        //Order & Orderby Parameters
                        'order'               => 'DESC',
                        'ignore_sticky_posts' => true,
                        
                        //Pagination Parameters
                        'posts_per_page'         => $nr_posts,
                        'meta_key' => 'tt_post_views_count',
                        'orderby' => 'meta_value_num',
                    );
                    
                    $query = new WP_Query( $args );
                    if ($query->have_posts()) :?>
                        <ul>
                            <?php while($query->have_posts()) : $query->the_post();?>
                                <li>
                                    <div class="item">
                                        <a href="#" class="item-image">
                                            <?php the_post_thumbnail( 'thumbnail' ); ?>
                                        </a>
                                        <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                                        <p><?php the_time('d M') ?></p>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <div class="tab-pane fade" id="Latest-<?php echo $tab_id ?>">
                    <ul class="tabs_ul">
                        <?php
                        $recent_comments = get_comments(array(
                            'number' => $nr_posts,
                            'status' => 'approve'
                                ));
                        ?>
                            <?php foreach ($recent_comments as $recent_comment) : ?>
                                <li>
                                    <div class="item">
                                        <a href="#" class="item-image">
                                            <?php echo get_avatar( $recent_comment, 50, false,'avatar image' ); ?>
                                        </a>
                                        <h3><?php echo $recent_comment->comment_author ?></h3> on <a href="<?php echo get_permalink($recent_comment->comment_post_ID) ?>"><?php echo get_post($recent_comment->comment_post_ID)->post_content ?></a>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                </div>
            </div>
        </div>
        <?php
        echo $after_widget;
        wp_reset_postdata();
    }

}

add_action('widgets_init', create_function('', 'return register_widget("PostsCommentsWidget");'));
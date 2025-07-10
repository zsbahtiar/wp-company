<?php

if (!defined('ABSPATH')) {
    exit;
}

class CompanyFeatures_Info_Widget extends WP_Widget {
    
    public function __construct() {
        parent::__construct(
            'company_info_widget',
            __('Company Info', 'company-features'),
            array('description' => __('Display company information', 'company-features'))
        );
    }
    
    public function widget($args, $instance) {
        echo $args['before_widget'];
        
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        ?>
        <div class="company-info-widget">
            <?php if (!empty($instance['description'])) : ?>
                <p><?php echo esc_html($instance['description']); ?></p>
            <?php endif; ?>
            
            <?php if (!empty($instance['phone'])) : ?>
                <div class="info-item">
                    <span class="dashicons dashicons-phone"></span>
                    <a href="tel:<?php echo esc_attr($instance['phone']); ?>"><?php echo esc_html($instance['phone']); ?></a>
                </div>
            <?php endif; ?>
            
            <?php if (!empty($instance['email'])) : ?>
                <div class="info-item">
                    <span class="dashicons dashicons-email"></span>
                    <a href="mailto:<?php echo esc_attr($instance['email']); ?>"><?php echo esc_html($instance['email']); ?></a>
                </div>
            <?php endif; ?>
            
            <?php if (!empty($instance['address'])) : ?>
                <div class="info-item">
                    <span class="dashicons dashicons-location"></span>
                    <address><?php echo esc_html($instance['address']); ?></address>
                </div>
            <?php endif; ?>
        </div>
        <?php
        echo $args['after_widget'];
    }
    
    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $description = !empty($instance['description']) ? $instance['description'] : '';
        $phone = !empty($instance['phone']) ? $instance['phone'] : '';
        $email = !empty($instance['email']) ? $instance['email'] : '';
        $address = !empty($instance['address']) ? $instance['address'] : '';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:', 'company-features'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('description')); ?>"><?php _e('Description:', 'company-features'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('description')); ?>" name="<?php echo esc_attr($this->get_field_name('description')); ?>"><?php echo esc_textarea($description); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php _e('Phone:', 'company-features'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" type="text" value="<?php echo esc_attr($phone); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php _e('Email:', 'company-features'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="email" value="<?php echo esc_attr($email); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php _e('Address:', 'company-features'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>"><?php echo esc_textarea($address); ?></textarea>
        </p>
        <?php
    }
    
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        $instance['description'] = (!empty($new_instance['description'])) ? sanitize_textarea_field($new_instance['description']) : '';
        $instance['phone'] = (!empty($new_instance['phone'])) ? sanitize_text_field($new_instance['phone']) : '';
        $instance['email'] = (!empty($new_instance['email'])) ? sanitize_email($new_instance['email']) : '';
        $instance['address'] = (!empty($new_instance['address'])) ? sanitize_textarea_field($new_instance['address']) : '';
        return $instance;
    }
}

class CompanyFeatures_Services_Widget extends WP_Widget {
    
    public function __construct() {
        parent::__construct(
            'company_services_widget',
            __('Company Services', 'company-features'),
            array('description' => __('Display a list of services', 'company-features'))
        );
    }
    
    public function widget($args, $instance) {
        echo $args['before_widget'];
        
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        
        $query_args = array(
            'post_type' => 'service',
            'posts_per_page' => !empty($instance['number']) ? intval($instance['number']) : 5,
            'orderby' => 'menu_order',
            'order' => 'ASC'
        );
        
        $services = new WP_Query($query_args);
        
        if ($services->have_posts()) : ?>
            <ul class="services-widget-list">
                <?php while ($services->have_posts()) : $services->the_post(); ?>
                    <li>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php endif;
        
        wp_reset_postdata();
        
        echo $args['after_widget'];
    }
    
    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('Our Services', 'company-features');
        $number = !empty($instance['number']) ? $instance['number'] : 5;
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:', 'company-features'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php _e('Number of services to show:', 'company-features'); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($number); ?>" size="3">
        </p>
        <?php
    }
    
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        $instance['number'] = (!empty($new_instance['number'])) ? intval($new_instance['number']) : 5;
        return $instance;
    }
}

class CompanyFeatures_Team_Widget extends WP_Widget {
    
    public function __construct() {
        parent::__construct(
            'company_team_widget',
            __('Company Team', 'company-features'),
            array('description' => __('Display team members', 'company-features'))
        );
    }
    
    public function widget($args, $instance) {
        echo $args['before_widget'];
        
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        
        $query_args = array(
            'post_type' => 'team',
            'posts_per_page' => !empty($instance['number']) ? intval($instance['number']) : 3,
            'orderby' => 'menu_order',
            'order' => 'ASC'
        );
        
        $team = new WP_Query($query_args);
        
        if ($team->have_posts()) : ?>
            <div class="team-widget-grid">
                <?php while ($team->have_posts()) : $team->the_post();
                    $position = get_post_meta(get_the_ID(), '_team_position', true);
                ?>
                    <div class="team-widget-member">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('thumbnail'); ?>
                        <?php endif; ?>
                        <h4><?php the_title(); ?></h4>
                        <?php if ($position) : ?>
                            <p class="member-position"><?php echo esc_html($position); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif;
        
        wp_reset_postdata();
        
        echo $args['after_widget'];
    }
    
    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('Our Team', 'company-features');
        $number = !empty($instance['number']) ? $instance['number'] : 3;
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:', 'company-features'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php _e('Number of team members to show:', 'company-features'); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($number); ?>" size="3">
        </p>
        <?php
    }
    
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        $instance['number'] = (!empty($new_instance['number'])) ? intval($new_instance['number']) : 3;
        return $instance;
    }
}
<?php

if (!defined('ABSPATH')) {
    exit;
}

function company_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    add_theme_support('custom-logo', array(
        'height'      => 50,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'company-theme'),
        'footer'  => __('Footer Menu', 'company-theme'),
    ));
}
add_action('after_setup_theme', 'company_theme_setup');

function company_theme_scripts() {
    wp_enqueue_style('company-theme-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_style('dashicons');
    wp_enqueue_script('company-theme-script', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'company_theme_scripts');

function company_register_custom_post_types() {
    $team_labels = array(
        'name'               => _x('Team Members', 'post type general name', 'company-theme'),
        'singular_name'      => _x('Team Member', 'post type singular name', 'company-theme'),
        'menu_name'          => _x('Team', 'admin menu', 'company-theme'),
        'add_new'            => _x('Add New', 'team member', 'company-theme'),
        'add_new_item'       => __('Add New Team Member', 'company-theme'),
        'edit_item'          => __('Edit Team Member', 'company-theme'),
        'new_item'           => __('New Team Member', 'company-theme'),
        'view_item'          => __('View Team Member', 'company-theme'),
        'all_items'          => __('All Team Members', 'company-theme'),
        'search_items'       => __('Search Team Members', 'company-theme'),
        'not_found'          => __('No team members found.', 'company-theme'),
        'not_found_in_trash' => __('No team members found in Trash.', 'company-theme')
    );

    $team_args = array(
        'labels'             => $team_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'team'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array('title', 'editor', 'thumbnail')
    );

    register_post_type('team', $team_args);
    
    $service_labels = array(
        'name'               => _x('Services', 'post type general name', 'company-theme'),
        'singular_name'      => _x('Service', 'post type singular name', 'company-theme'),
        'menu_name'          => _x('Services', 'admin menu', 'company-theme'),
        'add_new'            => _x('Add New', 'service', 'company-theme'),
        'add_new_item'       => __('Add New Service', 'company-theme'),
        'edit_item'          => __('Edit Service', 'company-theme'),
        'new_item'           => __('New Service', 'company-theme'),
        'view_item'          => __('View Service', 'company-theme'),
        'all_items'          => __('All Services', 'company-theme'),
        'search_items'       => __('Search Services', 'company-theme'),
        'not_found'          => __('No services found.', 'company-theme'),
        'not_found_in_trash' => __('No services found in Trash.', 'company-theme')
    );

    $service_args = array(
        'labels'             => $service_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'services'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-admin-tools',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt')
    );

    register_post_type('service', $service_args);
    
    $testimonial_labels = array(
        'name'               => _x('Testimonials', 'post type general name', 'company-theme'),
        'singular_name'      => _x('Testimonial', 'post type singular name', 'company-theme'),
        'menu_name'          => _x('Testimonials', 'admin menu', 'company-theme'),
        'add_new'            => _x('Add New', 'testimonial', 'company-theme'),
        'add_new_item'       => __('Add New Testimonial', 'company-theme'),
        'edit_item'          => __('Edit Testimonial', 'company-theme'),
        'new_item'           => __('New Testimonial', 'company-theme'),
        'view_item'          => __('View Testimonial', 'company-theme'),
        'all_items'          => __('All Testimonials', 'company-theme'),
        'search_items'       => __('Search Testimonials', 'company-theme'),
        'not_found'          => __('No testimonials found.', 'company-theme'),
        'not_found_in_trash' => __('No testimonials found in Trash.', 'company-theme')
    );

    $testimonial_args = array(
        'labels'             => $testimonial_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'testimonials'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-format-quote',
        'supports'           => array('title', 'editor', 'thumbnail')
    );

    register_post_type('testimonial', $testimonial_args);
}
add_action('init', 'company_register_custom_post_types');

function company_customize_register($wp_customize) {
    $wp_customize->add_section('company_hero', array(
        'title'    => __('Hero Section', 'company-theme'),
        'priority' => 30,
    ));
    
    $wp_customize->add_setting('hero_title', array(
        'default'           => __('Welcome to Our Company', 'company-theme'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_title', array(
        'label'    => __('Hero Title', 'company-theme'),
        'section'  => 'company_hero',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('hero_subtitle', array(
        'default'           => __('We provide innovative solutions for your business', 'company-theme'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_subtitle', array(
        'label'    => __('Hero Subtitle', 'company-theme'),
        'section'  => 'company_hero',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('hero_cta_text', array(
        'default'           => __('Get Started', 'company-theme'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_cta_text', array(
        'label'    => __('Hero CTA Text', 'company-theme'),
        'section'  => 'company_hero',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('hero_cta_link', array(
        'default'           => '#contact',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('hero_cta_link', array(
        'label'    => __('Hero CTA Link', 'company-theme'),
        'section'  => 'company_hero',
        'type'     => 'url',
    ));
    
    $wp_customize->add_section('company_info', array(
        'title'    => __('Company Information', 'company-theme'),
        'priority' => 35,
    ));
    
    $wp_customize->add_setting('company_phone', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('company_phone', array(
        'label'    => __('Phone Number', 'company-theme'),
        'section'  => 'company_info',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('company_email', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('company_email', array(
        'label'    => __('Email Address', 'company-theme'),
        'section'  => 'company_info',
        'type'     => 'email',
    ));
    
    $wp_customize->add_setting('company_address', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('company_address', array(
        'label'    => __('Company Address', 'company-theme'),
        'section'  => 'company_info',
        'type'     => 'textarea',
    ));
}
add_action('customize_register', 'company_customize_register');

function company_widgets_init() {
    register_sidebar(array(
        'name'          => __('Footer Widget Area 1', 'company-theme'),
        'id'            => 'footer-1',
        'description'   => __('First footer widget area', 'company-theme'),
        'before_widget' => '<div class="footer-section">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget Area 2', 'company-theme'),
        'id'            => 'footer-2',
        'description'   => __('Second footer widget area', 'company-theme'),
        'before_widget' => '<div class="footer-section">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget Area 3', 'company-theme'),
        'id'            => 'footer-3',
        'description'   => __('Third footer widget area', 'company-theme'),
        'before_widget' => '<div class="footer-section">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget Area 4', 'company-theme'),
        'id'            => 'footer-4',
        'description'   => __('Fourth footer widget area', 'company-theme'),
        'before_widget' => '<div class="footer-section">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'company_widgets_init');

function company_add_meta_boxes() {
    add_meta_box(
        'team_member_details',
        __('Team Member Details', 'company-theme'),
        'company_team_member_meta_box',
        'team',
        'normal',
        'high'
    );
    
    add_meta_box(
        'service_details',
        __('Service Details', 'company-theme'),
        'company_service_meta_box',
        'service',
        'normal',
        'high'
    );
    
    add_meta_box(
        'testimonial_details',
        __('Testimonial Details', 'company-theme'),
        'company_testimonial_meta_box',
        'testimonial',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'company_add_meta_boxes');

function company_team_member_meta_box($post) {
    wp_nonce_field(basename(__FILE__), 'team_member_nonce');
    $position = get_post_meta($post->ID, '_team_position', true);
    $linkedin = get_post_meta($post->ID, '_team_linkedin', true);
    $twitter = get_post_meta($post->ID, '_team_twitter', true);
    ?>
    <p>
        <label for="team_position"><?php _e('Position:', 'company-theme'); ?></label>
        <input type="text" id="team_position" name="team_position" value="<?php echo esc_attr($position); ?>" class="widefat" />
    </p>
    <p>
        <label for="team_linkedin"><?php _e('LinkedIn URL:', 'company-theme'); ?></label>
        <input type="url" id="team_linkedin" name="team_linkedin" value="<?php echo esc_url($linkedin); ?>" class="widefat" />
    </p>
    <p>
        <label for="team_twitter"><?php _e('Twitter URL:', 'company-theme'); ?></label>
        <input type="url" id="team_twitter" name="team_twitter" value="<?php echo esc_url($twitter); ?>" class="widefat" />
    </p>
    <?php
}

function company_service_meta_box($post) {
    wp_nonce_field(basename(__FILE__), 'service_nonce');
    $icon = get_post_meta($post->ID, '_service_icon', true);
    ?>
    <p>
        <label for="service_icon"><?php _e('Service Icon (dashicons class):', 'company-theme'); ?></label>
        <input type="text" id="service_icon" name="service_icon" value="<?php echo esc_attr($icon); ?>" class="widefat" />
        <span class="description"><?php _e('e.g., dashicons-admin-tools', 'company-theme'); ?></span>
    </p>
    <?php
}

function company_testimonial_meta_box($post) {
    wp_nonce_field(basename(__FILE__), 'testimonial_nonce');
    $author_position = get_post_meta($post->ID, '_testimonial_position', true);
    $company = get_post_meta($post->ID, '_testimonial_company', true);
    $rating = get_post_meta($post->ID, '_testimonial_rating', true);
    ?>
    <p>
        <label for="testimonial_position"><?php _e('Author Position:', 'company-theme'); ?></label>
        <input type="text" id="testimonial_position" name="testimonial_position" value="<?php echo esc_attr($author_position); ?>" class="widefat" />
    </p>
    <p>
        <label for="testimonial_company"><?php _e('Company:', 'company-theme'); ?></label>
        <input type="text" id="testimonial_company" name="testimonial_company" value="<?php echo esc_attr($company); ?>" class="widefat" />
    </p>
    <p>
        <label for="testimonial_rating"><?php _e('Rating (1-5):', 'company-theme'); ?></label>
        <input type="number" id="testimonial_rating" name="testimonial_rating" value="<?php echo esc_attr($rating); ?>" min="1" max="5" />
    </p>
    <?php
}

function company_save_meta_boxes($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['team_member_nonce']) && wp_verify_nonce($_POST['team_member_nonce'], basename(__FILE__))) {
        update_post_meta($post_id, '_team_position', sanitize_text_field($_POST['team_position'] ?? ''));
        update_post_meta($post_id, '_team_linkedin', esc_url_raw($_POST['team_linkedin'] ?? ''));
        update_post_meta($post_id, '_team_twitter', esc_url_raw($_POST['team_twitter'] ?? ''));
    }
    
    if (isset($_POST['service_nonce']) && wp_verify_nonce($_POST['service_nonce'], basename(__FILE__))) {
        update_post_meta($post_id, '_service_icon', sanitize_text_field($_POST['service_icon'] ?? ''));
    }
    
    if (isset($_POST['testimonial_nonce']) && wp_verify_nonce($_POST['testimonial_nonce'], basename(__FILE__))) {
        update_post_meta($post_id, '_testimonial_position', sanitize_text_field($_POST['testimonial_position'] ?? ''));
        update_post_meta($post_id, '_testimonial_company', sanitize_text_field($_POST['testimonial_company'] ?? ''));
        update_post_meta($post_id, '_testimonial_rating', absint($_POST['testimonial_rating'] ?? 5));
    }
}
add_action('save_post', 'company_save_meta_boxes');
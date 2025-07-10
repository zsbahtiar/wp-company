<?php

if (!defined('ABSPATH')) {
    exit;
}

class CompanyFeatures_Settings {
    
    public function __construct() {
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('admin_init', array($this, 'settings_init'));
    }
    
    public function add_admin_menu() {
        add_options_page(
            __('Company Features Settings', 'company-features'),
            __('Company Features', 'company-features'),
            'manage_options',
            'company-features',
            array($this, 'settings_page')
        );
    }
    
    public function settings_init() {
        register_setting('company_features_settings', 'company_features_options');
        
        add_settings_section(
            'company_features_general_section',
            __('General Settings', 'company-features'),
            array($this, 'general_section_callback'),
            'company_features_settings'
        );
        
        add_settings_field(
            'enable_animations',
            __('Enable Animations', 'company-features'),
            array($this, 'enable_animations_render'),
            'company_features_settings',
            'company_features_general_section'
        );
        
        add_settings_field(
            'services_per_page',
            __('Services Per Page', 'company-features'),
            array($this, 'services_per_page_render'),
            'company_features_settings',
            'company_features_general_section'
        );
        
        add_settings_field(
            'team_members_per_page',
            __('Team Members Per Page', 'company-features'),
            array($this, 'team_members_per_page_render'),
            'company_features_settings',
            'company_features_general_section'
        );
        
        add_settings_field(
            'testimonials_per_page',
            __('Testimonials Per Page', 'company-features'),
            array($this, 'testimonials_per_page_render'),
            'company_features_settings',
            'company_features_general_section'
        );
        
        add_settings_section(
            'company_features_style_section',
            __('Style Settings', 'company-features'),
            array($this, 'style_section_callback'),
            'company_features_settings'
        );
        
        add_settings_field(
            'primary_color',
            __('Primary Color', 'company-features'),
            array($this, 'primary_color_render'),
            'company_features_settings',
            'company_features_style_section'
        );
        
        add_settings_field(
            'enable_dark_mode',
            __('Enable Dark Mode Toggle', 'company-features'),
            array($this, 'enable_dark_mode_render'),
            'company_features_settings',
            'company_features_style_section'
        );
    }
    
    public function general_section_callback() {
        echo '<p>' . __('Configure general plugin settings.', 'company-features') . '</p>';
    }
    
    public function style_section_callback() {
        echo '<p>' . __('Customize the appearance of company features.', 'company-features') . '</p>';
    }
    
    public function enable_animations_render() {
        $options = get_option('company_features_options');
        $value = isset($options['enable_animations']) ? $options['enable_animations'] : 1;
        ?>
        <input type='checkbox' name='company_features_options[enable_animations]' <?php checked($value, 1); ?> value='1'>
        <label><?php _e('Enable smooth animations for elements', 'company-features'); ?></label>
        <?php
    }
    
    public function services_per_page_render() {
        $options = get_option('company_features_options');
        $value = isset($options['services_per_page']) ? $options['services_per_page'] : 6;
        ?>
        <input type='number' name='company_features_options[services_per_page]' value='<?php echo esc_attr($value); ?>' min='1' max='20'>
        <?php
    }
    
    public function team_members_per_page_render() {
        $options = get_option('company_features_options');
        $value = isset($options['team_members_per_page']) ? $options['team_members_per_page'] : 4;
        ?>
        <input type='number' name='company_features_options[team_members_per_page]' value='<?php echo esc_attr($value); ?>' min='1' max='20'>
        <?php
    }
    
    public function testimonials_per_page_render() {
        $options = get_option('company_features_options');
        $value = isset($options['testimonials_per_page']) ? $options['testimonials_per_page'] : 3;
        ?>
        <input type='number' name='company_features_options[testimonials_per_page]' value='<?php echo esc_attr($value); ?>' min='1' max='20'>
        <?php
    }
    
    public function primary_color_render() {
        $options = get_option('company_features_options');
        $value = isset($options['primary_color']) ? $options['primary_color'] : '#2563eb';
        ?>
        <input type='color' name='company_features_options[primary_color]' value='<?php echo esc_attr($value); ?>'>
        <?php
    }
    
    public function enable_dark_mode_render() {
        $options = get_option('company_features_options');
        $value = isset($options['enable_dark_mode']) ? $options['enable_dark_mode'] : 1;
        ?>
        <input type='checkbox' name='company_features_options[enable_dark_mode]' <?php checked($value, 1); ?> value='1'>
        <label><?php _e('Add dark mode toggle button to header', 'company-features'); ?></label>
        <?php
    }
    
    public function settings_page() {
        ?>
        <div class="wrap">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            
            <form action='options.php' method='post'>
                <?php
                settings_fields('company_features_settings');
                do_settings_sections('company_features_settings');
                submit_button();
                ?>
            </form>
            
            <div class="company-features-info">
                <h2><?php _e('Available Shortcodes', 'company-features'); ?></h2>
                <table class="widefat">
                    <thead>
                        <tr>
                            <th><?php _e('Shortcode', 'company-features'); ?></th>
                            <th><?php _e('Description', 'company-features'); ?></th>
                            <th><?php _e('Example', 'company-features'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><code>[company_services]</code></td>
                            <td><?php _e('Display services grid', 'company-features'); ?></td>
                            <td><code>[company_services count="6" columns="3"]</code></td>
                        </tr>
                        <tr>
                            <td><code>[company_team]</code></td>
                            <td><?php _e('Display team members', 'company-features'); ?></td>
                            <td><code>[company_team count="4" columns="4" show_social="yes"]</code></td>
                        </tr>
                        <tr>
                            <td><code>[company_testimonials]</code></td>
                            <td><?php _e('Display testimonials', 'company-features'); ?></td>
                            <td><code>[company_testimonials count="3" show_rating="yes"]</code></td>
                        </tr>
                        <tr>
                            <td><code>[company_contact_form]</code></td>
                            <td><?php _e('Display contact form', 'company-features'); ?></td>
                            <td><code>[company_contact_form title="Get in Touch" button_text="Send"]</code></td>
                        </tr>
                        <tr>
                            <td><code>[company_stats]</code></td>
                            <td><?php _e('Display company statistics', 'company-features'); ?></td>
                            <td><code>[company_stats projects="500+" clients="200+" animate="yes"]</code></td>
                        </tr>
                        <tr>
                            <td><code>[company_cta]</code></td>
                            <td><?php _e('Display call to action', 'company-features'); ?></td>
                            <td><code>[company_cta title="Ready?" button_text="Contact Us"]</code></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
    }
}
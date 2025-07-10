<?php

if (!defined('ABSPATH')) {
    exit;
}

define('COMPANY_FEATURES_VERSION', '1.0.0');
define('COMPANY_FEATURES_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('COMPANY_FEATURES_PLUGIN_URL', plugin_dir_url(__FILE__));

class CompanyFeatures {
    
    private static $instance = null;
    
    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    private function __construct() {
        $this->init_hooks();
    }
    
    private function init_hooks() {
        add_action('init', array($this, 'load_textdomain'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
        add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts'));
        
        $this->load_dependencies();
        
        add_action('widgets_init', array($this, 'register_widgets'));
        
        register_activation_hook(__FILE__, array($this, 'activate'));
        register_deactivation_hook(__FILE__, array($this, 'deactivate'));
    }
    
    public function load_textdomain() {
        load_plugin_textdomain('company-features', false, dirname(plugin_basename(__FILE__)) . '/languages');
    }
    
    public function enqueue_scripts() {
        wp_enqueue_style(
            'company-features-style',
            COMPANY_FEATURES_PLUGIN_URL . 'assets/css/public.css',
            array(),
            COMPANY_FEATURES_VERSION
        );
        
        wp_enqueue_script(
            'company-features-script',
            COMPANY_FEATURES_PLUGIN_URL . 'assets/js/public.js',
            array('jquery'),
            COMPANY_FEATURES_VERSION,
            true
        );
    }
    
    public function admin_enqueue_scripts($hook) {
        wp_enqueue_style(
            'company-features-admin',
            COMPANY_FEATURES_PLUGIN_URL . 'assets/css/admin.css',
            array(),
            COMPANY_FEATURES_VERSION
        );
    }
    
    private function load_dependencies() {
        require_once COMPANY_FEATURES_PLUGIN_DIR . 'includes/class-shortcodes.php';
        require_once COMPANY_FEATURES_PLUGIN_DIR . 'includes/class-widgets.php';
        require_once COMPANY_FEATURES_PLUGIN_DIR . 'includes/class-settings.php';
        
        new CompanyFeatures_Shortcodes();
        new CompanyFeatures_Settings();
    }
    
    public function register_widgets() {
        register_widget('CompanyFeatures_Info_Widget');
        register_widget('CompanyFeatures_Services_Widget');
        register_widget('CompanyFeatures_Team_Widget');
    }
    
    public function activate() {
        flush_rewrite_rules();
        
        $default_options = array(
            'enable_animations' => true,
            'services_per_page' => 6,
            'team_members_per_page' => 4,
            'testimonials_per_page' => 3,
        );
        
        foreach ($default_options as $key => $value) {
            if (false === get_option('company_features_' . $key)) {
                update_option('company_features_' . $key, $value);
            }
        }
    }
    
    public function deactivate() {
        flush_rewrite_rules();
    }
}

CompanyFeatures::get_instance();
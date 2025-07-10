<?php

if (!defined('ABSPATH')) {
    exit;
}

class CompanyFeatures_Shortcodes {
    
    public function __construct() {
        add_shortcode('company_services', array($this, 'render_services'));
        add_shortcode('company_team', array($this, 'render_team'));
        add_shortcode('company_testimonials', array($this, 'render_testimonials'));
        add_shortcode('company_contact_form', array($this, 'render_contact_form'));
        add_shortcode('company_stats', array($this, 'render_stats'));
        add_shortcode('company_cta', array($this, 'render_cta'));
    }
    
    public function render_services($atts) {
        $atts = shortcode_atts(array(
            'count' => 6,
            'columns' => 3,
            'show_description' => 'yes',
            'order' => 'ASC',
            'orderby' => 'menu_order'
        ), $atts);
        
        $args = array(
            'post_type' => 'service',
            'posts_per_page' => intval($atts['count']),
            'orderby' => $atts['orderby'],
            'order' => $atts['order']
        );
        
        $services = new WP_Query($args);
        
        ob_start();
        
        if ($services->have_posts()) : ?>
            <div class="company-services-grid grid md:grid-cols-2 lg:grid-cols-<?php echo esc_attr($atts['columns']); ?>">
                <?php while ($services->have_posts()) : $services->the_post();
                    $icon = get_post_meta(get_the_ID(), '_service_icon', true);
                ?>
                    <div class="card service-card">
                        <div class="service-icon">
                            <span class="dashicons <?php echo esc_attr($icon ?: 'dashicons-admin-tools'); ?>"></span>
                        </div>
                        <h3><?php the_title(); ?></h3>
                        <?php if ($atts['show_description'] === 'yes' && has_excerpt()) : ?>
                            <div class="service-description"><?php the_excerpt(); ?></div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif;
        
        wp_reset_postdata();
        
        return ob_get_clean();
    }
    
    public function render_team($atts) {
        $atts = shortcode_atts(array(
            'count' => 4,
            'columns' => 4,
            'show_social' => 'yes',
            'order' => 'ASC',
            'orderby' => 'menu_order'
        ), $atts);
        
        $args = array(
            'post_type' => 'team',
            'posts_per_page' => intval($atts['count']),
            'orderby' => $atts['orderby'],
            'order' => $atts['order']
        );
        
        $team = new WP_Query($args);
        
        ob_start();
        
        if ($team->have_posts()) : ?>
            <div class="company-team-grid grid md:grid-cols-2 lg:grid-cols-<?php echo esc_attr($atts['columns']); ?>">
                <?php while ($team->have_posts()) : $team->the_post();
                    $position = get_post_meta(get_the_ID(), '_team_position', true);
                    $linkedin = get_post_meta(get_the_ID(), '_team_linkedin', true);
                    $twitter = get_post_meta(get_the_ID(), '_team_twitter', true);
                ?>
                    <div class="team-member">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium'); ?>
                        <?php else : ?>
                            <img src="https://ui-avatars.com/api/?name=<?php echo urlencode(get_the_title()); ?>&size=200" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                        <h3><?php the_title(); ?></h3>
                        <?php if ($position) : ?>
                            <p class="member-position"><?php echo esc_html($position); ?></p>
                        <?php endif; ?>
                        <?php if ($atts['show_social'] === 'yes' && ($linkedin || $twitter)) : ?>
                            <div class="social-links">
                                <?php if ($linkedin) : ?>
                                    <a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener">LinkedIn</a>
                                <?php endif; ?>
                                <?php if ($twitter) : ?>
                                    <a href="<?php echo esc_url($twitter); ?>" target="_blank" rel="noopener">Twitter</a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif;
        
        wp_reset_postdata();
        
        return ob_get_clean();
    }
    
    public function render_testimonials($atts) {
        $atts = shortcode_atts(array(
            'count' => 3,
            'columns' => 3,
            'show_rating' => 'yes',
            'order' => 'DESC',
            'orderby' => 'date'
        ), $atts);
        
        $args = array(
            'post_type' => 'testimonial',
            'posts_per_page' => intval($atts['count']),
            'orderby' => $atts['orderby'],
            'order' => $atts['order']
        );
        
        $testimonials = new WP_Query($args);
        
        ob_start();
        
        if ($testimonials->have_posts()) : ?>
            <div class="company-testimonials-grid grid md:grid-cols-2 lg:grid-cols-<?php echo esc_attr($atts['columns']); ?>">
                <?php while ($testimonials->have_posts()) : $testimonials->the_post();
                    $position = get_post_meta(get_the_ID(), '_testimonial_position', true);
                    $company = get_post_meta(get_the_ID(), '_testimonial_company', true);
                    $rating = get_post_meta(get_the_ID(), '_testimonial_rating', true);
                ?>
                    <div class="card testimonial-card">
                        <?php if ($atts['show_rating'] === 'yes' && $rating) : ?>
                            <div class="testimonial-rating">
                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                    <span class="dashicons dashicons-star-<?php echo $i <= $rating ? 'filled' : 'empty'; ?>"></span>
                                <?php endfor; ?>
                            </div>
                        <?php endif; ?>
                        <div class="testimonial-content">
                            <?php the_content(); ?>
                        </div>
                        <div class="testimonial-author">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('thumbnail'); ?>
                            <?php else : ?>
                                <img src="https://ui-avatars.com/api/?name=<?php echo urlencode(get_the_title()); ?>&size=60" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                            <div class="testimonial-info">
                                <h4><?php the_title(); ?></h4>
                                <?php if ($position || $company) : ?>
                                    <p><?php echo esc_html($position); ?><?php if ($company) echo ' at ' . esc_html($company); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif;
        
        wp_reset_postdata();
        
        return ob_get_clean();
    }
    
    public function render_contact_form($atts) {
        $atts = shortcode_atts(array(
            'title' => '',
            'button_text' => 'Send Message',
            'success_message' => 'Thank you for your message. We will get back to you soon!',
            'email_to' => get_option('admin_email')
        ), $atts);
        
        ob_start();
        ?>
        <div class="company-contact-form">
            <?php if ($atts['title']) : ?>
                <h3><?php echo esc_html($atts['title']); ?></h3>
            <?php endif; ?>
            <form class="contact-form" data-success-message="<?php echo esc_attr($atts['success_message']); ?>">
                <div class="form-group">
                    <input type="text" name="name" placeholder="Your Name" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Your Email" required>
                </div>
                <div class="form-group">
                    <input type="tel" name="phone" placeholder="Your Phone (optional)">
                </div>
                <div class="form-group">
                    <textarea name="message" placeholder="Your Message" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">
                    <?php echo esc_html($atts['button_text']); ?>
                </button>
                <div class="form-message"></div>
            </form>
        </div>
        <?php
        return ob_get_clean();
    }
    
    public function render_stats($atts) {
        $atts = shortcode_atts(array(
            'projects' => '500+',
            'clients' => '200+',
            'team' => '50+',
            'years' => '10+',
            'animate' => 'yes'
        ), $atts);
        
        ob_start();
        ?>
        <div class="company-stats grid grid-cols-2 md:grid-cols-4" <?php if ($atts['animate'] === 'yes') echo 'data-animate="true"'; ?>>
            <div class="stat-item">
                <h3 class="stat-number"><?php echo esc_html($atts['projects']); ?></h3>
                <p class="stat-label">Projects Completed</p>
            </div>
            <div class="stat-item">
                <h3 class="stat-number"><?php echo esc_html($atts['clients']); ?></h3>
                <p class="stat-label">Happy Clients</p>
            </div>
            <div class="stat-item">
                <h3 class="stat-number"><?php echo esc_html($atts['team']); ?></h3>
                <p class="stat-label">Team Members</p>
            </div>
            <div class="stat-item">
                <h3 class="stat-number"><?php echo esc_html($atts['years']); ?></h3>
                <p class="stat-label">Years Experience</p>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
    
    public function render_cta($atts) {
        $atts = shortcode_atts(array(
            'title' => 'Ready to Get Started?',
            'subtitle' => 'Let\'s work together to create something amazing',
            'button_text' => 'Contact Us',
            'button_link' => '#contact',
            'style' => 'primary'
        ), $atts);
        
        ob_start();
        ?>
        <div class="company-cta <?php echo esc_attr('cta-' . $atts['style']); ?>">
            <div class="cta-content">
                <h2><?php echo esc_html($atts['title']); ?></h2>
                <?php if ($atts['subtitle']) : ?>
                    <p><?php echo esc_html($atts['subtitle']); ?></p>
                <?php endif; ?>
                <a href="<?php echo esc_url($atts['button_link']); ?>" class="btn btn-<?php echo $atts['style'] === 'primary' ? 'secondary' : 'primary'; ?>">
                    <?php echo esc_html($atts['button_text']); ?>
                </a>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
}
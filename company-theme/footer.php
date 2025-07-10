<footer class="bg-muted/50 mt-20">
    <div class="container py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php if (is_active_sidebar('footer-1')) : ?>
                <?php dynamic_sidebar('footer-1'); ?>
            <?php else : ?>
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold"><?php bloginfo('name'); ?></h3>
                    <p class="text-sm text-muted-foreground">
                        <?php bloginfo('description'); ?>
                    </p>
                </div>
            <?php endif; ?>
            
            <?php if (is_active_sidebar('footer-2')) : ?>
                <?php dynamic_sidebar('footer-2'); ?>
            <?php else : ?>
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#about" class="text-sm text-muted-foreground hover:text-foreground transition-colors" title="Learn about our company" aria-label="Learn about our company">About Us</a></li>
                        <li><a href="#services" class="text-sm text-muted-foreground hover:text-foreground transition-colors" title="View our services" aria-label="View our services">Services</a></li>
                        <li><a href="#team" class="text-sm text-muted-foreground hover:text-foreground transition-colors" title="Meet our team" aria-label="Meet our team">Our Team</a></li>
                        <li><a href="#contact" class="text-sm text-muted-foreground hover:text-foreground transition-colors" title="Contact us" aria-label="Contact us">Contact</a></li>
                    </ul>
                </div>
            <?php endif; ?>
            
            <?php if (is_active_sidebar('footer-3')) : ?>
                <?php dynamic_sidebar('footer-3'); ?>
            <?php else : ?>
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold">Services</h3>
                    <ul class="space-y-2">
                        <li><a href="#services" class="text-sm text-muted-foreground hover:text-foreground transition-colors" title="Web Development services" aria-label="Web Development services">Web Development</a></li>
                        <li><a href="#services" class="text-sm text-muted-foreground hover:text-foreground transition-colors" title="Mobile App development" aria-label="Mobile App development">Mobile Apps</a></li>
                        <li><a href="#services" class="text-sm text-muted-foreground hover:text-foreground transition-colors" title="Cloud Solutions services" aria-label="Cloud Solutions services">Cloud Solutions</a></li>
                        <li><a href="#services" class="text-sm text-muted-foreground hover:text-foreground transition-colors" title="Technical Consulting services" aria-label="Technical Consulting services">Consulting</a></li>
                    </ul>
                </div>
            <?php endif; ?>
            
            <?php if (is_active_sidebar('footer-4')) : ?>
                <?php dynamic_sidebar('footer-4'); ?>
            <?php else : ?>
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold">Contact Info</h3>
                    <ul class="space-y-2">
                        <?php if ($phone = get_theme_mod('company_phone')) : ?>
                            <li><a href="tel:<?php echo esc_attr($phone); ?>" class="text-sm text-muted-foreground hover:text-foreground transition-colors" title="Call us at <?php echo esc_attr($phone); ?>" aria-label="Call us at <?php echo esc_attr($phone); ?>"><?php echo esc_html($phone); ?></a></li>
                        <?php endif; ?>
                        <?php if ($email = get_theme_mod('company_email')) : ?>
                            <li><a href="mailto:<?php echo esc_attr($email); ?>" class="text-sm text-muted-foreground hover:text-foreground transition-colors" title="Send email to <?php echo esc_attr($email); ?>" aria-label="Send email to <?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></li>
                        <?php endif; ?>
                        <?php if ($address = get_theme_mod('company_address')) : ?>
                            <li><span class="text-sm text-muted-foreground"><?php echo esc_html($address); ?></span></li>
                        <?php endif; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="border-t border-border mt-8 pt-6">
            <div class="text-center">
                <p class="text-sm text-muted-foreground">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
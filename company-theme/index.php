<?php get_header(); ?>

<section class="hero-section relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-primary/20 via-background to-secondary/20"></div>
    <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
    <div class="container relative z-10">
        <div class="text-center max-w-5xl mx-auto space-y-8">
            <div class="inline-flex items-center px-4 py-2 bg-primary/10 rounded-full border border-primary/20 mb-6">
                <span class="text-sm font-medium text-primary">✨ Professional Web Development Services</span>
            </div>
            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold tracking-tighter">
                <span class="hero-gradient">Transform Your Business</span><br>
                <span class="text-foreground">with Modern Technology</span>
            </h1>
            <p class="text-xl md:text-2xl text-muted-foreground max-w-3xl mx-auto leading-relaxed">
                We specialize in creating stunning websites, powerful e-commerce platforms, and scalable applications that drive real business results.
            </p>
            <div class="flex flex-wrap justify-center items-center gap-8 mb-8">
                <div class="flex items-center gap-2">
                    <span class="text-2xl font-bold text-primary">500+</span>
                    <span class="text-sm text-muted-foreground">Projects Delivered</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-2xl font-bold text-primary">98%</span>
                    <span class="text-sm text-muted-foreground">Client Satisfaction</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-2xl font-bold text-primary">24/7</span>
                    <span class="text-sm text-muted-foreground">Support Available</span>
                </div>
            </div>
            <div class="flex flex-col gap-6 justify-center items-center">
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#contact" class="btn btn-primary btn-lg px-8" title="Contact us to start your project" aria-label="Contact us to start your project">
                        <span class="dashicons dashicons-phone mr-2"></span>
                        Start Your Project
                    </a>
                    <a href="#services" class="btn btn-outline btn-lg px-8" title="View our services and portfolio" aria-label="View our services and portfolio">
                        <span class="dashicons dashicons-portfolio mr-2"></span>
                        View Our Work
                    </a>
                </div>
                <div class="text-sm text-muted-foreground text-center">
                    Free consultation • No commitment required
                </div>
            </div>
            <div class="flex items-center justify-center gap-8 pt-8">
                <div class="flex items-center gap-2 text-sm text-muted-foreground">
                    <span class="dashicons dashicons-yes-alt text-green-500"></span>
                    WordPress Expert
                </div>
                <div class="flex items-center gap-2 text-sm text-muted-foreground">
                    <span class="dashicons dashicons-yes-alt text-green-500"></span>
                    Shopify Certified
                </div>
                <div class="flex items-center gap-2 text-sm text-muted-foreground">
                    <span class="dashicons dashicons-yes-alt text-green-500"></span>
                    React Specialist
                </div>
            </div>
        </div>
    </div>
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <a href="#about" class="text-muted-foreground hover:text-primary transition-colors" title="Learn more about us" aria-label="Scroll down to learn more about us">
            <span class="dashicons dashicons-arrow-down-alt2 text-2xl"></span>
        </a>
    </div>
</section>

<section id="about" class="section py-16">
    <div class="container">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold tracking-tight mb-4">About Us</h2>
            <p class="text-lg text-muted-foreground">
                We are a leading technology company dedicated to transforming businesses through innovative solutions
            </p>
        </div>
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <h3 class="text-2xl md:text-3xl font-bold leading-tight">
                    Building Tomorrow's Technology Today
                </h3>
                <p class="text-muted-foreground leading-relaxed">
                    With over a decade of experience in the industry, we have helped hundreds of businesses 
                    achieve their digital transformation goals. Our team of experts combines technical excellence 
                    with creative innovation to deliver solutions that drive real business value.
                </p>
                <div class="grid grid-cols-2 gap-4">
                    <div class="card p-6 text-center hover-lift">
                        <h4 class="text-3xl font-bold text-primary mb-2">500+</h4>
                        <p class="text-sm text-muted-foreground">Projects Completed</p>
                    </div>
                    <div class="card p-6 text-center hover-lift">
                        <h4 class="text-3xl font-bold text-primary mb-2">200+</h4>
                        <p class="text-sm text-muted-foreground">Happy Clients</p>
                    </div>
                </div>
            </div>
            <div>
                <div class="card p-8 bg-gradient-to-br from-primary/10 to-secondary/10">
                    <h4 class="text-xl font-semibold mb-4">Our Mission</h4>
                    <p class="text-muted-foreground leading-relaxed">
                        To empower businesses with cutting-edge technology solutions that drive growth, 
                        efficiency, and innovation in the digital age.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="services" class="section py-16 section-muted">
    <div class="container">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold tracking-tight mb-4">Our Services</h2>
            <p class="text-lg text-muted-foreground">
                Comprehensive solutions tailored to your business needs
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            $services = new WP_Query(array(
                'post_type' => 'service',
                'posts_per_page' => 6,
                'orderby' => 'menu_order',
                'order' => 'ASC'
            ));
            
            if ($services->have_posts()) :
                while ($services->have_posts()) : $services->the_post();
                    $icon = get_post_meta(get_the_ID(), '_service_icon', true);
            ?>
                <div class="card p-6 text-center hover-lift animate-fade-in">
                    <div class="inline-flex items-center justify-center w-12 h-12 bg-primary/10 rounded-lg mb-3">
                        <span class="dashicons <?php echo esc_attr($icon ?: 'dashicons-admin-tools'); ?> text-primary text-xl"></span>
                    </div>
                    <h3 class="text-xl font-semibold mb-3"><?php the_title(); ?></h3>
                    <?php if (has_excerpt()) : ?>
                        <p class="text-muted-foreground"><?php the_excerpt(); ?></p>
                    <?php endif; ?>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <div class="card p-6 text-center hover-lift animate-fade-in">
                    <div class="inline-flex items-center justify-center w-12 h-12 bg-primary/10 rounded-lg mb-3">
                        <svg class="w-6 h-6 text-primary" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 5a2 2 0 012-2h10a2 2 0 012 2v8a2 2 0 01-2 2h-2.22l.123.489.804.804A1 1 0 0113 18H7a1 1 0 01-.707-1.707l.804-.804L7.22 15H5a2 2 0 01-2-2V5zm5.771 7H5V5h10v7H8.771z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Web Development</h3>
                    <p class="text-muted-foreground">Custom websites and web applications using React, Next.js, Laravel, and WordPress. From landing pages to complex e-commerce platforms.</p>
                </div>
                <div class="card p-6 text-center hover-lift animate-fade-in">
                    <div class="inline-flex items-center justify-center w-12 h-12 bg-primary/10 rounded-lg mb-3">
                        <svg class="w-6 h-6 text-primary" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7 2a2 2 0 00-2 2v12a2 2 0 002 2h6a2 2 0 002-2V4a2 2 0 00-2-2H7zM6 4a1 1 0 011-1h6a1 1 0 011 1v10a1 1 0 01-1 1H7a1 1 0 01-1-1V4zm2 1a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Mobile Development</h3>
                    <p class="text-muted-foreground">Native iOS and Android apps, plus cross-platform solutions with React Native and Flutter for optimal performance and user experience.</p>
                </div>
                <div class="card p-6 text-center hover-lift animate-fade-in">
                    <div class="inline-flex items-center justify-center w-12 h-12 bg-primary/10 rounded-lg mb-3">
                        <svg class="w-6 h-6 text-primary" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5.5 16a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 16h-8z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Cloud Solutions</h3>
                    <p class="text-muted-foreground">AWS, Google Cloud, and Azure deployment, CI/CD pipelines, containerization with Docker, and scalable infrastructure management.</p>
                </div>
                <div class="card p-6 text-center hover-lift animate-fade-in">
                    <div class="inline-flex items-center justify-center w-12 h-12 bg-primary/10 rounded-lg mb-3">
                        <svg class="w-6 h-6 text-primary" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 2L3 7v11l7-5 7 5V7l-7-5zM8 12v2H6v-2h2zm4 0v2h-2v-2h2zm-6-4v2H4V8h2zm4 0v2H8V8h2zm4 0v2h-2V8h2z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">E-commerce Solutions</h3>
                    <p class="text-muted-foreground">Complete online stores with Shopify, WooCommerce, custom payment gateways, inventory management, and digital marketing integration.</p>
                </div>
                <div class="card p-6 text-center hover-lift animate-fade-in">
                    <div class="inline-flex items-center justify-center w-12 h-12 bg-primary/10 rounded-lg mb-3">
                        <svg class="w-6 h-6 text-primary" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"/>
                            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Digital Marketing</h3>
                    <p class="text-muted-foreground">SEO optimization, Google Ads management, social media automation, analytics setup, and conversion rate optimization for business growth.</p>
                </div>
                <div class="card p-6 text-center hover-lift animate-fade-in">
                    <div class="inline-flex items-center justify-center w-12 h-12 bg-primary/10 rounded-lg mb-3">
                        <svg class="w-6 h-6 text-primary" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Technical Consulting</h3>
                    <p class="text-muted-foreground">Technology stack selection, architecture planning, code review, performance optimization, and digital transformation strategy consulting.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section id="team" class="section py-16">
    <div class="container">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold tracking-tight mb-4">Our Team</h2>
            <p class="text-lg text-muted-foreground">
                Meet the experts behind our success
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php
            $team = new WP_Query(array(
                'post_type' => 'team',
                'posts_per_page' => 4,
                'orderby' => 'menu_order',
                'order' => 'ASC'
            ));
            
            if ($team->have_posts()) :
                while ($team->have_posts()) : $team->the_post();
                    $position = get_post_meta(get_the_ID(), '_team_position', true);
                    $linkedin = get_post_meta(get_the_ID(), '_team_linkedin', true);
                    $twitter = get_post_meta(get_the_ID(), '_team_twitter', true);
            ?>
                <div class="text-center animate-fade-in">
                    <div class="mb-4">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="w-32 h-32 mx-auto rounded-full overflow-hidden">
                                <?php the_post_thumbnail('thumbnail', array('class' => 'w-full h-full object-cover')); ?>
                            </div>
                        <?php else : ?>
                            <img src="https://ui-avatars.com/api/?name=<?php echo urlencode(get_the_title()); ?>&size=128" 
                                 alt="<?php the_title(); ?>" 
                                 class="w-32 h-32 mx-auto rounded-full">
                        <?php endif; ?>
                    </div>
                    <h3 class="text-lg font-semibold mb-1"><?php the_title(); ?></h3>
                    <p class="text-muted-foreground text-sm"><?php echo esc_html($position); ?></p>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <div class="text-center animate-fade-in">
                    <div class="relative mb-4">
                        <img src="https://ui-avatars.com/api/?name=Zam+Zam+Saeful+Bahtiar&size=128&background=3b82f6&color=ffffff&bold=true" alt="Zam Zam Saeful Bahtiar" class="w-32 h-32 mx-auto rounded-full">
                        <div class="absolute -bottom-1 -right-1 w-8 h-8 bg-green-500 rounded-full border-4 border-background flex items-center justify-center">
                            <span class="dashicons dashicons-yes-alt text-white text-xs"></span>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold mb-1">Zam Zam Saeful Bahtiar</h3>
                    <p class="text-muted-foreground text-sm mb-2">CEO & Full-Stack Developer</p>
                    <p class="text-xs text-muted-foreground">WordPress • Shopify • React • Laravel</p>
                </div>
                <div class="text-center animate-fade-in">
                    <div class="relative mb-4">
                        <img src="https://ui-avatars.com/api/?name=Ahmad+Rizki&size=128&background=10b981&color=ffffff&bold=true" alt="Ahmad Rizki" class="w-32 h-32 mx-auto rounded-full">
                        <div class="absolute -bottom-1 -right-1 w-8 h-8 bg-blue-500 rounded-full border-4 border-background flex items-center justify-center">
                            <span class="dashicons dashicons-admin-tools text-white text-xs"></span>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold mb-1">Ahmad Rizki</h3>
                    <p class="text-muted-foreground text-sm mb-2">Senior Frontend Developer</p>
                    <p class="text-xs text-muted-foreground">React • Next.js • TypeScript • Tailwind CSS</p>
                </div>
                <div class="text-center animate-fade-in">
                    <div class="relative mb-4">
                        <img src="https://ui-avatars.com/api/?name=Sari+Indah&size=128&background=f59e0b&color=ffffff&bold=true" alt="Sari Indah" class="w-32 h-32 mx-auto rounded-full">
                        <div class="absolute -bottom-1 -right-1 w-8 h-8 bg-purple-500 rounded-full border-4 border-background flex items-center justify-center">
                            <span class="dashicons dashicons-art text-white text-xs"></span>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold mb-1">Sari Indah</h3>
                    <p class="text-muted-foreground text-sm mb-2">UI/UX Designer</p>
                    <p class="text-xs text-muted-foreground">Figma • Adobe XD • Principle • User Research</p>
                </div>
                <div class="text-center animate-fade-in">
                    <div class="relative mb-4">
                        <img src="https://ui-avatars.com/api/?name=Budi+Santoso&size=128&background=ef4444&color=ffffff&bold=true" alt="Budi Santoso" class="w-32 h-32 mx-auto rounded-full">
                        <div class="absolute -bottom-1 -right-1 w-8 h-8 bg-orange-500 rounded-full border-4 border-background flex items-center justify-center">
                            <span class="dashicons dashicons-cloud text-white text-xs"></span>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold mb-1">Budi Santoso</h3>
                    <p class="text-muted-foreground text-sm mb-2">DevOps Engineer</p>
                    <p class="text-xs text-muted-foreground">AWS • Docker • Kubernetes • CI/CD</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section id="testimonials" class="section py-16 section-muted">
    <div class="container">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold tracking-tight mb-4">What Our Clients Say</h2>
            <p class="text-lg text-muted-foreground">
                Don't just take our word for it
            </p>
        </div>
        
        <div class="testimonials-marquee overflow-hidden">
            <div class="testimonials-track flex gap-6">
                <?php
                $testimonials = new WP_Query(array(
                    'post_type' => 'testimonial',
                    'posts_per_page' => -1
                ));
                
                $testimonial_items = array();
                
                if ($testimonials->have_posts()) :
                    while ($testimonials->have_posts()) : $testimonials->the_post();
                        $position = get_post_meta(get_the_ID(), '_testimonial_position', true);
                        $company = get_post_meta(get_the_ID(), '_testimonial_company', true);
                        $rating = get_post_meta(get_the_ID(), '_testimonial_rating', true);
                        
                        $avatar = has_post_thumbnail() ? 
                            get_the_post_thumbnail(get_the_ID(), 'thumbnail', array('class' => 'w-10 h-10 rounded-full object-cover')) :
                            '<img src="https://ui-avatars.com/api/?name=' . urlencode(get_the_title()) . '&size=40" alt="' . get_the_title() . '" class="w-10 h-10 rounded-full shrink-0">';
                        
                        $testimonial_items[] = array(
                            'content' => get_the_content(),
                            'name' => get_the_title(),
                            'position' => $position,
                            'company' => $company,
                            'avatar' => $avatar
                        );
                    endwhile;
                    wp_reset_postdata();
                else :
                    $testimonial_items = array(
                        array(
                            'content' => 'Working with this team has been an absolute pleasure. They delivered our project on time and exceeded our expectations.',
                            'name' => 'David Chen',
                            'position' => 'CEO',
                            'company' => 'TechStart',
                            'avatar' => '<img src="https://ui-avatars.com/api/?name=David+Chen&size=40" alt="David Chen" class="w-10 h-10 rounded-full shrink-0">'
                        ),
                        array(
                            'content' => 'Their expertise in cloud solutions helped us scale our business efficiently. Highly recommended!',
                            'name' => 'Maria Garcia',
                            'position' => 'CTO',
                            'company' => 'InnovateCo',
                            'avatar' => '<img src="https://ui-avatars.com/api/?name=Maria+Garcia&size=40" alt="Maria Garcia" class="w-10 h-10 rounded-full shrink-0">'
                        ),
                        array(
                            'content' => 'Professional, reliable, and innovative. They transformed our digital presence completely.',
                            'name' => 'Alex Kumar',
                            'position' => 'Director',
                            'company' => 'GlobalTech',
                            'avatar' => '<img src="https://ui-avatars.com/api/?name=Alex+Kumar&size=40" alt="Alex Kumar" class="w-10 h-10 rounded-full shrink-0">'
                        ),
                        array(
                            'content' => 'Outstanding service and attention to detail. Our e-commerce platform performs flawlessly.',
                            'name' => 'Sarah Johnson',
                            'position' => 'Founder',
                            'company' => 'ShopEasy',
                            'avatar' => '<img src="https://ui-avatars.com/api/?name=Sarah+Johnson&size=40" alt="Sarah Johnson" class="w-10 h-10 rounded-full shrink-0">'
                        ),
                        array(
                            'content' => 'The mobile app they developed has significantly improved our customer engagement.',
                            'name' => 'Michael Wong',
                            'position' => 'Product Manager',
                            'company' => 'FinTech Pro',
                            'avatar' => '<img src="https://ui-avatars.com/api/?name=Michael+Wong&size=40" alt="Michael Wong" class="w-10 h-10 rounded-full shrink-0">'
                        ),
                        array(
                            'content' => 'Exceptional technical consulting that helped us choose the right technology stack.',
                            'name' => 'Lisa Anderson',
                            'position' => 'CTO',
                            'company' => 'StartupCorp',
                            'avatar' => '<img src="https://ui-avatars.com/api/?name=Lisa+Anderson&size=40" alt="Lisa Anderson" class="w-10 h-10 rounded-full shrink-0">'
                        ),
                        array(
                            'content' => 'Fast, reliable, and always available when we need support. True professionals.',
                            'name' => 'Robert Kim',
                            'position' => 'Operations Director',
                            'company' => 'LogiFlow',
                            'avatar' => '<img src="https://ui-avatars.com/api/?name=Robert+Kim&size=40" alt="Robert Kim" class="w-10 h-10 rounded-full shrink-0">'
                        ),
                        array(
                            'content' => 'Their WordPress expertise helped us create a stunning corporate website.',
                            'name' => 'Emma Thompson',
                            'position' => 'Marketing Head',
                            'company' => 'Creative Agency',
                            'avatar' => '<img src="https://ui-avatars.com/api/?name=Emma+Thompson&size=40" alt="Emma Thompson" class="w-10 h-10 rounded-full shrink-0">'
                        )
                    );
                endif;
                
                // Duplicate items for seamless loop
                $all_items = array_merge($testimonial_items, $testimonial_items);
                
                foreach ($all_items as $item) :
                ?>
                    <div class="testimonial-card card p-6">
                        <div class="mb-4">
                            <blockquote class="text-muted-foreground italic">
                                "<?php echo esc_html($item['content']); ?>"
                            </blockquote>
                        </div>
                        <div class="flex items-center gap-3">
                            <?php echo $item['avatar']; ?>
                            <div class="min-w-0">
                                <h4 class="font-semibold text-sm"><?php echo esc_html($item['name']); ?></h4>
                                <p class="text-xs text-muted-foreground">
                                    <?php echo esc_html($item['position']); ?><?php if ($item['company']) echo ' at ' . esc_html($item['company']); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<section id="contact" class="section py-16">
    <div class="container">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold tracking-tight mb-4">Get In Touch</h2>
            <p class="text-lg text-muted-foreground">
                Ready to start your next project? Let's talk!
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 gap-8 max-w-6xl mx-auto">
            <div class="space-y-8">
                <div>
                    <h3 class="text-2xl font-semibold mb-6">Contact Information</h3>
                    <div class="space-y-4">
                        <?php if ($phone = get_theme_mod('company_phone')) : ?>
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center">
                                    <span class="dashicons dashicons-phone text-primary"></span>
                                </div>
                                <div>
                                    <div class="text-sm text-muted-foreground">Phone</div>
                                    <a href="tel:<?php echo esc_attr($phone); ?>" class="text-foreground hover:text-primary transition-colors font-medium" title="Call us at <?php echo esc_attr($phone); ?>" aria-label="Call us at <?php echo esc_attr($phone); ?>">
                                        <?php echo esc_html($phone); ?>
                                    </a>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center">
                                    <span class="dashicons dashicons-phone text-primary"></span>
                                </div>
                                <div>
                                    <div class="text-sm text-muted-foreground">Phone</div>
                                    <a href="tel:+622150001000" class="text-foreground hover:text-primary transition-colors font-medium" title="Call us at +62 21-5000-1000" aria-label="Call us at +62 21-5000-1000">
                                        +62 21-5000-1000
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($email = get_theme_mod('company_email')) : ?>
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center">
                                    <span class="dashicons dashicons-email text-primary"></span>
                                </div>
                                <div>
                                    <div class="text-sm text-muted-foreground">Email</div>
                                    <a href="mailto:<?php echo esc_attr($email); ?>" class="text-foreground hover:text-primary transition-colors font-medium" title="Send us an email at <?php echo esc_attr($email); ?>" aria-label="Send us an email at <?php echo esc_attr($email); ?>">
                                        <?php echo esc_html($email); ?>
                                    </a>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center">
                                    <span class="dashicons dashicons-email text-primary"></span>
                                </div>
                                <div>
                                    <div class="text-sm text-muted-foreground">Email</div>
                                    <a href="mailto:info@digitalstudio.com" class="text-foreground hover:text-primary transition-colors font-medium" title="Send us an email at info@digitalstudio.com" aria-label="Send us an email at info@digitalstudio.com">
                                        info@digitalstudio.com
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($address = get_theme_mod('company_address')) : ?>
                            <div class="flex gap-4">
                                <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center shrink-0">
                                    <span class="dashicons dashicons-location text-primary"></span>
                                </div>
                                <div>
                                    <div class="text-sm text-muted-foreground">Address</div>
                                    <address class="text-foreground not-italic font-medium">
                                        <?php echo nl2br(esc_html($address)); ?>
                                    </address>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="flex gap-4">
                                <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center shrink-0">
                                    <span class="dashicons dashicons-location text-primary"></span>
                                </div>
                                <div>
                                    <div class="text-sm text-muted-foreground">Address</div>
                                    <address class="text-foreground not-italic font-medium">
                                        Jl. Merdeka Raya No. 88<br>
                                        Bandung, 40111<br>
                                        West Java, Indonesia
                                    </address>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="bg-primary/5 rounded-lg p-6">
                    <h4 class="font-semibold mb-3">Business Hours</h4>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-muted-foreground">Monday - Friday</span>
                            <span class="font-medium">9:00 AM - 6:00 PM</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-muted-foreground">Saturday</span>
                            <span class="font-medium">9:00 AM - 2:00 PM</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-muted-foreground">Sunday</span>
                            <span class="font-medium">Closed</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div>
                <div class="card p-8">
                    <h3 class="text-xl font-semibold mb-6">Send us a message</h3>
                    <form class="space-y-6">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-2">First Name</label>
                                <input type="text" placeholder="John" class="input w-full">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-2">Last Name</label>
                                <input type="text" placeholder="Doe" class="input w-full">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-foreground mb-2">Email Address</label>
                            <input type="email" placeholder="john.doe@example.com" class="input w-full">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-foreground mb-2">Phone Number</label>
                            <input type="tel" placeholder="+62 21-5000-1000" class="input w-full">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-foreground mb-2">Project Type</label>
                            <select class="input w-full">
                                <option>Select project type</option>
                                <option>Website Development</option>
                                <option>E-commerce Store</option>
                                <option>Mobile Application</option>
                                <option>Digital Marketing</option>
                                <option>Technical Consulting</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-foreground mb-2">Message</label>
                            <textarea placeholder="Tell us about your project..." rows="4" class="textarea w-full"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-full">
                            <span class="dashicons dashicons-email-alt mr-2"></span>
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <!-- Header -->
        <div class="text-center mb-14">
            <span class="text-orange-500 font-semibold uppercase tracking-wide">
                <?php echo get_field('contact_us_label') ?: ''; ?>
            </span>

            <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mt-4 mb-4">
                <?php echo get_field('contact_us_title') ?: ''; ?>
            </h2>

            <p class="text-gray-600 max-w-2xl mx-auto">
                <?php echo get_field('contact_us_content') ?: ''; ?>
            </p>
        </div>

        <!-- Content -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Info -->
            <div class="bg-white p-8 rounded-2xl shadow-lg space-y-6">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">
                    Contact Information
                </h3>

                <?php if (get_theme_mod('location')) : ?>
                    <div class="flex items-start gap-4">
                        <i class="fas fa-map-marker-alt text-orange-500 text-xl"></i>
                        <p class="text-gray-600">
                            <?php echo esc_html(get_theme_mod('location')); ?>
                        </p>
                    </div>
                <?php endif; ?>

                <?php if (get_theme_mod('topbar_phone')) : ?>
                    <div class="flex items-start gap-4">
                        <i class="fas fa-phone-alt text-orange-500 text-xl"></i>
                        <a href="tel:<?php echo esc_attr(str_replace(' ', '', get_theme_mod('topbar_phone'))); ?>" class="text-gray-600 hover:text-orange-500">
                            <?php echo esc_html(get_theme_mod('topbar_phone')); ?>
                        </a>
                    </div>
                <?php endif; ?>

                <?php if (get_theme_mod('topbar_email')) : ?>
                    <div class="flex items-start gap-4">
                        <i class="fas fa-envelope text-orange-500 text-xl"></i>
                        <a href="mailto:<?php echo esc_attr(get_theme_mod('topbar_email')); ?>" class="text-gray-600 hover:text-orange-500">
                            <?php echo esc_html(get_theme_mod('topbar_email')); ?>
                        </a>
                    </div>
                <?php endif; ?>

                <?php if (get_theme_mod('topbar_reg_no')) : ?>
                    <div class="flex items-start gap-4">
                        <i class="fas fa-id-card text-orange-500 text-xl"></i>
                        <p class="text-gray-600">
                            <?php echo esc_html(get_theme_mod('topbar_reg_no')); ?>
                        </p>
                    </div>
                <?php endif; ?>

                <!-- Map -->
                <?php
                $map_link = get_theme_mod('map_location');

                if (!empty($map_link)) : ?>
                    <div class="mt-6 rounded-xl overflow-hidden shadow-lg border border-gray-100">
                        <iframe
                            src="<?php echo esc_url($map_link); ?>"
                            class="w-full h-64 border-0"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Contact Form -->
            <div class="bg-white p-8 rounded-2xl shadow-lg">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Send Us a Message</h3>

                <?php
                echo do_shortcode('[contact-form-7 id="c89e165" title="Contact Form"]');
                ?>
            </div>
        </div>
    </div>
</section>
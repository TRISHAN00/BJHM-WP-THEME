<?php
$title    = get_field('title');
$subtitle = get_field('subtitle');
$image    = get_field('about_left_image');
?>

<section class="py-[60px] lg:py-[140px] bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">

            <!-- Image -->
            <div class=" h-full">
                <?php if ($image) : ?>
                    <img
                        src="<?php echo esc_url($image['url']); ?>"
                        alt="<?php echo esc_attr($image['alt']); ?>"
                        class="rounded-2xl shadow-2xl w-full h-full" />
                <?php endif; ?>
            </div>

            <!-- Content -->
            <div>
                <?php if ($subtitle) : ?>
                    <span class="text-orange-500 font-semibold text-sm uppercase tracking-wide">
                        <?php echo esc_html($subtitle); ?>
                    </span>
                <?php endif; ?>

                <?php if ($title) : ?>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mt-4 mb-6">
                        <?php echo wp_kses_post($title); ?>
                    </h2>
                <?php endif; ?>


                <!-- Description (HTML allowed) -->
                <div class="text-gray-600 mb-6 leading-relaxed prose max-w-none">
                    <?php the_field('description'); ?>
                </div>

                <div class="space-y-4 mb-8">

                    <!-- Mission -->
                    <?php if (get_field('mission')) : ?>
                        <div class="flex items-start">
                            <div class="bg-orange-100 rounded-full p-3 mr-4">
                                <i class="fas fa-bullseye text-orange-500 text-xl"></i>
                            </div>
                            <div class="prose max-w-none">
                                <h3 class="font-bold text-gray-800 text-lg mb-2">
                                    Our Mission
                                </h3>
                                <?php the_field('mission'); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Vision -->
                    <?php if (get_field('vision')) : ?>
                        <div class="flex items-start">
                            <div class="bg-orange-100 rounded-full p-3 mr-4">
                                <i class="fas fa-shield-alt text-orange-500 text-xl"></i>
                            </div>
                            <div class="prose max-w-none">
                                <h3 class="font-bold text-gray-800 text-lg mb-2">
                                    Our Vision
                                </h3>
                                <?php the_field('vision'); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>

                <a href="<?php echo esc_url(site_url('/about-us')); ?>"
                    class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-orange-500 to-red-600 px-6 py-3 text-white font-semibold hover:opacity-90 transition">
                    About Us
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>

        </div>
    </div>
</section>
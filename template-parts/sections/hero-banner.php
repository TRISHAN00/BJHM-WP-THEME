<?php

/**
 * Hero Banner Section
 */

$banner_query = new WP_Query([
    'post_type'      => 'banner',
    'posts_per_page' => -1,
]);
?>

<?php if ($banner_query->have_posts()) : ?>
    <section class="swiper heroSwiper w-full h-screen overflow-hidden">
        <div class="swiper-wrapper">

            <?php while ($banner_query->have_posts()) : $banner_query->the_post();
                $image = get_the_post_thumbnail_url(get_the_ID(), 'full');
            ?>
                <div class="swiper-slide relative">

                    <?php if ($image) : ?>
                        <img
                            src="<?php echo esc_url($image); ?>"
                            class="absolute inset-0 w-full h-full object-cover"
                            alt="<?php the_title_attribute(); ?>">
                    <?php endif; ?>

                    <div class="absolute inset-0 bg-black/50"></div>

                    <div class="relative z-10 flex items-center h-full container mx-auto px-6">
                        <div class="max-w-3xl">

                            <?php if ($tagline = get_post_meta(get_the_ID(), 'banner_tagline', true)) : ?>
                                <p class="text-orange-500 font-bold uppercase tracking-widest mb-4">
                                    <?php echo esc_html($tagline); ?>
                                </p>
                            <?php endif; ?>

                            <h1 class="text-4xl md:text-7xl font-bold text-white leading-tight mb-6">
                                <?php the_title(); ?>
                            </h1>

                            <?php if (has_excerpt()) : ?>
                                <p class="text-lg md:text-xl text-gray-200 mb-10 leading-relaxed max-w-2xl">
                                    <?php echo wp_trim_words(get_the_excerpt(), 30); ?>
                                </p>
                            <?php endif; ?>

                            <div class="flex flex-col sm:flex-row gap-4">
                                <a href="#demands"
                                    class="px-8 py-4 bg-orange-600 text-white font-bold rounded-lg hover:bg-orange-700 transition-all">
                                    Our 7-Point Demands
                                </a>

                                <a href="#about"
                                    class="px-8 py-4 bg-white/10 backdrop-blur-sm text-white border border-white/20 font-bold rounded-lg hover:bg-white hover:text-black transition-all">
                                    Learn Our History
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endwhile;
            wp_reset_postdata(); ?>

        </div>

        <div class="swiper-button-next !text-white opacity-50 hover:opacity-100 !scale-75"></div>
        <div class="swiper-button-prev !text-white opacity-50 hover:opacity-100 !scale-75"></div>
        <div class="swiper-pagination !bottom-10"></div>
    </section>
<?php endif; ?>
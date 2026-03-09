<?php

/**
 * Hero Slider with Gradient Overlay & Enhanced Styling
 */
$banner_query = new WP_Query(['post_type' => 'banner', 'posts_per_page' => -1]);
?>

<?php if ($banner_query->have_posts()) : ?>
    <section class="swiper heroSwiper w-full h-screen bg-black">
        <div class="swiper-wrapper">
            <?php while ($banner_query->have_posts()) : $banner_query->the_post();
                $image = get_the_post_thumbnail_url(get_the_ID(), 'full');
            ?>
                <div class="swiper-slide relative flex items-center">
                    <?php if ($image) : ?>
                        <img src="<?php echo esc_url($image); ?>" class="absolute inset-0 w-full h-full object-cover">
                    <?php endif; ?>

                    <div class="absolute inset-0 bg-black/50"></div>

                    <div class="relative z-10 container mx-auto px-6 text-center">
                        <h1 class="text-4xl md:text-7xl font-black text-white mb-6 max-w-4xl mx-auto tracking-tight">
                            <?php the_title(); ?>
                        </h1>
                        <p class="text-lg md:text-xl text-gray-200 mb-10 max-w-2xl mx-auto font-light leading-relaxed">
                            <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                        </p>
                        <a href="#demands" class="px-10 py-4 bg-[#ff7722] text-white font-bold rounded-full hover:bg-orange-600 transition-all shadow-[0_10px_20px_rgba(255,119,34,0.3)]">
                            Our Demands
                        </a>
                    </div>
                </div>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </div>

        <div class="swiper-pagination !bottom-12"></div>
    </section>
<?php endif; ?>

<style>
    /* Premium Pagination Style */
    .swiper-pagination-bullet {
        width: 12px;
        height: 12px;
        background: transparent !important;
        border: 2px solid #FFFEEE !important;
        opacity: 0.6;
        transition: all 0.3s ease;
    }

    .swiper-pagination-bullet-active {
        background: #ff7722 !important;
        border-color: #ff7722 !important;
        width: 24px;
        border-radius: 6px;
        opacity: 1;
    }
</style>

<script>
    const swiper = new Swiper('.heroSwiper', {
        loop: true,
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
        autoplay: {
            delay: 6000,
            disableOnInteraction: false
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        }
    });
</script>
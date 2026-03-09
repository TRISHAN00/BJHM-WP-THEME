<?php
$title    = get_field('title');
$subtitle = get_field('subtitle');
$image    = get_field('about_left_image');
?>

<section class="py-[60px] lg:py-[140px] bg-white relative overflow-hidden">

    <div class="absolute top-4 right-4 lg:top-10 lg:right-20 h-12 w-12 lg:h-16 lg:w-16 animate-damaru opacity-70 z-10 pointer-events-none">
        <img src="http://localhost/mohajot/wp-content/uploads/2026/03/s-images.png"
            alt="Shiva Damaru"
            class="w-full h-full object-contain">
    </div>

    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">

            <div class="h-full">
                <?php if ($image) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>"
                        alt="<?php echo esc_attr($image['alt']); ?>"
                        class="rounded-2xl shadow-2xl w-full h-full object-cover" />
                <?php endif; ?>
            </div>

            <div>
                <?php if ($subtitle) : ?>
                    <span class="text-[#ff7722] font-semibold text-sm uppercase tracking-wide">
                        <?php echo esc_html($subtitle); ?>
                    </span>
                <?php endif; ?>

                <?php if ($title) : ?>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mt-4 mb-6">
                        <?php echo wp_kses_post($title); ?>
                    </h2>
                <?php endif; ?>

                <div class="text-gray-600 mb-6 leading-relaxed prose max-w-none">
                    <?php the_field('description'); ?>
                </div>

                <div class="space-y-4 mb-8">
                    <?php if (get_field('mission')) : ?>
                        <div class="flex items-start">
                            <div class="bg-[#ff7722]/10 rounded-full p-3 mr-4">
                                <i class="fas fa-bullseye text-[#ff7722] text-xl"></i>
                            </div>
                            <div class="prose max-w-none">
                                <h3 class="font-bold text-gray-800 text-lg mb-2">Our Mission</h3>
                                <?php the_field('mission'); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (get_field('vision')) : ?>
                        <div class="flex items-start">
                            <div class="bg-[#ff7722]/10 rounded-full p-3 mr-4">
                                <i class="fas fa-shield-alt text-[#ff7722] text-xl"></i>
                            </div>
                            <div class="prose max-w-none">
                                <h3 class="font-bold text-gray-800 text-lg mb-2">Our Vision</h3>
                                <?php the_field('vision'); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <a href="<?php echo esc_url(site_url('/about-us')); ?>"
                    class="inline-flex items-center gap-2 rounded-full bg-[#ff7722] px-6 py-3 text-white font-semibold hover:bg-[#e6671e] transition">
                    About Us
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<style>
    .animate-damaru {
        animation: damaruBeat 2s ease-in-out infinite;
        transform-origin: center;
    }

    @keyframes damaruBeat {

        0%,
        100% {
            transform: scale(1) rotate(0deg);
            filter: drop-shadow(0 0 5px rgba(255, 119, 34, 0.5));
        }

        50% {
            transform: scale(1.1) rotate(5deg);
            filter: drop-shadow(0 0 15px rgba(255, 119, 34, 0.8));
        }
    }

    @media (max-width: 640px) {
        .animate-damaru {
            opacity: 0.4;
        }
    }
</style>
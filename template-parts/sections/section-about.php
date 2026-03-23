<?php
// ACF Fields
$title    = get_field('title');
$subtitle = get_field('subtitle');
$image    = get_field('about_left_image');

// Fetch the dynamic icon from ACF
$damaru_icon = get_field('about_icon');
$icon_url = !empty($damaru_icon) ? esc_url($damaru_icon['url']) : '';
$icon_alt = !empty($damaru_icon) ? esc_attr($damaru_icon['alt']) : 'Shiva Damaru';
?>

<section class="py-[60px] lg:py-[140px] bg-white relative overflow-hidden">

    <?php if ($icon_url) : ?>

        <img src="<?php echo $icon_url; ?>"
            alt="<?php echo $icon_alt; ?>"
            class="w-full h-full object-contain opacity-70 absolute top-1 right-4 lg:top-4 lg:right-20 z-10 block animate-damaru transition-transform hover:scale-110">
    <?php endif; ?>

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
                            <div class="bg-[#ff7722]/10 rounded-full p-3 mr-4 shrink-0">
                                <i class="fas fa-bullseye text-[#ff7722] text-xl"></i>
                            </div>
                            <div class="prose max-w-none">
                                <h3 class="font-bold text-gray-800 text-lg mb-2"><?php the_field('mission_title'); ?></h3>
                                <?php the_field('mission'); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (get_field('vision')) : ?>
                        <div class="flex items-start">
                            <div class="bg-[#ff7722]/10 rounded-full p-3 mr-4 shrink-0">
                                <i class="fas fa-shield-alt text-[#ff7722] text-xl"></i>
                            </div>
                            <div class="prose max-w-none">
                                <h3 class="font-bold text-gray-800 text-lg mb-2"><?php the_field('vision_title'); ?></h3>
                                <?php the_field('vision'); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <a href="<?php echo esc_url(home_url('/about-us/')); ?>" class="group relative inline-flex items-center justify-center px-10 py-4 font-black text-xs uppercase tracking-[0.2em] text-[#ff7722] transition-all duration-500 border-2 border-[#ff7722] rounded-full overflow-hidden hover:text-white">
                    <span class="absolute inset-0 w-0 bg-[#ff7722] transition-all duration-500 ease-out group-hover:w-full"></span>
                    <span class="relative z-10 flex items-center gap-3">
                        বিস্তারিত দেখুন
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 transition-transform duration-500 group-hover:translate-x-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                        </svg>
                    </span>
                </a>
            </div>
        </div>
    </div>
</section>

<style>
    /* Responsive Damaru CSS with Aspect Ratio */
    .animate-damaru {
        width: 80px;
        /* Mobile */
        aspect-ratio: 1 / 1;
        animation: damaruBeat 2s ease-in-out infinite;
        transform-origin: center;
    }

    @media (min-width: 768px) {
        .animate-damaru {
            width: 120px;
        }
    }

    @media (min-width: 1024px) {
        .animate-damaru {
            width: 160px;
        }
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
</style>
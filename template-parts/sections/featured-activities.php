<?php

/**
 * Template Part: Featured Activities
 * Colors: #ff7722 (Saffron), #FFFEEE (Cream)
 */

// 1. DEFINE VARIABLES INSIDE THE FILE
$activities_section_label = get_field('activities_section_label');
$activities_section_title = get_field('activities_section_title');
$activities_section_content = get_field('activities_section_content');

// 2. SETUP THE QUERY
$args = array(
    'post_type'      => 'activities',
    'posts_per_page' => 6,
    'orderby'        => 'date',
    'order'          => 'DESC',
);
$activities_query = new WP_Query($args);
?>

<style>
    @keyframes flower-rotate {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    @keyframes flower-bloom {

        0%,
        100% {
            transform: scale(1);
            opacity: 0.8;
        }

        50% {
            transform: scale(1.15);
            opacity: 1;
        }
    }

    .animate-flower-slow {
        animation: flower-rotate 25s linear infinite;
    }

    .animate-bloom {
        animation: flower-bloom 4s ease-in-out infinite;
    }
</style>

<section class="py-24 bg-[#FFFEEE] relative overflow-hidden">

    <div class="absolute -top-20 -left-20 opacity-[0.03] animate-flower-slow pointer-events-none text-[#ff7722]">
        <i class="fas fa-dharmachakra text-[300px]"></i>
    </div>

    <div class="container mx-auto px-4 relative z-10">

        <div class="text-center mb-16">
            <div class="flex items-center justify-center gap-4 mb-4">
                <div class="h-[1px] w-12 bg-[#ff7722]/30"></div>
                <div class="text-[#ff7722] animate-bloom text-2xl">
                    <i class="fas fa-om"></i>
                </div>
                <div class="h-[1px] w-12 bg-[#ff7722]/30"></div>
            </div>

            <?php if ($activities_section_label) : ?>
                <span class="text-[#ff7722] font-black uppercase tracking-[0.3em] text-xs">
                    <?php echo esc_html($activities_section_label); ?>
                </span>
            <?php endif; ?>

            <?php if ($activities_section_title) : ?>
                <h2 class="text-4xl md:text-5xl font-black text-gray-900 mt-4 mb-6">
                    <?php echo esc_html($activities_section_title); ?>
                </h2>
            <?php endif; ?>
        </div>

        <div class="swiper activitiesSwiper pb-16">
            <div class="swiper-wrapper">
                <?php if ($activities_query && $activities_query->have_posts()) : ?>
                    <?php while ($activities_query->have_posts()) : $activities_query->the_post();
                        $post_label = get_field('activities_post_label');
                        $img = get_the_post_thumbnail_url(get_the_ID(), 'large');
                    ?>
                        <div class="swiper-slide h-auto flex justify-center">
                            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 border border-[#ff7722]/10 group flex flex-col h-full max-w-sm">

                                <div class="relative overflow-hidden h-64">
                                    <img src="<?php echo esc_url($img); ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                                    <div class="absolute inset-0 bg-gradient-to-t from-[#ff7722]/20 to-transparent"></div>
                                </div>

                                <div class="p-8 flex flex-col flex-grow">
                                    <?php if ($post_label) : ?>
                                        <span class="bg-[#ff7722] text-[#FFFEEE] text-[10px] uppercase font-black tracking-widest px-3 py-1 rounded mb-4 w-fit">
                                            <?php echo esc_html($post_label); ?>
                                        </span>
                                    <?php endif; ?>

                                    <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-[#ff7722] transition-colors">
                                        <?php the_title(); ?>
                                    </h3>

                                    <div class="text-gray-600 mb-6 line-clamp-3 flex-grow">
                                        <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                                    </div>

                                    <a href="<?php the_permalink(); ?>" class="text-[#ff7722] font-black uppercase text-sm tracking-widest flex items-center gap-2 group/link">
                                        বিস্তারিত
                                        <i class="fas fa-arrow-right transform group-hover/link:translate-x-2 transition-transform"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                <?php else : ?>
                    <div class="col-span-full text-center py-10 text-gray-400">No activities found.</div>
                <?php endif; ?>
            </div>

            <div class="swiper-pagination !-bottom-2"></div>
        </div>
    </div>
</section>

<style>
    .activitiesSwiper .swiper-pagination-bullet {
        background: #ff7722 !important;
    }

    .activitiesSwiper .swiper-pagination-bullet-active {
        width: 30px;
        border-radius: 5px;
        transition: 0.3s;
    }
</style>
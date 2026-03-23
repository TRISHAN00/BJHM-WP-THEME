<?php

/**
 * Template Part: Featured Activities
 */

$section_label   = get_field('activities_section_label') ?: 'আমাদের কর্মসূচি';
$section_title   = get_field('activities_section_title') ?: 'সাম্প্রতিক কার্যক্রম';

$args = array(
    'post_type'      => 'activities',
    'posts_per_page' => 6,
    'orderby'        => 'date',
    'order'          => 'DESC',
    'post_status'    => 'publish'
);
$activities_query = new WP_Query($args);
?>

<section class="py-24 bg-[#FFFEEE] relative overflow-hidden">

    <div class="absolute -top-20 -left-20 pointer-events-none text-[#ff7722] opacity-[0.08] animate-spin-slow w-[300px] h-[300px] lg:w-[500px] lg:h-[500px]">
        <i class="fas fa-dharmachakra text-[300px] lg:text-[500px]"></i>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-16">
            <div class="flex items-center justify-center gap-4 mb-4">
                <div class="h-[1px] w-12 bg-[#ff7722]/30"></div>
                <div class="text-[#ff7722] text-2xl"><i class="fas fa-om"></i></div>
                <div class="h-[1px] w-12 bg-[#ff7722]/30"></div>
            </div>
            <span class="text-[#ff7722] font-black uppercase tracking-[0.3em] text-xs block">
                <?php echo esc_html($section_label); ?>
            </span>
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 mt-4">
                <?php echo esc_html($section_title); ?>
            </h2>
        </div>

        <div class="swiper activitiesSwiper pb-16">
            <div class="swiper-wrapper">
                <?php if ($activities_query->have_posts()) : ?>
                    <?php while ($activities_query->have_posts()) : $activities_query->the_post(); ?>
                        <div class="swiper-slide h-auto">
                            <a href="<?php the_permalink(); ?>" class="group block bg-white rounded-3xl overflow-hidden shadow-sm border border-orange-100 flex flex-col h-full transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                                <div class="relative h-64 overflow-hidden">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover transition-transform duration-700 group-hover:scale-110']); ?>
                                    <?php endif; ?>
                                    <div class="absolute top-4 left-4 bg-[#ff7722] text-white px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider z-20">
                                        <?php echo get_the_date('j M, Y'); ?>
                                    </div>
                                </div>
                                <div class="p-8 flex flex-col flex-grow">
                                    <h3 class="text-xl font-bold text-gray-800 mb-4 line-clamp-2 group-hover:text-[#ff7722] transition-colors leading-snug">
                                        <?php the_title(); ?>
                                    </h3>
                                    <p class="text-gray-500 text-sm leading-relaxed mb-6 flex-grow">
                                        <?php echo wp_trim_words(get_the_content(), 15, '...'); ?>
                                    </p>
                                    <div class="inline-flex items-center text-[#ff7722] font-extrabold text-xs uppercase tracking-widest group-hover:gap-4 transition-all">
                                        বিস্তারিত দেখুন
                                        <span class="ml-2 w-8 h-[2px] bg-[#ff7722] transition-all duration-300 group-hover:w-12"></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
            <div class="swiper-pagination !-bottom-2"></div>
        </div>
    </div>
</section>

<style>
    /* Responsive Rotating Chakra */
    .animate-spin-slow {
        animation: spin-infinitely 20s linear infinite;
        transform-origin: center;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    @keyframes spin-infinitely {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Swiper('.activitiesSwiper', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 24
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 30
                }
            }
        });
    });
</script>
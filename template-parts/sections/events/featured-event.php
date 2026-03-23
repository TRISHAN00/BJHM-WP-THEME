<?php

/**
 * Template Part: Upcoming Events (Dynamic Slider)
 */

$event_label = get_field('event_section_label') ?: 'সূচি ও পরিকল্পনা';
$event_title = get_field('event_section_title') ?: 'আসন্ন অনুষ্ঠানসমূহ';

$args = array(
    'post_type'      => 'events',
    'posts_per_page' => 6,
    'meta_key'       => 'event_date_time',
    'orderby'        => 'meta_value',
    'order'          => 'ASC',
    'post_status'    => 'publish'
);
$upcoming_events_query = new WP_Query($args);
?>

<section class="py-24 bg-[#FFFEEE] relative overflow-hidden">
    <div class="absolute -top-20 -right-20 pointer-events-none text-[#ff7722] opacity-[0.08] animate-spin-slow w-[300px] h-[300px] lg:w-[500px] lg:h-[500px]">
        <i class="fas fa-dharmachakra text-[300px] lg:text-[500px]"></i>
    </div>

    <div class="container mx-auto px-4 relative z-10 lg:px-12">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
            <div class="text-left">
                <div class="flex items-center gap-4 mb-4">
                    <div class="h-[2px] w-12 bg-[#ff7722]"></div>
                    <span class="text-[#ff7722] font-black uppercase tracking-[0.3em] text-xs">
                        <?php echo esc_html($event_label); ?>
                    </span>
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-gray-900 leading-tight">
                    <?php echo esc_html($event_title); ?>
                </h2>
            </div>

            <div class="flex gap-2">
                <button class="event-prev w-14 h-14 border border-gray-200 bg-white flex items-center justify-center text-gray-400 hover:border-[#ff7722] hover:text-[#ff7722] transition-all duration-300">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="event-next w-14 h-14 border border-gray-200 bg-white flex items-center justify-center text-gray-400 hover:border-[#ff7722] hover:text-[#ff7722] transition-all duration-300">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>

        <div class="swiper upcomingEventSwiper !overflow-visible">
            <div class="swiper-wrapper">
                <?php if ($upcoming_events_query->have_posts()) : ?>
                    <?php while ($upcoming_events_query->have_posts()) : $upcoming_events_query->the_post();
                        // ACF Fields
                        $date_time = get_field('event_date_time');
                        $location  = get_field('event_location');
                        $organizer = get_field('organizer_name') ?: 'হিন্দু মহাজোট';
                    ?>
                        <div class="swiper-slide h-auto">
                            <div class="bg-white border border-gray-100 flex flex-col h-full transition-all duration-500 hover:shadow-2xl group">
                                <div class="relative h-64 overflow-hidden bg-gray-900">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover opacity-90 transition-transform duration-700 group-hover:scale-110']); ?>
                                    <?php endif; ?>

                                    <div class="absolute bottom-0 left-0 bg-[#ff7722] text-white px-6 py-3 text-[11px] font-black uppercase tracking-widest z-20">
                                        <i class="far fa-calendar-alt mr-2"></i> <?php echo esc_html($date_time); ?>
                                    </div>
                                </div>

                                <div class="p-8 flex flex-col flex-grow">
                                    <h3 class="text-xl font-bold text-gray-900 mb-4 group-hover:text-[#ff7722] transition-colors leading-tight min-h-[56px]">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>

                                    <div class="flex items-start gap-3 text-gray-500 text-sm mb-8 italic">
                                        <i class="fas fa-map-marker-alt text-[#ff7722] mt-1"></i>
                                        <span><?php echo esc_html($location); ?></span>
                                    </div>

                                    <div class="mt-auto pt-6 border-t border-gray-50 flex items-center justify-between">
                                        <div class="text-[10px] font-black uppercase tracking-[0.1em] text-gray-400">
                                            আয়োজনে: <span class="text-gray-600"><?php echo esc_html($organizer); ?></span>
                                        </div>
                                        <a href="<?php the_permalink(); ?>" class="text-[#ff7722] group-hover:translate-x-2 transition-transform duration-300">
                                            <i class="fas fa-arrow-right text-xl"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                <?php else : ?>
                    <p class="text-gray-400 p-10">কোনো আসন্ন ইভেন্ট পাওয়া যায়নি।</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Swiper('.upcomingEventSwiper', {
            slidesPerView: 3,
            spaceBetween: 30,
            loop: true,
            navigation: {
                nextEl: '.event-next',
                prevEl: '.event-prev',
            },
            breakpoints: {
                768: {
                    slidesPerView: 2
                },
                1280: {
                    slidesPerView: 2.5
                }
            }
        });
    });
</script>
<?php
// Section heading fields
$activities_section_label = get_field('activities_section_label');
$activities_section_title = get_field('activities_section_title');
$activities_section_content = get_field('activities_section_content');

// Query Activities Custom Post Type
$args = array(
    'post_type'      => 'activities',
    'posts_per_page' => 6, // Adjust number of slides as needed
    'orderby'        => 'date',
    'order'          => 'DESC',
);
$activities_query = new WP_Query($args);
?>

<section class="py-20 bg-gray-50 overflow-hidden">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <?php if ($activities_section_label) : ?>
                <span class="text-orange-600 font-bold uppercase tracking-widest text-sm">
                    <?php echo esc_html($activities_section_label); ?>
                </span>
            <?php endif; ?>

            <?php if ($activities_section_title) : ?>
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-800 mt-4 mb-4">
                    <?php echo esc_html($activities_section_title); ?>
                </h2>
            <?php endif; ?>

            <?php if ($activities_section_content) : ?>
                <p class="text-gray-600 text-base sm:text-lg max-w-2xl mx-auto">
                    <?php echo esc_html($activities_section_content); ?>
                </p>
            <?php endif; ?>
        </div>

        <div class="swiper activitiesSwiper pb-12">
            <div class="swiper-wrapper">
                <?php if ($activities_query->have_posts()) : ?>
                    <?php while ($activities_query->have_posts()) : $activities_query->the_post();
                        // Get ACF field for this specific post
                        $post_label = get_field('activities_post_label');
                        $featured_img = get_the_post_thumbnail_url(get_the_ID(), 'large') ?: 'https://via.placeholder.com/600x400';
                    ?>
                        <div class="swiper-slide h-full flex justify-center">
                            <div class="bg-white rounded-2xl overflow-hidden shadow-lg border-b-4 border-orange-500 flex flex-col max-w-xs md:max-w-sm lg:max-w-md h-full">
                                <img src="<?php echo esc_url($featured_img); ?>"
                                    alt="<?php echo esc_attr(get_the_title()); ?>"
                                    class="w-full h-56 sm:h-64 object-cover" />

                                <div class="p-6 flex flex-col flex-grow">
                                    <?php if ($post_label) : ?>
                                        <div class="bg-orange-100 w-fit text-orange-500 rounded-full px-4 py-1 inline-block text-sm font-semibold mb-4">
                                            <?php echo esc_html($post_label); ?>
                                        </div>
                                    <?php endif; ?>

                                    <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-3">
                                        <?php the_title(); ?>
                                    </h3>

                                    <div class="text-gray-600 text-sm sm:text-base mb-4 flex-grow">
                                        <?php echo wp_trim_words(get_the_content(), 15, '...'); ?>
                                    </div>

                                    <a href="<?php the_permalink(); ?>"
                                        class="text-red-600 font-semibold hover:text-red-700 inline-flex items-center mt-auto transition">
                                        বিস্তারিত <i class="fas fa-arrow-right ml-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                <?php else : ?>
                    <p class="text-center">No activities found.</p>
                <?php endif; ?>
            </div>

            <div class="swiper-pagination !bottom-0"></div>
        </div>
    </div>
</section>
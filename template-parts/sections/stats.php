<?php
// Query all "stats" posts
$stats_query = new WP_Query([
    'post_type'      => 'stats',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
]);
?>

<section class="py-16 bg-green-900 text-white relative overflow-hidden">
    <!-- Decorative circles -->
    <div class="absolute top-0 left-0 w-32 h-32 bg-orange-500/10 rounded-full -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-64 h-64 bg-orange-500/5 rounded-full translate-x-1/3 translate-y-1/3"></div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <?php if ($stats_query->have_posts()) : ?>
                <?php while ($stats_query->have_posts()) : $stats_query->the_post();
                    $number = get_the_content(); // number field
                    $title_bn = get_the_title(); // Bangla title
                    $title_en = get_field('title_in_english'); // English title
                ?>
                    <div class="p-4 transform hover:scale-105 transition-transform">
                        <div class="text-orange-400 text-4xl md:text-5xl font-extrabold mb-2">
                            <span class="counter"><?php echo esc_html($number); ?></span>
                        </div>
                        <div class="text-sm md:text-base font-medium text-gray-300 uppercase tracking-wider">
                            <?php echo esc_html($title_bn); ?>
                        </div>
                        <?php if ($title_en) : ?>
                            <p class="text-xs text-gray-400 mt-1">(<?php echo esc_html($title_en); ?>)</p>
                        <?php endif; ?>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>
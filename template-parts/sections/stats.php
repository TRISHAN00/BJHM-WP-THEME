<?php
// Query all "stats" posts
$stats_query = new WP_Query([
    'post_type'      => 'stats',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
]);
?>

<section class="py-20 bg-green-900 text-[#FFFEEE] relative overflow-hidden">
    <div class="absolute top-0 left-0 w-64 h-64 bg-[#ff7722]/10 rounded-full -translate-x-1/2 -translate-y-1/2 blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#ff7722]/5 rounded-full translate-x-1/3 translate-y-1/3 blur-3xl"></div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 md:gap-12 text-center">
            <?php if ($stats_query->have_posts()) : ?>
                <?php while ($stats_query->have_posts()) : $stats_query->the_post();
                    $number = get_the_content(); // number field
                    $title_bn = get_the_title(); // Bangla title
                    $title_en = get_field('title_in_english'); // English title
                ?>
                    <div class="p-4 group transform hover:-translate-y-2 transition-all duration-300">
                        <div class="text-[#ff7722] text-5xl md:text-6xl font-black mb-3 drop-shadow-sm">
                            <span class="counter"><?php echo esc_html($number); ?></span><span class="text-3xl font-bold">+</span>
                        </div>

                        <div class="text-[#FFFEEE] text-lg md:text-xl font-bold uppercase tracking-wide">
                            <?php echo esc_html($title_bn); ?>
                        </div>

                        <?php if ($title_en) : ?>
                            <p class="text-[#ff7722]/80 text-xs md:text-sm font-semibold mt-2 uppercase tracking-widest">
                                <?php echo esc_html($title_en); ?>
                            </p>
                        <?php endif; ?>

                        <div class="w-10 h-1 bg-[#ff7722] mx-auto mt-4 rounded-full opacity-40 group-hover:w-20 group-hover:opacity-100 transition-all duration-500"></div>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>
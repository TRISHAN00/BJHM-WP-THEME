<?php
// Section heading fields
$organization_label = get_field('organization_label') ?: 'Official Symbols';
$organization_title = get_field('organization_title') ?: 'Our Organizations';

// Query Organizations Custom Post Type
$args = array(
    'post_type'      => 'organizations',
    'posts_per_page' => 3, // Set to 3 to match your grid layout
    'orderby'        => 'menu_order', // Allows you to order them manually in WP
    'order'          => 'ASC',
);
$organizations_query = new WP_Query($args);
?>

<section class="py-10 lg:py-20 bg-white">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="text-center mb-10">
            <span class="text-orange-500 font-bold uppercase tracking-widest text-sm">
                <?php echo esc_html($organization_label); ?>
            </span>
            <h2 class="text-3xl font-extrabold text-green-900 mt-2">
                <?php echo esc_html($organization_title); ?>
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 items-center text-center">
            <?php if ($organizations_query->have_posts()) : ?>
                <?php while ($organizations_query->have_posts()) : $organizations_query->the_post();
                    // Get Featured Image
                    $logo_url = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
                    if (!$logo_url) {
                        $logo_url = '/assets/logo.png'; // Fallback
                    }
                ?>
                    <div class="space-y-4">
                        <div class="flex justify-center">
                            <img
                                src="<?php echo esc_url($logo_url); ?>"
                                alt="<?php echo esc_attr(get_the_title()); ?>"
                                class="w-48 h-48 object-contain hover:scale-105 transition-transform duration-300" />
                        </div>
                        <h3 class="font-bold text-green-900 text-lg uppercase">
                            <?php the_title(); ?>
                        </h3>
                        <div class="text-xs text-gray-500 font-semibold tracking-wide">
                            <?php
                            // This pulls the content (Reg No | Est) from the editor
                            the_content();
                            ?>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
            <?php else : ?>
                <p class="col-span-full text-center text-gray-400">No organizations found.</p>
            <?php endif; ?>
        </div>
    </div>
</section>
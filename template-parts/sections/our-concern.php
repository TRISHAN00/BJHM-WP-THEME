<?php
// Section heading fields
$organization_label = get_field('organization_label') ?: 'Official Symbols';
$organization_title = get_field('organization_title') ?: 'Our Organizations';

// Query Organizations Custom Post Type
$args = array(
    'post_type'      => 'organizations',
    'posts_per_page' => 3,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
);
$organizations_query = new WP_Query($args);
?>

<section class="py-16 lg:py-24 ">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="text-center mb-16">
            <span class="text-[#ff7722] font-bold uppercase tracking-[0.2em] text-sm">
                <?php echo esc_html($organization_label); ?>
            </span>
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 mt-4">
                <?php echo esc_html($organization_title); ?>
            </h2>
            <div class="w-20 h-1 bg-[#ff7722] mx-auto mt-6 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 items-start text-center">
            <?php if ($organizations_query->have_posts()) : ?>
                <?php while ($organizations_query->have_posts()) : $organizations_query->the_post();
                    $logo_url = get_the_post_thumbnail_url(get_the_ID(), 'medium_large') ?: get_template_directory_uri() . '/assets/logo.png';
                ?>
                    <div class="group p-8 rounded-3xl bg-white shadow-sm hover:shadow-xl transition-all duration-500 border border-[#ff7722]/10">
                        <div class="flex justify-center mb-6">
                            <img
                                src="<?php echo esc_url($logo_url); ?>"
                                alt="<?php echo esc_attr(get_the_title()); ?>"
                                class="w-32 h-32 object-contain group-hover:scale-110 transition-transform duration-500" />
                        </div>
                        <h3 class="font-bold text-gray-900 text-xl uppercase mb-3">
                            <?php the_title(); ?>
                        </h3>
                        <div class="text-sm text-gray-600 font-medium leading-relaxed">
                            <?php the_content(); ?>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
            <?php else : ?>
                <p class="col-span-full text-center text-gray-500">কোনো অর্গানাইজেশন খুঁজে পাওয়া যায়নি।</p>
            <?php endif; ?>
        </div>
    </div>
</section>
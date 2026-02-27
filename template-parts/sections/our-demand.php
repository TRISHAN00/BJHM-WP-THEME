<?php
// Section heading fields
$section_title       = get_field('obj_title');
$section_subtitle    = get_field('obj_subtitle');
$section_description = get_field('obj_description');

// Prepare default colors for fallback/alternating
$default_icon_bgs      = ['bg-orange-100', 'bg-green-100'];
$default_icon_colors   = ['text-orange-600', 'text-green-600'];
$default_border_colors = ['border-orange-500', 'border-green-600'];

// Query Objectives CPT
$objectives_query = new WP_Query([
    'post_type'      => 'objectives',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
]);
?>

<section id="demands" class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">

        <!-- Section Header -->
        <div class="text-center mx-auto mb-16">
            <?php if ($section_subtitle) : ?>
                <span class="text-orange-600 font-bold uppercase tracking-widest text-sm">
                    <?php echo esc_html($section_subtitle); ?>
                </span>
            <?php endif; ?>

            <?php if ($section_title) : ?>
                <h2 class="text-3xl md:text-4xl font-extrabold text-green-900 mt-3 mb-6">
                    <?php echo wp_kses_post($section_title); ?>
                </h2>
            <?php endif; ?>

            <?php if ($section_description) : ?>
                <p class="text-gray-600 leading-relaxed">
                    <?php echo wp_kses_post($section_description); ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Objectives Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if ($objectives_query->have_posts()) : ?>
                <?php $i = 0; ?>
                <?php while ($objectives_query->have_posts()) : $objectives_query->the_post();
                    // Title & Content from post
                    $point_title       = get_the_title();
                    $point_description = get_the_content();

                    // Icon and colors from ACF
                    $icon_class   = get_field('icon_class') ?: 'fas fa-star';
                    $icon_bg      = get_field('icon_bg') ?: $default_icon_bgs[$i % count($default_icon_bgs)];
                    $icon_color   = get_field('icon_color') ?: $default_icon_colors[$i % count($default_icon_colors)];
                    $border_color = get_field('border_color') ?: $default_border_colors[$i % count($default_border_colors)];
                ?>
                    <div class="bg-white p-8 rounded-2xl shadow-sm border-t-4 <?php echo esc_attr($border_color); ?> <?php if ($i == 6) echo 'lg:col-start-2'; ?>">
                        <div class="w-12 h-12 <?php echo esc_attr($icon_bg); ?> rounded-lg flex items-center justify-center mb-6">
                            <i class="<?php echo esc_attr($icon_class . ' ' . $icon_color . ' text-xl'); ?>"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-4">
                            <?php echo esc_html($point_title); ?>
                        </h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            <?php echo esc_html($point_description); ?>
                        </p>
                    </div>
                <?php $i++;
                endwhile;
                wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>

    </div>
</section>
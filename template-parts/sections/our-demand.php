<?php
// Section heading fields
$section_title       = get_field('obj_title');
$section_subtitle    = get_field('obj_subtitle');
$section_description = get_field('obj_description');
$obj_icon            = get_field('obj_icon');

// Determine the URL
$icon_url = is_array($obj_icon) ? $obj_icon['url'] : $obj_icon;

// Default color system
$default_icon_bgs    = ['bg-[#ff7722]/10', 'bg-green-100'];
$default_icon_colors = ['text-[#ff7722]', 'text-green-700'];
$default_border_colors = ['border-[#ff7722]', 'border-green-700'];

// Query Objectives CPT
$objectives_query = new WP_Query([
    'post_type'      => 'objectives',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
]);
?>

<section id="demands" class="py-20 bg-gray-50 relative overflow-hidden">

    <?php if ($icon_url) : ?>
        <div class="absolute top-10 left-4 lg:left-20 animate-sudarshana z-10 pointer-events-none opacity-60">
            <img src="<?php echo esc_url($icon_url); ?>"
                alt="Sudarshana Chakra"
                class="w-full h-full object-contain">
        </div>
    <?php endif; ?>

    <div class="container mx-auto px-4">
        <div class="text-center mx-auto mb-16">
            <?php if ($section_subtitle) : ?>
                <span class="text-[#ff7722] font-bold uppercase tracking-widest text-sm">
                    <?php echo esc_html($section_subtitle); ?>
                </span>
            <?php endif; ?>

            <?php if ($section_title) : ?>
                <h2 class="text-3xl md:text-4xl font-extrabold text-green-900 mt-3 mb-6">
                    <?php echo wp_kses_post($section_title); ?>
                </h2>
            <?php endif; ?>

            <?php if ($section_description) : ?>
                <p class="text-gray-600 leading-relaxed max-w-3xl mx-auto">
                    <?php echo wp_kses_post($section_description); ?>
                </p>
            <?php endif; ?>

            <div class="flex justify-center mt-8 gap-1">
                <span class="w-12 h-1.5 bg-[#ff7722] rounded-full"></span>
                <span class="w-2 h-1.5 bg-[#ff7722]/30 rounded-full"></span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if ($objectives_query->have_posts()) : $i = 0; ?>
                <?php while ($objectives_query->have_posts()) : $objectives_query->the_post();
                    $icon_class   = get_field('icon_class') ?: 'fas fa-star';
                    $icon_bg      = get_field('icon_bg') ?: $default_icon_bgs[$i % count($default_icon_bgs)];
                    $icon_color   = get_field('icon_color') ?: $default_icon_colors[$i % count($default_icon_colors)];
                    $border_color = get_field('border_color') ?: $default_border_colors[$i % count($default_border_colors)];
                ?>
                    <div class="bg-white p-8 rounded-2xl shadow-sm border-t-4 <?php echo esc_attr($border_color); ?> hover:shadow-lg transition duration-300">
                        <div class="w-12 h-12 <?php echo esc_attr($icon_bg); ?> rounded-lg flex items-center justify-center mb-6">
                            <i class="<?php echo esc_attr($icon_class . ' ' . $icon_color . ' text-xl'); ?>"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-4"><?php the_title(); ?></h3>
                        <div class="text-gray-600 text-sm leading-relaxed"><?php the_content(); ?></div>
                    </div>
                <?php $i++;
                endwhile;
                wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<style>
    /* Sudarshana Chakra Responsive & Aspect Ratio */
    .animate-sudarshana {
        width: 60px;
        /* মোবাইল সাইজ */
        aspect-ratio: 1 / 1;
        animation: infinite-rotate 10s linear infinite;
    }

    @media (min-width: 768px) {
        .animate-sudarshana {
            width: 90px;
        }
    }

    @media (min-width: 1024px) {
        .animate-sudarshana {
            width: 120px;
        }
    }

    @keyframes infinite-rotate {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }
</style>
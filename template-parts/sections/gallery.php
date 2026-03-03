<?php
// Section heading fields (using the ACF fields you defined)
$gallery_label   = get_field('gallery_label') ?: 'Our Photo Gallery';
$gallery_title   = get_field('gallery_title') ?: 'Moments of Protest & Struggle';
$gallery_content = get_field('gallery_content') ?: 'Defining moments from our fight for rights and nationwide organizational movements.';

// Query Gallery Custom Post Type
$args = array(
    'post_type'      => 'gallery',
    'posts_per_page' => 12, // Increased to 12 to fill the grid better
    'orderby'        => 'date',
    'order'          => 'DESC',
);
$activities_query = new WP_Query($args);
?>

<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <span class="text-orange-500 font-semibold text-sm uppercase tracking-wide">
                <?php echo esc_html($gallery_label); ?>
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mt-4 mb-4">
                <?php echo esc_html($gallery_title); ?>
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                <?php echo esc_html($gallery_content); ?>
            </p>
        </div>

        <div id="photoGallery" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <?php if ($activities_query->have_posts()) : ?>
                <?php while ($activities_query->have_posts()) : $activities_query->the_post();
                    // Get the Featured Image URL
                    $image_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                    // Fallback image if no featured image is set
                    if (!$image_url) {
                        $image_url = '/assets/banner-01.jpg';
                    }
                ?>
                    <a href="<?php echo esc_url($image_url); ?>"
                        class="overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition duration-300 cursor-pointer group relative">

                        <img src="<?php echo esc_url($image_url); ?>"
                            class="w-full h-64 object-cover group-hover:scale-110 transition duration-300"
                            alt="<?php echo esc_attr(get_the_title()); ?>" />

                        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center text-white font-semibold p-4 text-center">
                            <?php the_title(); ?>
                        </div>
                    </a>
                <?php endwhile;
                wp_reset_postdata(); ?>
            <?php else : ?>
                <p class="col-span-full text-center text-gray-500">No photos found.</p>
            <?php endif; ?>
        </div>

        <div class="text-center mt-12">
            <a href="<?php echo site_url('/gallery'); ?>"
                class="bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 text-white px-8 py-4 rounded-full font-semibold transition inline-flex items-center shadow-lg">
                সম্পূর্ণ গ্যালারি দেখুন <i class="fas fa-images ml-2"></i>
            </a>
        </div>
    </div>
</section>
<?php
// ACF ফিল্ড থেকে ডেটা আনা হচ্ছে
$gallery_label   = get_field('gallery_label') ?: 'আমাদের গ্যালারি';
$gallery_title   = get_field('gallery_title') ?: 'প্রতিবাদ ও সংগ্রামের মুহূর্ত';
$gallery_content = get_field('gallery_content') ?: 'আমাদের অধিকার আদায়ের লড়াই ও দেশব্যাপী সাংগঠনিক আন্দোলনের কিছু গুরুত্বপূর্ণ মুহূর্ত।';

// Gallery Custom Post Type Query
$args = array(
    'post_type'      => 'gallery',
    'posts_per_page' => 12,
    'orderby'        => 'date',
    'order'          => 'DESC',
);
$activities_query = new WP_Query($args);
?>

<section class="py-20 bg-[#fdfbf7]">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <span class="text-[#ff7722] font-bold text-sm uppercase tracking-widest">
                <?php echo esc_html($gallery_label); ?>
            </span>
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 mt-4 mb-4">
                <?php echo esc_html($gallery_title); ?>
            </h2>
            <p class="text-gray-700 text-lg max-w-2xl mx-auto">
                <?php echo esc_html($gallery_content); ?>
            </p>
        </div>

        <div id="photoGallery" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php if ($activities_query->have_posts()) : ?>
                <?php while ($activities_query->have_posts()) : $activities_query->the_post();
                    $image_url = get_the_post_thumbnail_url(get_the_ID(), 'large') ?: get_template_directory_uri() . '/assets/banner-01.jpg';
                ?>
                    <a href="<?php echo esc_url($image_url); ?>"
                        class="overflow-hidden rounded-2xl shadow-md hover:shadow-xl transition-all duration-500 cursor-pointer group relative block">

                        <img src="<?php echo esc_url($image_url); ?>"
                            class="w-full h-72 object-cover group-hover:scale-110 transition duration-500"
                            alt="<?php echo esc_attr(get_the_title()); ?>" />

                        <div class="absolute inset-0 bg-[#ff7722]/85 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center text-white font-bold p-4 text-center">
                            <?php the_title(); ?>
                        </div>
                    </a>
                <?php endwhile;
                wp_reset_postdata(); ?>
            <?php else : ?>
                <p class="col-span-full text-center text-gray-500">কোনো ছবি পাওয়া যায়নি।</p>
            <?php endif; ?>
        </div>

        <div class="text-center mt-16">
            <a href="<?php echo site_url('/gallery'); ?>"
                class="bg-[#ff7722] hover:bg-[#e0671d] text-white px-10 py-4 rounded-full font-bold transition-all duration-300 inline-flex items-center shadow-lg hover:shadow-xl hover:scale-105">
                সম্পূর্ণ গ্যালারি দেখুন <i class="fas fa-images ml-2"></i>
            </a>
        </div>
    </div>
</section>
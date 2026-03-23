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


        <div class="text-center max-w-2xl mx-auto mb-20">
            <span class="inline-block px-4 py-1 rounded-full bg-[#ff7722]/10 text-[#ff7722] font-bold uppercase tracking-widest text-[10px] mb-4">
                <?php echo esc_html($gallery_label); ?>
            </span>
            <h2 class="text-4xl md:text-5xl font-black text-slate-900 leading-tight">
                <?php echo esc_html($gallery_title); ?>
            </h2>
            <p class="text-slate-500 mt-6 text-sm md:text-base font-medium leading-relaxed">
                <?php echo esc_html($gallery_content); ?>
            </p>
            <div class="flex justify-center mt-8 gap-1">
                <span class="w-12 h-1.5 bg-[#ff7722] rounded-full"></span>
                <span class="w-2 h-1.5 bg-[#ff7722]/30 rounded-full"></span>
            </div>
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


            <a href="<?php echo esc_url(home_url('/gallery')); ?>"
                class="btn-common-main group relative inline-flex items-center justify-center px-10 py-4 font-black text-xs uppercase tracking-[0.2em] text-[#ff7722] transition-all duration-500 border-2 border-[#ff7722] rounded-full overflow-hidden hover:text-white">

                <span class="absolute inset-0 w-0 bg-[#ff7722] transition-all duration-500 ease-out group-hover:w-full"></span>

                <span class="relative z-10 flex items-center gap-3">
                    সম্পূর্ণ গ্যালারি দেখুন
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"
                        class="w-4 h-4 transition-transform duration-500 group-hover:translate-x-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                    </svg>
                </span>
            </a>

        </div>
    </div>
</section>
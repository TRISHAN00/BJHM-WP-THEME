<?php
// Section heading fields
$organization_label = get_field('organization_label') ?: 'আমাদের নেটওয়ার্ক';
$organization_title = get_field('organization_title') ?: 'সহযোগী সংগঠনসমূহ';
$organization_desc  = get_field('organization_description') ?: 'ঐক্যবদ্ধ প্রচেষ্টায় সমাজের অধিকার রক্ষা ও কল্যাণে নিয়োজিত আমাদের অঙ্গ সংগঠনসমূহ।';

// Query Organizations Custom Post Type
$args = array(
    'post_type'      => 'organizations',
    'posts_per_page' => 4, // এক লাইনে ৪টি রাখলে ডিজাইন বেশি ক্লিন দেখায়
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
);
$organizations_query = new WP_Query($args);
?>

<section class="py-24 bg-[#f8fafc] relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-[#ff7722]/5 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-500/5 rounded-full translate-y-1/2 -translate-x-1/2 blur-3xl"></div>

    <div class="container mx-auto px-6 relative z-10">

        <div class="text-center max-w-2xl mx-auto mb-20">
            <span class="inline-block px-4 py-1 rounded-full bg-[#ff7722]/10 text-[#ff7722] font-bold uppercase tracking-widest text-[10px] mb-4">
                <?php echo esc_html($organization_label); ?>
            </span>
            <h2 class="text-4xl md:text-5xl font-black text-slate-900 leading-tight">
                <?php echo esc_html($organization_title); ?>
            </h2>
            <p class="text-slate-500 mt-6 text-sm md:text-base font-medium leading-relaxed">
                <?php echo esc_html($organization_desc); ?>
            </p>
            <div class="flex justify-center mt-8 gap-1">
                <span class="w-12 h-1.5 bg-[#ff7722] rounded-full"></span>
                <span class="w-2 h-1.5 bg-[#ff7722]/30 rounded-full"></span>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if ($organizations_query->have_posts()) : ?>
                <?php while ($organizations_query->have_posts()) : $organizations_query->the_post();
                    $logo_url = get_the_post_thumbnail_url(get_the_ID(), 'medium_large') ?: 'https://via.placeholder.com/300x300?text=No+Logo';
                ?>

                    <div class="group bg-white rounded-[2rem] p-10 shadow-[0_20px_50px_rgba(0,0,0,0.02)] border border-slate-100 flex flex-col items-center justify-center text-center transition-all duration-500 hover:shadow-[0_30px_60px_-15px_rgba(0,0,0,0.1)] hover:-translate-y-3 relative overflow-hidden">

                        <div class="absolute inset-0 bg-gradient-to-b from-[#ff7722]/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                        <div class="relative mb-8 w-28 h-28 flex items-center justify-center bg-slate-50 rounded-2xl group-hover:bg-white transition-colors duration-500">
                            <img
                                src="<?php echo esc_url($logo_url); ?>"
                                alt="<?php echo esc_attr(get_the_title()); ?>"
                                class="w-20 h-20 object-contain group-hover:scale-110 transition-transform duration-700 ease-out z-10" />
                        </div>

                        <h3 class="font-black text-slate-800 text-lg uppercase tracking-tight mb-4 group-hover:text-[#ff7722] transition-colors">
                            <?php the_title(); ?>
                        </h3>

                        <div class="text-[13px] text-slate-500 leading-relaxed line-clamp-3 group-hover:text-slate-600">
                            <?php the_excerpt(); // Content এর বদলে Excerpt ব্যবহার করলে সাইজ সমান থাকে 
                            ?>
                        </div>

                        <div class="mt-8 w-0 h-1 bg-[#ff7722] rounded-full transition-all duration-500 group-hover:w-16"></div>
                    </div>

                <?php endwhile;
                wp_reset_postdata(); ?>
            <?php else : ?>
                <div class="col-span-full py-20 text-center">
                    <p class="text-slate-400 font-medium italic">কোনো সংগঠন তথ্য পাওয়া যায়নি।</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
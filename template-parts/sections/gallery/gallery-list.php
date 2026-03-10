<section class="py-20">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12 max-w-2xl mx-auto">
            <h2 id="gallery_title" class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-3">
                <?php echo esc_html(get_theme_mod('gallery_title', 'ছবি গ্যালারি')); ?>
            </h2>
            <p id="gallery_description" class="text-gray-600">
                <?php echo esc_html(get_theme_mod('gallery_description', 'আমাদের বিভিন্ন কর্মসূচি, সভা ও আন্দোলনের স্মরণীয় মুহূর্ত')); ?>
            </p>
        </div>

        <div id="photoGallery" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            <?php
            $args = array(
                'post_type'      => 'gallery',
                'posts_per_page' => -1, // সব ইমেজ দেখানোর জন্য
                'post_status'    => 'publish'
            );

            $gallery_query = new WP_Query($args);

            if ($gallery_query->have_posts()) :
                while ($gallery_query->have_posts()) : $gallery_query->the_post();

                    // ইমেজ ইউআরএল গেট করা
                    $full_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    $gallery_category = get_field('gallery_category'); // ACF ফিল্ড (আন্দোলন/সভা ইত্যাদি)
                    $category_color = (get_field('category_type') == 'সভা') ? 'bg-blue-500' : 'bg-orange-500';
            ?>

                    <a href="<?php echo esc_url($full_image_url); ?>"
                        data-sub-html="<h4><?php the_title(); ?></h4>"
                        class="relative group rounded-xl overflow-hidden shadow hover:shadow-lg transition block">

                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php echo esc_url($full_image_url); ?>"
                                class="w-full h-56 object-cover transition-transform duration-300 group-hover:scale-105"
                                alt="<?php the_title_attribute(); ?>" />
                        <?php endif; ?>

                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition"></div>

                        <div class="absolute bottom-0 w-full p-4 bg-gradient-to-t from-black/70 to-transparent">
                            <?php if ($gallery_category): ?>
                                <span class="text-xs <?php echo $category_color; ?> text-white px-2 py-1 rounded-full">
                                    <?php echo esc_html($gallery_category); ?>
                                </span>
                            <?php endif; ?>

                            <h4 class="text-white font-semibold text-sm mt-2">
                                <?php the_title(); ?> </h4>
                        </div>
                    </a>

            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p class="text-center col-span-full">কোন ছবি পাওয়া যায়নি।</p>';
            endif;
            ?>

        </div>
    </div>
</section>
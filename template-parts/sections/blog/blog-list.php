<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $args = array(
                'post_type'      => 'post', // ডিফল্ট পোস্ট
                'posts_per_page' => 3,      // কয়টি পোস্ট দেখাতে চান
                'orderby'        => 'date',
                'order'          => 'DESC'
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
            ?>
                    <article class="bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 border border-orange-100 group">
                        <div class="overflow-hidden h-64">
                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>"
                                    alt="<?php the_title_attribute(); ?>"
                                    class="w-full h-full object-cover group-hover:scale-110 transition duration-700" />
                            <?php else : ?>
                                <img src="https://via.placeholder.com/600x400" alt="No Image" class="w-full h-full object-cover" />
                            <?php endif; ?>
                        </div>

                        <div class="p-6">
                            <div class="flex items-center text-xs text-[#ff7722] font-bold mb-4 uppercase tracking-wider">
                                <i class="fas fa-calendar mr-2"></i> <span><?php echo get_the_date('d F, Y'); ?></span>
                                <span class="mx-2 text-gray-300">•</span>
                                <i class="fas fa-user mr-2"></i> <span><?php the_author(); ?></span>
                            </div>

                            <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-[#ff7722] transition line-clamp-2">
                                <?php the_title(); ?>
                            </h3>

                            <p class="text-gray-600 mb-6 text-sm leading-relaxed">
                                <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                            </p>

                            <a href="<?php the_permalink(); ?>" class="text-[#ff7722] font-bold hover:underline inline-flex items-center">
                                বিস্তারিত পড়ুন <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </article>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p class="text-center col-span-3">কোনো পোস্ট পাওয়া যায়নি।</p>';
            endif;
            ?>
        </div>
    </div>
</section>
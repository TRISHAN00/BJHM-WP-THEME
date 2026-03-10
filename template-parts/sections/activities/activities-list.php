<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $args = array(
                'post_type'      => 'activities',
                'posts_per_page' => 8,
                'orderby'        => 'date',
                'order'          => 'DESC',
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post(); ?>

                    <a href="<?php the_permalink(); ?>" class="group bg-white rounded-2xl overflow-hidden shadow-lg border-b-4 border-orange-500 flex flex-col h-full transition hover:shadow-2xl hover:-translate-y-1">

                        <div class="h-56 overflow-hidden">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large', [
                                    'class' => 'w-full h-full object-cover transition-transform duration-500 group-hover:scale-110'
                                ]); ?>
                            <?php else : ?>
                                <img src="https://via.placeholder.com/600x400?text=No+Image" class="w-full h-full object-cover" alt="No Image">
                            <?php endif; ?>
                        </div>

                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-orange-600 transition-colors">
                                <?php the_title(); ?>
                            </h3>

                            <div class="text-gray-600 text-sm mb-4 flex-grow">
                                <?php
                                $content = wp_strip_all_tags(get_the_content());
                                echo mb_strimwidth($content, 0, 100, ' (...)');
                                ?>
                            </div>

                            <div class="text-red-600 font-semibold inline-flex items-center mt-auto">
                                বিস্তারিত <i class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-2"></i>
                            </div>
                        </div>
                    </a>

                <?php endwhile;
                wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>
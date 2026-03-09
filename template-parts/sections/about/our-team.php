<section class="py-[120px] bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold mb-4"><?php echo esc_html(get_field('team_title')); ?></h2>
            <p class="text-gray-600 max-w-xl mx-auto">
                <?php echo esc_html(get_field('team_short_description')); ?>
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            $team_query = new WP_Query(array(
                'post_type'      => 'team',
                'posts_per_page' => -1, // Adjust as needed
                'orderby'        => 'date',
                'order'          => 'ASC'
            ));

            if ($team_query->have_posts()) :
                while ($team_query->have_posts()) : $team_query->the_post();
                    $designation = get_field('team_designation');
                    $social      = get_field('team_social_icons'); // Group ID
            ?>
                    <div class="relative group w-full card mx-auto p-4 border border-gray-300 rounded-2xl shadow-lg bg-white overflow-hidden transition-all duration-500">
                        <span class="absolute inset-0 bg-[#FE7A02] z-0 transform translate-y-full group-hover:translate-y-0 transition-transform duration-500"></span>

                        <div class="relative rounded-2xl h-[400px] w-full overflow-hidden z-10">
                            <?php if (has_post_thumbnail()) : ?>
                                <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                    src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>"
                                    alt="<?php the_title_attribute(); ?>" />
                            <?php endif; ?>

                            <?php if ($social) : ?>
                                <ul class="absolute right-0 bottom-0 w-[50px] flex flex-col rounded-tl-2xl overflow-hidden z-20">
                                    <?php if (!empty($social['team_facebook'])) : ?>
                                        <li class="relative bg-[#1877F2]  w-full h-[50px] group flex items-center justify-center">
                                            <a target="_blank" href="<?php echo esc_url($social['team_facebook']); ?>" class="relative z-10 text-white text-lg visited:text-white hover:text-white ">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                            <span class="absolute inset-0 bg-[#1877F2] transform translate-y-full group-hover:translate-y-0 transition-transform duration-300"></span>
                                        </li>
                                    <?php endif; ?>

                                    <?php if (!empty($social['team_twitter'])) : ?>
                                        <li class="relative bg-[#1DA1F2]  w-full h-[50px] group flex items-center justify-center">
                                            <a target="_blank" href="<?php echo esc_url($social['team_twitter']); ?>" class="relative z-10 text-white text-lg">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                            <span class="absolute inset-0 bg-[#1DA1F2] transform translate-y-full group-hover:translate-y-0 transition-transform duration-300"></span>
                                        </li>
                                    <?php endif; ?>

                                    <?php if (!empty($social['team_instagram'])) : ?>
                                        <li class="relative w-full bg-gradient-to-tr from-[#F58529] via-[#DD2A7B] to-[#8134AF] h-[50px] group flex items-center justify-center">
                                            <a target="_blank" href="<?php echo esc_url($social['team_instagram']); ?>" class="relative z-10 text-white text-lg">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                            <span class="absolute inset-0 bg-gradient-to-tr from-[#F58529] via-[#DD2A7B] to-[#8134AF] transform translate-y-full group-hover:translate-y-0 transition-transform duration-300"></span>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            <?php endif; ?>
                        </div>

                        <div class="content mt-4 p-4 rounded-2xl relative z-10 transition-colors duration-500 group-hover:text-white text-center">
                            <h4 class="text-2xl font-bold mb-1"><?php the_title(); ?></h4>
                            <p class="mb-2"><?php echo esc_html($designation); ?></p>
                            <div class="text-sm">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>
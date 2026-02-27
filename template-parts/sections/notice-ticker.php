<section class="py-4 md:py-6 bg-gray-50">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="notice-ticker-container flex flex-col md:flex-row md:items-center bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

            <!-- Label -->
            <div class="notice-label bg-orange-600 text-white px-4 md:px-6 py-3 md:py-4 flex items-center gap-2 shrink-0 z-10 relative">
                <span class="relative flex h-3 w-3">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-100 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-white"></span>
                </span>

                <div class="leading-tight">
                    <span class="font-bold uppercase tracking-widest text-xs block">
                        Updates
                    </span>

                    <!-- Bangla Date -->
                    <div
                        class="bangla-date-style text-xs md:text-sm"
                        id="bangla-date">
                    </div>
                </div>
            </div>

            <!-- Swiper -->
            <div class="swiper noticeSwiper w-full md:flex-1">
                <div class="swiper-wrapper">

                    <?php
                    $notice_query = new WP_Query([
                        'post_type'      => 'notice',
                        'posts_per_page' => -1,
                        'post_status'    => 'publish',
                    ]);

                    if ($notice_query->have_posts()) :
                        while ($notice_query->have_posts()) :
                            $notice_query->the_post();
                    ?>
                            <div class="swiper-slide">
                                📢 <?php the_title(); ?>
                            </div>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        ?>
                        <div class="swiper-slide">
                            No notices available right now.
                        </div>
                    <?php endif; ?>

                </div>
            </div>

            <!-- Icon -->
            <div class="hidden md:flex px-6 text-gray-300">
                <i class="fas fa-rss"></i>
            </div>

        </div>
    </div>
</section>
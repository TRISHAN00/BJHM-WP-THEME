<section class="py-4 md:py-6 bg-[#FFFEEE]">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="notice-ticker-container flex flex-col md:flex-row md:items-center bg-white rounded-2xl shadow-sm border border-[#ff7722]/20 overflow-hidden">

            <div class="notice-label bg-[#ff7722] text-white px-6 py-4 flex items-center gap-3 shrink-0">
                <span class="relative flex h-3 w-3">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-white"></span>
                </span>
                <div class="leading-tight">
                    <span class="font-bold uppercase tracking-widest text-[10px] block">Updates</span>
                    <div class="text-[11px] opacity-90" id="bangla-date"></div>
                </div>
            </div>

            <div class="swiper noticeSwiper w-full md:flex-1 min-w-0">
                <div class="swiper-wrapper">
                    <?php
                    $notice_query = new WP_Query(['post_type' => 'notice', 'posts_per_page' => -1, 'post_status' => 'publish']);
                    if ($notice_query->have_posts()) :
                        while ($notice_query->have_posts()) : $notice_query->the_post(); ?>
                            <div class="swiper-slide flex items-center px-6 py-4 text-gray-800 font-medium text-sm whitespace-nowrap">
                                <i class="fas fa-bullhorn text-[#ff7722] mr-3"></i> <?php the_title(); ?>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata();
                    else : ?>
                        <div class="swiper-slide flex items-center px-6 py-4 text-gray-500 text-sm">No notices available.</div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="hidden md:flex px-6 text-[#ff7722] text-lg">
                <i class="fas fa-rss"></i>
            </div>
        </div>
    </div>
</section>

<style>
    .notice-ticker-container {
        max-width: 100%;
        width: 100%;
    }

    .notice-ticker-container .swiper-slide {
        width: auto !important;
        /* Ensures slides only take required width */
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>

<script>
    if (document.querySelector(".noticeSwiper")) {
        new Swiper(".noticeSwiper", {
            loop: true,
            slidesPerView: "auto",
            spaceBetween: 30, // Adds space between notices
            speed: 10000, // Adjusted speed for smoother movement
            allowTouchMove: false,
            autoplay: {
                delay: 0,
                disableOnInteraction: false
            },
            // CSS mode helps with performance in horizontal tickers
            cssMode: false,
        });
    }
</script>
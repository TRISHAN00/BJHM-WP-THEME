<?php
// ACF ফিল্ড থেকে ডেটা আনা হচ্ছে
$advocacy_label   = get_field('multimedia_advocacy_label');
$advocacy_title   = get_field('multimedia_advocacy_title');
$advocacy_content = get_field('multimedia_advocacy_content');
$advocacy_video   = get_field('multimedia_advocacy_video');

// ইউটিউব ভিডিও আইডি বের করার জন্য
$video_id = '';
if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $advocacy_video, $match)) {
    $video_id = $match[1];
}
?>

<section class="py-20 ">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <?php if ($advocacy_label) : ?>
                    <span class="text-[#ff7722] font-bold text-sm uppercase tracking-widest">
                        <?php echo esc_html($advocacy_label); ?>
                    </span>
                <?php endif; ?>

                <?php if ($advocacy_title) : ?>
                    <h2 class="text-4xl md:text-5xl font-black text-gray-900 mt-4 mb-6">
                        <?php echo wp_kses_post($advocacy_title); ?>
                    </h2>
                <?php endif; ?>

                <?php if ($advocacy_content) : ?>
                    <div class="text-gray-700 mb-8 leading-relaxed text-lg">
                        <?php echo wp_kses_post($advocacy_content); ?>
                    </div>
                <?php endif; ?>



                <a href="#" class="btn-common-main group relative inline-flex items-center justify-center px-10 py-4 font-black text-xs uppercase tracking-[0.2em] text-[#ff7722] transition-all duration-500 border-2 border-[#ff7722] rounded-full overflow-hidden hover:text-white">

                    <span class="absolute inset-0 w-0 bg-[#ff7722] transition-all duration-500 ease-out group-hover:w-full"></span>

                    <span class="relative z-10 flex items-center gap-3">
                        আরও ভিডিও দেখুন
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 transition-transform duration-500 group-hover:translate-x-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                        </svg>
                    </span>
                </a>
            </div>

            <div id="featureVideo" class="relative">
                <?php if ($video_id) : ?>
                    <img src="https://img.youtube.com/vi/<?php echo $video_id; ?>/maxresdefault.jpg"
                        alt="Advocacy Video"
                        class="rounded-3xl shadow-2xl w-full border-4 border-[#ff7722]/20" />

                    <a href="<?php echo esc_url($advocacy_video); ?>"
                        target="_blank"
                        class="absolute inset-0 flex items-center justify-center group">
                        <div class="bg-[#ff7722] group-hover:scale-110 w-16 h-16 lg:h-20 lg:w-20 rounded-full flex items-center justify-center transition-all shadow-xl">
                            <i class="fas fa-play text-white text-2xl ml-1"></i>
                        </div>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
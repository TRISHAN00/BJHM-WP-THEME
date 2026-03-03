<?php
// ACF ফিল্ড থেকে ডেটা আনা হচ্ছে
$advocacy_label   = get_field('multimedia_advocacy_label');
$advocacy_title   = get_field('multimedia_advocacy_title');
$advocacy_content = get_field('multimedia_advocacy_content');
$advocacy_video   = get_field('multimedia_advocacy_video'); // এটি ইউটিউব ভিডিও ইউআরএল হিসেবে ধরা হয়েছে

// ইউটিউব ভিডিও আইডি বের করার জন্য (থাম্বনেইল এবং লিঙ্কের জন্য)
$video_id = '';
if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $advocacy_video, $match)) {
    $video_id = $match[1];
}
?>

<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <?php if ($advocacy_label) : ?>
                    <span class="text-orange-500 font-semibold text-sm uppercase tracking-wide">
                        <?php echo esc_html($advocacy_label); ?>
                    </span>
                <?php endif; ?>

                <?php if ($advocacy_title) : ?>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mt-4 mb-6">
                        <?php echo wp_kses_post($advocacy_title); ?>
                    </h2>
                <?php endif; ?>

                <?php if ($advocacy_content) : ?>
                    <div class="text-gray-600 mb-6 leading-relaxed">
                        <?php echo wp_kses_post($advocacy_content); ?>
                    </div>
                <?php endif; ?>


                <a href="<?php echo esc_url($advocacy_video); ?>"
                    target="_blank"
                    class="bg-gradient-to-r text-white visited:text-white from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 text-white px-8 py-4 rounded-full font-semibold transition inline-flex items-center">
                    আরও ভিডিও দেখুন <i class="fas fa-play ml-2"></i>
                </a>
            </div>

            <div id="featureVideo" class="relative">
                <?php if ($video_id) : ?>
                    <img src="https://img.youtube.com/vi/<?php echo $video_id; ?>/maxresdefault.jpg"
                        alt="Advocacy Video Thumbnail"
                        class="rounded-2xl shadow-2xl w-full border-4 border-orange-100" />

                    <a href="<?php echo esc_url($advocacy_video); ?>"
                        target="_blank"
                        class="absolute text-white inset-0  flex items-center justify-center group">
                        <div class="bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 w-10 h-10 lg:h-20 lg:w-20  rounded-full flex items-center justify-center transition transform group-hover:scale-110 shadow-xl">
                            <i class="fas fa-play text-white text-2xl ml-1"></i>
                        </div>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
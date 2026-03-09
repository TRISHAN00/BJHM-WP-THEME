<?php
// Get Page Title
$banner_title = get_the_title();

// Get Featured Image with fallback
$featured_img = get_the_post_thumbnail_url(get_the_ID(), 'full');
$banner_url = $featured_img ?: get_template_directory_uri() . '/assets/default-banner.jpg'; // Fallback path
?>

<section class="relative w-full h-[320px] sm:h-[380px] md:h-[420px] lg:h-[480px] overflow-hidden group">

    <img
        src="<?php echo esc_url($banner_url); ?>"
        alt="<?php echo esc_attr($banner_title); ?>"
        class="absolute inset-0 w-full h-full object-cover transition-transform duration-[2s] group-hover:scale-105" />

    <div class="absolute inset-0 bg-gradient-to-r from-green-950/90 via-green-900/70 to-transparent"></div>

    <div class="relative z-10 h-full flex items-center">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl text-white">

                <h1 class="text-4xl sm:text-5xl md:text-6xl font-black leading-tight mb-6 animate-fade-in-up">
                    <?php echo esc_html($banner_title); ?>
                </h1>

                <nav class="flex items-center gap-3 text-sm tracking-widest uppercase font-medium" aria-label="Breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-[#ff7722] visited:text-white transition-colors duration-300">
                        Home
                    </a>
                    <span class="text-gray-500">/</span>
                    <span class="text-[#ff7722]">
                        <?php echo esc_html($banner_title); ?>
                    </span>
                </nav>

            </div>
        </div>
    </div>

</section>

<style>
    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in-up {
        animation: fade-in-up 0.8s ease-out;
    }
</style>
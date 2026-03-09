<?php
// Get Page Title
$banner_title = get_the_title();

// Get Featured Image
$featured_img = get_the_post_thumbnail_url(get_the_ID(), 'full');

// Fallback image if no featured image
$banner_url = $featured_img ? $featured_img : 'https://images.unsplash.com/photo-1584573062914-a1f7848470a2?q=80&w=1170&auto=format&fit=crop';
?>

<section class="relative w-full h-[320px] sm:h-[380px] md:h-[420px] lg:h-[480px] overflow-hidden">

    <img
        src="<?php echo esc_url($banner_url); ?>"
        alt="<?php echo esc_attr($banner_title); ?>"
        class="absolute inset-0 w-full h-full object-cover" />

    <div class="absolute inset-0 bg-gradient-to-r from-green-900/90 via-green-900/70 to-green-900/40"></div>

    <div class="relative z-10 h-full flex items-center">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl text-white">

                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight mb-4">
                    <?php the_title(); ?>
                </h1>

                <nav class="flex items-center gap-2 text-sm text-gray-200" aria-label="Breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-orange-400 transition">
                        Home
                    </a>
                    <span>/</span>
                    <span class="text-orange-400 font-semibold">
                        <?php the_title(); ?>
                    </span>
                </nav>

            </div>
        </div>
    </div>

</section>
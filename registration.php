<?php

/**
 * Template Name: Member Registration
 */
get_header();

// Fetch ACF Fields (Create these in ACF for this page)
$reg_sub      = get_field('reg_sub_heading') ?: 'আমাদের পরিবারের অংশ হোন';
$reg_title    = get_field('reg_main_title') ?: 'জাতীয় হিন্দু মহাজোট সদস্য নিবন্ধন';
$reg_desc     = get_field('reg_description') ?: 'আপনার সঠিক তথ্য প্রদান করে নিবন্ধন সম্পন্ন করুন। আমরা আপনার তথ্যের গোপনীয়তা রক্ষা করি।';
?>

<?php get_template_part('template-parts/sections/inner', 'banner'); ?>

<section class="py-16 md:py-24 bg-slate-50">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="max-w-4xl mx-auto">

            <div class="text-center mb-12">
                <span class="text-[#ff7722] font-bold uppercase tracking-widest text-sm block mb-3">
                    <?php echo esc_html($reg_sub); ?>
                </span>
                <h2 class="text-3xl md:text-5xl font-black text-[#1E293B] mb-6 leading-tight">
                    <?php echo esc_html($reg_title); ?>
                </h2>
                <div class="text-gray-600 text-lg max-w-2xl mx-auto leading-relaxed">
                    <?php echo wp_kses_post($reg_desc); ?>
                </div>
            </div>

            <div class="bg-white p-8 md:p-12 rounded-[2.5rem] shadow-xl shadow-gray-200/50 border border-gray-100 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-orange-50 rounded-bl-full opacity-50"></div>

                <div class="relative z-10 custom-registration-form">
                    <?php echo do_shortcode('[contact-form-7 id="a1f18c9" title="Registration"]'); ?>
                </div>
            </div>

            <div class="mt-12 text-center">
                <p class="text-gray-500 text-sm">নিবন্ধনে কোনো সমস্যা হচ্ছে? আমাদের সাথে যোগাযোগ করুন:</p>
                <p class="font-bold text-[#1E293B] mt-1">support@hindumohajot.org</p>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>
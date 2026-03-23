<?php

/**
 * Template Name: Donate
 */
get_header();

// 1. General Content
$sub_heading  = get_field('donate_sub_heading') ?: 'মানবসেবায় আমাদের সাথে থাকুন';
$main_title   = get_field('donate_main_title') ?: 'আপনার সামান্য অবদান আমাদের শক্তি';
$description  = get_field('donate_description') ?: 'বাংলাদেশ জাতীয় হিন্দু মহাজোটের লক্ষ্য হলো সম্প্রদায়ের অধিকার রক্ষা এবং আর্তমানবতার সেবা করা।';

// 2. Payment Numbers
$bkash        = get_field('bkash_number') ?: 'Not Set';
$nagad        = get_field('nagad_number') ?: 'Not Set';

// 3. Steps Content
$s1_title     = get_field('step_1_title') ?: 'টাকা পাঠান (Send Money)';
$s1_text      = get_field('step_1_text') ?: 'আমাদের অফিশিয়াল বিকাশ বা নগদ নাম্বারে টাকা পাঠান';

$s2_title     = get_field('step_2_title') ?: 'ট্রানজেকশন আইডি';
$s2_text      = get_field('step_2_text') ?: 'টাকা পাঠানোর পর প্রাপ্ত SMS থেকে TrxID টি কপি করুন';

$s3_title     = get_field('step_3_title') ?: 'ফরমটি পূরণ করুন';
$s3_text      = get_field('step_3_text') ?: 'ডানদিকের ফরমটিতে আপনার নাম ও TrxID লিখে সাবমিট করুন';

// 4. Trust Box & Form Title
$trust_title  = get_field('trust_box_title') ?: 'ধর্ম ও মানবতার সেবায় আপনার দান';
$trust_desc   = get_field('trust_box_desc') ?: 'আপনার প্রতিটি অর্থ অত্যন্ত স্বচ্ছতার সাথে আর্তমানবতার সেবায় ব্যয় করা হবে।';
$form_title   = get_field('form_title') ?: 'অনুদান ফরম';
?>

<?php get_template_part('template-parts/sections/inner', 'banner'); ?>

<section class="py-16 md:py-24 bg-gray-50">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="flex flex-col lg:flex-row gap-16 items-start">

            <div class="w-full lg:w-1/2">
                <span class="text-[#ff7722] font-bold uppercase tracking-widest text-sm"><?php echo esc_html($sub_heading); ?></span>
                <h2 class="text-4xl md:text-5xl font-black text-[#1E293B] mt-4 mb-6 leading-tight">
                    <?php echo nl2br(esc_html($main_title)); ?>
                </h2>
                <div class="text-gray-600 text-lg mb-8 leading-relaxed">
                    <?php echo wp_kses_post($description); ?>
                </div>

                <div class="space-y-6 mb-10">
                    <div class="flex gap-4">
                        <div class="flex-shrink-0 w-12 h-12 rounded-full bg-[#ff7722] text-[#FFFEEE] flex items-center justify-center font-bold text-xl">১</div>
                        <div>
                            <h4 class="font-bold text-[#1E293B] text-lg"><?php echo esc_html($s1_title); ?></h4>
                            <p class="text-sm text-gray-500"><?php echo esc_html($s1_text); ?>: <br>
                                <span class="font-black text-[#ff7722] text-lg">বিকাশ: <?php echo esc_html($bkash); ?></span><br>
                                <span class="font-black text-[#ff7722] text-lg">নগদ: <?php echo esc_html($nagad); ?></span>
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="flex-shrink-0 w-12 h-12 rounded-full bg-[#ff7722] text-[#FFFEEE] flex items-center justify-center font-bold text-xl">২</div>
                        <div>
                            <h4 class="font-bold text-[#1E293B] text-lg"><?php echo esc_html($s2_title); ?></h4>
                            <p class="text-sm text-gray-500"><?php echo esc_html($s2_text); ?></p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="flex-shrink-0 w-12 h-12 rounded-full bg-[#ff7722] text-[#FFFEEE] flex items-center justify-center font-bold text-xl">৩</div>
                        <div>
                            <h4 class="font-bold text-[#1E293B] text-lg"><?php echo esc_html($s3_title); ?></h4>
                            <p class="text-sm text-gray-500"><?php echo esc_html($s3_text); ?></p>
                        </div>
                    </div>
                </div>

                <div class="p-6 bg-[#FFFEEE] rounded-2xl border border-gray-100 shadow-sm flex items-center gap-4">
                    <div class="w-[80px] md:w-[100px] flex-shrink-0">
                        <?php if (has_custom_logo()) {
                            the_custom_logo();
                        } ?>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-[#1E293B]"><?php echo esc_html($trust_title); ?></p>
                        <p class="text-xs text-gray-400"><?php echo esc_html($trust_desc); ?></p>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-1/2 sticky top-24">
                <div class="bg-white p-8 md:p-10 rounded-3xl shadow-2xl shadow-gray-200 border border-gray-50">
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-[#1E293B] flex items-center gap-3">
                            <span class="w-2 h-8 bg-[#ff7722] rounded-full"></span>
                            <?php echo esc_html($form_title); ?>
                        </h3>
                    </div>

                    <div class="custom-cf7-wrapper">
                        <?php echo do_shortcode('[contact-form-7 id="00e2db1" title="Donation Form"]'); ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>
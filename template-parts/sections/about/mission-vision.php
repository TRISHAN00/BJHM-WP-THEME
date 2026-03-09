<?php

/**
 * Mission & Vision Section
 * Group Name: mission_vision_points
 */

// Basic Top-Level Fields
$label   = get_field('mission_vision_label');
$title   = get_field('mission_vision_title');
$content = get_field('mission_vision_content');
$image   = get_field('mission_vision_image');

// Get the Group Field
$points_group = get_field('mission_vision_points');

// Define Points Array for cleaner iteration
$points = [
    [
        'title' => $points_group['mission_vision_point_one'] ?? '',
        'desc'  => $points_group['mission_vision_point_one_desc'] ?? '',
        'bg'    => 'bg-orange-50',
        'text' => 'text-orange-600',
        'hover' => 'group-hover:bg-orange-600 group-hover:text-white'
    ],
    [
        'title' => $points_group['mission_vision_point_two'] ?? '',
        'desc'  => $points_group['mission_vision_point_two_desc'] ?? '',
        'bg'    => 'bg-green-50',
        'text' => 'text-green-700',
        'hover' => 'group-hover:bg-green-700 group-hover:text-white'
    ],
    [
        'title' => $points_group['mission_vision_point_three'] ?? '',
        'desc'  => $points_group['mission_vision_point_three_desc'] ?? '',
        'bg'    => 'bg-orange-50',
        'text' => 'text-orange-600',
        'hover' => 'group-hover:bg-orange-600 group-hover:text-white'
    ],
    [
        'title' => $points_group['mission_vision_point_four'] ?? '',
        'desc'  => $points_group['mission_vision_point_four_desc'] ?? '',
        'bg'    => 'bg-green-50',
        'text' => 'text-green-700',
        'hover' => 'group-hover:bg-green-700 group-hover:text-white'
    ],
];

// Image Logic
$image_url   = is_array($image) ? $image['url'] : $image;
$final_image = $image_url ?: 'https://picsum.photos/800/800?random=1';
?>

<section class="py-16 md:py-24 bg-white overflow-hidden">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 md:gap-16 items-center">

            <div class="order-2 lg:order-1">
                <?php if ($label) : ?>
                    <span class="text-orange-600 font-bold text-xs md:text-sm uppercase tracking-[0.2em] mb-3 block">
                        <?php echo esc_html($label); ?>
                    </span>
                <?php endif; ?>

                <?php if ($title) : ?>
                    <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-slate-900 mt-2 mb-6 leading-tight">
                        <?php echo esc_html($title); ?>
                    </h2>
                <?php endif; ?>

                <?php if ($content) : ?>
                    <div class="text-slate-600 text-base md:text-lg mb-8 leading-relaxed">
                        <?php echo $content; ?>
                    </div>
                <?php endif; ?>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-8 gap-x-6">
                    <?php foreach ($points as $p) :
                        if (!empty($p['title'])) : ?>
                            <div class="group flex items-start gap-4">
                                <div class="w-12 h-12 shrink-0 flex items-center justify-center rounded-2xl <?php echo $p['bg'] . ' ' . $p['text']; ?> transition-colors <?php echo $p['hover']; ?>">
                                    <i class="fa-regular fa-hand-point-right"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-800 mb-1 italic"><?php echo esc_html($p['title']); ?></h4>
                                    <p class="text-sm text-slate-500 leading-snug"><?php echo esc_html($p['desc']); ?></p>
                                </div>
                            </div>
                    <?php endif;
                    endforeach; ?>
                </div>
            </div>

            <div class="relative order-1 lg:order-2 mb-12 lg:mb-0">
                <div class="relative z-10 aspect-square rounded-[2rem] overflow-hidden shadow-2xl">
                    <img src="<?php echo esc_url($final_image); ?>" alt="Mission Vision Visual" class="w-full h-full object-cover transition-all duration-700 transform hover:scale-105" />
                </div>

                <div class="absolute -bottom-6 -right-4 md:-right-8 z-20 bg-white rounded-2xl shadow-xl p-6 border-b-4 border-green-700 animate-bounce-slow">
                    <div class="flex items-center gap-3">
                        <span class="text-4xl md:text-5xl font-black text-green-800 leading-none">
                            <?php
                            $start_year = 2006;
                            $years = (int)date('Y') - $start_year;
                            $bn = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
                            echo str_replace(range(0, 9), $bn, $years) . '+';
                            ?>
                        </span>
                        <p class="text-slate-600 text-xs md:text-sm font-bold uppercase tracking-wider">
                            বছরের <br> নিরলস সেবা
                        </p>
                    </div>
                </div>
                <div class="absolute -top-6 -left-6 w-32 h-32 bg-orange-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
            </div>

        </div>
    </div>
</section>

<style>
    @keyframes bounce-slow {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-10px);
        }
    }

    @keyframes blob {
        0% {
            transform: translate(0px, 0px) scale(1);
        }

        33% {
            transform: translate(30px, -50px) scale(1.1);
        }

        66% {
            transform: translate(-20px, 20px) scale(0.9);
        }

        100% {
            transform: translate(0px, 0px) scale(1);
        }
    }

    .animate-bounce-slow {
        animation: bounce-slow 4s ease-in-out infinite;
    }

    .animate-blob {
        animation: blob 7s infinite;
    }
</style>
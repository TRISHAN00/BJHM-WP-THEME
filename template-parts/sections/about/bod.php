<?php
// Fetch Section Header ACF Fields
$bod_title = get_field('bod_title') ?: 'Board of Directors';
$bod_description = get_field('bod_description');

// WP_Query for 'bod' post type
$args = array(
    'post_type'      => 'bod',
    'posts_per_page' => -1,
    'order'          => 'ASC',
    'orderby'        => 'menu_order'
);
$bod_query = new WP_Query($args);
$counter = 0;
?>

<section class="py-24 bg-slate-50">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="mb-20 text-center">
            <h2 class="text-4xl lg:text-5xl font-extrabold text-slate-900 mb-6 tracking-tight">
                <?php echo esc_html($bod_title); ?>
            </h2>
            <?php if ($bod_description) : ?>
                <div class="w-20 mx-auto h-1.5 bg-green-700 mb-6 rounded-full"></div>
                <p class="text-slate-500 text-lg lg:text-xl max-w-2xl mx-auto leading-relaxed">
                    <?php echo esc_html($bod_description); ?>
                </p>
            <?php endif; ?>
        </div>

        <div class="space-y-24">
            <?php if ($bod_query->have_posts()) : ?>
                <?php while ($bod_query->have_posts()) : $bod_query->the_post();
                    $designation  = get_field('designation');
                    $socials      = get_field('social_icons');
                    $image_url    = get_the_post_thumbnail_url(get_the_ID(), 'large') ?: 'https://via.placeholder.com/800x800';

                    // Alternating layout logic
                    $is_even      = ($counter % 2 !== 0);
                    $direction    = $is_even ? 'md:flex-row-reverse' : 'md:flex-row';
                    $padding      = $is_even ? 'md:pr-16' : 'md:pl-16';
                    $counter++;
                ?>
                    <div class="group flex flex-col <?php echo $direction; ?> items-center gap-10">
                        <div class="w-full md:w-5/12">
                            <div class="relative overflow-hidden aspect-[4/5] rounded-2xl shadow-xl">
                                <img class="w-full h-full object-cover transition-transform duration-[2s] group-hover:scale-110"
                                    src="<?php echo esc_url($image_url); ?>"
                                    alt="<?php echo esc_attr(get_the_title()); ?>" />
                                <div class="absolute inset-0 bg-green-900/10 group-hover:bg-transparent transition-colors duration-500"></div>
                            </div>
                        </div>

                        <div class="w-full md:w-7/12 <?php echo $padding; ?>">
                            <span class="text-[#ff7722] font-bold text-xs uppercase tracking-[0.25em] mb-3 block">
                                <?php echo esc_html($designation); ?>
                            </span>
                            <h3 class="text-3xl lg:text-4xl font-bold text-slate-900 mb-6">
                                <?php the_title(); ?>
                            </h3>

                            <div class="text-slate-600 leading-relaxed text-lg mb-8">
                                <?php the_content(); ?>
                            </div>

                            <?php if ($socials) : ?>
                                <div class="flex items-center gap-3">
                                    <?php
                                    $links = [
                                        'linkedin' => $socials['bod_linkedin_link'] ?? '',
                                        'twitter'  => $socials['bod_twitter_link'] ?? '',
                                        'facebook' => $socials['bod_facebook_link'] ?? ''
                                    ];
                                    foreach ($links as $platform => $url) :
                                        if (!empty($url)) : ?>
                                            <a href="<?php echo esc_url($url); ?>" target="_blank"
                                                class="w-10 h-10 flex items-center justify-center rounded-full bg-white border border-slate-200 text-slate-400 transition-all duration-300 hover:bg-[#ff7722] hover:text-white hover:border-[#ff7722]">
                                                <i class="fab fa-<?php echo $platform; ?>"></i>
                                            </a>
                                    <?php endif;
                                    endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>
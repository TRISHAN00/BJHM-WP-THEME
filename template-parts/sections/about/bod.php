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
$counter = 0; // To handle alternating layout
?>

<section class="py-24 bg-white">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="mb-20">
            <h2 class="text-4xl lg:text-5xl font-extrabold text-center text-slate-900 mb-6 tracking-tight leading-tight">
                <?php echo esc_html($bod_title); ?>
            </h2>
            <?php if ($bod_description) : ?>
                <div class="w-20 mx-auto h-1.5 bg-green-700 mb-6"></div>
                <p class="text-slate-500 text-center text-xl leading-relaxed">
                    <?php echo esc_html($bod_description); ?>
                </p>
            <?php endif; ?>
        </div>

        <div class="space-y-24">
            <?php if ($bod_query->have_posts()) : ?>
                <?php while ($bod_query->have_posts()) : $bod_query->the_post();
                    $designation = get_field('designation');
                    $socials = get_field('social_icons');
                    $thumbnail_id = get_post_thumbnail_id();
                    $image_url = $thumbnail_id ? wp_get_attachment_image_url($thumbnail_id, 'large') : 'https://via.placeholder.com/800x800';

                    // Alternating logic
                    $is_even = ($counter % 2 !== 0);
                    $flex_direction = $is_even ? 'md:flex-row-reverse' : 'md:flex-row';
                    $padding_direction = $is_even ? 'md:pr-16' : 'md:pl-16';
                    $counter++;
                ?>
                    <div class="group flex flex-col <?php echo $flex_direction; ?> items-center gap-8 lg:gap-0">

                        <div class="w-full md:w-5/12">
                            <div class="relative overflow-hidden aspect-[4/5] rounded-lg bg-slate-100">
                                <img class="w-full h-full object-cover  transition-all duration-700 "
                                    src="<?php echo esc_url($image_url); ?>"
                                    alt="<?php echo esc_attr(get_the_title()); ?>" />
                            </div>
                        </div>

                        <div class="w-full md:w-7/12 <?php echo $padding_direction; ?> flex flex-col justify-center">
                            <span class="text-green-700 font-bold text-sm uppercase tracking-[0.2em] mb-3">
                                <?php echo esc_html($designation); ?>
                            </span>
                            <h3 class="text-3xl lg:text-4xl font-bold text-slate-900 mb-6">
                                <?php the_title(); ?>
                            </h3>

                            <div class="text-slate-600 leading-relaxed text-lg mb-8 prose prose-slate">
                                <?php the_content(); ?>
                            </div>

                            <div class="flex items-center gap-3">
                                <?php
                                $platforms = [
                                    'linkedin' => ['link' => $socials['bod_linkedin_link'], 'icon' => 'M4.98 3.5C4.98 4.88 3.88 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1 4.98 2.12 4.98 3.5zM0 24h5V7H0v17zM7.5 7h4.8v2.3h.1c.7-1.3 2.4-2.6 5-2.6 5.3 0 6.3 3.5 6.3 8V24h-5v-7.5c0-1.8 0-4.1-2.5-4.1s-2.9 2-2.9 4V24h-5V7z'],
                                    'twitter'  => ['link' => $socials['bod_twitter_link'], 'icon' => 'M18.9 2H22l-7.6 8.7L23 22h-6.7l-5.2-6.5L5.5 22H2l8.1-9.3L1 2h6.8l4.7 5.9L18.9 2z'],
                                    'facebook' => ['link' => $socials['bod_facebook_link'], 'icon' => 'M22.68 0H1.32C.59 0 0 .59 0 1.32v21.36C0 23.41.59 24 1.32 24h11.5v-9.3H9.7v-3.6h3.12V8.4c0-3.1 1.9-4.8 4.67-4.8 1.33 0 2.47.1 2.8.14v3.24h-1.92c-1.5 0-1.8.72-1.8 1.77v2.32h3.6l-.47 3.6h-3.13V24h6.14c.73 0 1.32-.59 1.32-1.32V1.32C24 .59 23.41 0 22.68 0z']
                                ];

                                foreach ($platforms as $key => $data) :
                                    if (!empty($data['link'])) : ?>
                                        <a href="<?php echo esc_url($data['link']); ?>"
                                            target="_blank"
                                            class="w-10 h-10 flex items-center justify-center rounded-full border border-slate-200 text-slate-400 transition-all duration-300 hover:bg-slate-900 hover:text-white hover:border-slate-900"
                                            aria-label="<?php echo ucfirst($key); ?>">
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                                <path d="<?php echo $data['icon']; ?>" />
                                            </svg>
                                        </a>
                                <?php endif;
                                endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>
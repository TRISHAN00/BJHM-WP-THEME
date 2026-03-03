<?php get_header(); ?>

<?php while (have_posts()) : the_post();
    // Fetch ACF Fields
    $post_label = get_field('activities_post_label');
    $organizer_name = get_field('organizer_name'); // Suggested field
    $organizer_role = get_field('organizer_role'); // Suggested field
    $organizer_image = get_field('organizer_image'); // Suggested field
?>

    <main class="container mx-auto px-4 py-16 mt-20 lg:mt-40 ">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-6 space-y-3 md:space-y-0">
            <div class="flex items-center space-x-2 text-sm font-medium text-orange-600 uppercase tracking-widest">
                <?php if ($post_label) : ?>
                    <span class="bg-orange-100 px-3 py-1 rounded-full"><?php echo esc_html($post_label); ?></span>
                    <span class="text-gray-400">|</span>
                <?php endif; ?>
                <span class="text-gray-500 italic"><?php echo get_the_date('j F, Y'); ?></span>
            </div>
            <a href="<?php echo get_post_type_archive_link('activities'); ?>" class="text-gray-600 hover:text-gray-900 font-medium transition">
                ← Back to Activities
            </a>
        </div>

        <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 leading-tight mb-8">
            <?php the_title(); ?>
        </h1>

        <?php if ($organizer_name) : ?>
            <div class="flex items-center space-x-4 mb-12">
                <img src="<?php echo $organizer_image ? esc_url($organizer_image['url']) : get_template_directory_uri() . '/assets/images/default-avatar.jpg'; ?>"
                    alt="Organizer"
                    class="w-14 h-14 rounded-full object-cover" />
                <div>
                    <p class="text-gray-900 font-bold"><?php echo esc_html($organizer_name); ?></p>
                    <p class="text-gray-500 text-sm"><?php echo esc_html($organizer_role); ?></p>
                </div>
            </div>
        <?php endif; ?>

        <?php if (has_post_thumbnail()) : ?>
            <figure class="mb-12 rounded-2xl overflow-hidden shadow-lg">
                <?php the_post_thumbnail('full', ['class' => 'w-full h-64 sm:h-96 object-cover']); ?>
                <figcaption class="text-center text-gray-500 mt-3 text-sm italic">
                    <?php echo get_post(get_post_thumbnail_id())->post_excerpt; // Uses the image "Caption" field 
                    ?>
                </figcaption>
            </figure>
        <?php endif; ?>

        <article class="prose prose-lg max-w-none text-gray-700 space-y-6">
            <?php the_content(); ?>
        </article>

        <div class="mt-12 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div class="flex flex-wrap gap-2">
                <?php
                $tags = get_the_tags();
                if ($tags) :
                    foreach ($tags as $tag) : ?>
                        <span class="bg-gray-200 px-3 py-1 rounded-full text-sm text-gray-700">#<?php echo $tag->name; ?></span>
                <?php endforeach;
                endif; ?>
            </div>

            <div class="flex items-center gap-3">
                <span class="font-semibold text-gray-700">শেয়ার করুন:</span>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" class="w-10 h-10 bg-sky-500 text-white rounded-full flex items-center justify-center hover:bg-sky-600 transition">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://api.whatsapp.com/send?text=<?php the_title(); ?>%20<?php the_permalink(); ?>" target="_blank" class="w-10 h-10 bg-green-500 text-white rounded-full flex items-center justify-center hover:bg-green-600 transition">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </div>
        </div>
    </main>

<?php endwhile; ?>

<?php get_footer(); ?>
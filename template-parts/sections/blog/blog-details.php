<main class="container mx-auto px-4 py-12 mt-20 md:mt-40">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <header class="mb-8">
                <div class="flex items-center space-x-4 mb-4 text-sm font-medium text-orange-600 uppercase tracking-widest">
                    <span class="bg-orange-100 px-3 py-1 rounded-full"><?php echo get_the_category_list(', '); ?></span>
                    <span class="text-gray-400">|</span>
                    <span class="text-gray-500 italic"><?php echo get_the_date('d F, Y'); ?></span>
                </div>

                <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 leading-tight mb-6">
                    <?php the_title(); ?>
                </h1>

                <div class="flex items-center space-x-4 border-y border-gray-200 py-4">
                    <div class="w-12 h-12 rounded-full overflow-hidden">
                        <?php echo get_avatar(get_the_author_meta('ID'), 48); ?>
                    </div>
                    <div>
                        <p class="text-gray-900 font-bold"><?php the_author(); ?></p>
                        <p class="text-gray-500 text-sm"><?php echo get_the_author_meta('description'); ?></p>
                    </div>
                </div>
            </header>

            <figure class="mb-10">
                <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>"
                        alt="<?php the_title_attribute(); ?>"
                        class="w-full rounded-2xl shadow-xl object-cover" />
                <?php endif; ?>
                <figcaption class="text-center text-gray-500 mt-4 text-sm italic">
                    <?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>
                </figcaption>
            </figure>

            <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed space-y-6">
                <?php the_content(); ?>
            </div>

            <footer class="mt-12 pt-8 border-t border-gray-200">
                <div class="flex flex-wrap gap-2 mb-8">
                    <?php the_tags('<span class="bg-gray-200 px-3 py-1 rounded text-sm text-gray-700">#', '</span> <span class="bg-gray-200 px-3 py-1 rounded text-sm text-gray-700">#', '</span>'); ?>
                </div>

                <div class="flex items-center space-x-4">
                    <span class="font-bold text-gray-700">শেয়ার করুন:</span>

                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>"
                        target="_blank"
                        class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>

                    <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>"
                        target="_blank"
                        class="w-10 h-10 bg-sky-500 text-white rounded-full flex items-center justify-center hover:bg-sky-600 transition">
                        <i class="fab fa-twitter"></i>
                    </a>

                    <a href="https://wa.me/?text=<?php echo urlencode(get_the_title() . ' - ' . get_permalink()); ?>"
                        target="_blank"
                        class="w-10 h-10 bg-green-500 text-white rounded-full flex items-center justify-center hover:bg-green-600 transition">
                        <i class="fab fa-whatsapp"></i>
                    </a>

                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>"
                        target="_blank"
                        class="w-10 h-10 bg-blue-800 text-white rounded-full flex items-center justify-center hover:bg-blue-900 transition">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </footer>
    <?php endwhile;
    endif; ?>
</main>
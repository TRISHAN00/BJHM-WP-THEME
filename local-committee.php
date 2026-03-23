<?php

/**
 * Template Name: Committee
 */

get_header(); ?>

<?php get_template_part('template-parts/sections/inner', 'banner'); ?>

<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-6xl">

        <div id="local-section" class="committee-section space-y-12">
            <div class="flex flex-wrap justify-center gap-3 mb-10">
                <button data-group="all" class="group-btn active-group px-6 py-2 rounded-full border-2 border-[#ff7722] bg-[#ff7722] text-white font-bold transition-all">
                    All
                </button>
                <?php
                $terms = get_terms(array(
                    'taxonomy'   => 'committee_group',
                    'hide_empty' => true,
                ));

                if (!empty($terms) && !is_wp_error($terms)) :
                    foreach ($terms as $term) : ?>
                        <button data-group="<?php echo esc_attr($term->slug); ?>"
                            class="group-btn px-6 py-2 rounded-full border-2 border-gray-300 text-gray-600 hover:border-[#ff7722] hover:text-[#ff7722] font-bold transition-all">
                            <?php echo esc_html($term->name); ?>
                        </button>
                <?php endforeach;
                endif; ?>
            </div>

            <div id="memberGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                $local_args = array(
                    'post_type'      => 'committee-member',
                    'tax_query'      => array(
                        array(
                            'taxonomy' => 'committee_region',
                            'field'    => 'slug',
                            'terms'    => 'local-committee'
                        )
                    ),
                    'posts_per_page' => -1,
                    'orderby'        => 'menu_order',
                    'order'          => 'ASC'
                );

                $local_query = new WP_Query($local_args);

                if ($local_query->have_posts()) :
                    while ($local_query->have_posts()) : $local_query->the_post();

                        // Fix for the Warning: Get terms safely
                        $groups = get_the_terms(get_the_ID(), 'committee_group');
                        $group_slug = (!empty($groups) && !is_wp_error($groups)) ? $groups[0]->slug : 'no-group';

                        // Initials for Placeholder
                        $title = get_the_title();
                        $initials = mb_substr($title, 0, 1, 'utf-8');

                        // ACF Field
                        $designation = get_field('designation') ?: 'Member';
                ?>

                        <div class="member-card <?php echo esc_attr($group_slug); ?> bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-5 hover:shadow-md transition-shadow">
                            <div class="shrink-0 w-16 h-16 bg-orange-50 text-[#ff7722] rounded-full flex items-center justify-center text-xl font-black border border-orange-100">
                                <?php if (has_post_thumbnail()) :
                                    the_post_thumbnail('thumbnail', ['class' => 'w-full h-full object-cover rounded-full']);
                                else :
                                    echo esc_html($initials);
                                endif; ?>
                            </div>

                            <div class="overflow-hidden">
                                <h4 class="font-bold text-gray-900 text-lg leading-tight truncate"><?php the_title(); ?></h4>
                                <p class="text-xs text-[#ff7722] font-bold uppercase tracking-wider mt-1"><?php echo esc_html($designation); ?></p>
                            </div>
                        </div>

                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <div class="col-span-full text-center py-20 text-gray-400 italic">
                        No members found in this category.
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
</section>

<?php get_footer(); ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const buttons = document.querySelectorAll('.group-btn');
        const cards = document.querySelectorAll('.member-card');

        buttons.forEach(btn => {
            btn.addEventListener('click', () => {
                // Update Button Styles
                buttons.forEach(b => {
                    b.classList.remove('bg-[#ff7722]', 'text-white', 'border-[#ff7722]');
                    b.classList.add('bg-transparent', 'text-gray-600', 'border-gray-300');
                });
                btn.classList.add('bg-[#ff7722]', 'text-white', 'border-[#ff7722]');
                btn.classList.remove('text-gray-600', 'border-gray-300');

                const filter = btn.getAttribute('data-group');

                // Filter Cards with a subtle fade effect
                cards.forEach(card => {
                    card.style.opacity = '0';
                    setTimeout(() => {
                        if (filter === 'all' || card.classList.contains(filter)) {
                            card.style.display = 'flex';
                            setTimeout(() => card.style.opacity = '1', 50);
                        } else {
                            card.style.display = 'none';
                        }
                    }, 200);
                });
            });
        });
    });
</script>
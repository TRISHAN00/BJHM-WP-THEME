<?php

/**
 * Template Name: Blog
 */
get_header();
?>

<!-- Inner Banner -->
<?php get_template_part('template-parts/sections/inner', 'banner'); ?>

<!-- Blog Listing Area -->
<?php get_template_part('template-parts/sections/blog/blog', 'list'); ?>

<?php get_footer(); ?>
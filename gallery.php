<?php

/**
 * Template Name: Gallery
 */
get_header();
?>

<!-- Inner Banner -->
<?php get_template_part('template-parts/sections/inner', 'banner'); ?>


<!-- Gallery -->
<?php get_template_part('template-parts/sections/gallery/gallery', 'list'); ?>

<?php get_footer(); ?>
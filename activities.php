<?php

/**
 * Template Name: Activities
 */
get_header();
?>

<!-- Inner Banner -->
<?php get_template_part('template-parts/sections/inner', 'banner'); ?>

<!-- Activities List -->
<?php get_template_part('template-parts/sections/activities/activities', 'list'); ?>

<!-- Gallery -->
<?php get_template_part('template-parts/sections/activities/gallery'); ?>

<?php get_footer(); ?>
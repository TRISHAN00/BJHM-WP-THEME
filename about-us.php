<?php

/**
 * Template Name: About Us
 */

get_header(); ?>

<?php get_template_part('template-parts/sections/inner', 'banner'); ?>

<!-- About Us  -->
<?php get_template_part('template-parts/sections/about/mission', 'vision'); ?>

<!-- Board of Directors -->
<?php get_template_part('template-parts/sections/about/bod'); ?>

<!-- Our Team -->
<?php get_template_part('template-parts/sections/about/our', 'team'); ?>


<?php get_footer(); ?>
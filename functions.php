<?php

/**
 * HMBD functions and definitions
 */

if (! defined('_S_VERSION')) {
	define('_S_VERSION', '1.0.0');
}

function hmbd_setup()
{
	load_theme_textdomain('hmbd', get_template_directory() . '/languages');
	add_theme_support('automatic-feed-links');
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('custom-logo', [
		'height' => 250,
		'width' => 250,
		'flex-width' => true,
		'flex-height' => true,
	]);
	add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);

	// Register Menu once only
	register_nav_menus([
		'primary-menu' => __('Primary Header Menu', 'hmbd'),
	]);
}
add_action('after_setup_theme', 'hmbd_setup');

function hmbd_scripts()
{
	// 1. Main Stylesheet
	wp_enqueue_style('hmbd-style', get_stylesheet_uri(), [], _S_VERSION);

	// 2. Tailwind (Load in head to prevent FOUC)
	wp_enqueue_script('tailwind', 'https://cdn.tailwindcss.com', [], null, false);

	// 3. Libraries
	wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', [], '6.4.0');
	wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', [], '11');
	wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], '11', true);

	// 4. LightGallery (Ensure these paths exist in your theme folder)
	wp_enqueue_style('lightgallery', get_template_directory_uri() . '/assets/lib/lightgallery/css/lightgallery-bundle.css', [], _S_VERSION);
	wp_enqueue_script('lightgallery', get_template_directory_uri() . '/assets/lib/lightgallery/lightgallery.umd.js', [], _S_VERSION, true);

	// 5. Custom Theme Script
	// Added 'swiper' and 'lightgallery' as dependencies so they load first
	wp_enqueue_script('hmbd-script', get_template_directory_uri() . '/assets/js/script.js', ['swiper', 'lightgallery'], _S_VERSION, true);
}
add_action('wp_enqueue_scripts', 'hmbd_scripts');

// Clean Menu Class Filter
add_filter('nav_menu_link_attributes', function ($atts, $item, $args) {
	if ($args->theme_location == 'primary-menu') {
		$atts['class'] = 'hover:text-black transition uppercase tracking-widest font-bold text-[11px]';
	}
	return $atts;
}, 10, 3);


add_filter('nav_menu_link_attributes', 'add_footer_menu_classes', 10, 3);
function add_footer_menu_classes($atts, $item, $args)
{
	if ($args->theme_location == 'footer-menu') {
		// Appends classes without overwriting existing ones
		$atts['class'] = ($atts['class'] ?? '') . ' transition duration-300 hover:text-[#ff7722]';
	}
	return $atts;
}

// Include sub-files
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';

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

	// 2. Tailwind
	wp_enqueue_script('tailwind', 'https://cdn.tailwindcss.com', [], null, false);

	// 3. Libraries
	wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', [], '6.4.0');
	wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', [], '11');
	wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], '11', true);

	// 4. LightGallery (সঠিক প্লাগইনগুলোসহ)
	wp_enqueue_style('lightgallery', get_template_directory_uri() . '/assets/lib/lightgallery/css/lightgallery-bundle.css', [], _S_VERSION);

	// মেইন লাইব্রেরি
	wp_enqueue_script('lightgallery', get_template_directory_uri() . '/assets/lib/lightgallery/lightgallery.umd.js', [], _S_VERSION, true);

	// ভিডিও প্লাগইন (এটি মিসিং ছিল)
	wp_enqueue_script('lg-video', get_template_directory_uri() . '/assets/lib/lightgallery/plugins/video/lg-video.min.js', ['lightgallery'], _S_VERSION, true);

	// থাম্বনেইল ও জুম প্লাগইন (ঐচ্ছিক কিন্তু সাজেস্টেড)
	wp_enqueue_script('lg-thumbnail', get_template_directory_uri() . '/assets/lib/lightgallery/plugins/thumbnail/lg-thumbnail.min.js', ['lightgallery'], _S_VERSION, true);
	wp_enqueue_script('lg-zoom', get_template_directory_uri() . '/assets/lib/lightgallery/plugins/zoom/lg-zoom.min.js', ['lightgallery'], _S_VERSION, true);

	// 5. Custom Theme Script
	// এখন 'lg-video' এবং অন্যান্যগুলোকে ডিপেন্ডেন্সি হিসেবে যুক্ত করা হয়েছে
	wp_enqueue_script('hmbd-script', get_template_directory_uri() . '/assets/js/script.js', ['swiper', 'lightgallery', 'lg-video', 'lg-thumbnail', 'lg-zoom'], _S_VERSION, true);
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


function mytheme_customize_register($wp_customize)
{
	// ১. সেকশন যোগ করা
	$wp_customize->add_section('top_bar_section', array(
		'title'    => __('Top Bar Settings', 'mytheme'),
		'priority' => 30,
	));

	// ২. হেল্পার ফাংশন (সেকশন আইডি top_bar_section দিয়ে আপডেট করা হয়েছে)
	function add_topbar_setting($wp_customize, $id, $label, $default = '')
	{
		$wp_customize->add_setting($id, array(
			'default'           => $default,
			'sanitize_callback' => 'sanitize_text_field'
		));
		$wp_customize->add_control($id, array(
			'label'   => $label,
			'section' => 'top_bar_section',
			'type'    => 'text'
		));
	}

	// ৩. রেজিস্টার ফিল্ডস
	add_topbar_setting($wp_customize, 'topbar_phone', 'Phone Number', '');
	add_topbar_setting($wp_customize, 'topbar_email', 'Email Address', '');
	add_topbar_setting($wp_customize, 'topbar_reg_no', 'Registration Number', '');
	add_topbar_setting($wp_customize, 'location', 'Location', '');
	add_topbar_setting($wp_customize, 'map_location', 'Map Location', '');

	// ৪. সোশ্যাল লিঙ্কসমূহ
	add_topbar_setting($wp_customize, 'facebook_url', 'Facebook URL', '#');
	add_topbar_setting($wp_customize, 'twitter_url', 'Twitter URL', '#');
	add_topbar_setting($wp_customize, 'youtube_url', 'YouTube URL', '#');
	add_topbar_setting($wp_customize, 'whatsapp_url', 'WhatsApp URL', '#');

	// ৫. মেসেঞ্জার লিঙ্ক (ইউআরএল ফিল্ড)
	$wp_customize->add_setting('messenger_link', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('messenger_link', array(
		'label'   => 'Messenger Profile URL',
		'section' => 'top_bar_section',
		'type'    => 'url'
	));
}
add_action('customize_register', 'mytheme_customize_register');

// Add a custom class to CF7 when it's sent successfully
add_filter('wpcf7_form_class_attr', 'custom_cf7_form_class');
function custom_cf7_form_class($class)
{
	$class .= ' donation-form-style';
	return $class;
}


add_filter('wpcf7_autop_or_not', '__return_false');


if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title'    => 'Footer Settings',
		'menu_title'    => 'Footer Settings',
		'menu_slug'     => 'footer-settings',
		'capability'    => 'edit_posts',
		'redirect'      => false
	));
}


function register_my_menus()
{
	register_nav_menus(
		array(
			'footer-menu-1' => __('Footer Menu 1'),
			'footer-menu-2' => __('Footer Menu 2')
		)
	);
}
add_action('init', 'register_my_menus');

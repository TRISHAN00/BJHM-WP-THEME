<?php
$popup_args = array(
	'post_type'      => 'events',
	'posts_per_page' => 1,
	'post_status'    => 'publish'
);
$popup_query = new WP_Query($popup_args);

if ($popup_query->have_posts()) :
	while ($popup_query->have_posts()) : $popup_query->the_post();
?>
		<div id="minimalPopup" class="fixed inset-0 z-[9999] hidden flex items-center justify-center bg-black/90 backdrop-blur-md transition-all duration-500">

			<div id="minimalContent" class="relative max-w-[90vw] md:max-w-4xl shadow-2xl opacity-0 translate-y-10 transition-all duration-700 ease-out border border-white/10 group">

				<a href="<?php the_permalink(); ?>" class="block relative overflow-hidden">
					<?php if (has_post_thumbnail()) : ?>
						<?php the_post_thumbnail('full', ['class' => 'w-full h-auto block']); ?>
					<?php endif; ?>
				</a>

				<button id="minimalClose" class="absolute -bottom-10 left-1/2 -translate-x-1/2 text-gray-400 hover:text-white text-[10px] font-black uppercase tracking-[0.4em] transition-all py-2">
					[ Close Window ]
				</button>
			</div>
		</div>
<?php
	endwhile;
	wp_reset_postdata();
endif;
?>

<footer class="bg-[#1a1a1a] text-white pt-24 pb-8 relative overflow-hidden">

	<div class="absolute top-0 right-0 opacity-[0.03] pointer-events-none transform translate-x-1/4 -translate-y-1/4 animate-float">
		<i class="fas fa-om text-[500px]"></i>
	</div>

	<div class="container mx-auto px-6 lg:px-12 relative z-10">
		<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-10 md:mb-20 lg:mb-20 bg-[#252525] p-4 lg:p-8 rounded-3xl border border-white/5 shadow-2xl">
			<?php
			$footer_contacts = [
				['icon' => 'fas fa-phone-alt', 'title' => 'Call Us Anytime', 'val' => get_theme_mod('topbar_phone', '+880 123-456-7890')],
				['icon' => 'fas fa-envelope-open', 'title' => 'Email Support', 'val' => get_theme_mod('topbar_email', 'info@hindumahajote.org')],
				['icon' => 'fas fa-map-marked-alt', 'title' => 'Our Location', 'val' => get_theme_mod('location', '123 Main Street, Dhaka')]
			];
			foreach ($footer_contacts as $item) : ?>
				<div class="flex items-center gap-2 border-b lg:border-b-0 lg:border-r border-white/10 pb-6 lg:pb-0 last:border-0">
					<div class="w-12 h-12 bg-[#ff7722]/10 rounded-full flex items-center justify-center text-[#ff7722] text-xl">
						<i class="<?php echo $item['icon']; ?>"></i>
					</div>
					<div class="min-w-0 flex-1">
						<p class="text-[10px] md:text-xs text-gray-500 uppercase tracking-[0.2em] mb-1 truncate">
							<?php echo esc_html($item['title']); ?>
						</p>

						<p class="text-base md:text-lg font-bold text-gray-200 break-words leading-tight tracking-wide">
							<?php echo esc_html($item['val']); ?>
						</p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 md:mb-20 lg:mb-20">
			<div class="space-y-6">
				<div class=" hidden md:flex lg:flex bg-white rounded-full item-center justify-center w-[100px] lg:w-[180px] ">
					<?php
					if (has_custom_logo()) {
						the_custom_logo();
					} else { ?>
						<a href="<?php echo home_url(); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/logo.png"
								alt="<?php echo get_bloginfo('name'); ?>"
								class="h-12 w-auto object-contain">
						</a>
					<?php } ?>
				</div>
				<p class="text-gray-400 text-sm leading-relaxed"><?php echo get_bloginfo('description'); ?></p>
				<div class="flex gap-0"> <?php
											$social_links = [
												['icon' => 'facebook-f', 'url' => get_theme_mod('facebook_url', '#')],
												['icon' => 'twitter',    'url' => get_theme_mod('twitter_url', '#')],
												['icon' => 'instagram',  'url' => get_theme_mod('instagram_url', '#')],
												['icon' => 'youtube',    'url' => get_theme_mod('youtube_url', '#')]
											];

											foreach ($social_links as $social) : ?>
						<a href="<?php echo esc_url($social['url']); ?>"
							target="_blank"
							class="w-10 h-10 bg-white/5 border border-white/10 border-r-0 last:border-r flex items-center justify-center text-gray-400 hover:bg-[#ff7722] hover:text-white transition-all">
							<i class="fab fa-<?php echo esc_attr($social['icon']); ?>"></i>
						</a>
					<?php endforeach; ?>
				</div>
			</div>

			<div>
				<h4 class="footer-title">Quick Links</h4>
				<div class="footer-menu-links">
					<?php wp_nav_menu([
						'theme_location' => 'footer-menu-1',
						'container'      => false,
						'menu_class'     => 'space-y-4'
					]); ?>
				</div>
			</div>

			<div>
				<h4 class="footer-title">More Links</h4>
				<div class="footer-menu-links">
					<?php wp_nav_menu([
						'theme_location' => 'footer-menu-2',
						'container'      => false,
						'menu_class'     => 'space-y-4'
					]); ?>
				</div>
			</div>



			<div>
				<h4 class="footer-title">Legal Identity</h4>
				<div class="bg-white/5 p-6 rounded-2xl border border-white/10">
					<p class="text-xs text-gray-500 uppercase font-bold tracking-widest mb-3">Govt Registration</p>
					<p class="text-lg font-mono font-bold text-[#ff7722] ">
						<?php echo esc_html(get_theme_mod('topbar_reg_no', 'C-R-A17485')); ?>
					</p>
				</div>
			</div>
		</div>

		<div class="border-t border-white/5 pt-10 flex flex-col md:flex-row justify-between items-center gap-6">
			<p class="text-gray-500 text-[11px] uppercase tracking-widest">
				&copy; <?php echo date('Y'); ?> Bangladesh Hindu Mahajote. All Rights Reserved.
			</p>

			<div class="flex items-center gap-8 text-[11px] font-bold uppercase tracking-widest">


				<a href="https://www.buildifyn.com/" target="_blank" class="text-gray-500 hover:text-[#ff7722] transition-colors group">
					Designed & Developed by <span class="text-gray-300 group-hover:text-[#ff7722]">Buildifyn</span>
				</a>
			</div>
		</div>
	</div>
</footer>

<style>
	/* Floating Animation (Infinite Up and Down) */
	@keyframes float-animation {
		0% {
			transform: translateY(0px);
			opacity: 0.03;
		}

		50% {
			transform: translateY(-30px);
			opacity: 0.06;
		}

		100% {
			transform: translateY(0px);
			opacity: 0.03;
		}
	}

	.animate-float {
		animation: float-animation 6s ease-in-out infinite;
	}

	/* Titles */
	.footer-title {
		color: #fff;
		font-size: 14px;
		font-weight: 900;
		text-transform: uppercase;
		letter-spacing: 3px;
		margin-bottom: 30px;
		position: relative;
	}

	.footer-title::after {
		content: '';
		position: absolute;
		bottom: -10px;
		left: 0;
		width: 30px;
		height: 2px;
		background: #ff7722;
	}

	/* Links */
	.footer-menu-links ul li a {
		color: #9ca3af !important;
		font-size: 14px;
		transition: all 0.3s ease;
		display: block;
	}

	.footer-menu-links ul li a:hover {
		color: #ff7722 !important;
		transform: translateX(5px);
	}
</style>


<script>
	/**
	 * Event Popup Management
	 * Displayed once per session after 2 seconds
	 */
	document.addEventListener('DOMContentLoaded', function() {
		const popup = document.getElementById('minimalPopup');
		const content = document.getElementById('minimalContent');
		const closeBtn = document.getElementById('minimalClose');

		if (popup && content) {
			// Show after 1.5 seconds for a snappy feel
			setTimeout(() => {
				if (!sessionStorage.getItem('minimalPopupSeen')) {
					popup.classList.remove('hidden');
					popup.classList.add('flex');

					// Trigger smooth entry animation
					setTimeout(() => {
						content.classList.remove('opacity-0', 'translate-y-10');
						content.classList.add('opacity-100', 'translate-y-0');
					}, 50);
				}
			}, 1500);

			const closePopup = () => {
				content.classList.add('opacity-0', 'translate-y-10');
				setTimeout(() => {
					popup.classList.add('hidden');
					sessionStorage.setItem('minimalPopupSeen', 'true');
				}, 500);
			};

			// Close on text click
			closeBtn.addEventListener('click', closePopup);

			// Close on clicking the dark background
			popup.addEventListener('click', (e) => {
				if (e.target === popup) closePopup();
			});

			// Close on Escape key
			document.addEventListener('keydown', (e) => {
				if (e.key === "Escape") closePopup();
			});
		}
	});
</script>
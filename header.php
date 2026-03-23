<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>

	<style>
		:root {
			--brand-orange: #ff7722;
			--brand-dark: #334155;
			--brand-light: #f8fafc;
			--top-bar-bg: #1e293b;
		}

		/* Top Bar Styling */
		.top-bar {
			background: var(--top-bar-bg);
			color: rgba(255, 255, 255, 0.9);
			font-size: 13px;
			padding: 8px 0;
			border-bottom: 1px solid rgba(255, 255, 255, 0.1);
		}

		.top-bar a {
			transition: color 0.3s ease;
		}

		.top-bar a:hover {
			color: var(--brand-orange);
		}

		/* Main Header Base */
		#mainHeader {
			position: fixed;
			top: 0;
			width: 100%;
			z-index: 1000;
			transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
			background: #ffffff;
			box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
		}

		.header-hidden {
			transform: translateY(-100%);
		}

		/* Active Menu & Hover Logic */
		.menu li a {
			position: relative;
			font-size: 13px;
			font-weight: 600;
			color: var(--brand-dark) !important;
			padding: 10px 0;
			transition: all 0.3s ease;

			/* Normal desktop :992px. */
			@media (min-width: 992px) and (max-width: 1200px) {
				font-size: 11px;

			}
		}

		/* Hover & Active State Border */
		.menu li a::after {
			content: '';
			position: absolute;
			bottom: 0;
			left: 0;
			width: 0;
			height: 2.5px;
			background: var(--brand-orange);
			transition: width 0.3s ease;
			border-radius: 20px;
		}

		/* Implementation for Hover and ACTIVE page */
		.menu li a:hover::after,
		.menu li.current-menu-item>a::after,
		.menu li.current_page_item>a::after {
			width: 100%;
		}

		.menu li a:hover,
		.menu li.current-menu-item>a,
		.menu li.current_page_item>a {
			color: var(--brand-orange) !important;
		}

		/* Button Styles */
		.btn-base {
			padding: 10px 24px;
			border-radius: 9999px;
			font-size: 12px;
			font-weight: 800;
			text-transform: uppercase;
			letter-spacing: 0.05em;
			transition: all 0.3s ease;
			display: inline-block;
		}

		.btn-reg {
			border: 1.5px solid var(--brand-dark);
			color: var(--brand-dark);
		}

		.btn-reg:hover {
			background: var(--brand-dark);
			color: #fff;
		}

		.btn-donate {
			background: var(--brand-orange);
			color: #fff;
		}

		.btn-donate:hover {
			background: #e66a1f;
			transform: translateY(-2px);
		}

		/* Mobile Sidebar Smoothness */
		#mobileSidebar {
			position: fixed;
			top: 0;
			right: -100%;
			width: 320px;
			height: 100vh;
			background: #473f3a;
			z-index: 2000;
			padding: 40px 30px;
			transition: right 0.5s cubic-bezier(0.65, 0.05, 0.36, 1);
			display: flex;
			flex-direction: column;
			overflow-y: auto;
		}

		#mobileSidebar.active {
			right: 0;
		}

		/* Mobile Menu Active State */
		#mobileSidebar .menu li.current-menu-item>a {
			background: rgba(255, 255, 255, 0.15);
			padding-left: 15px;
			border-radius: 8px;
		}

		#sidebarOverlay {
			backdrop-filter: blur(5px);
		}

		/* সাইডবারের ভেতরে মেনু আইটেমগুলোর জন্য স্পেশাল ডিজাইন */
		.custom-mobile-menu li {
			list-style: none;
			margin: 0;
		}

		.custom-mobile-menu li a {
			position: relative;
			display: flex !important;
			align-items: center;
			padding: 12px 16px !important;
			color: rgba(255, 255, 255, 0.85) !important;
			font-weight: 700 !important;
			font-size: 16px !important;
			border-radius: 12px;
			transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
			background: transparent;
		}

		.custom-mobile-menu li a:hover,
		.custom-mobile-menu li.current-menu-item>a {
			color: #ffffff !important;
			background: rgba(255, 255, 255, 0.15);
			padding-left: 24px !important;
			/* স্লাইড ইফেক্ট */
		}

		/* এক্টিভ মেনুর জন্য বাম পাশে ছোট ইন্ডিকেটর */
		.custom-mobile-menu li.current-menu-item>a::before {
			content: '';
			position: absolute;
			left: 8px;
			width: 4px;
			height: 20px;
			background: #ffffff;
			border-radius: 10px;
		}
	</style>
</head>

<body <?php body_class(); ?>>

	<header id="mainHeader">
		<div class="top-bar hidden md:block" style="color: #FFFEEE;">
			<div class="container mx-auto px-6 lg:px-12 flex justify-between items-center">

				<div class="flex gap-6">
					<?php if ($phone = get_theme_mod('topbar_phone')) : ?>
						<a href="tel:<?php echo esc_attr($phone); ?>" class="flex items-center gap-2 hover:opacity-80 transition-opacity" style="color: #FFFEEE;">
							<i class="fas fa-phone-alt text-orange-400"></i>
							<?php echo esc_html($phone); ?>
						</a>
					<?php endif; ?>

					<?php if ($email = get_theme_mod('topbar_email')) : ?>
						<a href="mailto:<?php echo esc_attr($email); ?>" class="flex items-center gap-2 hover:opacity-80 transition-opacity" style="color: #FFFEEE;">
							<i class="fas fa-envelope text-orange-400"></i>
							<?php echo esc_html($email); ?>
						</a>
					<?php endif; ?>

					<?php if ($reg_no = get_theme_mod('topbar_reg_no')) : ?>
						<span class="bg-white/10 px-3 py-0.5 rounded text-[11px] font-bold tracking-tight border border-white/10 uppercase" style="color: #FFFEEE;">
							Reg No: <?php echo esc_html($reg_no); ?>
						</span>
					<?php endif; ?>
				</div>

				<div class="flex gap-4 text-base">
					<?php if ($fb_url = get_theme_mod('facebook_url')) : ?>
						<a href="<?php echo esc_url($fb_url); ?>" target="_blank" rel="noopener noreferrer">
							<i class="fab fa-facebook-f text-[#FFFEEE]"></i>
						</a>
					<?php endif; ?>

					<?php if ($tw_url = get_theme_mod('twitter_url')) : ?>
						<a href="<?php echo esc_url($tw_url); ?>" target="_blank" rel="noopener noreferrer">
							<i class="fab fa-twitter text-[#FFFEEE]"></i>
						</a>
					<?php endif; ?>

					<?php if ($yt_url = get_theme_mod('youtube_url')) : ?>
						<a href="<?php echo esc_url($yt_url); ?>" target="_blank" rel="noopener noreferrer">
							<i class="fab fa-youtube text-[#FFFEEE]"></i>
						</a>
					<?php endif; ?>

					<?php if ($wa_url = get_theme_mod('whatsapp_url')) : ?>
						<a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener noreferrer">
							<i class="fab fa-whatsapp visited:text-[#FFFEEE] text-[#FFFEEE]"></i>
						</a>
					<?php endif; ?>
				</div>

			</div>
		</div>

		<nav class="px-6 lg:px-12 py-3">
			<div class="container mx-auto flex justify-between items-center">
				<div class="w-[80px] md:w-[100px]">
					<?php if (has_custom_logo()) {
						the_custom_logo();
					} ?>
				</div>

				<div class="hidden lg:flex items-center gap-10">
					<?php wp_nav_menu([
						'theme_location' => 'primary-menu',
						'container' => false,
						'menu_class' => 'flex gap-4 menu'
					]); ?>
				</div>

				<div class="hidden lg:flex items-center gap-4">


					<a href="<?php echo esc_url(home_url('/registration')); ?>" class="btn-common-main group relative inline-flex items-center justify-center px-3 py-4 font-black text-[11px] uppercase tracking-[0.2em] text-[#1E293B] transition-all duration-500 border-2 border-[#1E293B] hover:border-[#ff7722] rounded-full overflow-hidden  hover:text-[#FFFEEE]">

						<span class="absolute inset-0 w-0 bg-[#ff7722] transition-all duration-500 ease-out group-hover:w-full"></span>

						<span class="relative z-10 flex items-center gap-3">
							Registration

						</span>
					</a>


					<a href="<?php echo esc_url(home_url('/donation')); ?>" class="btn-common-main group relative inline-flex items-center justify-center px-3 py-4 font-black bg-[#ff7722] text-[11px] uppercase tracking-[0.2em] text-[#ff7722] transition-all duration-500 border-2 border-[#ff7722] rounded-full overflow-hidden  hover:text-[#FFFEEE] hover:border-[#1E293B]">

						<span class="absolute inset-0 w-0 bg-[#1E293B]  transition-all duration-500 ease-out group-hover:w-full"></span>

						<span class="relative z-10 flex items-center gap-3 text-[#FFFEEE] ">
							Donate Now

						</span>
					</a>

				</div>

				<button id="menuOpen" class="lg:hidden text-3xl text-slate-800 flex"><i class="fas fa-bars"></i></button>
			</div>
		</nav>
	</header>

	<div class="fixed bottom-6 right-6 z-[9999] flex flex-col gap-4">
		<?php
		$messenger = get_theme_mod('messenger_link');
		$phone     = get_theme_mod('topbar_phone');
		$whatsapp  = preg_replace('/[^0-9]/', '', $phone);
		?>

		<?php if (!empty($messenger)) : ?>
			<a href="<?php echo esc_url($messenger); ?>" target="_blank" class="w-14 h-14 bg-blue-600 text-white rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition">
				<i class="fab fa-facebook-messenger text-2xl text-[#FFFEEE]"></i>
			</a>
		<?php endif; ?>

		<?php if (!empty($whatsapp)) : ?>
			<a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>" target="_blank" class="w-14 h-14 bg-green-500 text-white rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition">
				<i class="fab fa-whatsapp text-2xl text-[#FFFEEE]"></i>
			</a>
		<?php endif; ?>
	</div>

	<div id="sidebarOverlay" class="fixed inset-0 bg-black/60 z-[1999] opacity-0 pointer-events-none hidden transition-opacity duration-300"></div>

	<aside id="mobileSidebar" class="flex flex-col shadow-2xl overflow-hidden">
		<div class="flex justify-between items-center mb-10">
			<div class="flex items-center gap-3">
				<div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center backdrop-blur-md">
					<i class="fas fa-om text-[#FFFEEE] text-xl"></i>
				</div>
				<span class="text-[#FFFEEE] font-black tracking-tighter text-lg uppercase">Menu</span>
			</div>
			<button id="menuClose" class="w-12 h-12 flex items-center justify-center rounded-full bg-black/10 text-[#FFFEEE] hover:bg-white/20 transition-all active:scale-90">
				<i class="fas fa-times text-2xl"></i>
			</button>
		</div>

		<div class="flex-grow">
			<nav class="mobile-nav-wrapper">
				<?php
				wp_nav_menu([
					'theme_location' => 'primary-menu',
					'container'      => false,
					'menu_class'     => 'flex flex-col gap-2 custom-mobile-menu'
				]);
				?>
			</nav>
		</div>

		<div class="mt-auto pt-8 border-t border-white/10">
			<div class="mb-6 group">

				<p class="text-[13px] text-[#FFFEEE] font-medium opacity-90 pl-1">
					Reg No: <span class="font-mono">C-R-A17485</span>
				</p>
			</div>

			<div class="flex flex-col gap-3">
				<a href="<?php echo esc_url(home_url('/registration')); ?>" class="group relative w-full py-4 rounded-2xl border border-white/20 text-[#FFFEEE] font-bold text-center uppercase text-xs tracking-widest overflow-hidden transition-all hover:bg-white/10">
					<span class="relative z-10 flex items-center justify-center gap-2">
						<i class="fas fa-user-plus text-[10px]"></i> Registration
					</span>
				</a>



				<a href="<?php echo esc_url(home_url('/donation')); ?>" class="group relative inline-flex items-center justify-center px-10 py-4 font-black text-[11px] uppercase tracking-[0.2em] text-[#FFFEEE] transition-all duration-500 bg-[#ff7722] rounded-xl overflow-hidden shadow-lg hover:shadow-[#ff7722]/40 active:scale-95">

					<span class="absolute inset-0 bg-white-900 scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-center ease-out"></span>

					<span class="relative z-10 flex items-center gap-3 text-[#FFFEEE]">
						Donate Now
						<i class="fas fa-plus text-[10px] transition-transform duration-500 group-hover:rotate-180"></i>
					</span>

					<div class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
				</a>
			</div>
		</div>
	</aside>

	<script>
		const sidebar = document.getElementById('mobileSidebar');
		const overlay = document.getElementById('sidebarOverlay');
		const header = document.getElementById('mainHeader');
		let lastScroll = 0;

		function toggleMenu(show) {
			if (show) {
				overlay.classList.remove('hidden');
				setTimeout(() => {
					sidebar.classList.add('active');
					overlay.style.opacity = '1';
					overlay.style.pointerEvents = 'auto';
				}, 10);
				document.body.style.overflow = 'hidden';
			} else {
				sidebar.classList.remove('active');
				overlay.style.opacity = '0';
				overlay.style.pointerEvents = 'none';
				setTimeout(() => {
					overlay.classList.add('hidden');
				}, 400);
				document.body.style.overflow = 'auto';
			}
		}

		document.getElementById('menuOpen').onclick = () => toggleMenu(true);
		document.getElementById('menuClose').onclick = () => toggleMenu(false);
		overlay.onclick = () => toggleMenu(false);

		window.addEventListener('scroll', () => {
			const currentScroll = window.pageYOffset;
			if (currentScroll > 150) {
				header.classList.toggle('header-hidden', currentScroll > lastScroll);
			} else {
				header.classList.remove('header-hidden');
			}
			lastScroll = currentScroll;
		});
	</script>
	<?php wp_footer(); ?>
</body>

</html>
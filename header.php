<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php wp_head(); ?>
	<style>
		/* Header Scroll Logic */
		#mainHeader {
			position: fixed;
			top: 0;
			width: 100%;
			z-index: 1000;
			transition: transform 0.4s ease;
		}

		.header-hidden {
			transform: translateY(-100%);
		}

		a.custom-logo-link {
			width: 100px;
			background: white;
			border-radius: 100%;

			/* small mobile :320px. */
			@media (max-width: 767px) {
				width: 80px;

			}
		}

		/* Menu Hover Effects */
		.menu li a {
			transition: all 0.3s ease;
			padding-bottom: 4px;
			border-bottom: 2px solid transparent;
			font-size: 16px;
			color: #FFFEEE;


		}

		.menu li a:hover {
			color: #222 !important;
			border-bottom: 2px solid #222;
		}

		.current-menu-item>a {
			color: #222 !important;
			border-bottom: 2px solid #222 !important;
		}

		/* Sidebar Overlay */
		#mobileSidebar {
			transition: right 0.5s cubic-bezier(0.77, 0, 0.175, 1);
		}

		.nav-saffron {
			background-color: #ff7722;
		}
	</style>
</head>

<body <?php body_class(); ?>>

	<header id="mainHeader" class="nav-saffron shadow-xl">
		<nav class="px-6 lg:px-12 py-2 flex  text-[#FFFEEE]">
			<div class="container flex  justify-between items-center m-auto">
				<div class="w-[80px]">
					<?php
					if (has_custom_logo()) {
						// This outputs only the logo image wrapped in the WP-generated link
						the_custom_logo();
					} else {
						// Fallback if no logo is set
						echo '<a href="' . esc_url(home_url('/')) . '" class="flex justify-start h-20"></a>';
					}
					?>
				</div>

				<div class="hidden lg:flex items-center gap-8">
					<?php wp_nav_menu(['theme_location' => 'primary-menu', 'container' => false, 'menu_class' => 'flex gap-8 menu']); ?>
				</div>

				<div class="hidden lg:flex items-center gap-4">
					<a href="/registration" class="bg-black/10 hover:bg-black/20 border border-white/20 px-8 py-3 rounded-full text-xs font-black uppercase tracking-wider transition">
						Registration
					</a>

					<a href="/donate" class="bg-[#FFFEEE] text-[#ff7722] hover:bg-white px-9 py-3 rounded-full text-xs font-black uppercase tracking-wider shadow-lg transition">
						Donate Now
					</a>
				</div>

				<button id="menuOpen" class="lg:hidden text-2xl"><i class="fas fa-bars"></i></button>
			</div>
		</nav>
	</header>

	<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-[1999] hidden"></div>

	<div id="mobileSidebar" class="fixed inset-y-0 right-[-100%] w-72 bg-[#ff7722] z-[2000] p-10 text-[#FFFEEE] shadow-2xl flex flex-col gap-8">
		<button id="menuClose" class="text-2xl w-10 h-10"><i class="fas fa-times"></i></button>
		<div class="flex flex-col gap-6 text-xl font-bold uppercase tracking-widest menu">
			<?php wp_nav_menu(['theme_location' => 'primary-menu', 'container' => false]); ?>
			<hr class="border-white/20">
			<div class="hidden flex-col items-center gap-4">
				<a href="/registration" class="bg-black/10 hover:bg-black/20 border border-white/20 px-8 py-3 rounded-full text-xs font-black uppercase tracking-wider transition">
					Registration
				</a>

				<a href="/donate" class="bg-[#FFFEEE] text-[#ff7722] hover:bg-white px-9 py-3 rounded-full text-xs font-black uppercase tracking-wider shadow-lg transition">
					Donate Now
				</a>
			</div>
		</div>
	</div>

	<script>
		const sidebar = document.getElementById('mobileSidebar');
		const overlay = document.getElementById('sidebarOverlay');
		const header = document.getElementById('mainHeader');
		let lastScroll = 0;

		function toggleMenu(show) {
			sidebar.style.right = show ? '0' : '-100%';
			overlay.classList.toggle('hidden', !show);
			document.body.style.overflow = show ? 'hidden' : 'auto';
		}

		document.getElementById('menuOpen').onclick = () => toggleMenu(true);
		document.getElementById('menuClose').onclick = () => toggleMenu(false);
		overlay.onclick = () => toggleMenu(false);

		window.addEventListener('scroll', () => {
			let currentScroll = window.pageYOffset;
			if (currentScroll > 100) {
				header.classList.toggle('header-hidden', currentScroll > lastScroll);
			}
			lastScroll = currentScroll;
		});
	</script>
	<?php wp_footer(); ?>
</body>

</html>
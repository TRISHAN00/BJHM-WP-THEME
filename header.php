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
			transition: transform 0.4s ease, background 0.3s ease;
			background: #ffffff;
			/* সাদা ব্যাকগ্রাউন্ড */
			box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
		}

		.header-hidden {
			transform: translateY(-100%);
		}

		a.custom-logo-link {
			width: 100px;
			border-radius: 100%;

			/* small mobile :320px. */
			@media (max-width: 767px) {
				width: 60px;

			}

		}

		.menu li a {
			transition: all 0.3s ease;
			padding-bottom: 4px;
			border-bottom: 2px solid transparent;
			font-size: 16px;
			color: #334155 !important;
		}

		.menu li a:hover {
			color: #ff7722 !important;
			/* হোভার করলে আপনার ব্র্যান্ড কালার */
			border-bottom: 2px solid #ff7722;
		}

		.current-menu-item>a {
			color: #ff7722;
			border-bottom: 2px solid #ff7722 !important;
		}

		/* বাটনের ডিজাইন */
		.btn-reg {
			border: 1px solid #334155;
			color: #334155;
		}

		.btn-reg:hover {
			background: #334155;
			color: #ffffff;
		}

		.btn-donate {
			background: #ff7722;
			color: #ffffff;
		}

		.btn-donate:hover {
			background: #e66a1f;
		}

		/* মোবাইল সাইডবারকে স্মুথ করার জন্য */
		#mobileSidebar {
			transition: right 0.4s cubic-bezier(0.4, 0, 0.2, 1);
			/* সহজ ট্রানজিশন */
		}

		/* মোবাইল মেনুর জন্য লিঙ্ক কালার */
		#mobileSidebar .menu li a {
			color: #FFFEEE !important;
			border-bottom: none !important;
			padding: 10px 0;
			display: block;
		}

		/* বাটনগুলোর জন্য মোবাইল ভিউ */
		.mobile-btn-container {
			display: flex !important;
			/* লুকানো অবস্থা থেকে দেখা যাবে */
			flex-direction: column;
			gap: 15px;
			margin-top: 20px;
		}
	</style>
</head>

<body <?php body_class(); ?>>

	<header id="mainHeader">
		<nav class="px-6 lg:px-12 py-3 flex">
			<div class="container flex justify-between items-center m-auto">
				<div class="w-[80px]">
					<?php if (has_custom_logo()) {
						the_custom_logo();
					} ?>
				</div>

				<div class="hidden lg:flex items-center gap-8">
					<?php wp_nav_menu(['theme_location' => 'primary-menu', 'container' => false, 'menu_class' => 'flex gap-8 menu']); ?>
				</div>

				<div class="hidden lg:flex items-center gap-4">
					<a href="/registration" class="btn-reg px-8 py-2 rounded-full text-xs font-black uppercase tracking-wider transition">
						Registration
					</a>
					<a href="/donate" class="btn-donate px-9 py-2 rounded-full text-xs font-black uppercase tracking-wider shadow-lg transition">
						Donate Now
					</a>
				</div>

				<button id="menuOpen" class="lg:hidden text-2xl text-slate-800"><i class="fas fa-bars"></i></button>
			</div>
		</nav>
	</header>

	<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-[1999] hidden"></div>

	<div id="mobileSidebar" class="fixed inset-y-0 right-[-100%] w-72 bg-[#ff7722] z-[2000] p-10 text-[#FFFEEE] shadow-2xl flex flex-col gap-8">
		<button id="menuClose" class="text-2xl w-10 h-10"><i class="fas fa-times"></i></button>

		<div class="flex flex-col gap-6 text-xl font-bold uppercase tracking-widest menu">
			<?php wp_nav_menu(['theme_location' => 'primary-menu', 'container' => false]); ?>

			<hr class="border-white/20">

			<div class="mobile-btn-container">
				<a href="/registration" class="bg-black/10 hover:bg-black/20 border border-white/20 px-6 py-3 rounded-full text-xs font-black uppercase tracking-wider text-center transition">
					Registration
				</a>
				<a href="/donate" class="bg-[#FFFEEE] text-[#ff7722] hover:bg-white px-6 py-3 rounded-full text-xs font-black uppercase tracking-wider text-center shadow-lg transition">
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
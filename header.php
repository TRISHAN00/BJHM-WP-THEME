<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body <?php body_class('font-sans'); ?>>
	<?php wp_body_open(); ?>

	<!-- Top Bar -->
	<div class="fixed top-0 w-full z-50 bg-green-900 text-white text-xs sm:text-sm border-b border-orange-500/30">
		<div class="container mx-auto px-4 py-2">
			<div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">

				<div class="flex justify-between gap-2 sm:items-center sm:gap-6">
					<span class="flex items-center gap-2">
						<i class="fas fa-phone text-orange-400"></i>
						<a href="tel:+8801711234567" class="hover:text-orange-400 transition">
							+880 1711-234567
						</a>
					</span>

					<span class="flex items-center gap-2">
						<i class="fas fa-envelope text-orange-400"></i>
						<a href="mailto:info@hindumohajot.org" class="hover:text-orange-400 transition">
							info@hindumohajot.org
						</a>
					</span>

					<span class="hidden lg:flex items-center gap-2 text-gray-300">
						<i class="fas fa-id-card text-orange-400"></i>
						Reg No: C-R A-17485
					</span>
				</div>

				<div class="flex items-center justify-center gap-3 sm:gap-4">
					<span class="hidden sm:inline font-medium">Connect with Mohajot:</span>
					<a href="#" class="hover:text-orange-400 transition"><i class="fab fa-facebook-f"></i></a>
					<a href="#" class="hover:text-orange-400 transition"><i class="fab fa-twitter"></i></a>
					<a href="#" class="hover:text-orange-400 transition"><i class="fab fa-youtube"></i></a>
				</div>

			</div>
		</div>
	</div>

	<!-- HEADER -->
	<header class="fixed top-[36px] w-full z-50 transition-all duration-300">

		<nav class="bg-white/90 backdrop-blur-md border-b border-gray-100 shadow-sm">
			<div class="container mx-auto px-4 py-3">
				<div class="flex items-center justify-between">

					<!-- Logo -->
					<a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-3">
						<?php if (has_custom_logo()) : ?>
							<?php the_custom_logo(); ?>
						<?php else : ?>
							<img src="<?php echo get_template_directory_uri(); ?>/assets/logo.png"
								class="h-16 w-16 md:h-20 md:w-20 object-contain"
								alt="<?php bloginfo('name'); ?>">
						<?php endif; ?>

						<div class="hidden xl:block">
							<h1 class="text-green-900 font-black text-lg leading-none">
								<?php bloginfo('name'); ?>
							</h1>
							<p class="text-[10px] text-orange-600 font-bold uppercase tracking-tight">
								<?php bloginfo('description'); ?>
							</p>
						</div>
					</a>

					<!-- Desktop Menu -->
					<div class="hidden lg:flex items-center gap-2">
						<?php
						wp_nav_menu([
							'theme_location' => 'primary-menu',
							'container'      => false,
							'menu_class'     => 'flex items-center gap-2',
							'link_before'    => '<span class="px-4 py-2 text-gray-700 font-bold rounded-lg hover:bg-green-50 hover:text-green-900 transition">',
							'link_after'     => '</span>',
						]);
						?>
					</div>

					<!-- Buttons -->
					<div class="hidden lg:flex items-center gap-3">
						<button class="px-5 py-2.5 rounded-full border-2 border-green-900 text-green-900 font-bold hover:bg-green-900 hover:text-white transition">
							<i class="fas fa-user-plus mr-2"></i>Registration
						</button>

						<button class="px-6 py-2.5 rounded-full bg-orange-500 hover:bg-orange-600 text-white font-bold shadow-md transition">
							Donate Now
						</button>
					</div>

					<!-- Mobile Toggle -->
					<button id="openMenu" class="lg:hidden text-2xl text-green-900">
						<i class="fas fa-bars"></i>
					</button>

				</div>
			</div>
		</nav>
	</header>
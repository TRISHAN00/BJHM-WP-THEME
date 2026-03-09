<footer class="bg-[#212121] text-white pt-20 pb-10">
	<div class="container mx-auto px-4">
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">

			<div class="space-y-6">
				<div class="bg-[#FFFEEE] p-3 rounded-xl w-fit">
					<?php if (has_custom_logo()) : ?>
						<?php the_custom_logo(); ?>
					<?php else : ?>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/logo.png" alt="<?php bloginfo('name'); ?>" class="h-16 w-16">
					<?php endif; ?>
				</div>
				<p class="text-gray-400 text-sm leading-relaxed">
					<?php bloginfo('description'); ?>
				</p>
				<div class="flex space-x-4">
					<?php $socials = ['facebook', 'twitter', 'instagram', 'linkedin'];
					foreach ($socials as $s): ?>
						<a href="#" class="text-gray-400 hover:text-[#ff7722] transition-colors text-xl">
							<i class="fab fa-<?php echo $s; ?>"></i>
						</a>
					<?php endforeach; ?>
				</div>
			</div>

			<div>
				<h4 class="text-[#ff7722] font-bold uppercase tracking-[0.2em] mb-6">Quick Links</h4>
				<div class="footer-menu-links">
					<?php
					wp_nav_menu([
						'theme_location' => 'footer-menu',
						'menu_class'     => 'space-y-4',
						'container'      => false,
					]);
					?>
				</div>
			</div>

			<div>
				<h4 class="text-[#ff7722] font-bold uppercase tracking-[0.2em] mb-6">Committees</h4>
				<ul class="space-y-3 text-gray-300 text-sm">
					<?php foreach (['Local', 'Foreign', 'Central', 'Youth', 'Student'] as $c): ?>
						<li class="hover:text-[#ff7722] transition cursor-pointer"><?php echo $c; ?> Committee</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div>
				<h4 class="text-[#ff7722] font-bold uppercase tracking-[0.2em] mb-6">Get In Touch</h4>
				<ul class="space-y-4 text-sm text-gray-300">
					<li class="flex items-start"><i class="fas fa-map-marker-alt mt-1 mr-3 text-[#ff7722]"></i> 123 Main Street, Dhaka</li>
					<li class="flex items-center"><i class="fas fa-phone mr-3 text-[#ff7722]"></i> +880 123-456-7890</li>
					<li class="flex items-center"><i class="fas fa-envelope mr-3 text-[#ff7722]"></i> info@hindumahajote.org</li>
				</ul>
			</div>
		</div>

		<div class="border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center text-xs text-gray-500">
			<p>&copy; <?php echo date('Y'); ?> All Rights Reserved.</p>

			<div class="mt-4 md:mt-0 flex items-center space-x-6">
				<a href="#" class="hover:text-[#ff7722]">Privacy</a>
				<a href="#" class="hover:text-[#ff7722]">Terms</a>
				<a href="https://buildify.net" target="_blank" class="hover:text-[#ff7722] transition-colors">
					Designed & Developed by <span class="font-bold text-[#ff7722]">Buildifyn</span>
				</a>
			</div>
		</div>
	</div>
</footer>

<style>
	/* Prevents default browser purple/blue visited colors */
	.footer-menu-links a:visited,
	.footer-menu-links a {
		color: #d1d5db !important;
	}

	.footer-menu-links a:hover {
		color: #ff7722 !important;
	}
</style>
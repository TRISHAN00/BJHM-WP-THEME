<footer class="bg-[#1a1a1a] text-white pt-24 pb-8 relative overflow-hidden">
	<div class="absolute top-0 right-0 opacity-[0.02] pointer-events-none transform translate-x-1/4 -translate-y-1/4">
		<i class="fas fa-om text-[500px]"></i>
	</div>

	<div class="container mx-auto px-6 lg:px-12 relative z-10">
		<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-20 bg-[#252525] p-8 rounded-3xl border border-white/5 shadow-2xl">
			<div class="flex items-center gap-5 border-b lg:border-b-0 lg:border-r border-white/10 pb-6 lg:pb-0">
				<div class="w-12 h-12 bg-[#ff7722]/10 rounded-full flex items-center justify-center text-[#ff7722] text-xl">
					<i class="fas fa-phone-alt"></i>
				</div>
				<div>
					<p class="text-xs text-gray-500 uppercase tracking-widest mb-1">Call Us Anytime</p>
					<p class="text-lg font-bold text-gray-200">+880 123-456-7890</p>
				</div>
			</div>
			<div class="flex items-center gap-5 border-b lg:border-b-0 lg:border-r border-white/10 pb-6 lg:pb-0">
				<div class="w-12 h-12 bg-[#ff7722]/10 rounded-full flex items-center justify-center text-[#ff7722] text-xl">
					<i class="fas fa-envelope-open"></i>
				</div>
				<div>
					<p class="text-xs text-gray-500 uppercase tracking-widest mb-1">Email Support</p>
					<p class="text-lg font-bold text-gray-200">info@hindumahajote.org</p>
				</div>
			</div>
			<div class="flex items-center gap-5">
				<div class="w-12 h-12 bg-[#ff7722]/10 rounded-full flex items-center justify-center text-[#ff7722] text-xl">
					<i class="fas fa-map-marked-alt"></i>
				</div>
				<div>
					<p class="text-xs text-gray-500 uppercase tracking-widest mb-1">Our Location</p>
					<p class="text-lg font-bold text-gray-200">123 Main Street, Dhaka</p>
				</div>
			</div>
		</div>

		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-20">
			<div class="space-y-6">
				<div class="bg-white px-4 py-2 rounded-lg w-fit shadow-sm border border-white/10">
					<?php if (has_custom_logo()) :
						$custom_logo_id = get_theme_mod('custom_logo');
						$logo = wp_get_attachment_image_src($custom_logo_id, 'full');
					?>
						<a href="<?php echo home_url(); ?>">
							<img src="<?php echo esc_url($logo[0]); ?>" alt="Logo" class="h-10 md:h-12 w-auto object-contain">
						</a>
					<?php else : ?>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/logo.png" alt="Logo" class="h-10 md:h-12 w-auto object-contain">
					<?php endif; ?>
				</div>

				<p class="text-gray-400 text-sm leading-relaxed max-w-xs">
					<?php echo get_bloginfo('description') ?: 'হিন্দু সম্প্রদায়ের অধিকার রক্ষা ও সেবায় নিয়োজিত একটি অরাজনৈতিক সামাজিক সংগঠন।'; ?>
				</p>

				<div class="flex gap-2">
					<?php
					$socials = ['facebook-f', 'twitter', 'instagram', 'youtube'];
					foreach ($socials as $icon): ?>
						<a href="#" class="w-8 h-8 rounded-md bg-white/5 border border-white/10 flex items-center justify-center text-gray-400 hover:bg-[#ff7722] hover:text-white transition-all text-xs">
							<i class="fab fa-<?php echo $icon; ?>"></i>
						</a>
					<?php endforeach; ?>
				</div>
			</div>

			<div>
				<h4 class="footer-title">Quick Links</h4>
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
				<h4 class="footer-title">Committees</h4>
				<ul class="space-y-4">
					<?php foreach (['Central', 'District', 'Youth', 'Student', 'Foreign'] as $c): ?>
						<li class="group flex items-center gap-3 text-gray-400 hover:text-[#ff7722] transition-colors cursor-pointer">
							<span class="w-1.5 h-1.5 rounded-full bg-white/20 group-hover:bg-[#ff7722] transition-colors"></span>
							<span class="text-sm font-medium"><?php echo $c; ?> Committee</span>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div>
				<h4 class="footer-title">Legal Identity</h4>
				<div class="bg-white/5 p-6 rounded-2xl border border-white/10">
					<p class="text-xs text-gray-500 uppercase font-bold tracking-widest mb-3">Govt Registration</p>
					<p class="text-xl font-mono font-bold text-[#ff7722] mb-4">C-R-A17485</p>
					<a href="/registration" class="block w-full py-3 bg-[#ff7722] hover:bg-[#e66a1f] text-white text-center rounded-xl text-xs font-black uppercase tracking-widest transition-all">
						Verify Status
					</a>
				</div>
			</div>
		</div>

		<div class="border-t border-white/5 pt-10 flex flex-col md:flex-row justify-between items-center gap-6">
			<p class="text-gray-500 text-[11px] uppercase tracking-widest">
				&copy; <?php echo date('Y'); ?> <span class="text-gray-300">Bangladesh Hindu Mahajote</span>. All Rights Reserved.
			</p>

			<div class="flex items-center gap-8 text-[11px] font-bold uppercase tracking-widest">
				<a href="#" class="text-gray-500 hover:text-[#ff7722] transition-colors">Privacy Policy</a>
				<a href="#" class="text-gray-500 hover:text-[#ff7722] transition-colors">Terms of Use</a>
				<a href="https://buildify.net" target="_blank" class="group flex items-center gap-2 text-gray-500">
					Built by <span class="text-[#ff7722] group-hover:underline">Buildify</span>
				</a>
			</div>
		</div>
	</div>
</footer>

<style>
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
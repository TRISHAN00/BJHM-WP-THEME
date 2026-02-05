	<!-- Footer -->
	<footer class="bg-green-900 text-white">
		<!-- Main Footer -->
		<div class="container mx-auto px-4 py-16">
			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">

				<!-- About -->
				<div>
					<div class="flex items-center mb-6 bg-white w-fit p-1 rounded-full">
						<?php if (has_custom_logo()) : ?>
							<?php the_custom_logo(); ?>
						<?php else : ?>
							<img src="<?php echo get_template_directory_uri(); ?>/assets/logo.png" alt="<?php bloginfo('name'); ?>" class="h-20 w-20">
						<?php endif; ?>
					</div>

					<p class="text-gray-300 mb-6 leading-relaxed">
						<?php bloginfo('description'); ?>
					</p>

					<div class="flex space-x-3">
						<a href="#" class="bg-gradient-to-r from-orange-500 to-red-600 w-10 h-10 rounded-full flex items-center justify-center">
							<i class="fab fa-facebook"></i>
						</a>
						<a href="#" class="bg-gradient-to-r from-orange-500 to-red-600 w-10 h-10 rounded-full flex items-center justify-center">
							<i class="fab fa-twitter"></i>
						</a>
						<a href="#" class="bg-gradient-to-r from-orange-500 to-red-600 w-10 h-10 rounded-full flex items-center justify-center">
							<i class="fab fa-instagram"></i>
						</a>
						<a href="#" class="bg-gradient-to-r from-orange-500 to-red-600 w-10 h-10 rounded-full flex items-center justify-center">
							<i class="fab fa-linkedin"></i>
						</a>
					</div>
				</div>

				<!-- Quick Links -->
				<div>
					<h3 class="text-xl font-bold mb-6">Quick Links</h3>
					<?php
					wp_nav_menu([
						'theme_location' => 'footer-menu',
						'menu_class'     => 'space-y-3 text-gray-300',
						'container'      => false,
					]);
					?>
				</div>

				<!-- Our Committees -->
				<div>
					<h3 class="text-xl font-bold mb-6">Our Committees</h3>
					<ul class="space-y-3 text-gray-300">
						<li>Local Committee</li>
						<li>Foreign Committee</li>
						<li>Central Group</li>
						<li>Parent Members</li>
						<li>Youth Members</li>
						<li>Student Members</li>
					</ul>
				</div>

				<!-- Contact -->
				<div>
					<h3 class="text-xl font-bold mb-6">Get In Touch</h3>
					<ul class="space-y-4 text-gray-300">
						<li class="flex items-start">
							<i class="fas fa-map-marker-alt mt-1 mr-3 text-orange-400"></i>
							<span>123 Main Street, Dhaka, Bangladesh</span>
						</li>
						<li class="flex items-center">
							<i class="fas fa-phone mr-3 text-orange-400"></i>
							<span>+880 123-456-7890</span>
						</li>
						<li class="flex items-center">
							<i class="fas fa-envelope mr-3 text-orange-400"></i>
							<span>info@committee.org</span>
						</li>
						<li class="flex items-center">
							<i class="fas fa-clock mr-3 text-orange-400"></i>
							<span>Mon - Fri: 9 AM - 5 PM</span>
						</li>
					</ul>
				</div>

			</div>
		</div>

		<!-- Bottom Footer -->
		<div class="border-t border-green-800">
			<div class="container mx-auto px-4 py-6">
				<div class="flex flex-col md:flex-row justify-between items-center text-sm text-gray-300">
					<p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
					<div class="flex space-x-6 mt-4 md:mt-0">
						<a href="#" class="hover:text-orange-400">Privacy Policy</a>
						<a href="#" class="hover:text-orange-400">Terms of Service</a>
						<a href="#" class="hover:text-orange-400">Sitemap</a>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<?php wp_footer(); ?>
	</body>

	</html>
<section class="py-20 bg-gray-50 overflow-hidden">
	<div class="container mx-auto px-4 lg:px-12">
		<div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
			<div class="text-left">
				<span class="text-[#ff7722] font-black text-sm uppercase tracking-[0.3em]">সর্বশেষ সংবাদ</span>
				<h2 class="text-4xl md:text-5xl font-black text-gray-900 mt-4">খবর ও বিশেষ আপডেট</h2>
			</div>

			<div class="flex gap-2">
				<button class="swiper-prev-btn w-12 h-12 border-2 border-gray-200 flex items-center justify-center text-gray-400 hover:border-[#ff7722] hover:text-[#ff7722] transition-all">
					<i class="fas fa-chevron-left"></i>
				</button>
				<button class="swiper-next-btn w-12 h-12 border-2 border-gray-200 flex items-center justify-center text-gray-400 hover:border-[#ff7722] hover:text-[#ff7722] transition-all">
					<i class="fas fa-chevron-right"></i>
				</button>
			</div>
		</div>

		<div class="swiper latest-news-slider ">
			<div class="swiper-wrapper">
				<?php
				$args = array('post_type' => 'post', 'posts_per_page' => 6, 'ignore_sticky_posts' => 1);
				$query = new WP_Query($args);

				if ($query->have_posts()) :
					while ($query->have_posts()) : $query->the_post(); ?>

						<div class="swiper-slide h-auto">
							<article class="bg-white border border-gray-200 group h-full flex flex-col transition-all duration-500 hover:shadow-2xl">
								<div class="overflow-hidden h-64 border-b border-gray-100">
									<?php if (has_post_thumbnail()) : ?>
										<?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover group-hover:scale-110 transition duration-700']); ?>
									<?php else : ?>
										<img src="https://via.placeholder.com/600x400" class="w-full h-full object-cover" />
									<?php endif; ?>
								</div>

								<div class="p-8 flex flex-col flex-grow">
									<div class="flex items-center text-[10px] text-[#ff7722] font-black mb-4 uppercase tracking-widest">
										<i class="fas fa-calendar-alt mr-2"></i> <?php echo get_the_date('d M, Y'); ?>
									</div>

									<h3 class="text-xl font-bold text-gray-900 mb-4 group-hover:text-[#ff7722] transition line-clamp-2">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>

									<p class="text-gray-600 mb-8 text-sm leading-relaxed line-clamp-3">
										<?php echo wp_trim_words(get_the_excerpt(), 18, '...'); ?>
									</p>

									<div class="mt-auto">
										<a href="<?php the_permalink(); ?>" class="text-[#ff7722] text-xs font-black uppercase tracking-widest inline-flex items-center hover:gap-3 transition-all">
											বিস্তারিত পড়ুন <i class="fas fa-long-arrow-alt-right ml-2"></i>
										</a>
									</div>
								</div>
							</article>
						</div>

				<?php endwhile;
					wp_reset_postdata();
				endif; ?>
			</div>
		</div>

		<div class="text-center mt-20">
			<a href="<?php echo esc_url(home_url('/blog')); ?>"
				class="btn-common-main group relative inline-flex items-center justify-center px-10 py-4 font-black text-xs uppercase tracking-[0.2em] text-[#ff7722] transition-all duration-500 border-2 border-[#ff7722] rounded-full overflow-hidden hover:text-white">

				<span class="absolute inset-0 w-0 bg-[#ff7722] transition-all duration-500 ease-out group-hover:w-full"></span>

				<span class="relative z-10 flex items-center gap-3">
					Read More
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"
						class="w-4 h-4 transition-transform duration-500 group-hover:translate-x-2">
						<path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
					</svg>
				</span>
			</a>
		</div>
	</div>
</section>


<script>
	document.addEventListener('DOMContentLoaded', function() {
		new Swiper('.latest-news-slider', {
			slidesPerView: 1,
			spaceBetween: 30,
			loop: true,
			autoplay: {
				delay: 4000,
				disableOnInteraction: false
			},
			navigation: {
				nextEl: '.swiper-next-btn',
				prevEl: '.swiper-prev-btn',
			},
			breakpoints: {
				640: {
					slidesPerView: 1.5
				},
				768: {
					slidesPerView: 2
				},
				1024: {
					slidesPerView: 3
				}
			}
		});
	});
</script>
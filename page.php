<?php get_header() ?>

<!-- Modal Backdrop -->
<div
	id="donateModal"
	class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 px-4 sm:px-6">
	<!-- Modal Box -->
	<div
		class="relative w-full max-w-lg rounded-2xl bg-white p-6 shadow-xl sm:p-8">
		<!-- Close Button -->
		<button
			id="closeModal"
			class="absolute right-4 top-4 text-gray-500 hover:text-gray-800 text-xl sm:text-2xl">
			✕
		</button>

		<h2 class="text-xl sm:text-2xl font-bold text-gray-800">
			Support Our Activities
		</h2>
		<p class="mt-1 text-sm sm:text-base text-gray-500">
			Donate using mobile banking or bank transfer
		</p>

		<!-- Payment Info -->
		<div class="mt-5 rounded-xl bg-gray-50 p-4 sm:p-6">
			<h3 class="font-semibold text-gray-700 text-sm sm:text-base">
				📱 Mobile Banking
			</h3>
			<ul class="mt-2 space-y-1 text-xs sm:text-sm text-gray-600">
				<li><strong>bKash:</strong> 01XXXXXXXXX</li>
				<li><strong>Nagad:</strong> 01XXXXXXXXX</li>
				<li><strong>Upay:</strong> 01XXXXXXXXX</li>
			</ul>

			<h3 class="mt-4 font-semibold text-gray-700 text-sm sm:text-base">
				🏦 Bank Account
			</h3>
			<ul class="mt-2 space-y-1 text-xs sm:text-sm text-gray-600">
				<li><strong>Bank:</strong> Dutch Bangla Bank</li>
				<li><strong>Account Name:</strong> Your Organization Name</li>
				<li><strong>Account No:</strong> 1234567890</li>
				<li><strong>Branch:</strong> Dhaka</li>
			</ul>
		</div>

		<!-- Donate Form -->
		<form class="mt-6 space-y-4">
			<input
				type="text"
				placeholder="Your Name"
				class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-rose-500 focus:outline-none text-sm sm:text-base"
				required />

			<input
				type="number"
				placeholder="Donation Amount (BDT)"
				class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-rose-500 focus:outline-none text-sm sm:text-base"
				required />

			<select
				class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-rose-500 focus:outline-none text-sm sm:text-base"
				required>
				<option value="">Select Payment Method</option>
				<option>bKash</option>
				<option>Nagad</option>
				<option>Upay</option>
				<option>Bank Transfer</option>
			</select>

			<input
				type="text"
				placeholder="Transaction ID (TrxID) / Bank Reference"
				class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-rose-500 focus:outline-none text-sm sm:text-base"
				required />

			<button
				type="submit"
				class="w-full rounded-lg bg-rose-600 py-3 font-semibold text-white hover:bg-rose-700 transition text-sm sm:text-base">
				Submit Donation Info
			</button>
		</form>
	</div>
</div>

<!-- Member Registraion Form -->
<div
	id="regModal"
	class="fixed inset-0 z-[100] hidden bg-slate-900/40 backdrop-blur-md flex items-center justify-center p-4">
	<div
		class="bg-white w-full max-w-5xl max-h-[92vh] rounded-[2rem] shadow-2xl overflow-hidden relative flex flex-col md:flex-row">
		<div
			class="hidden lg:flex md:w-1/3 bg-[#14532d] p-10 flex-col justify-between text-white relative">
			<div class="relative z-10">
				<img
					src="/assets/logo.png"
					alt="Logo"
					class="w-20 mb-6 brightness-0 invert" />
				<h2 class="text-3xl font-bold leading-tight">
					Join the<br />Movement.
				</h2>
				<p class="text-green-100/70 mt-4 text-sm leading-relaxed">
					Become a verified member of the Bangladesh Jatiya Hindu Mohajot.
				</p>
			</div>

			<div class="relative z-10 space-y-4">
				<div
					class="flex items-center gap-3 text-xs font-bold uppercase tracking-widest text-orange-400">
					<i class="fas fa-check-circle"></i> Identity Verified
				</div>
				<div
					class="flex items-center gap-3 text-xs font-bold uppercase tracking-widest text-orange-400">
					<i class="fas fa-check-circle"></i> Official Membership Card
				</div>
			</div>
		</div>

		<div class="flex-1 flex flex-col bg-white overflow-hidden">
			<div
				class="p-6 border-b border-gray-100 flex justify-between items-center">
				<div>
					<h3 class="text-xl font-bold text-gray-800">
						Member Registration
					</h3>
					<p class="text-xs text-gray-400">
						Please provide accurate information as per your NID.
					</p>
				</div>
				<button
					id="closeRegModal"
					class="text-gray-400 hover:text-orange-600 text-2xl">
					&times;
				</button>
			</div>

			<div class="overflow-y-auto p-8 custom-scrollbar">
				<form id="registrationForm" class="space-y-8">
					<div class="grid grid-cols-1 md:grid-cols-2 gap-5">
						<div class="form-group">
							<label class="field-label">Name (Bangla)</label>
							<input
								type="text"
								class="form-input"
								placeholder="নাম (বাংলায়)" />
						</div>
						<div class="form-group">
							<label class="field-label">Name (English)</label>
							<input
								type="text"
								class="form-input"
								placeholder="Full Name (English)" />
						</div>
						<div class="form-group">
							<label class="field-label">Father's Name</label>
							<input type="text" class="form-input" />
						</div>
						<div class="form-group">
							<label class="field-label">Mother's Name</label>
							<input type="text" class="form-input" />
						</div>
					</div>

					<div class="grid grid-cols-1 md:grid-cols-2 gap-5">
						<div class="form-group md:col-span-2">
							<label class="field-label">Present Address</label>
							<input type="text" class="form-input" />
						</div>
						<div class="form-group">
							<label class="field-label">District</label>
							<input type="text" class="form-input" />
						</div>
						<div class="form-group">
							<label class="field-label">Thana</label>
							<input type="text" class="form-input" />
						</div>
					</div>

					<div class="grid grid-cols-1 md:grid-cols-3 gap-5">
						<div class="form-group">
							<label class="field-label">Telephone</label>
							<input type="tel" class="form-input" />
						</div>
						<div class="form-group">
							<label class="field-label">Designation</label>
							<input type="text" class="form-input" />
						</div>
						<div class="form-group">
							<label class="field-label">Facebook ID (URL)</label>
							<input type="url" class="form-input" />
						</div>
					</div>

					<div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-4">
						<div class="upload-container">
							<label class="field-label">Member Image</label>
							<div class="file-box">
								<i class="fas fa-camera text-gray-300 mb-2"></i>
								<input type="file" class="text-xs" />
							</div>
						</div>
						<div class="upload-container">
							<label class="field-label">NID Image</label>
							<div class="file-box">
								<i class="fas fa-id-card text-gray-300 mb-2"></i>
								<input type="file" class="text-xs" />
							</div>
						</div>
					</div>

					<button
						type="submit"
						class="w-full bg-[#14532d] text-white font-bold py-4 rounded-xl hover:bg-orange-600 transition shadow-lg">
						Submit Application
					</button>
				</form>
			</div>
		</div>
	</div>
</div>

<main>
	<!-- Hero Slider -->
	<?php get_template_part('template-parts/sections/hero', 'banner'); ?>


	<!-- Notice Board Second Option -->
	<?php get_template_part('template-parts/sections/notice-ticker'); ?>


	<!-- About Section (Mission & Vision) -->
	<?php get_template_part('template-parts/sections/section-about'); ?>


	<!-- Our Demand -->
	<?php get_template_part('template-parts/sections/our-demand'); ?>

	<!-- Statistics / Counter Section -->
	<?php get_template_part('template-parts/sections/stats'); ?>


	<!-- Our Activities -->
	<section class="py-20 bg-gray-50 overflow-hidden">
		<div class="container mx-auto px-4">
			<!-- Section Header -->
			<div class="text-center mb-12">
				<span
					class="text-orange-500 font-semibold text-sm uppercase tracking-wide">আমাদের কার্যক্রম</span>
				<h2
					class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-800 mt-4 mb-4">
					আমরা যেভাবে সেবা করি
				</h2>
				<p class="text-gray-600 text-base sm:text-lg max-w-2xl mx-auto">
					হিন্দু সম্প্রদায়ের অধিকার রক্ষা এবং ধর্মীয় মর্যাদা প্রতিষ্ঠায়
					আমাদের সুনির্দিষ্ট কর্মসূচি।
				</p>
			</div>

			<!-- Swiper Slider -->
			<div class="swiper activitiesSwiper pb-12">
				<div class="swiper-wrapper">
					<!-- Slide 1 -->
					<div class="swiper-slide h-full flex justify-center">
						<div
							class="bg-white rounded-2xl overflow-hidden shadow-lg border-b-4 border-orange-500 flex flex-col max-w-xs md:max-w-sm lg:max-w-md h-full">
							<img
								src="https://images.unsplash.com/photo-1589262804704-c5aa9e6dee64?w=600&h=400&fit=crop"
								alt="Rights"
								class="w-full h-56 sm:h-64 object-cover" />
							<div class="p-6 flex flex-col flex-grow">
								<div
									class="bg-orange-100 w-fit text-orange-500 rounded-full px-4 py-1 inline-block text-sm font-semibold mb-4">
									অধিকার রক্ষা
								</div>
								<h3
									class="text-xl sm:text-2xl font-bold text-gray-800 mb-3">
									অধিকার ও দাবি আদায়
								</h3>
								<p
									class="text-gray-600 text-sm sm:text-base mb-4 flex-grow">
									৭ দফা দাবি আদায়ের লক্ষে রাজপথ ও আইনি লড়াই পরিচালনা।
								</p>
								<a
									href="#"
									class="text-red-600 font-semibold hover:text-red-700 inline-flex items-center mt-auto transition">
									বিস্তারিত <i class="fas fa-arrow-right ml-2"></i>
								</a>
							</div>
						</div>
					</div>

					<!-- Slide 2 -->
					<div class="swiper-slide h-full flex justify-center">
						<div
							class="bg-white rounded-2xl overflow-hidden shadow-lg border-b-4 border-green-700 flex flex-col max-w-xs md:max-w-sm lg:max-w-md h-full">
							<img
								src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=600&h=400&fit=crop"
								alt="Legal Aid"
								class="w-full h-56 sm:h-64 object-cover" />
							<div class="p-6 flex flex-col flex-grow">
								<div
									class="bg-green-100 w-fit text-green-700 rounded-full px-4 py-1 inline-block text-sm font-semibold mb-4">
									আইনি সহায়তা
								</div>
								<h3
									class="text-xl sm:text-2xl font-bold text-gray-800 mb-3">
									নির্যাতিতদের সুরক্ষা
								</h3>
								<p
									class="text-gray-600 text-sm sm:text-base mb-4 flex-grow">
									অ্যাডভোকেট প্রদীপ কুমার পালের নেতৃত্বে নির্যাতিতদের আইনি
									সুরক্ষা প্রদান।
								</p>
								<a
									href="activities-detail.html"
									class="text-green-700 font-semibold hover:text-green-800 inline-flex items-center mt-auto transition">
									বিস্তারিত <i class="fas fa-arrow-right ml-2"></i>
								</a>
							</div>
						</div>
					</div>

					<!-- Slide 3 -->
					<div class="swiper-slide h-full flex justify-center">
						<div
							class="bg-white rounded-2xl overflow-hidden shadow-lg border-b-4 border-orange-500 flex flex-col max-w-xs md:max-w-sm lg:max-w-md h-full">
							<img
								src="https://images.unsplash.com/photo-1545025983-ac6525997f74?w=600&h=400&fit=crop"
								alt="Religious Culture"
								class="w-full h-56 sm:h-64 object-cover" />
							<div class="p-6 flex flex-col flex-grow">
								<div
									class="bg-orange-100 w-fit text-orange-500 rounded-full px-4 py-1 inline-block text-sm font-semibold mb-4">
									ধর্মীয় শিক্ষা
								</div>
								<h3
									class="text-xl sm:text-2xl font-bold text-gray-800 mb-3">
									ধর্মীয় ও নৈতিক বিকাশ
								</h3>
								<p
									class="text-gray-600 text-sm sm:text-base mb-4 flex-grow">
									নতুন প্রজন্মের মাঝে হিন্দু সংস্কৃতি ও গীতা শিক্ষা প্রচারের
									বিশেষ কর্মসূচি।
								</p>
								<a
									href="activities-detail.html"
									class="text-orange-500 font-semibold hover:text-orange-600 inline-flex items-center mt-auto transition">
									বিস্তারিত <i class="fas fa-arrow-right ml-2"></i>
								</a>
							</div>
						</div>
					</div>

					<!-- Slide 4 -->
					<div class="swiper-slide h-full flex justify-center">
						<div
							class="bg-white rounded-2xl overflow-hidden shadow-lg border-b-4 border-green-700 flex flex-col max-w-xs md:max-w-sm lg:max-w-md h-full">
							<img
								src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?w=600&h=400&fit=crop"
								alt="Field Work"
								class="w-full h-56 sm:h-64 object-cover" />
							<div class="p-6 flex flex-col flex-grow">
								<div
									class="bg-green-100 w-fit text-green-700 rounded-full px-4 py-1 inline-block text-sm font-semibold mb-4">
									সাংগঠনিক কাজ
								</div>
								<h3
									class="text-xl sm:text-2xl font-bold text-gray-800 mb-3">
									তৃণমূল সমন্বয়
								</h3>
								<p
									class="text-gray-600 text-sm sm:text-base mb-4 flex-grow">
									পলাশ কান্তি দে-র পরিচালনায় ৬৪ জেলায় সাংগঠনিক ভিত্তি
									শক্তিশালীকরণ।
								</p>
								<a
									href="activities-detail.html"
									class="text-green-700 font-semibold hover:text-green-800 inline-flex items-center mt-auto transition">
									বিস্তারিত <i class="fas fa-arrow-right ml-2"></i>
								</a>
							</div>
						</div>
					</div>
				</div>

				<!-- Pagination -->
				<div class="swiper-pagination !bottom-0"></div>
			</div>
		</div>
	</section>

	<!-- Video Section -->
	<section class="py-20 bg-white">
		<div class="container mx-auto px-4">
			<div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
				<div>
					<span
						class="text-orange-500 font-semibold text-sm uppercase tracking-wide">
						আমাদের অধিকার আদায়ের সংগ্রাম
					</span>
					<h2
						class="text-4xl md:text-5xl font-bold text-gray-800 mt-4 mb-6">
						দেখুন কীভাবে আমরা <br />
						<span class="text-red-600">অধিকার আদায়ের লড়াই করছি</span>
					</h2>
					<p class="text-gray-600 mb-6 leading-relaxed">
						হিন্দু মহাজোটের কেন্দ্রীয় নেতৃবৃন্দের সংবাদ সম্মেলন, ৭ দফা দাবি
						আদায়ের প্রতিবাদ সভা এবং সারাদেশে আমাদের সাংগঠনিক কার্যক্রমের
						ভিডিওগুলো দেখুন। আমরা কীভাবে সাম্প্রদায়িক অপশক্তির বিরুদ্ধে
						ঐক্যবদ্ধ হয়ে লড়াই করছি, তা সরাসরি দেখুন।
					</p>

					<div class="space-y-4 mb-8">
						<div class="flex items-center">
							<i class="fas fa-check-circle text-red-600 text-xl mr-3"></i>
							<span class="text-gray-700">সংবাদ সম্মেলন ও ৭ দফা দাবি উত্থাপন</span>
						</div>
						<div class="flex items-center">
							<i class="fas fa-check-circle text-red-600 text-xl mr-3"></i>
							<span class="text-gray-700">অ্যাডভোকেট প্রদীপ কুমার পালের বিশেষ বক্তব্য</span>
						</div>
						<div class="flex items-center">
							<i class="fas fa-check-circle text-red-600 text-xl mr-3"></i>
							<span class="text-gray-700">দেশব্যাপী সংখ্যালঘু অধিকার রক্ষার আন্দোলন</span>
						</div>
					</div>

					<a
						href="https://www.youtube.com/@TkkuHU1l2SE/search?query=হিন্দু+মহাজোট"
						target="_blank"
						class="bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 text-white px-8 py-4 rounded-full font-semibold transition inline-flex items-center">
						আরও ভিডিও দেখুন <i class="fas fa-play ml-2"></i>
					</a>
				</div>

				<div id="featureVideo" class="relative">
					<img
						src="https://img.youtube.com/vi/TkkuHU1l2SE/maxresdefault.jpg"
						alt="Hindu Mohajot Protest"
						class="rounded-2xl shadow-2xl w-full border-4 border-orange-100" />
					<a
						href="https://www.youtube.com/watch?v=TkkuHU1l2SE"
						target="_blank"
						class="absolute inset-0 flex items-center justify-center group">
						<div
							class="bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 w-20 h-20 rounded-full flex items-center justify-center transition transform group-hover:scale-110 shadow-xl">
							<i class="fas fa-play text-white text-2xl ml-1"></i>
						</div>
					</a>
				</div>
			</div>
		</div>
	</section>

	<!-- Gallery Section -->
	<section class="py-20 bg-gray-50">
		<div class="container mx-auto px-4">
			<div class="text-center mb-12">
				<span
					class="text-orange-500 font-semibold text-sm uppercase tracking-wide">
					Our Photo Gallery
				</span>
				<h2 class="text-4xl md:text-5xl font-bold text-gray-800 mt-4 mb-4">
					Moments of Protest & Struggle
				</h2>
				<p class="text-gray-600 text-lg max-w-2xl mx-auto">
					Defining moments from our fight for rights and nationwide
					organizational movements.
				</p>
			</div>
			<div
				id="photoGallery"
				class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
				<!-- Single Photo -->
				<a
					href="/assets/banner-01.jpg"
					class="overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition duration-300 cursor-pointer group relative">
					<img
						src="/assets/banner-01.jpg"
						class="w-full h-64 object-cover group-hover:scale-110 transition duration-300"
						alt="Press Conference" />
					<div
						class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center text-white font-semibold">
						সংবাদ সম্মেলন
					</div>
				</a>

				<!-- Single Photo -->
				<a
					href="/assets/banner-01.jpg"
					class="overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition duration-300 cursor-pointer group relative">
					<img
						src="/assets/banner-01.jpg"
						class="w-full h-64 object-cover group-hover:scale-110 transition duration-300"
						alt="Press Conference" />
					<div
						class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center text-white font-semibold">
						সংবাদ সম্মেলন
					</div>
				</a>

				<!-- Single Photo -->
				<a
					href="/assets/banner-01.jpg"
					class="overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition duration-300 cursor-pointer group relative">
					<img
						src="/assets/banner-01.jpg"
						class="w-full h-64 object-cover group-hover:scale-110 transition duration-300"
						alt="Press Conference" />
					<div
						class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center text-white font-semibold">
						সংবাদ সম্মেলন
					</div>
				</a>

				<!-- Single Photo -->
				<a
					href="/assets/banner-01.jpg"
					class="overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition duration-300 cursor-pointer group relative">
					<img
						src="/assets/banner-01.jpg"
						class="w-full h-64 object-cover group-hover:scale-110 transition duration-300"
						alt="Press Conference" />
					<div
						class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center text-white font-semibold">
						সংবাদ সম্মেলন
					</div>
				</a>

				<!-- Single Photo -->
				<a
					href="/assets/banner-01.jpg"
					class="overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition duration-300 cursor-pointer group relative">
					<img
						src="/assets/banner-01.jpg"
						class="w-full h-64 object-cover group-hover:scale-110 transition duration-300"
						alt="Press Conference" />
					<div
						class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center text-white font-semibold">
						সংবাদ সম্মেলন
					</div>
				</a>

				<!-- Single Photo -->
				<a
					href="/assets/banner-01.jpg"
					class="overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition duration-300 cursor-pointer group relative">
					<img
						src="/assets/banner-01.jpg"
						class="w-full h-64 object-cover group-hover:scale-110 transition duration-300"
						alt="Press Conference" />
					<div
						class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center text-white font-semibold">
						সংবাদ সম্মেলন
					</div>
				</a>

				<!-- Single Photo -->
				<a
					href="/assets/banner-01.jpg"
					class="overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition duration-300 cursor-pointer group relative">
					<img
						src="/assets/banner-01.jpg"
						class="w-full h-64 object-cover group-hover:scale-110 transition duration-300"
						alt="Press Conference" />
					<div
						class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center text-white font-semibold">
						সংবাদ সম্মেলন
					</div>
				</a>

				<!-- Single Photo -->
				<a
					href="/assets/banner-01.jpg"
					class="overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition duration-300 cursor-pointer group relative">
					<img
						src="/assets/banner-01.jpg"
						class="w-full h-64 object-cover group-hover:scale-110 transition duration-300"
						alt="Press Conference" />
					<div
						class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center text-white font-semibold">
						সংবাদ সম্মেলন
					</div>
				</a>

				<!-- Single Photo -->
				<a
					href="/assets/banner-01.jpg"
					class="overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition duration-300 cursor-pointer group relative">
					<img
						src="/assets/banner-01.jpg"
						class="w-full h-64 object-cover group-hover:scale-110 transition duration-300"
						alt="Press Conference" />
					<div
						class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center text-white font-semibold">
						সংবাদ সম্মেলন
					</div>
				</a>

				<!-- Single Photo -->
				<a
					href="/assets/banner-01.jpg"
					class="overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition duration-300 cursor-pointer group relative">
					<img
						src="/assets/banner-01.jpg"
						class="w-full h-64 object-cover group-hover:scale-110 transition duration-300"
						alt="Press Conference" />
					<div
						class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center text-white font-semibold">
						সংবাদ সম্মেলন
					</div>
				</a>

				<!-- Single Photo -->
				<a
					href="/assets/banner-02.jpg"
					class="overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition duration-300 cursor-pointer group relative">
					<img
						src="/assets/banner-01.jpg"
						class="w-full h-64 object-cover group-hover:scale-110 transition duration-300"
						alt="Press Conference" />
					<div
						class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center text-white font-semibold">
						সংবাদ সম্মেলন
					</div>
				</a>

				<!-- Repeat same structure for all images -->
			</div>

			<div class="text-center mt-12">
				<a
					href="gallery.html"
					class="bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 text-white px-8 py-4 rounded-full font-semibold transition inline-flex items-center shadow-lg">
					সম্পূর্ণ গ্যালারি দেখুন <i class="fas fa-images ml-2"></i>
				</a>
			</div>
		</div>
	</section>

	<!-- Our Concern -->
	<section class="py-10 lg:py-20 bg-white">
		<div class="container mx-auto px-4 max-w-6xl">
			<div class="text-center mb-10">
				<span
					class="text-orange-500 font-bold uppercase tracking-widest text-sm">Official Symbols</span>
				<h2 class="text-3xl font-extrabold text-green-900 mt-2">
					Our Organizations
				</h2>
			</div>

			<div
				class="grid grid-cols-1 md:grid-cols-3 gap-12 items-center text-center">
				<div class="space-y-4">
					<div class="flex justify-center">
						<img
							src="/assets/logo.png"
							alt="Bangladesh Jatiya Hindu Mohajot"
							class="w-48 h-48 object-contain hover:scale-105 transition-transform duration-300" />
					</div>
					<h3 class="font-bold text-green-900 text-lg uppercase">
						Central Mohajot
					</h3>
					<p class="text-xs text-gray-500 font-semibold tracking-wide">
						Reg No: 17845 | Est: 2006
					</p>
				</div>

				<div class="space-y-4">
					<div class="flex justify-center">
						<img
							src="/assets/logo.png"
							alt="Bangladesh Jatiya Hindu Juba Mohajot"
							class="w-48 h-48 object-contain hover:scale-105 transition-transform duration-300" />
					</div>
					<h3 class="font-bold text-green-900 text-lg uppercase">
						Youth Wing
					</h3>
					<p class="text-xs text-gray-500 font-semibold tracking-wide">
						Reg No: 17845 | Est: 2006
					</p>
				</div>

				<div class="space-y-4">
					<div class="flex justify-center">
						<img
							src="/assets/logo.png"
							alt="Bangladesh Jatiya Hindu Chatra Mohajot"
							class="w-48 h-48 object-contain hover:scale-105 transition-transform duration-300" />
					</div>
					<h3 class="font-bold text-green-900 text-lg uppercase">
						Student Wing
					</h3>
					<p class="text-xs text-gray-500 font-semibold tracking-wide">
						Reg No: 17845 | Est: 2006
					</p>
				</div>
			</div>
		</div>
	</section>

	<!-- Blog / News Section -->
	<section class="py-20 bg-white">
		<div class="container mx-auto px-4">
			<div class="text-center mb-12">
				<span
					class="text-orange-500 font-semibold text-sm uppercase tracking-wide">সর্বশেষ সংবাদ</span>
				<h2 class="text-4xl md:text-5xl font-bold text-gray-800 mt-4 mb-4">
					খবর ও বিশেষ আপডেট
				</h2>
				<p class="text-gray-600 text-lg max-w-2xl mx-auto">
					বাংলাদেশ জাতীয় হিন্দু মহাজোটের সাম্প্রতিক কার্যক্রম, সংবাদ
					সম্মেলন এবং আমাদের দাবি আদায়ের সংগ্রামের খবরাখবর।
				</p>
			</div>

			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
				<article
					class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300 border border-gray-100">
					<img
						src="https://images.unsplash.com/photo-1589262804704-c5aa9e6dee64?w=600&h=400&fit=crop"
						alt="Election System"
						class="w-full h-64 object-cover" />
					<div class="p-6">
						<div class="flex items-center text-sm text-gray-500 mb-4">
							<i class="fas fa-calendar mr-2"></i>
							<span>২২ নভেম্বর, ২০২৪</span>
							<span class="mx-2">•</span>
							<i class="fas fa-user mr-2"></i>
							<span>প্রেস ডেস্ক</span>
						</div>
						<h3
							class="text-xl font-bold text-gray-800 mb-3 hover:text-red-600 transition cursor-pointer">
							সংখ্যালঘুদের জন্য আলাদা নির্বাচন ব্যবস্থার জোরালো দাবি
						</h3>
						<p class="text-gray-600 mb-4">
							সংসদে সংখ্যালঘু সম্প্রদায়ের প্রতিনিধিত্ব নিশ্চিত করতে আলাদা
							নির্বাচন ব্যবস্থা এবং সংরক্ষিত আসনের দাবিতে সংবাদ সম্মেলন
							করেছে হিন্দু মহাজোট...
						</p>
						<a
							href="blog-detail.html"
							class="text-red-600 font-semibold hover:text-red-700 inline-flex items-center">
							বিস্তারিত পড়ুন <i class="fas fa-arrow-right ml-2"></i>
						</a>
					</div>
				</article>

				<article
					class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300 border border-gray-100">
					<img
						src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=600&h=400&fit=crop"
						alt="7-Point Demands"
						class="w-full h-64 object-cover" />
					<div class="p-6">
						<div class="flex items-center text-sm text-gray-500 mb-4">
							<i class="fas fa-calendar mr-2"></i>
							<span>জানুয়ারি ১০, ২০২৫</span>
							<span class="mx-2">•</span>
							<i class="fas fa-user mr-2"></i>
							<span>কেন্দ্রীয় কমিটি</span>
						</div>
						<h3
							class="text-xl font-bold text-gray-800 mb-3 hover:text-red-600 transition cursor-pointer">
							৭ দফা দাবি বাস্তবায়নে নতুন কর্মসূচি ঘোষণা
						</h3>
						<p class="text-gray-600 mb-4">
							সংখ্যালঘু সুরক্ষা আইন এবং সংখ্যালঘু বিষয়ক মন্ত্রণালয়
							প্রতিষ্ঠাসহ ৭ দফা দাবি আদায়ে জেলা ও উপজেলা পর্যায়ে নতুন
							সাংগঠনিক সফর শুরু হচ্ছে...
						</p>
						<a
							href="blog-detail.html"
							class="text-red-600 font-semibold hover:text-red-700 inline-flex items-center">
							বিস্তারিত পড়ুন <i class="fas fa-arrow-right ml-2"></i>
						</a>
					</div>
				</article>

				<article
					class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300 border border-gray-100">
					<img
						src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?w=600&h=400&fit=crop"
						alt="Safety Issues"
						class="w-full h-64 object-cover" />
					<div class="p-6">
						<div class="flex items-center text-sm text-gray-500 mb-4">
							<i class="fas fa-calendar mr-2"></i>
							<span>ডিসেম্বর ১৫, ২০২৪</span>
							<span class="mx-2">•</span>
							<i class="fas fa-user mr-2"></i>
							<span>আইনি সেল</span>
						</div>
						<h3
							class="text-xl font-bold text-gray-800 mb-3 hover:text-red-600 transition cursor-pointer">
							সারাদেশে সংখ্যালঘু নির্যাতনের শ্বেতপত্র প্রকাশের অনুরোধ
						</h3>
						<p class="text-gray-600 mb-4">
							সাম্প্রতিক সময়ে বিভিন্ন স্থানে হিন্দু সম্প্রদায়ের বাড়িঘর ও
							মঠ-মন্দিরে হামলার ঘটনার বিচার চেয়ে সরকারের প্রতি বিশেষ
							শ্বেতপত্র প্রকাশের আহ্বান...
						</p>
						<a
							href="blog-detail.html"
							class="text-red-600 font-semibold hover:text-red-700 inline-flex items-center">
							বিস্তারিত পড়ুন <i class="fas fa-arrow-right ml-2"></i>
						</a>
					</div>
				</article>
			</div>

			<div class="text-center mt-12">
				<a
					href="blog.html"
					class="bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 text-white px-8 py-4 rounded-full font-semibold transition inline-flex items-center">
					সকল সংবাদ দেখুন <i class="fas fa-arrow-right ml-2"></i>
				</a>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>
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
	<?php get_template_part('template-parts/sections/featured-activities'); ?>


	<!-- Multimedia Advocacy -->
	<?php get_template_part('template-parts/sections/multimedia-advocacy'); ?>

	<!-- Gallery Section -->
	<?php get_template_part('template-parts/sections/gallery'); ?>


	<!-- Our Concern -->
	<?php get_template_part('template-parts/sections/our-concern'); ?>

	<!-- Blog / News Section -->
	<?php get_template_part('template-parts/sections/feature-blog'); ?>
</main>

<?php get_footer(); ?>
document.addEventListener("DOMContentLoaded", function () {

  /* =========================
     Local / Foreign Tabs
  ========================= */
  const filterBtns = document.querySelectorAll(".filter-btn");
  const localSec = document.getElementById("local-section");
  const foreignSec = document.getElementById("foreign-section");

  if (filterBtns.length && localSec && foreignSec) {
    filterBtns.forEach((btn) => {
      btn.addEventListener("click", () => {
        filterBtns.forEach((b) => {
          b.classList.remove("active-tab", "text-white");
          b.classList.add("text-gray-600");
        });

        btn.classList.add("active-tab", "text-white");
        btn.classList.remove("text-gray-600");

        const filter = btn.dataset.filter;
        localSec.classList.toggle("hidden", filter !== "local");
        foreignSec.classList.toggle("hidden", filter !== "foreign");
      });
    });
  }

  /* =========================
     Member Group Filter
  ========================= */
  const groupBtns = document.querySelectorAll(".group-btn");
  const memberCards = document.querySelectorAll(".member-card");

  if (groupBtns.length && memberCards.length) {
    groupBtns.forEach((btn) => {
      btn.addEventListener("click", () => {
        groupBtns.forEach((b) => b.classList.remove("active-group"));
        btn.classList.add("active-group");

        const group = btn.dataset.group;
        memberCards.forEach((card) => {
          card.style.display =
            group === "all" || card.classList.contains(group)
              ? "flex"
              : "none";
        });
      });
    });
  }

  /* =========================
     Donate Modal
  ========================= */
  const donateBtn = document.getElementById("donateBtn");
  const donateModal = document.getElementById("donateModal");
  const closeModal = document.getElementById("closeModal");

  if (donateBtn && donateModal && closeModal) {
    donateBtn.onclick = () => {
      donateModal.classList.remove("hidden");
      donateModal.classList.add("flex");
      document.body.classList.add("overflow-hidden");
    };

    closeModal.onclick = () => {
      donateModal.classList.add("hidden");
      donateModal.classList.remove("flex");
      document.body.classList.remove("overflow-hidden");
    };

    donateModal.onclick = (e) => {
      if (e.target === donateModal) {
        donateModal.classList.add("hidden");
        donateModal.classList.remove("flex");
        document.body.classList.remove("overflow-hidden");
      }
    };
  }

  /* =========================
     LightGallery
  ========================= */
  const photoGallery = document.getElementById("photoGallery");
  if (photoGallery && window.lightGallery) {
    lightGallery(photoGallery, {
      plugins: [lgZoom, lgThumbnail],
      speed: 500,
    });
  }

  const videoGallery = document.getElementById("videoGallery");
  if (videoGallery && window.lightGallery) {
    lightGallery(videoGallery, {
      plugins: [lgZoom, lgThumbnail, lgVideo],
      speed: 500,
      videojs: true,
      thumbnail: true,
    });
  }

  const featureVideo = document.getElementById("featureVideo");
  if (featureVideo && window.lightGallery) {
    lightGallery(featureVideo, {
      plugins: [lgZoom, lgThumbnail, lgVideo],
      speed: 500,
      videojs: true,
      thumbnail: true,
    });
  }

  /* =========================
     Notice Slider
  ========================= */
  const slider = document.getElementById("notice-slider");
  const items = document.querySelectorAll(".notice-item");

  if (slider && items.length) {
    let currentIndex = 0;
    const intervalTime = 4000;

    function moveSlider() {
      currentIndex = (currentIndex + 1) % items.length;
      const height = items[0].offsetHeight;
      slider.style.transform = `translateY(-${currentIndex * height}px)`;
    }

    setInterval(moveSlider, intervalTime);
  }

  /* =========================
     Registration Modal
  ========================= */
  const modal = document.getElementById("regModal");
  const openBtn = document.getElementById("openRegModal");
  const closeBtn = document.getElementById("closeRegModal");
  const form = document.getElementById("registrationForm");
  const success = document.getElementById("regSuccess");

  if (modal && openBtn && closeBtn && form && success) {
    openBtn.onclick = () => {
      modal.classList.remove("hidden");
      document.body.style.overflow = "hidden";
    };

    const closeRegModal = () => {
      modal.classList.add("hidden");
      document.body.style.overflow = "auto";
    };

    closeBtn.onclick = closeRegModal;

    modal.onclick = (e) => {
      if (e.target === modal) closeRegModal();
    };

    form.onsubmit = (e) => {
      e.preventDefault();
      form.classList.add("hidden");
      success.classList.remove("hidden");
    };
  }

  /* =========================
     Bangla Date
  ========================= */
  function getBanglaDate() {
    const today = new Date();
    const banglaYear = today.getFullYear() - 593;
    const banglaMonths = [
      "বৈশাখ", "জ্যৈষ্ঠ", "আষাঢ়", "শ্রাবণ",
      "ভাদ্র", "আশ্বিন", "কার্তিক", "অগ্রহায়ণ",
      "পৌষ", "মাঘ", "ফাল্গুন", "চৈত্র"
    ];
    return `${today.getDate()} ${banglaMonths[today.getMonth()]}, ${banglaYear}`;
  }

  const banglaDateEl = document.getElementById("bangla-date");
  if (banglaDateEl) {
    banglaDateEl.innerText = getBanglaDate();
  }

});

/* =========================
   Mobile Menu
========================= */
const openMenu = document.getElementById("openMenu");
const closeMenu = document.getElementById("closeMenu");
const mobileMenu = document.getElementById("mobileMenu");
const overlay = document.getElementById("overlay");

if (openMenu && closeMenu && mobileMenu && overlay) {
  openMenu.onclick = () => {
    mobileMenu.classList.remove("translate-x-full");
    overlay.classList.remove("opacity-0", "invisible");
  };

  closeMenu.onclick = overlay.onclick = () => {
    mobileMenu.classList.add("translate-x-full");
    overlay.classList.add("opacity-0", "invisible");
  };
}

/* =========================
   Swiper Sliders
========================= */
if (window.Swiper) {

  if (document.querySelector(".heroSwiper")) {
    new Swiper(".heroSwiper", {
      loop: true,
      speed: 2000,
      // autoplay: { delay: 2000, disableOnInteraction: false },
      pagination: { el: ".swiper-pagination-vertical", clickable: true },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  }

  if (document.querySelector(".activitiesSwiper")) {
    new Swiper(".activitiesSwiper", {
      slidesPerView: 1,
      spaceBetween: 20,
      pagination: { el: ".swiper-pagination", clickable: true },
      breakpoints: {
        640: { slidesPerView: 2 },
        1024: { slidesPerView: 3 },
      },
      autoplay: { delay: 3000, disableOnInteraction: false },
    });
  }

  if (document.querySelector(".teamSwiper")) {
    new Swiper(".teamSwiper", {
      loop: true,
      spaceBetween: 30,
      pagination: {
        el: ".teamSwiper .swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".teamSwiper .swiper-button-next",
        prevEl: ".teamSwiper .swiper-button-prev",
      },
      breakpoints: {
        320: { slidesPerView: 1 },
        640: { slidesPerView: 2 },
        1024: { slidesPerView: 3 },
      },
    });
  }

  if (document.querySelector(".noticeSwiper")) {
    new Swiper(".noticeSwiper", {
      loop: true,
      slidesPerView: "auto",
      speed: 10000,
      allowTouchMove: false,
      autoplay: { delay: 0, disableOnInteraction: false },
      freeMode: { enabled: true, momentum: false },
    });
  }
}

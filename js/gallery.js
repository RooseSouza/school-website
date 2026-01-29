document.querySelectorAll(".section").forEach(section => {
  const track = section.querySelector(".carousel-track");
  const slides = Array.from(track.children);
  const thumbnails = section.querySelectorAll(".thumbnails img");
  const prevBtn = section.querySelector(".prev");
  const nextBtn = section.querySelector(".next");

  let currentIndex = 0;
  let autoSlide;

  function updateSlide(index) {
    const slideWidth = slides[0].getBoundingClientRect().width;
    track.style.transform = `translateX(-${slideWidth * index}px)`;

    thumbnails.forEach(t => t.classList.remove("active"));
    thumbnails[index].classList.add("active");
  }

  function nextSlide() {
    currentIndex = (currentIndex + 1) % slides.length;
    updateSlide(currentIndex);
  }

  function prevSlide() {
    currentIndex =
      (currentIndex - 1 + slides.length) % slides.length;
    updateSlide(currentIndex);
  }

  function startAutoSlide() {
    autoSlide = setInterval(nextSlide, 4000); // 4 seconds
  }

  function resetAutoSlide() {
    clearInterval(autoSlide);
    startAutoSlide();
  }

  // Button controls
  nextBtn.addEventListener("click", () => {
    nextSlide();
    resetAutoSlide();
  });

  prevBtn.addEventListener("click", () => {
    prevSlide();
    resetAutoSlide();
  });

  // Thumbnail click
  thumbnails.forEach((thumb, index) => {
    thumb.addEventListener("click", () => {
      currentIndex = index;
      updateSlide(currentIndex);
      resetAutoSlide();
    });
  });

  // Init
  updateSlide(currentIndex);
  startAutoSlide();
});

const filterButtons = document.querySelectorAll(".filter-btn");
const sections = document.querySelectorAll(".section");

filterButtons.forEach(btn => {
  btn.addEventListener("click", () => {
    // active state
    filterButtons.forEach(b => b.classList.remove("active"));
    btn.classList.add("active");

    const filter = btn.dataset.filter;

    sections.forEach(section => {
      if (filter === "all" || section.dataset.category === filter) {
        section.style.display = "block";
      } else {
        section.style.display = "none";
      }
    });
  });
});

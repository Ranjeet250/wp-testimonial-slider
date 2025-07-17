document.addEventListener("DOMContentLoaded", function () {
  const testimonials = document.querySelectorAll(".testimonial");
  const container = document.querySelector(".testimonial-slider");
  let current = 0;

  // Create dots
  const dotsContainer = document.createElement("div");
  dotsContainer.classList.add("slider-dots");

  testimonials.forEach((_, index) => {
    const dot = document.createElement("span");
    dot.classList.add("slider-dot");
    if (index === 0) dot.classList.add("active");
    dot.addEventListener("click", () => {
      current = index;
      updateSlider();
    });
    dotsContainer.appendChild(dot);
  });

  container.appendChild(dotsContainer);

  function updateSlider() {
    testimonials.forEach((t, i) => {
      t.classList.remove("active");
      if (i === current) t.classList.add("active");
    });

    const dots = document.querySelectorAll(".slider-dot");
    dots.forEach((d, i) => {
      d.classList.remove("active");
      if (i === current) d.classList.add("active");
    });
  }

  function autoSlide() {
    current = (current + 1) % testimonials.length;
    updateSlider();
  }

  updateSlider();
  setInterval(autoSlide, 4000); // Auto-scroll every 4 seconds
});

const carouselArrowLeft = document.querySelector(".carousel-arrow-left");
const carouselArrowRight = document.querySelector(".carousel-arrow-right");
const carouselInner = document.querySelector(".carousel-inner");
const carouselItems = document.querySelectorAll(".carousel-item");
const carouselIndicators = document.querySelectorAll(".carousel-indicator");

let currentCarouselItem = 0;

function updateCarousel() {
  carouselItems.forEach((carouselItem, index) => {
    carouselItem.classList.toggle("active", index === currentCarouselItem);
  });
  carouselIndicators.forEach((indicator, index) => {
    indicator.classList.toggle("active", index === currentCarouselItem);
  });
  carouselInner.style.transform = `translateX(-${currentCarouselItem * 100}%)`;
}

function moveCarouselLeft() {
  currentCarouselItem--;
  if (currentCarouselItem < 0) {
    currentCarouselItem = carouselItems.length - 1;
  }
  updateCarousel();
}

function moveCarouselRight() {
  currentCarouselItem++;
  if (currentCarouselItem >= carouselItems.length) {
    currentCarouselItem = 0;
  }
  updateCarousel();
}

carouselArrowLeft.addEventListener("click", moveCarouselLeft);
carouselArrowRight.addEventListener("click", moveCarouselRight);

carouselIndicators.forEach((indicator, index) => {
  indicator.addEventListener("click", () => {
    currentCarouselItem = index;
    updateCarousel();
  });
});

// Auto-cycle the carousel every 3 seconds
// setInterval(moveCarouselRight, 3000);

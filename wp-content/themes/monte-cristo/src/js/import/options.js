export const options = {
  mathUtils: {
    // map number x from range [a, b] to [c, d]
    map: (x, a, b, c, d) => ((x - a) * (d - c)) / (b - a) + c,
    // linear interpolation
    lerp: (a, b, n) => (1 - n) * a + n * b,
    // Random float
    getRandomFloat: (min, max) =>
      (Math.random() * (max - min) + min).toFixed(2),
  },
  body: $("body"), // document.body
  header: $(".site-header"),
  btnToTop: $(".btn-to-top"),
  lightGallery: {
    download: false
  },
  sliders: {
    hero: {
      speed: 600,
      loop: true,
      effect: "fade",
      autoplay: true,
      fadeEffect: {
        crossFade: true
      }
    },
    gallery: {
      speed: 600,
      slidesPerView: 1,
      centeredSlides: true,
      spaceBetween: 30,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        // when window width is >= 576px
        992: {
          initialSlide: 1,
          slidesPerView: 2,
          spaceBetween: 130,
        },
      }
    }
  },
};

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
  header: $(".page-header"),
  zooming: {
    bgColor: "#0d0d0d",
    bgOpacity: 0.5,
    scrollThreshold: 100,
    scaleExtra: 0.8,
  },
  tippy: {
    animation: "perspective",
    interactive: true,
    interactiveBorder: 32,
    trigger: "mouseenter click",
  },
  sliders: {
    gallery: {
      speed: 600,
      preloadImages: false,
      spaceBetween: 15,
      observer: true,
      // Enable lazy loading
      lazy: {
        loadPrevNext: true
      },
      pagination: {
        el: '.gallery-pagination',
        clickable: true,
        type: 'bullets'
      },
      navigation: {
        nextEl: ".gallery-button-next",
        prevEl: ".gallery-button-prev"
      }
    }
  },
};

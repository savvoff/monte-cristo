import { options } from "./options";
import Swiper, { Autoplay, Pagination, Navigation, EffectFade } from "swiper";
Swiper.use([Autoplay, Pagination, Navigation, EffectFade]);

// Sliders
if ($(".hero-slider").length) {
  const heroSwiper = new Swiper(".hero-slider", options.sliders.hero);
  heroSwiper.on("progress", (slider, progress) => {
    for (let i = 0; i < slider.slides.length; i++) {
      let slideProgress = slider.slides[i].progress,
        innerOffset = slider.width * 0.25,
        innerTranslate = slideProgress * innerOffset;
      slider.slides[i].querySelector(
        "img"
      ).style.transform = `translate3d(${innerTranslate}px, 0, 0)`;
    }
  });
  heroSwiper.on("setTransition", (slider, transition) => {
    for (let i = 0; i < slider.slides.length; i++) {
      slider.slides[i].style.transition = `${transition}ms`;
      slider.slides[i].querySelector(
        "img"
      ).style.transition = `${transition}ms`;
    }
  });
  heroSwiper.on("touchStart", (slider, event) => {
    for (let i = 0; i < slider.slides.length; i++) {
      slider.slides[i].style.transition = "";
    }
  });
}

if ($(".gallery-slider").length) {
  const gallerySwiper = new Swiper(".gallery-slider", options.sliders.gallery);
}

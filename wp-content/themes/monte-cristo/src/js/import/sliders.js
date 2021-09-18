import { options } from "./options";
import Swiper, { Navigation, Pagination, Lazy } from "swiper";
Swiper.use([Navigation, Pagination, Lazy]);

window.Swiper = Swiper;
// Sliders
if ($(".hero-slider").length) {
  // const heroSwiper = new Swiper(".hero-slider", options.sliders.hero);
  // $(".hero .total").text(`0${heroSwiper.slides.length}`.slice(-2));
  // heroSwiper.on("slideChange", (slider) =>
  //   $(".hero .this").text(`0${slider.activeIndex + 1}`.slice(-2))
  // );
  // heroSwiper.on("progress", (slider, progress) => {
  //   for (let i = 0; i < slider.slides.length; i++) {
  //     let slideProgress = slider.slides[i].progress,
  //       innerOffset = slider.width * 0.25,
  //       innerTranslate = slideProgress * innerOffset;
  //     slider.slides[i].querySelector(
  //       "img"
  //     ).style.transform = `translate3d(${innerTranslate}px, 0, 0)`;
  //   }
  // });
  // heroSwiper.on("setTransition", (slider, transition) => {
  //   for (let i = 0; i < slider.slides.length; i++) {
  //     slider.slides[i].style.transition = `${transition}ms`;
  //     slider.slides[i].querySelector(
  //       "img"
  //     ).style.transition = `${transition}ms`;
  //   }
  // });
  // heroSwiper.on("touchStart", (slider, event) => {
  //   for (let i = 0; i < slider.slides.length; i++) {
  //     slider.slides[i].style.transition = "";
  //   }
  // });
}
if ($(".slider-gallery").length) {
  const sliderGallery = new Swiper(".slider-gallery", options.sliders.gallery);
}
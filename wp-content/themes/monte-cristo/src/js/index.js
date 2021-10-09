import { options } from "./import/options";
import "./import/sliders";
import {
  embedYoutube,
  // accordionMenu,
  setFullHeight,
  // fillInput,
  // expander,
  scrollTo,
  // scrollHeader,
  // selector,
  // openTab,
  showMenu,
  // setProgress,
  // setAspectRatioVideo,
  // Modal,
  // Timer,
  // customCursor,
} from "./import/helpers";
// import objectFitImages from "object-fit-images";
import "lightgallery.js";
import lozad from "lozad";

// Custom plugins
import "./import/selectbox";

// Constants
const PATH = themePath;

class App {
  constructor() {
    this.addEventListeners();
    setFullHeight();
    $("#svg-sprites").load(`${PATH}/dist/img/sprites/sprite.svg`);
    // setAspectRatioVideo();
    const el = document.querySelectorAll("img");
    const observer = lozad(el); // passing a `NodeList` (e.g. `document.querySelectorAll()`) is also valid
    observer.observe();

    embedYoutube();

    lightGallery($("#lightgallery").get(0), options.lightGallery);

    // new Modal("[data-modal]");
    // new Timer("[data-timer]");

    // End Loader dev
    // setProgress();
  }
  preloadSession() {
    if (!parseInt(sessionStorage.getItem("loader"))) {
      setProgress(true);
      $(".preloader").addClass("loading");
      sessionStorage.setItem("loader", 1);
    }
  }
  addEventListeners() {
    $(window).on("scroll", (ev) => {
      const $btnToTop = options.btnToTop;
      if ($(ev.currentTarget).scrollTop() >= $(ev.currentTarget).height()) {
        $btnToTop.addClass("is-show");
      } else {
        $btnToTop.removeClass("is-show");
      }
    });

    $(window).on("load", () => {
      // End Loader prod
      // setProgress();
      // scrollHeader();
      console.log("App init\n");
    });

    $(window).on("resize", () => {
      setFullHeight();
      // calcWinsize();
    });

    // Elements events
    // $(".form-control, .form-check input").on(
    //   "blur input focus change",
    //   fillInput
    // );

    // end
    $(".burger-container").on("click", showMenu);
    $(".btn-to-top, a[href^='#']").on("click", scrollTo);
  }
}

new App();

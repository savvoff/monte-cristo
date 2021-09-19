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
  openTab,
  showMenu,
  // setProgress,
  // scrollHeader,
  // setAspectRatioVideo,
  Modal,
  Timer,
  // customCursor,
} from "./import/helpers";
// import objectFitImages from "object-fit-images";
// import Zooming from "zooming";
// import tippy from "tippy.js";

// Custom plugins
import "./import/selectbox";

// Constants
const PATH = themePath;

class App {
  constructor() {
    // this.preloadSession();
    this.addEventListeners();
    $("#svg-sprites").load(`${PATH}/dist/img/sprites/sprite.svg`);
    objectFitImages("img.img-fit");
    // tippy("[data-tippy-content]", options.tippy);
    setAspectRatioVideo();
    embedYoutube();

    new Modal("[data-modal]");
    new Timer("[data-timer]");
    const zooming = new Zooming(options.zooming);
    // zooming.overlay.parent = $("[data-scroll-container]").get(0); // change el to append overlay
    zooming.listen("[data-zoom], article img, .article img");

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
    $(window).on("scroll", () => {
      // getPageYScroll();
      scrollHeader();
    });

    $(window).on("load", () => {
      // End Loader prod
      // setProgress();
      scrollHeader();
      console.log("App init\n");
    });

    $(window).on("resize", () => {
      setFullHeight();
      // calcWinsize();
    });

    // Elements events
    // $(".tab__link").on("click", openTab);
    // $(".form-control, .form-check input").on(
    //   "blur input focus change",
    //   fillInput
    // );
    // $(".accordion__tab.active").find(".accordion__content").slideToggle();
    // $(".accordion__group").on("click", accordionMenu);

    // $(".btn-expand").on("click", expander);
    // end
    $(".burger").on("click", showMenu);
    $(".to-top, a[href^='#']").on("click", scrollTo);
    // $(".page-langs").on("click", selector);
  }
}

new App();

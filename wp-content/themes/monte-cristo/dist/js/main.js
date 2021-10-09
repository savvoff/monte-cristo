/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./wp-content/themes/monte-cristo/src/js/import/helpers.js":
/*!*****************************************************************!*\
  !*** ./wp-content/themes/monte-cristo/src/js/import/helpers.js ***!
  \*****************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "scrollHeader": () => (/* binding */ scrollHeader),
/* harmony export */   "embedYoutube": () => (/* binding */ embedYoutube),
/* harmony export */   "setAspectRatioVideo": () => (/* binding */ setAspectRatioVideo),
/* harmony export */   "accordionMenu": () => (/* binding */ accordionMenu),
/* harmony export */   "showMenu": () => (/* binding */ showMenu),
/* harmony export */   "setProgress": () => (/* binding */ setProgress),
/* harmony export */   "setFullHeight": () => (/* binding */ setFullHeight),
/* harmony export */   "fillInput": () => (/* binding */ fillInput),
/* harmony export */   "showPass": () => (/* binding */ showPass),
/* harmony export */   "scrollTo": () => (/* binding */ scrollTo),
/* harmony export */   "selector": () => (/* binding */ selector),
/* harmony export */   "expander": () => (/* binding */ expander),
/* harmony export */   "openTab": () => (/* binding */ openTab),
/* harmony export */   "Modal": () => (/* binding */ Modal),
/* harmony export */   "countdown": () => (/* binding */ countdown),
/* harmony export */   "Timer": () => (/* binding */ Timer),
/* harmony export */   "blogFilter": () => (/* binding */ blogFilter)
/* harmony export */ });
/* harmony import */ var _options__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./options */ "./wp-content/themes/monte-cristo/src/js/import/options.js");
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

// import { isMobile } from "mobile-device-detect";
 // import "simplebar";
// Global helpers
// YT Player

function onYouTubeIframeAPIReady() {
  function onPlayerReady(event) {// event.target.mute();
    // event.target.playVideo();
    // $(event.target.h).parent().find('img').fadeOut(3000);
  }

  var config = {
    height: "100%",
    width: "100%",
    playerVars: {
      autoplay: 0,
      loop: 1,
      controls: 1,
      disablekb: 1,
      fs: 0,
      rel: 0,
      playlist: "",
      showinfo: 0,
      enablejsapi: 1,
      autohide: 0,
      modestbranding: 1,
      wmode: "opaque"
    },
    videoId: ""
  };
  $("[data-video]").each(function (i, el) {
    config.videoId = config.playerVars.playlist = $(el).data("id");
    var $wrap = $(el).parent();
    var player = new YT.Player(el, config);
    $wrap.find("button").on("click", function (ev) {
      player.playVideo();
      $(ev.currentTarget).fadeOut().prev("img").fadeOut(800);
    });
  });
}

window.onYouTubeIframeAPIReady = onYouTubeIframeAPIReady;

window.blockScroll = function () {
  var scrollPosition = [self.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft, self.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop];
  var html = $("html"); // it would make more sense to apply this to body, but IE7 won't have that

  html.data("scroll-position", scrollPosition);
  html.data("previous-overflow", html.css("overflow"));
  html.css("overflow", "hidden");
  window.scrollTo(scrollPosition[0], scrollPosition[1]);
};

window.unblockScroll = function () {
  var html = jQuery("html");
  var scrollPosition = html.data("scroll-position");
  html.css("overflow", html.data("previous-overflow"));
  window.scrollTo(scrollPosition[0], scrollPosition[1]);
}; // end
// Smooth scroll to ellement


function scrollHeader(ev) {
  if (isMobile) {
    var scrollTop = _options__WEBPACK_IMPORTED_MODULE_0__.options.header.offset().top ? true : false;
    scrollTop ? _options__WEBPACK_IMPORTED_MODULE_0__.options.header.addClass("is-scroll") : _options__WEBPACK_IMPORTED_MODULE_0__.options.header.removeClass("is-scroll");
  }
} // Insert iframe API YT script

function embedYoutube() {
  var tag = document.createElement("script");
  tag.src = "https://www.youtube.com/iframe_api";
  var firstScriptTag = document.getElementsByTagName("script")[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
} // Set aspect ratio to html video

function setAspectRatioVideo() {
  var $video = $("video, iframe");

  if ($video.length) {
    $video.parent().is("p") ? $video.parent().addClass("ratio-16x9") : $video.wrap("<div class='ratio-16x9'></div>");
  }
}
function accordionMenu(ev) {
  if (!$(ev.currentTarget).closest(".accordion__tab").hasClass("active")) {
    $(ev.currentTarget).closest(".accordion__tab").addClass("active").find(".accordion__content").slideToggle(); // $(ev.currentTarget).closest('.accordion__tab').addClass('active').siblings('.accordion__tab.active').removeClass('active')
    // .find('.accordion__content').slideToggle();
  } else $(ev.currentTarget).closest(".accordion__tab").removeClass("active").find(".accordion__content").slideToggle();
} // Burger sidebar

function showMenu() {
  if (_options__WEBPACK_IMPORTED_MODULE_0__.options.header.find(".burger-container").hasClass("is-animate")) {
    _options__WEBPACK_IMPORTED_MODULE_0__.options.header.find(".burger-container").removeClass("is-animate");
    unblockScroll();
  } else {
    _options__WEBPACK_IMPORTED_MODULE_0__.options.header.find(".burger-container").addClass("is-animate");
    blockScroll();
  }
} // Site loader

function setProgress(action) {
  var $counter = $(".preloader-counter"),
      $bar = $(".preloader-bar");
  if (action) $counter.text("1");
  var interval = setInterval(bar, Math.ceil(Math.random() * 100 + 50));

  function bar() {
    var progress = parseInt($counter.text());

    if (!action) {
      clearInterval(interval);
      $counter.text("100");
      $bar.css("background-size", "100%");
      _options__WEBPACK_IMPORTED_MODULE_0__.options.body.addClass("loaded");
    } else if (progress <= 80) {
      var random = Math.floor(Math.random() * 10);
      progress += random;
      $counter.text(progress);
      $bar.css("background-size", "".concat(progress, "%"));
    }
  }
}
function setFullHeight() {
  var vh = $(window).innerHeight() * 0.01;
  $("html").attr("style", "--vh: ".concat(vh, "px"));
} // Checking input for empty value

function fillInput(ev) {
  makeActive();
  var el = $(ev.currentTarget);

  if (el.is("input[type='checkbox']")) {
    return ev.type === "change" ? el.closest(".form-group").toggleClass("is-filled") : false;
  } else if (el.is("input[type='radio']")) {
    return makeActive();
  }

  if (el.val() !== "" || ev.type === "focus") {
    el.closest(".form-group").addClass("is-filled");
  } else {
    el.closest(".form-group").removeClass("is-filled");
  }

  function makeActive() {
    $("input[type='radio']").each(function () {
      if ($(this).prop("checked")) {
        $(this).closest(".form-group").addClass("is-filled");
      } else {
        $(this).closest(".form-group").removeClass("is-filled");
      }
    });
  }
} // Show pass in input[password] when hold

function showPass(ev) {
  if (isMobile && ev.type === "click") {
    $(ev.currentTarget).prev().attr("type") === "text" ? $(ev.currentTarget).prev().attr("type", "password") : $(ev.currentTarget).prev().attr("type", "text");
  } else if (ev.type === "mousedown" && !isMobile) {
    $(ev.currentTarget).prev().prop("type", "text");
  } else if ((ev.type === "mouseup" || ev.type === "mouseout") && !isMobile) {
    $(ev.currentTarget).prev().prop("type", "password");
  }
} // Smooth scroll to ellement

function scrollTo(ev) {
  var toEl = $(ev.currentTarget).attr("href");
  toEl ? $("html, body").stop().animate({
    scrollTop: $(toEl).offset().top
  }) : $("html, body").stop().animate({
    scrollTop: 0
  });
  return false;
} // Universal Selector

function selector(ev) {
  if ($(ev.currentTarget).length) $(ev.currentTarget).toggleClass("is-open");
} // Expand text

function expander(ev) {
  var $content = $(ev.currentTarget).prev(),
      curHeight = $content.height();
  $content.css("height", "auto");
  $content.attr("aria-expanded", true);
  var autoHeight = $content.height(); // with scroll height of scrolled element

  $content.height(curHeight).animate({
    height: autoHeight
  }, 300);
  $(ev.currentTarget).remove();
} // Tabs

function openTab(ev) {
  ev.preventDefault();
  var id = $(ev.currentTarget).data("target");
  var pos = $(this).position();

  if ($(this).parent().find(".tab-slider").length) {
    $(this).parent().find(".tab-slider").stop().css({
      left: pos.left,
      width: $(this).outerWidth()
    });
  }

  $(".tab__content").each(function (i, el) {
    $(el).attr("visibility", "hidden");
    $(el).removeClass("active");
  });
  $(".tab__link").each(function (i, el) {
    $(el).removeClass("active");
  });
  $(id).attr("visibility", "");
  $(id).addClass("active");
  $(ev.currentTarget).addClass("active");
} // Modals & popups

var Modal = /*#__PURE__*/function () {
  function Modal(selector) {
    _classCallCheck(this, Modal);

    this.selector = selector;
    this.run();
  }

  _createClass(Modal, [{
    key: "closeOnEsc",
    value: function closeOnEsc(ev) {
      if (ev.keyCode == 27) {
        _options__WEBPACK_IMPORTED_MODULE_0__.options.body.css("overflow", "");
        $(".show-modal").removeClass("show-modal");
        $(window).off("keydown", this.closeOnEsc);
      }
    }
  }, {
    key: "closeModal",
    value: function closeModal(modal) {
      if ($(modal).length) {
        _options__WEBPACK_IMPORTED_MODULE_0__.options.body.css("overflow", "");
        $(modal).parent().removeClass("show-modal");
        $(window).off("keydown", this.closeOnEsc);
      }
    }
  }, {
    key: "openModal",
    value: function openModal(modal) {
      if ($(modal).length) {
        _options__WEBPACK_IMPORTED_MODULE_0__.options.body.css("overflow", "hidden");
        $(modal).parent().addClass("show-modal");
        $(window).on("keydown", this.closeOnEsc);
      }
    }
  }, {
    key: "render",
    value: function render(el) {
      var _this = this;

      var modalClass = $(el).data("modal") || ".modal",
          $btnClose = $(modalClass).find(".btn-close");
      $(el).on("click", function () {
        return _this.openModal(modalClass);
      });
      $btnClose.on("click", function () {
        return _this.closeModal(modalClass);
      });
      $(modalClass).parent().on("click", function (ev) {
        if (ev.currentTarget === ev.target) _this.closeModal(modalClass);
      });
    }
  }, {
    key: "run",
    value: function run() {
      var _this2 = this;

      var $elements = $(this.selector);
      $elements.each(function (i, el) {
        return _this2.render(el);
      });
    }
  }]);

  return Modal;
}(); // Coundown

function countdown(cls) {
  if (!$(cls).length) return;
  $(cls).each(function (i, el) {
    var end = $(el).data("end");
    var timer = setInterval(function () {
      var t = end - Date.now(),
          days = Math.floor(t / (1000 * 60 * 60 * 24)),
          hours = Math.floor(t % (1000 * 60 * 60 * 24) / (1000 * 60 * 60)),
          minutes = Math.floor(t % (1000 * 60 * 60) / (1000 * 60)),
          seconds = Math.floor(t % (1000 * 60) / 1000);
      days ? $(el).text("".concat(days, "d ").concat(hours, "h ").concat(minutes, "min ").concat(seconds, "sec")) : $(el).text("".concat(hours, "h ").concat(minutes, "min ").concat(seconds, "sec"));

      if (t <= 0) {
        clearInterval(timer);
        $(el).closest(".card").remove();
      }
    }, 1000);
  });
}
var Timer = /*#__PURE__*/function () {
  function Timer(element) {
    _classCallCheck(this, Timer);

    this.clock = $(element);
    this.end = this.clock.data("end");
    this.initClock(this.clock, this.end);
  }

  _createClass(Timer, [{
    key: "getTimeRemaining",
    value: function getTimeRemaining() {
      var endtime = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : Date.now() + 604800000;
      var t = endtime - Date.now(),
          seconds = Math.floor(t / 1000 % 60),
          minutes = Math.floor(t / 1000 / 60 % 60),
          hours = Math.floor(t / (1000 * 60 * 60) % 24),
          days = Math.floor(t / (1000 * 60 * 60 * 24));
      return {
        total: t,
        days: days,
        hours: hours,
        minutes: minutes,
        seconds: seconds
      };
    }
  }, {
    key: "initClock",
    value: function initClock(clock, endtime) {
      var _this3 = this;

      if (!clock.length) return;
      var daysSpan = clock.find(".days"),
          hoursSpan = clock.find(".hours"),
          minutesSpan = clock.find(".minutes"),
          secondsSpan = clock.find(".seconds");
      var $circ = this.clock.find(".timer-circle path"),
          radius = Math.round($circ.get(0).getTotalLength());
      $circ.css("strokeDasharray", "".concat(radius, " ").concat(radius));
      $circ.css("strokeDashoffset", radius);

      var updateClock = function updateClock() {
        var t = _this3.getTimeRemaining(endtime);

        if (t.total <= 0) {
          clearInterval(timeinterval);
          daysSpan.text("0");
          hoursSpan.text("0");
          minutesSpan.text("0");
          secondsSpan.text("0");
        } else {
          daysSpan.text(t.days);
          hoursSpan.text(("0" + t.hours).slice(-2));
          hoursSpan.parent().prev().find("path").css("strokeDashoffset", radius * t.hours / 24);
          minutesSpan.text(("0" + t.minutes).slice(-2));
          minutesSpan.parent().prev().find("path").css("strokeDashoffset", radius * t.minutes / 60);
          secondsSpan.text(("0" + t.seconds).slice(-2));
          secondsSpan.parent().prev().find("path").css("strokeDashoffset", radius * t.seconds / 60);
        }
      };

      updateClock();
      var timeinterval = setInterval(updateClock, 1000);
    }
  }]);

  return Timer;
}(); // global end

function blogFilter(ev) {
  var $input = $(ev.currentTarget);

  if (parseInt($input.val()) === 0) {
    $input.closest(".form-group").siblings().removeClass("is-filled").find(".form-control").prop("checked", false);
  } else $input.closest(".form-group").siblings().eq(0).removeClass("is-filled").find(".form-control").prop("checked", false);
} // let cursor;
// export function customCursor(el, ev) {
//   cursor = $(el);
//   const mouseX = ev.clientX,
//   mouseY = ev.clientY,
//   posX = cursor.width() / 2,
//   posY = cursor.height() / 2;
//   gsap.to(cursor, 0.2, {
//     x: mouseX - posX,
//     y: mouseY - posY
//   })
// }
// const hover = $("a, button, .border-corner")
// hover.mouseover(() => {
//   gsap.to(cursor, 0.8, { ease: "elastic", scale: 2 })
// });
// hover.mouseout(() => {
//   gsap.to(cursor, 0.8, { ease: "elastic", scale: 1 })
// });

/***/ }),

/***/ "./wp-content/themes/monte-cristo/src/js/import/options.js":
/*!*****************************************************************!*\
  !*** ./wp-content/themes/monte-cristo/src/js/import/options.js ***!
  \*****************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "options": () => (/* binding */ options)
/* harmony export */ });
var options = {
  mathUtils: {
    // map number x from range [a, b] to [c, d]
    map: function map(x, a, b, c, d) {
      return (x - a) * (d - c) / (b - a) + c;
    },
    // linear interpolation
    lerp: function lerp(a, b, n) {
      return (1 - n) * a + n * b;
    },
    // Random float
    getRandomFloat: function getRandomFloat(min, max) {
      return (Math.random() * (max - min) + min).toFixed(2);
    }
  },
  body: $("body"),
  // document.body
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
        prevEl: ".swiper-button-prev"
      },
      breakpoints: {
        // when window width is >= 576px
        992: {
          initialSlide: 1,
          slidesPerView: 2,
          spaceBetween: 130
        }
      }
    }
  }
};

/***/ }),

/***/ "./wp-content/themes/monte-cristo/src/js/import/selectbox.js":
/*!*******************************************************************!*\
  !*** ./wp-content/themes/monte-cristo/src/js/import/selectbox.js ***!
  \*******************************************************************/
/***/ (() => {

// Document ready...
document.addEventListener("DOMContentLoaded", function (event) {
  // Helper functions
  function _insertAfter(_ref, _new) {
    _ref.parentNode.insertBefore(_new, _ref.nextSibling);
  }

  function _hasClass(el, cls) {
    return (" " + el.className + " ").indexOf(" " + cls + " ") > -1;
  } // Close selectbox if clicked elsewhere...


  window.onclick = function () {
    var _q = document.getElementsByClassName("selectbox-options");

    for (var q = 0; q < _q.length; q++) {
      _q[q].setAttribute("class", "selectbox-options selectbox-options--hidden");
    }
  }; // Target select boxes


  var items = document.getElementsByClassName("justselect");

  for (var i = 0; i < items.length; i++) {
    items[i].required = true; // For mobiles... We need to change our new selectboxes based on values of that old ones

    items[i].onchange = function () {
      var target = document.getElementsByClassName("selectbox__label");
      var val = this.value;
      var pairId = this.dataset.sid;
      var opts = this.options; // Go through all labels...

      for (a = 0; a < target.length; a++) {
        // Find the right one based on pair id
        if (target[a].parentElement.dataset.pair === pairId) {
          // Go through all options
          for (b = 0; b < opts.length; b++) {
            // Find the right one by its value
            if (opts[b].value == val) {
              // Set a text
              target[a].innerHTML = opts[b].innerHTML;
              break;
            }
          }

          break;
        }
      }
    }; // Get all <option> from each selectbox


    var options = items[i].options;
    var newSelect = document.createElement("div");
    newSelect.setAttribute("class", "selectbox"); // Add a data-pair attribute for a new selectbox so we can pair options values
    // from the original one and this new one together - we need to know which
    // selectbox was clicked/changed.

    newSelect.setAttribute("data-pair", "select-" + (i + 1));
    var label = document.createElement("div");
    label.setAttribute("class", "selectbox__label");
    newSelect.appendChild(label);
    var wrap = document.createElement("div");
    wrap.setAttribute("class", "selectbox-options selectbox-options--hidden"); // Grab option values into our new dropdown

    for (var j = 0; j < options.length; j++) {
      var option = document.createElement("div");
      option.setAttribute("class", "selectbox__option");
      option.setAttribute("data-value", options[j].value); // Is option selected?

      if (options[j].selected === true) {
        option.setAttribute("class", option.className + " selectbox__option--selected"); // Set a selected option's text into the label

        label.innerHTML = options[j].text;
      } // Don't show a disabled option in the list, it's just used in the label and in the original input


      if (!options[j].disabled) {
        option.innerHTML = options[j].text;
        wrap.appendChild(option);
        newSelect.appendChild(wrap);
      }
    } // Insert our new "div select box" after the original select elenent, and then hide that original select.
    // Display overwritten by CSS - this rule doesn't apply in mobile view, there's need to be both of selects shown
    // due to use of an original "scroll select" effect on iPhone and other devices.


    _insertAfter(items[i], newSelect);

    items[i].setAttribute("data-sid", "select-" + (i + 1));
    items[i].style.display = "none";
  }

  var sel = document.getElementsByClassName("justselect"); // Wrap selectbox elements, needed to mobile-click works properly

  for (var e = 0; e < sel.length; e++) {
    var container = document.createElement("div");
    container.setAttribute("class", "justwrap");
    var box = document.getElementsByClassName("selectbox");
    sel[e].parentElement.insertBefore(container, sel[e]);
    box[e].parentElement.insertBefore(container, box[e]);
    container.appendChild(sel[e]);
    container.appendChild(box[e]);
  } // Dropdown function


  var _label = document.getElementsByClassName("selectbox__label");

  for (var k = 0; k < _label.length; k++) {
    _label[k].onclick = function (event) {
      // Don't close selectbox if user clicks on it
      event.stopPropagation();

      var _this = this;

      var _options = this.nextSibling;
      var _option = _options.children; // Should it be shown or hidden after this click?

      if (_hasClass(_options, "selectbox-options--hidden")) _options.setAttribute("class", "selectbox-options");else _options.setAttribute("class", "selectbox-options selectbox-options--hidden"); // Clickable options

      for (var o = 0; o < _option.length; o++) {
        _option[o].onclick = function () {
          // Unset selected class
          for (var s = 0; s < _option.length; s++) {
            if (s != o) _option[s].setAttribute("class", "selectbox__option");
          } // Change label and set a new selected class for current item


          _this.innerHTML = this.innerHTML;
          this.setAttribute("class", "selectbox__option selectbox__option--selected"); // Set selected value to the original selectbox

          var sel = document.querySelectorAll('[data-sid="' + _this.parentElement.dataset.pair + '"]');
          sel[0].value = this.dataset.value; // Close the box

          _options.setAttribute("class", "selectbox-options selectbox-options--hidden");
        };
      }
    };
  }
});

/***/ }),

/***/ "./wp-content/themes/monte-cristo/src/js/import/sliders.js":
/*!*****************************************************************!*\
  !*** ./wp-content/themes/monte-cristo/src/js/import/sliders.js ***!
  \*****************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _options__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./options */ "./wp-content/themes/monte-cristo/src/js/import/options.js");
/* harmony import */ var swiper__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! swiper */ "./node_modules/swiper/swiper.esm.js");


swiper__WEBPACK_IMPORTED_MODULE_1__["default"].use([swiper__WEBPACK_IMPORTED_MODULE_1__.Autoplay, swiper__WEBPACK_IMPORTED_MODULE_1__.Pagination, swiper__WEBPACK_IMPORTED_MODULE_1__.Navigation, swiper__WEBPACK_IMPORTED_MODULE_1__.EffectFade]); // Sliders

if ($(".hero-slider").length) {
  var heroSwiper = new swiper__WEBPACK_IMPORTED_MODULE_1__["default"](".hero-slider", _options__WEBPACK_IMPORTED_MODULE_0__.options.sliders.hero);
  heroSwiper.on("progress", function (slider, progress) {
    for (var i = 0; i < slider.slides.length; i++) {
      var slideProgress = slider.slides[i].progress,
          innerOffset = slider.width * 0.25,
          innerTranslate = slideProgress * innerOffset;
      slider.slides[i].querySelector("img").style.transform = "translate3d(".concat(innerTranslate, "px, 0, 0)");
    }
  });
  heroSwiper.on("setTransition", function (slider, transition) {
    for (var i = 0; i < slider.slides.length; i++) {
      slider.slides[i].style.transition = "".concat(transition, "ms");
      slider.slides[i].querySelector("img").style.transition = "".concat(transition, "ms");
    }
  });
  heroSwiper.on("touchStart", function (slider, event) {
    for (var i = 0; i < slider.slides.length; i++) {
      slider.slides[i].style.transition = "";
    }
  });
}

if ($(".gallery-slider").length) {
  var gallerySwiper = new swiper__WEBPACK_IMPORTED_MODULE_1__["default"](".gallery-slider", _options__WEBPACK_IMPORTED_MODULE_0__.options.sliders.gallery);
}

/***/ }),

/***/ "./wp-content/themes/monte-cristo/src/js/index.js":
/*!********************************************************!*\
  !*** ./wp-content/themes/monte-cristo/src/js/index.js ***!
  \********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _import_options__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./import/options */ "./wp-content/themes/monte-cristo/src/js/import/options.js");
/* harmony import */ var _import_sliders__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./import/sliders */ "./wp-content/themes/monte-cristo/src/js/import/sliders.js");
/* harmony import */ var _import_helpers__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./import/helpers */ "./wp-content/themes/monte-cristo/src/js/import/helpers.js");
/* harmony import */ var lightgallery_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! lightgallery.js */ "./node_modules/lightgallery.js/lib/js/lightgallery.js");
/* harmony import */ var lightgallery_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(lightgallery_js__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var lozad__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! lozad */ "./node_modules/lozad/dist/lozad.min.js");
/* harmony import */ var lozad__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(lozad__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _import_selectbox__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./import/selectbox */ "./wp-content/themes/monte-cristo/src/js/import/selectbox.js");
/* harmony import */ var _import_selectbox__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_import_selectbox__WEBPACK_IMPORTED_MODULE_5__);
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }



 // import objectFitImages from "object-fit-images";


 // Custom plugins

 // Constants

var PATH = themePath;

var App = /*#__PURE__*/function () {
  function App() {
    _classCallCheck(this, App);

    this.addEventListeners();
    (0,_import_helpers__WEBPACK_IMPORTED_MODULE_2__.setFullHeight)();
    $("#svg-sprites").load("".concat(PATH, "/dist/img/sprites/sprite.svg")); // setAspectRatioVideo();

    var el = document.querySelectorAll("img");
    var observer = lozad__WEBPACK_IMPORTED_MODULE_4___default()(el); // passing a `NodeList` (e.g. `document.querySelectorAll()`) is also valid

    observer.observe();
    (0,_import_helpers__WEBPACK_IMPORTED_MODULE_2__.embedYoutube)();
    lightGallery($("#lightgallery").get(0), _import_options__WEBPACK_IMPORTED_MODULE_0__.options.lightGallery); // new Modal("[data-modal]");
    // new Timer("[data-timer]");
    // End Loader dev
    // setProgress();
  }

  _createClass(App, [{
    key: "preloadSession",
    value: function preloadSession() {
      if (!parseInt(sessionStorage.getItem("loader"))) {
        setProgress(true);
        $(".preloader").addClass("loading");
        sessionStorage.setItem("loader", 1);
      }
    }
  }, {
    key: "addEventListeners",
    value: function addEventListeners() {
      $(window).on("scroll", function (ev) {
        var $btnToTop = _import_options__WEBPACK_IMPORTED_MODULE_0__.options.btnToTop;

        if ($(ev.currentTarget).scrollTop() >= $(ev.currentTarget).height()) {
          $btnToTop.addClass("is-show");
        } else {
          $btnToTop.removeClass("is-show");
        }
      });
      $(window).on("load", function () {
        // End Loader prod
        // setProgress();
        // scrollHeader();
        console.log("App init\n");
      });
      $(window).on("resize", function () {
        (0,_import_helpers__WEBPACK_IMPORTED_MODULE_2__.setFullHeight)(); // calcWinsize();
      }); // Elements events
      // $(".form-control, .form-check input").on(
      //   "blur input focus change",
      //   fillInput
      // );
      // end

      $(".burger-container").on("click", _import_helpers__WEBPACK_IMPORTED_MODULE_2__.showMenu);
      $(".btn-to-top, a[href^='#']").on("click", _import_helpers__WEBPACK_IMPORTED_MODULE_2__.scrollTo);
    }
  }]);

  return App;
}();

new App();

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"main": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkIds[i]] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunkmonte_cristo"] = self["webpackChunkmonte_cristo"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["vendor"], () => (__webpack_require__("./wp-content/themes/monte-cristo/src/js/index.js")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;
//# sourceMappingURL=main.js.map
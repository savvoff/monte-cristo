"use strict";

import gulp from "gulp";
// Link to proxy
export const URL = "http://monte-cristo.loc";

const requireDir = require("require-dir"),
  frontPath = "/wp-content/themes/monte-cristo", // relative path to frontend sources
  paths = {
    frontPath,
    views: {
      src: `.${frontPath}/**/*.{html,php,twig}`,
      dist: `.${frontPath}/`,
      watch: `.${frontPath}/**/*.{html,php,twig}`
    },
    styles: {
      src: `.${frontPath}/src/styles/main.{scss,sass}`,
      dist: `.${frontPath}/dist/styles/`,
      watch: [
        `.${frontPath}/src/blocks/**/*.{scss,sass}`,
        `.${frontPath}/src/styles/**/*.{scss,sass}`
      ]
    },
    scripts: {
      src: `.${frontPath}/src/js/index.js`,
      dist: `.${frontPath}/dist/js/`,
      watch: [`.${frontPath}/src/blocks/**/*.js`, `.${frontPath}/src/js/**/*.js`]
    },
    images: {
      src: [
        `.${frontPath}/src/img/**/*.{jpg,jpeg,png,gif,tiff,svg}`,
        `!.${frontPath}/src/img/favicon/*.{jpg,jpeg,png,gif,tiff}`
      ],
      dist: `.${frontPath}/dist/img/`,
      watch: `.${frontPath}/src/img/**/*.{jpg,jpeg,png,gif,svg,tiff}`
    },
    webp: {
      src: [
        `.${frontPath}/src/img/**/*.{jpg,jpeg,png,tiff}`,
        `!.${frontPath}/src/img/favicon/*.{jpg,jpeg,png,gif,tiff}`
      ],
      dist: `.${frontPath}/dist/img/`,
      watch: [
        `.${frontPath}/src/img/**/*.{jpg,jpeg,png,tiff}`,
        `!.${frontPath}/src/img/favicon/*.{jpg,jpeg,png,gif,tiff}`
      ]
    },
    sprites: {
      src: `.${frontPath}/src/img/svg/*.svg`,
      dist: `.${frontPath}/dist/img/sprites/`,
      watch: `.${frontPath}/src/img/svg/*.svg`
    },
    fonts: {
      src: `.${frontPath}/src/fonts/**/*.{woff,woff2}`,
      dist: `.${frontPath}/dist/fonts/`,
      watch: `.${frontPath}/src/fonts/**/*.{woff,woff2}`
    },
    favicons: {
      src: `.${frontPath}/src/img/favicon/*.{jpg,jpeg,png,gif}`,
      dist: `.${frontPath}/dist/img/favicons/`
    },
    gzip: {
      src: `./.htaccess`,
      dist: `./`
    }
  };

requireDir("./gulp-tasks/");

export { paths };

export const development = gulp.series(
  "clean",
  gulp.parallel([
    "views",
    "styles",
    "scripts",
    "images",
    "webp",
    "sprites",
    "fonts",
    "favicons"
  ]),
  gulp.parallel("serve")
);

export const prod = gulp.series(
  "clean",
  gulp.series([
    "views",
    "styles",
    "scripts",
    "images",
    "webp",
    "sprites",
    "fonts",
    "favicons",
    "gzip"
  ])
);

export default development;

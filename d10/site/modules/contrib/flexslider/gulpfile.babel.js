// Get gulp components and templates.
/* eslint-disable */
import { series, parallel, watch } from "gulp";
import { css, js, lib, sass } from "@coldfrontlabs/gulp-templates";
/* eslint-enable */

const paths = {
  css: {
    src: "assets/css",
    dest: "assets/css",
    selector: "**/*.css",
  },
  js: {
    src: "assets/js",
    dest: "assets/js",
    selector: "**/*.js",
  },
  sass: {
    src: "assets/scss",
    dest: "assets/scss",
    selector: "**/*.scss",
    // Ignore specifically for Stylelint:fix bug.
    ignore: ["!src/scss/ignored-code/**/*.scss"],
  },
  min: "**/*.min.*",
};

/**
 * Lints all Sass files.
 *
 * @return {Object} - Gulp stream.
 */
export const lintStyles = () =>
  sass.lint(`${paths.sass.src}/${paths.sass.selector}`);
lintStyles.description = "Lints all Sass files.";

/**
 * Lints all JS files.
 *
 * @return {Object} - Gulp stream.
 */
export const lintScripts = () =>
  js.lint(`${paths.js.src}/${paths.js.selector}`);
lintScripts.description = "Lints all JS files.";

/**
 * Lints and fixes all Sass files.
 *
 * @return {Object} - Gulp stream.
 */
export const lintStylesFix = () =>
  sass.fix([`${paths.sass.src}/${paths.sass.selector}`, ...paths.sass.ignore]);
lintStylesFix.description = "Lints and fixes all Sass files.";

/**
 * Lints and fixes all JS files.
 *
 * @return {Object} - Gulp stream.
 */
export const lintScriptsFix = () =>
  js.fix(`${paths.js.src}/${paths.js.selector}`);
lintScriptsFix.description = "Lints and fixes all JS files.";

/**
 * Compiles all Sass files.
 *
 * @return {Object} - Gulp stream.
 */
const compileSass = () =>
  sass.compile(`${paths.sass.src}/${paths.sass.selector}`, paths.css.dest);

/**
 * Compiles all CSS files.
 *
 * @return {Object} - Gulp stream.
 */
const compileCSS = () =>
  css.compile(
    [`${paths.css.src}/${paths.css.selector}`, `!${paths.min}`],
    paths.css.dest
  );

/**
 * Compiles all Sass files and CSS files afterward.
 *
 * @returns {Object} - Gulp stream.
 */
export const compileStyles = series(compileSass, compileCSS);
compileStyles.description = "Compiles all Sass files and CSS files afterward.";

/**
 * Compiles all JS files using Babel.
 *
 * @return {Object} - Gulp stream.
 */
export const compileScripts = () =>
  js.compile(`${paths.js.src}/${paths.js.selector}`, paths.js.dest);
compileScripts.description = "Compiles all JS files using Babel.";

/**
 * Minifies all CSS files.
 *
 * @return {Object} - Gulp stream.
 */
export const minifyStyles = () =>
  css.minify(
    [`${paths.css.src}/${paths.css.selector}`, `!${paths.min}`],
    paths.css.dest
  );
minifyStyles.description = "Minifies all CSS files.";

/**
 * Minifies all JS files.
 *
 * @return {Object} - Gulp stream.
 */
export const minifyScripts = () =>
  js.minify(
    [`${paths.js.dest}/${paths.js.selector}`, `!${paths.min}`],
    paths.js.dest
  );
minifyScripts.description = "Minifies all JS files.";

/**
 * Gathers all required libraries.
 *
 * @return {Object} - Gulp stream.
 */
export const fetchLibs = () =>
  lib.fetch(paths.lib.src, paths.lib.dest, { base: "./node_modules/" });
fetchLibs.description = "Gathers all required libraries.";

/**
 * Lints, compiles, and minifies all Sass/CSS/JS files and gathers all libraries.
 *
 * @returns {Object} - Gulp stream.
 */
export const buildDev = parallel(
  series(lintStyles, compileStyles, minifyStyles),
  series(lintScripts, compileScripts, minifyScripts),
  fetchLibs
);
buildDev.description =
  "Lints, compiles, and minifies all Sass/CSS/JS files and gathers all libraries.";

/**
 * Compiles and minifies all Sass/CSS/JS files and gathers all libraries.
 *
 * @returns {Object} - Gulp stream.
 */
export const buildProd = parallel(
  series(compileStyles, minifyStyles),
  series(compileScripts, minifyScripts),
  fetchLibs
);
buildProd.description =
  "Compiles and minifies all Sass/CSS/JS files and gathers all libraries.";

/**
 * Watches all Sass/JS files and lints, compiles, and minifies them.
 */
function watchFiles() {
  watch(
    `${paths.sass.src}/${paths.sass.selector}`,
    series(lintStyles, compileStyles, minifyStyles)
  );
  watch(
    `${paths.js.src}/${paths.js.selector}`,
    series(lintScripts, compileScripts, minifyScripts)
  );
}
watchFiles.description =
  "Watches all Sass/JS files and lints, compiles, and minifies them.";
export { watchFiles as watch };

// Create default tasks
export default buildProd;


var { src, series, dest, watch } = require('gulp');

var sourcemaps = require('gulp-sourcemaps');

var { init, reload } = require('browser-sync').create();

var concat = require('gulp-concat');
var terser = require('gulp-terser');
var stylus = require('gulp-stylus');

function stylusTask () {
  return src('./src/**/**/*.styl')
    .pipe(stylus({compress: true}))
    .pipe(concat('kcl-style.min.css'))
    .pipe(dest('./'))
}

function jsTask () {
  return src('./src/**/**/*.js')
    .pipe(sourcemaps.init())
    .pipe(concat('index.min.js'))
    .pipe(terser())
    .pipe(sourcemaps.write('.'))
    .pipe(dest('./'))
}

// function imgTask () {
//   return (
//     src('./src/img/**/*.svg') 
//     .pipe(dest('./deploy/src/img/')),
//     src('./src/img/**/*.png')
//     .pipe(dest('./deploy/src/img/')),
//     src('./src/img/**/*.webp')
//     .pipe(dest('./deploy/src/img/'))
//     )
// }

function listen() {
  init({
      proxy: "http://localhost/wordpress/"
  });
  watch('./src/**/**/*.styl', stylusTask)
  watch('./src/**/**/*.js', jsTask)
  watch('./*.css').on('change', reload)
  watch('./*.js').on('change', reload)
  watch('./*.php').on('change', reload)
}

exports.listen = listen;
exports.jsTask = jsTask;
// exports.imgTask= imgTask;
exports.stylusTask= stylusTask;
exports.default = series(jsTask, stylusTask, listen);
exports.build = series(jsTask, stylusTask);
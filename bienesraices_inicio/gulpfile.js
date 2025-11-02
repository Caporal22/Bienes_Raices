//Gulpfile definitivo
const { src, dest, watch, series, parallel } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const sourcemaps = require('gulp-sourcemaps');
const concat = require('gulp-concat');
const terser = require('gulp-terser-js');
const rename = require('gulp-rename');
const imagemin = require('gulp-imagemin');
const cache = require('gulp-cache');
const webp = require('gulp-webp');
const browserSync = require('browser-sync').create();

// Rutas
const paths = {
    scss: 'src/scss/**/*.scss',
    js: 'src/js/**/*.js',
    imagenes: 'src/img/**/*'
};

// Compila SCSS a CSS
function css() {
    return src(paths.scss)
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(postcss([autoprefixer(), cssnano()]))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('build/css'))
        .pipe(browserSync.stream());
}

// Compila y minifica JS
function javascript() {
    return src(paths.js)
        .pipe(sourcemaps.init())
        .pipe(concat('bundle.js'))
        .pipe(terser())
        .pipe(rename({ suffix: '.min' }))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('build/js'))
        .pipe(browserSync.stream());
}

// Optimiza imágenes
function imagenes() {
    return src(paths.imagenes)
        .pipe(cache(imagemin({ optimizationLevel: 3 })))
        .pipe(dest('build/img'))
        .pipe(browserSync.stream());
}

// Genera versión WebP
function versionWebp() {
    return src(paths.imagenes)
        .pipe(webp())
        .pipe(dest('build/img'))
        .pipe(browserSync.stream());
}

// Recarga navegador
function recargar(done) {
    browserSync.reload();
    done();
}

// Servidor estático + watchers
function servidor() {
    browserSync.init({
        server: {
            baseDir: "./" // carpeta raíz, donde está index.php
        },
        notify: false,
        open: true
    });

    watch(paths.scss, css);
    watch(paths.js, javascript);
    watch(paths.imagenes, series(imagenes, versionWebp));
    watch("*.html").on("change", () => browserSync.reload());
    watch("**/*.html").on("change", () => browserSync.reload());
}

// Limpiar caché de gulp-cache
function limpiarCache(done) {
    return cache.clearAll(done);
}

// Exportar tareas
exports.css = css;
exports.javascript = javascript;
exports.imagenes = imagenes;
exports.versionWebp = versionWebp;
exports.limpiarCache = limpiarCache;
exports.default = series(
    parallel(css, javascript, imagenes, versionWebp),
    servidor
);

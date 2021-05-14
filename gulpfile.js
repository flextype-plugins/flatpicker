const gulp         = require('gulp');
const concat       = require('gulp-concat');
const csso         = require('gulp-csso');
const autoprefixer = require('gulp-autoprefixer');
const sass         = require('gulp-sass');
const size         = require("gulp-size");
const gzip         = require("gulp-gzip");
const rename       = require("gulp-rename")
sass.compiler      = require('node-sass');

/**
 * Task: gulp css
 */
 gulp.task("css", function () {
    return gulp
        .src([
            // Flatpickr
            'node_modules/flatpickr/dist/flatpickr.min.css',

            // Blocks
            'blocks/InputFlatpicker/block.scss',
        ])
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer({
            overrideBrowserslist: [
                "last 1 version"
            ],
            cascade: false
        }))
        .pipe(csso())
        .pipe(concat('flatpicker.min.css'))
        .pipe(gulp.dest("blocks/InputFlatpicker/dist/css/"))
        .pipe(size({ showFiles: true }))
        .pipe(gzip())
        .pipe(rename("flatpicker.min.css.gz"))
        .pipe(gulp.dest("blocks/InputFlatpicker/dist/css/"))
        .pipe(size({ showFiles: true, gzip: true }));
});

/**
 * Task: gulp js
 */
 gulp.task('js', function () {
    return gulp
        .src([
            // Flatpickr
            'node_modules/flatpickr/dist/flatpickr.min.js',

            // Blocks
            'blocks/InputFlatpicker/block.js'
        ])
        .pipe(concat('flatpicker.min.js'))
        .pipe(size({ showFiles: true }))
        .pipe(gulp.dest('blocks/InputFlatpicker/dist/js/'))
        .pipe(gzip())
        .pipe(rename("flatpicker.min.js.gz"))
        .pipe(gulp.dest("blocks/InputFlatpicker/dist/js/"))
        .pipe(size({ showFiles: true, gzip: true }));
});

/**
 * Task: gulp flatpickr-langs
 */
 gulp.task('flatpickr-langs', function () {
    return gulp
        .src(['node_modules/flatpickr/dist/*l10n/**/*.js'])
        .pipe(size({ showFiles: true }))
        .pipe(gulp.dest('blocks/InputFlatpicker/dist/lang/flatpickr'));
});

/**
 * Task: gulp default
 */
gulp.task('default',
    gulp.series(
        'flatpickr-langs',
        'css',
        'js'
    )
);

/**
 * Task: gulp watch
 */
gulp.task('watch', function () {
    gulp.watch(
        ["blocks/**/*.html", "assets/src/"],
        gulp.series('default')
    );
});
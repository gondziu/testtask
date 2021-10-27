var themename = "polilab-theme"

var gulp = require('gulp'),
    // Prepare and optimize code etc
    autoprefixer = require('autoprefixer'),
    browserSync = require('browser-sync').create(),
    postcss = require('gulp-postcss'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    jshint = require('gulp-jshint'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),

    // Name of working theme folder
    global = '../' + themename + '/',
    scss = global + 'sass/',
    js = global + 'js/',
    srcjs = global + 'srcjs/';


// CSS via Sass and Autoprefixer
gulp.task('css', function () {
    return gulp.src(scss + '{style.scss,rtl.scss}')
        .pipe(sourcemaps.init())
        .pipe(sass({
            outputStyle: 'expanded',
            indentType: 'tab',
            indentWidth: '1'
        }).on('error', sass.logError))
        .pipe(postcss([
        autoprefixer('last 2 versions', '> 1%')
    ]))
        .pipe(sourcemaps.write(scss + 'maps'))
        .pipe(gulp.dest(global));
});

// JavaScript
gulp.task('javascript', function () {
    return gulp.src([srcjs + 'vendor/*.js', srcjs + '*.js'])
        .pipe(jshint())
        .pipe(jshint.reporter('fail'))
        .pipe(concat('script.js'))
        .pipe(uglify())
        .pipe(gulp.dest(js));
});

// Watch everything
gulp.task('watch', function () {
    browserSync.init({
        open: 'external',
        proxy: 'http://localhost/appwise/',
        port: 9999
    });
    gulp.watch(global + '**/*.scss', gulp.series('css'));
    gulp.watch(srcjs + '**/*.js', gulp.series('javascript'));
    gulp.watch(global + '**/*').on('change', browserSync.reload);
});


// Default task (runs at initiation: gulp --verbose)
gulp.task('default', gulp.series('watch'));

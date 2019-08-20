// Include gulp
var gulp = require('gulp'); 

// Include Our Plugins
var jshint = require('gulp-jshint');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var sourcemaps = require('gulp-sourcemaps');

// Lint Task
gulp.task('lint', function() {
    return gulp.src('js/*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});

// Compile Our sass
gulp.task('sass', function() {
    return gulp.src([
        'assets/scss/font-awesome-4.3.0/scss/font-awesome.scss',
        'assets/scss/build.scss'
        ])
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(concat('plos-collections.css'))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('assets/css'));
});

// Concatenate & Minify JS
gulp.task('scripts', function() {
    return gulp.src([
        'assets/js/fontdeck.js',
        ])
        .pipe(concat('plos-collections.js'))
        .pipe(gulp.dest('assets/js'))
        .pipe(rename('plos-collections.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('dist'));
});

// Watch Files For Changes
gulp.task('watch', function() {
    gulp.watch('./assets/javascripts/*.js', ['lint', 'scripts']);
    gulp.watch('./assets/scss/*/*/*.scss', ['sass']);
    gulp.watch('./assets/scss/*/*.scss', ['sass']);
    gulp.watch('./assets/scss/*.scss', ['sass']);
});

// Default Task
gulp.task('default', ['lint', 'sass', 'scripts', 'watch']);
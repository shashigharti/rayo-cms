module.exports = function () {
    "use strict";


    var gulp = require('gulp'),
        sass = require('gulp-sass'),
        autoprefixer = require('gulp-autoprefixer'),
        imagemin = require('gulp-imagemin'),
        rename = require('gulp-rename'),
        concat = require('gulp-concat'),
        notify = require('gulp-notify'),
        sassGlob = require('gulp-sass-glob'),
        flatten = require('gulp-flatten'),
        gulpImports = require('gulp-imports'),
        cssimport = require("gulp-cssimport"),
        util = require('gulp-util'),
        uglify = require('gulp-uglifyjs'),
        browserify = require('gulp-browserify');

    gulp.src([
        'resources/assets/admin/js/app.js'
    ])
        .pipe(gulpImports())
        .pipe(browserify({ transform: ['babelify'] }))
        .pipe(uglify({ mangle: false }))
        .pipe(concat('app.min.js'))
        .pipe(gulp.dest('public/assets/js'))
        .pipe(notify({ message: 'Scripts task complete' }));


}

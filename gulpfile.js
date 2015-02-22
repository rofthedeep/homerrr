var gulp = require('gulp'),
        jshint = require('gulp-jshint'),
        uglify = require('gulp-uglify'),
        concat = require('gulp-concat'),
        less = require('gulp-less'),
        path = require('path'),
        minifyCSS = require('gulp-minify-css'),
        watch = require('gulp-watch');

// default gulp task
gulp.task('default', ['js', 'jsplugins', 'minify-css'], function () {
});
gulp.task('build', ['js', 'jsplugins', 'minify-css'], function () {
});
gulp.task('buildcss', ['minify-css', 'minify-css2'], function () {
});

gulp.task('watch', function () {
    gulp.watch(['resources/less/*.less', 'resources/less/modules/*.less', 'resources/less/plugins/*.less', 'resources/less/themes/*.less', 'resources/js/modules/*.js', 'resources/js/plugins/*.js'], ['build']);
});
gulp.task('watchcss', function () {
    gulp.watch(['resources/less/*.less', 'resources/less/modules/*.less', 'resources/less/plugins/*.less', 'resources/less/themes/*.less'], ['buildcss']);
});

gulp.task('js', function () {
    return gulp.src(['resources/js/application.js', 'resources/js/modules/*.js', 'resources/js/plugins/*.js'])
            .pipe(jshint())
            .pipe(jshint.reporter('default'))
            .pipe(uglify())
            .pipe(concat('app-min.js'))
            .pipe(gulp.dest('resources/js/'));
});
gulp.task('jsplugins', function () {
    return gulp.src(['resources/js/library/bootstrap.min.js', 'resources/js/library/jquery.mobile.custom.min.js'])
            //.pipe(jshint())
            //.pipe(jshint.reporter('default'))
            .pipe(uglify())
            .pipe(concat('plugins-min.js'))
            .pipe(gulp.dest('resources/js/library/'));
});

gulp.task('less', function () {
    return gulp.src('resources/less/app.less')
            .pipe(less({
                paths: [path.join(__dirname, 'less', 'includes')]
            }))
            .pipe(gulp.dest('resources/css/'));
});
gulp.task('minify-css', ['less'], function () {
    return gulp.src('resources/css/app.css')
            .pipe(minifyCSS({keepBreaks: false, keepSpecialComments: 0}))
            .pipe(concat('app-min.css'))
            .pipe(gulp.dest('resources/css/'))
            .pipe(gulp.dest('styleGuide/ressources/css/'));
});
gulp.task('lessStyleGuide', function () {
    return gulp.src('resources/less/styleGuide/styleGuide.less')
            .pipe(less({
                paths: [path.join(__dirname, 'less', 'includes')]
            }))
            .pipe(gulp.dest('styleGuide/ressources/css/'));
});
gulp.task('minify-css2', ['less', 'lessStyleGuide'], function () {
    return gulp.src('templates/klotzaufklotz/frontend/_resources/css/app.css')
            .pipe(minifyCSS({keepBreaks: false, keepSpecialComments: 0}))
            .pipe(concat('app-min.css'))
            .pipe(gulp.dest('templates/klotzaufklotz/frontend/_resources/css/'))
            .pipe(gulp.dest('styleGuide/ressources/css/'));
});



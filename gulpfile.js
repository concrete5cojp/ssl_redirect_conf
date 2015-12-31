var gulp = require('gulp');
var zip = require('gulp-zip');

gulp.task('zip', function () {
    return gulp.src(['ssl_redirect_conf/**/*'], {base: "."})
        .pipe(zip('ssl_redirect_conf.zip'))
        .pipe(gulp.dest('./build'));
});

gulp.task('default', ['zip']);
var gulp = require('gulp'),
  gutil = require('gulp-util'),
  postcss = require('gulp-postcss'),
  autoprefixer = require('autoprefixer'),
  precss = require('precss'),
  cssnano = require('cssnano'),
  animation = require('postcss-animation'),

  source = 'process/css/',
  dest = 'css/';

gulp.task('css', function() {
  gulp.src(source + 'theme.css')
  .pipe(postcss([
    precss(),
    animation(),
    autoprefixer(),
    cssnano({zindex: false})
  ]))
  .on('error', gutil.log)
  .pipe(gulp.dest(dest));
});

gulp.task('watch', function() {
  gulp.watch(source + '**/*.css', ['css']);
  gulp.watch(dest + '**/*.html', ['html']);
});

gulp.task('default', ['css', 'watch']);

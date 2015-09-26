var gulp = require('gulp');
var gifsicle = require('imagemin-gifsicle');
var jpegoptim = require('imagemin-jpegoptim');
var pngquant = require('imagemin-pngquant');

gulp.task('compress-uploads', function () {
    return gulp.src(['web/app/uploads/**/*.jpg', 'web/app/uploads/**/*.jpg'])
        .pipe(jpegoptim({progressive: true, max: 70})())
        .pipe(pngquant({ quality: '60-70' })())
        .pipe(gifsicle({ interlaced: true })())
        .pipe(gulp.dest('web/app/uploads/dist/'));
});

gulp.task('process-img', ['compress-uploads']);
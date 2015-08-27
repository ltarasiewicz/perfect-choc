// ## Globals
var $ = require('gulp-load-plugins')();
var gulp = require('gulp');
var lazypipe = require('lazypipe');
var merge = require('merge-stream');

// asset-builder
var manifest = require('asset-builder')('manifest.json');

// `path` - Paths to base asset directories. With trailing slashes.
// - `path.source` - Path to the source files. Default: `assets/`
// - `path.dist` - Path to the build directory. Default: `dist/`
var path = manifest.paths;

var cssTasks = function(filename) {
    return lazypipe()
        .pipe(function() {
            return $.sass({
                    outputStyle: 'nested',
                    precision: 10
                });
        })();
};

var outputFiles = function() {
    return lazypipe()
        .pipe(gulp.dest, '.')();
}

gulp.task('styles', function() {
    var merged = merge();
    manifest.forEachDependency('css', function(dep) {
       var cssTasksInstance = cssTasks(dep.name);
        merged.add(gulp.src(dep.globs)
            .pipe(cssTasksInstance));
    });
    return merged
        .pipe(outputFiles())
});

gulp.task('watch', function() {
    gulp.watch([path.source + '*'], ['styles']);
});

gulp.task('default', ['styles']);
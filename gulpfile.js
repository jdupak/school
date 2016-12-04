// Load Gulp
var gulp = require('gulp'),
    gutil = require('gulp-util'),
    plugins = require('gulp-load-plugins')({
        rename: {
            'gulp-live-server': 'serve'
        }
    });

// Start Watching: Run "gulp"
gulp.task('default', ['serve']);

// Run "gulp server"
gulp.task('server', ['serve', 'watch']);


// Default task
gulp.task('watch', function () {
    gulp.watch('*.php', [""]);
});

// Folder "/" serving at http://localhost:8888
// Should use Livereload (http://livereload.com/extensions/)
gulp.task('serve', function () {
    var server = plugins.serve.static('/', 8888);
    server.start();
    gulp.watch(['*'], function (file) {
        server.notify.apply(server, [file]);
    });
});

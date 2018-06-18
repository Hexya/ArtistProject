var gulp        = require('gulp');
var less        = require('gulp-less');
var watch       = require('gulp-watch');
var cleanCSS    = require('gulp-clean-css');
var babel       = require('gulp-babel');
var browserify  = require('browserify');
var babelify    = require('babelify');
var sourcemaps  = require('gulp-sourcemaps');
var source      = require('vinyl-source-stream');
var buffer      = require('vinyl-buffer');
var uglify      = require('gulp-uglify-es').default;
var watchify    = require('watchify');

var gutil       = require('gulp-util');
var chalk       = require('chalk');
var rename      = require('gulp-rename');

var _           = require('underscore');
var livereload  = require('gulp-livereload');
var merge       = require('utils-merge');
var duration    = require('gulp-duration');
var notify      = require('gulp-notify');

// Variables de chemins
var destination = './dist'; // dossier à livrer

/* Task to compile less */
gulp.task('compile-less', function() {
    gulp.src('./src/less/style.less')
        .pipe(less())
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(gulp.dest('./dist/assets/css/'));
});

/* Task to watch less changes */
gulp.task('watch-less', function() {
    gulp.watch('./src/less/**/*.less' , ['compile-less']);
});

// Tâche "watch" = je surveille less + JS
gulp.task('default', ['compile-less', 'watch-less'], function () {
    livereload.listen();

    var args = merge(watchify.args, { debug: false, cache: {}, packageCache: {}, fullPaths: true });

    var bundler = browserify('./src/js/app.js', args)
        .plugin(watchify, {ignoreWatch: []})
        .transform(babelify, {presets: ['es2015']});

    bundle(bundler);

    bundler.on('update', function() {
        bundle(bundler); // Re-run bundle on source updates
    });
});

function bundle(bundler) {
    var bundleTimer = duration('Javascript bundle time');

    bundler
        .bundle()
        .on('error', mapError) // Map error reporting
        .pipe(source('app.js'))
        .pipe(buffer()) // Convert to gulp pipeline
        .pipe(rename('app.min.js')) // Rename the output file
        .pipe(gulp.dest('./dist/assets/js/')) // Set the output folder
        .pipe(notify({
            message: 'Generated file: <%= file.relative %>',
        })) // Output the file being created
        .pipe(bundleTimer) // Output time timing of the file creation
        .pipe(livereload()); // Reload the view in the browser
}

function mapError(err) {
    if (err.fileName) {
        // Regular error
        gutil.log(chalk.red(err.name)
            + ': ' + chalk.yellow(err.fileName.replace(__dirname + '/src/js/', ''))
            + ': ' + 'Line ' + chalk.magenta(err.lineNumber)
            + ' & ' + 'Column ' + chalk.magenta(err.columnNumber || err.column)
            + ': ' + chalk.blue(err.description));
    } else {
        // Browserify error..
        gutil.log(chalk.red(err.name)
            + ': '
            + chalk.yellow(err.message));
    }
}
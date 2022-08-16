var gulp  = require('gulp'),
    util  = require('gulp-util'),
    compass  = require('gulp-compass'),
    concat = require('gulp-concat'),
    uglifyjs = require('gulp-uglifyjs'),
    watch = require('gulp-watch'),
    cleanCSS = require('gulp-clean-css'),
    plumber = require('gulp-plumber'),
    rename = require('gulp-rename'),
    livereload = require('gulp-livereload'),
    sourcemaps = require('gulp-sourcemaps');

var outputDir = 'dist/';

gulp.task('compass', function() {
	gulp.src(['sass/*.scss', 'sass/vendors/*.scss', 'sass/base/*.scss', 'sass/modules/*.scss', 'sass/framework/*.scss'])
    	.pipe(plumber())
		.pipe(compass({
			sourcemap: true,
			// css: outputDir + '/css',
			sass: 'sass'
		}))
        .pipe(gulp.dest(outputDir + '/css'))
        .pipe(rename({ suffix: '.min' }))
		.pipe(cleanCSS())
		.pipe(gulp.dest(outputDir + '/css'))
      	// .pipe(plugins.livereload(server));
      	.pipe(livereload());
});

gulp.task('concat', function() {
	gulp.src(['bower_components/jquery/dist/jquery.min.js','bower_components/skrollr/src/skrollr.js', './js/*.js'])
    	.pipe(plumber())
        .pipe(sourcemaps.init())
		.pipe(concat('all.js'))
        .pipe(sourcemaps.write('/'))
		.pipe(gulp.dest(outputDir + '/js'))
		// .pipe(plugins.livereload(server));
		.pipe(livereload());
});

gulp.task('uglify', function() {
	gulp.src(['dist/js/all.js'])
    	.pipe(plumber())
		.pipe(uglifyjs('all.min.js'))
		.pipe(gulp.dest(outputDir + '/js'))
		.pipe(livereload());
});

gulp.task('watch', function() {
	livereload.listen();
	gulp.watch('js/*.js', ['concat', 'uglify']);
	gulp.watch(['sass/*.scss', 'sass/vendors/*.scss', 'sass/base/*.scss', 'sass/modules/*.scss', 'sass/framework/*.scss'], ['compass']);
	gulp.watch(['./**/*.php', './page_components/*.php']).on( 'change', function( file ) {
		// reload browser whenever any PHP file changes
		livereload.changed( file );
	});
});

gulp.task('default', ['compass', 'concat', 'uglify', 'watch']);
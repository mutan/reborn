var gulp 				= require('gulp'),
		sass 			= require('gulp-sass'),
		browsersync 	= require('browser-sync').create(),
		concat 			= require('gulp-concat'),
		uglify 			= require('gulp-uglify'),
		cleancss 		= require('gulp-clean-css'),
		rename 			= require('gulp-rename'),
		autoprefixer 	= require('gulp-autoprefixer'),
		notify 			= require("gulp-notify"),
		rsync 			= require('gulp-rsync'),
		imagemin 		= require('gulp-imagemin'),
		cache 			= require('gulp-cache'),
		del 			= require('del'),
		ftp 			= require('vinyl-ftp');

gulp.task('default', ['watch']);

gulp.task('watch', ['sass', 'js', 'browser-sync'], function() {
	gulp.watch('resources/assets/sass/**/*.s[ac]ss', ['sass']);
	gulp.watch(['resources/assets/js/**/*.js'], ['js']);
	gulp.watch('resources/views/**/*.*', browsersync.reload)
});

gulp.task('sass', function() {
	return gulp.src('resources/assets/sass/app.s[ac]ss')
	.pipe(sass({ outputStyle: 'expand' }).on("error", notify.onError())) // nested, expanded, compact, compressed
	.pipe(rename({ suffix: '.min', prefix : '' }))
	.pipe(autoprefixer(['last 15 versions']))
	.pipe(cleancss( {level: { 1: { specialComments: 0 } } })) // Optional, comment out when debugging
	.pipe(gulp.dest('public/css'))
	.pipe(browsersync.stream())
});

gulp.task('js', function() {
	return gulp.src([
		'node_modules/jquery/dist/jquery.min.js',
		'node_modules/jquery-ui-dist/jquery-ui.min.js',
		//'node_modules/bootstrap/dist/js/bootstrap.min.js',
		'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', // popper.js
		/* ... */
		'resources/assets/js/app.js', // Always at the end
		])
	.pipe(concat('app.min.js'))
	//.pipe(uglify()) // Optional, comment out when debugging
	.pipe(gulp.dest('public/js'))
	.pipe(browsersync.stream())
});

gulp.task('fonts', function() {
    gulp.src('node_modules/font-awesome/fonts/*.*')
        .pipe(gulp.dest('public/fonts'));
});

gulp.task('browser-sync', function() { // https://browsersync.io/docs/gulp
	browsersync.init({
		proxy: "localhost:8000",
		notify: false,
		open: 'local',
		//tunnel: true,
		//tunnel: "projectname", // Demonstration page: http://projectname.localtunnel.me
	})
});






gulp.task('build', ['removedist', 'imagemin', 'sass', 'js'], function() {

	var buildFiles = gulp.src([
		'app/*.html',
		'app/.htaccess',
		]).pipe(gulp.dest('dist'));

	var buildCss = gulp.src([
		'app/css/main.min.css',
		]).pipe(gulp.dest('dist/css'));

	var buildJs = gulp.src([
		'app/js/scripts.min.js',
		]).pipe(gulp.dest('dist/js'));

	var buildFonts = gulp.src([
		'app/fonts/**/*',
		]).pipe(gulp.dest('dist/fonts'));

});

gulp.task('removedist', function() {
	return del.sync('dist');
});

gulp.task('imagemin', function() {
	return gulp.src('app/img/**/*')
	.pipe(cache(imagemin(
		[
		imagemin.gifsicle({interlaced: true}),
		imagemin.jpegtran({progressive: true}),
		imagemin.optipng({optimizationLevel: 3}),
		imagemin.svgo({
			plugins: [
			{removeViewBox: true},
			{cleanupIDs: false}
			]
		})
		]
		)))
	.pipe(gulp.dest('dist/img')); 
});



gulp.task('clearcache', function () {
	return cache.clearAll();
});
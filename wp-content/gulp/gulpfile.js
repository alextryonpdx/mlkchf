// LESGO EL2

// primitives & routes
var 	src 		= './source/'
	,	img 		= src+'img/'
	,	css 		= src+'css/'
	,	js 			= src+'js/'
	,	dist		= '../themes/mlk2016/'
	,	base 		= '../../'

	// gulpstuff
	,	gulp 		= require('gulp')
	,	del			= require('del')					// keep for cleanup
	, 	sass 		= require('gulp-sass')
	,	cssnano		= require('gulp-cssnano')
	,	connect		= require('gulp-connect-php')
	,	rename		= require('gulp-rename')
	,	bSync 		= require('browser-sync')
	,	uglify		= require('gulp-uglify')
	,	pump		= require('pump')
	,	concat 		= require('gulp-concat')
	,	imgmin 		= require('gulp-imagemin')
	, 	useref 		= require('gulp-useref'); 			// javascript assets : https://www.npmjs.com/package/gulp-useref

// const del = require('del');							keep for cleanup


// task-in-progress // collect and minify all JS into one file
gulp.task('compress', function() {
  return gulp.src(js+'/plugins/*.js')
    .pipe(concat('plugins.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest(dist+'js'));
});

// grab and move fonts
gulp.task('fontia', function() {
	return gulp.src(css+'fonts/**/*')
		.pipe(gulp.dest(dist+'fonts'))
});

// img clean
gulp.task('imgclean', function() {
	return gulp.src(img+'**/*.+(png|jpg|jpeg|gif|svg)')
		.pipe(imgmin({
	      // Setting interlaced to true
	      interlaced: true
	    }))
		.pipe(gulp.dest(dist+'img'))
		.pipe(bSync.reload({
		 	stream: true
		}))
});


	// sass grab > css
	gulp.task('sass', function() {
		return gulp.src(css+'base.scss')
			.pipe(sass()) 		// using gulp-sass
			.pipe(cssnano()) 	// minify styles
			.pipe(rename('style.css'))
			.pipe(gulp.dest(dist))
			.pipe(bSync.reload({
			 	stream: true
			}))
	});

	// php grab
	gulp.task('peep', function() {
		return gulp.src(src+'**/*.php')
			.pipe(useref())
    		// .pipe(gulpIf('*.js', uglify()))
			.pipe(gulp.dest(dist))
			.pipe(bSync.reload({
			 	stream: true
			}))
	});

	// js grab
	gulp.task('scripto', function() {
		return gulp.src(js+'**/*.js')
			//.pipe()
			.pipe(gulp.dest(dist+'js/'))
			.pipe(bSync.reload({
			 	stream: true
			}))
	});


// spin up our server

// Static server
gulp.task('bsync', function() {
    bSync.init({
        // server: {
        //    baseDir: base
        // }
        proxy: 'mlkchf.dv'
    });
});//

// default gulp action, server and filewatch
gulp.task('default', ['sass', 'scripto', 'peep', 'bsync'], function (){
	gulp.watch(css+'**/*.scss', ['sass']); 
	gulp.watch(js+'**/*.js', ['scripto']); 
	gulp.watch(src+'**/*.php', ['peep']);  
});

// build theme
gulp.task('build', ['sass', 'scripto', 'fontia', 'imgclean', 'peep']);

// quick build
gulp.task('quick', ['sass', 'scripto', 'peep']);

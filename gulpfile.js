let gulp = require('gulp');
let sass = require('gulp-sass');
const path = require('path');

let webpack = require('webpack-stream');
const webpackConfig = require('./webpack.config.js');
webpackConfig.mode = 'development';

let browserSync = require('browser-sync').create();

gulp.task('js', function() {
	return gulp.src('src/index.js').pipe(webpack({ config: webpackConfig })).pipe(gulp.dest('dist/'));
});

gulp.task('js-watch', [ 'js' ], function(done) {
	browserSync.reload();
	done();
});

gulp.task('sass', function() {
	return gulp.src('src/scss/*.scss').pipe(sass()).pipe(gulp.dest('dist/css')).pipe(browserSync.stream());
});

gulp.task('browserSync', function() {
	browserSync.init({
		files: '**/*',
		proxy: 'localhost/gmvaleting/*'
	});
});

// gulp.task('watch', [ 'browserSync', 'sass' ], function() {
// 	gulp.watch('src/scss/**/*.scss', [ 'sass' ]);
// 	gulp.watch('src/js/**/*.js', [ 'js-watch' ]);
// 	gulp.watch('**/**/*.php', browserSync.reload);
// });

gulp.task('watch', [ 'sass' ], function() {
	gulp.watch('src/scss/**/*.scss', [ 'sass' ]);
	gulp.watch('src/js/**/*.js', [ 'js-watch' ]);
	gulp.watch('**/**/*.php', browserSync.reload);
});

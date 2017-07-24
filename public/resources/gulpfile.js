const gulp = require('gulp');
const sassc = require('dj-gulp-tasks/sassc');
const closure = require('dj-gulp-tasks/closure');

/** Style tasks */
sassc({
	'watch': './style/scss',
	'paths': [
		'./node_modules'
	],
	'files': [
		{
			'entry': './style/scss/**/*.scss',
			'output': './style/css'
		}
	]
});

/** Task shortcuts with execution order */
gulp.task('watch', ['dj-sassc-watch']);
gulp.task('default', ['watch']);
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

/** JavaScript tasks */
closure.deps({
	'prefix': '../../../../',
	'output': './javascript/gen/application.deps.js',
	'files': [
		'./javascript/src/**/*.js',
		'./node_modules/nextform-frontend/src/**/*.js',
		'./node_modules/dj-library/**/*.js'
	]
});

/** Task shortcuts with execution order */
gulp.task('watch', ['dj-sassc-watch', 'dj-closure-deps-watch']);
gulp.task('default', ['watch']);
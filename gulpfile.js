var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

var paths = {
	'bootstrap': './vendor/bower_components/bootstrap/',
	'jquery': './vendor/bower_components/jquery/',
	'sourceSansPro': './vendor/bower_components/fontface-source-sans-pro/',
	'commonmark': './vendor/bower_components/commonmark/'
};

// Styles.
elixir(function(mix) {
    mix.less('app.less', 'public/css/', {
		paths: [
			paths.bootstrap + 'less',
			paths.sourceSansPro + 'less'
		]
	});
});

// Vendor.
elixir(function(mix) {
	mix.copy(paths.bootstrap + 'dist/fonts/**', 'public/fonts')
		.copy(paths.sourceSansPro + 'fonts/**', 'public/fonts')
		.scripts([
			paths.jquery + 'dist/jquery.js',
			paths.bootstrap + 'dist/js/bootstrap.js',
			paths.commonmark + 'index.js'
		], 'public/js/vendor.js', './');
});


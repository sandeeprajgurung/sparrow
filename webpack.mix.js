const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

// # Compile your CSS / JavaScript for development...
// npm run dev

// # Compile your CSS / JavaScript for production...
// npm run prod

// # Compile your CSS / JavaScript for development and recompile on change...
// npm run watch

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ]);

mix.postCss('resources/css/admin.css', 'public/css')
    .postCss('resources/css/responsive.css', 'public/css');

if (mix.inProduction()) {
    mix.version();
}

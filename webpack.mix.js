let mix = require('laravel-mix');

mix.webpackConfig({
    externals: {
        jquery: 'jQuery',
        bootstrap: true,
        vue: 'Vue',
        moment: 'moment'
    }
});

mix.setPublicPath('../concrete5/application/themes/flintstone');

mix
    .sass('assets/scss/main.scss', 'css/main.css')
    .js('assets/js/main.js', 'js/main.js');

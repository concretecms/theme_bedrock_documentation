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
    .sass('assets/scss/skins/default/main.scss', 'css/skins/default.css')
    .sass('assets/scss/skins/wilma/main.scss', 'css/skins/wilma.css')
    .js('assets/js/main.js', 'js/main.js');

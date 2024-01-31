let mix = require('laravel-mix');

mix.webpackConfig({
    externals: {
        jquery: 'jQuery',
        bootstrap: true,
        vue: 'Vue',
        moment: 'moment'
    }
});

mix.setPublicPath('themes/flintstone');

mix.options({
    processCssUrls: false
});

mix
    .sass('themes/flintstone/css/presets/default/main.scss', 'css/skins/default.css')
    .sass('themes/flintstone/css/presets/wilma/main.scss', 'css/skins/wilma.css')
    .js('assets/js/main.js', 'js/main.js');

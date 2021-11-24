const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/non-defer.js', 'public/js')
    .vue()
    .sourceMaps()
    .sass('resources/scss/default.scss', 'public/css/styles.css').options({
    processCssUrls: false
});

mix.webpackConfig({
    module: {
        rules: [
            {
                test:
                    /\.scss$/,
                use: [
                    {
                        loader: 'sass-loader',
                        options: {
                            // Prefer Dart Sass
                            implementation: require('sass'),
                            // See https://github.com/webpack-contrib/sass-loader/issues/804
                            webpackImporter: false,
                            sassOptions: {
                                includePaths: ['./node_modules', './vendor/'],
                            },
                        }
                    },
                ]
            },
        ]
    },
});
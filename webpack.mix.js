const mix = require('laravel-mix')
const path = require('path')

mix.ts('resources/js/app.ts', 'public/js')
    .vue({version: 3})
    .sass('resources/css/app.scss', 'public/css', {}, [
        require("tailwindcss"),
    ])
    .alias({
        '@': path.join(__dirname, 'resources'),
    })
    .webpackConfig({
        devServer: {
            host: 'laravel.test',
            port: 8080,
        },
    })

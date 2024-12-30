const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ])
    .browserSync({
        proxy: 'nginx:80',
        open: false,
        host: '0.0.0.0',
        port: 3000,
        files: [
            'app/**/*.php',
            'resources/views/**/*.php',
            'public/js/**/*.js',
            'public/css/**/*.css'
        ]
    }); 
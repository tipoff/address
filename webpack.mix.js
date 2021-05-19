// const mix = require('laravel-mix');

// /*
//  |--------------------------------------------------------------------------
//  | Mix Asset Management
//  |--------------------------------------------------------------------------
//  |
//  | Mix provides a clean, fluent API for defining some Webpack build steps
//  | for your Laravel applications. By default, we are compiling the CSS
//  | file for the application as well as bundling up all the JS files.
//  |
//  */

// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         require("tailwindcss"),
//     ]);

const mix = require('laravel-mix');
const purgecss = require('@fullhuman/postcss-purgecss');
require('dotenv').config({ path: './.env' });

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

mix.sass('resources/sass/website.scss', 'public/css')
    .options({
        processCssUrls: false,
        postCss: [
            require('@fullhuman/postcss-purgecss')({
                enabled: true,
                content: [
                    'resources/views/website/**/*.php',
                    'resources/views/website/*.php',
                ],
                variables: true,
            }),
            require('postcss-clear-empty-strings'),
            require('postcss-discard-comments')({
                removeAll: true,
            }),
            require('css-byebye')({
                rulesToRemove: [
                    '@import',
                    '@charset',
                    '.dropdown-toggle:after',
                ]
            }),
            require('postcss-sanitize')({
                removeEmpty: true,
                rules: [{
                    prop: 'content'
                }]
            }),
            require('postcss-no-important')(),
        ],
        terser: {
            extractComments: false,
        },
});

mix.sass('resources/sass/feedback.scss', 'public/css', {},
    [ purgecss({
        enabled: true,
        content: [
            'resources/views/feedback/*.php',
        ],
        variables: true,
        })
    ])
    .options({
        terser: {
            extractComments: false,
        },
});

mix.js('resources/js/waiver.js', 'public/js')
    .sass('resources/sass/waiver.scss', 'public/css', {},
    [ purgecss({
        enabled: true,
        content: [
            'resources/views/waiver/*.php',
            'resources/js/waiver.js',
            'resources/js/components/waiver/*.vue'
        ],
        variables: true,
        })
    ])
    .options({
        terser: {
            extractComments: false,
        },
});

mix.js('resources/js/booking.js', 'public/js')
    .sass('resources/sass/booking.scss', 'public/css', {},
    [ purgecss({
        enabled: true,
        content: [
            'resources/views/website/layout-booking.blade.php',
            'resources/views/website/pages/booking/slots.blade.php',
            'resources/views/website/pages/booking/contact-details.blade.php',
            'resources/views/website/pages/booking/checkout.blade.php',
            'resources/views/website/pages/booking/confirmation.blade.php',
            'resources/views/website/pages/booking/games.blade.php',
            'resources/views/website/pages/booking/cart.blade.php',
            'resources/js/booking.js',
            'resources/js/booking/components/*.vue'
        ],
        variables: true,
        })
    ])
    .options({
        terser: {
            extractComments: false,
        },
});

mix.js('resources/js/gifts.js', 'public/js')
    .sass('resources/sass/gifts.scss', 'public/css', {},
        [ purgecss({
            enabled: true,
            content: [
                'resources/views/website/pages.gifts.blade.php',
                'resources/js/gifts.js',
                'resources/js/components/gifts/*.vue'
            ],
            variables: true,
        })
        ])
    .options({
        terser: {
            extractComments: false,
        },
    });

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css', {},
    [ purgecss({
        enabled: true,
        content: [
            'app/**/*.php',
            'resources/**/*.html',
             'resources/**/*.js',
             'resources/**/*.jsx',
             'resources/**/*.ts',
             'resources/**/*.tsx',
             'resources/**/*.php',
             'resources/**/*.vue',
        ],
        defaultExtractor: content => content.match(/[A-Za-z0-9-_:/]+/g) || [],
        whitelistPatterns: [/-active$/, /-enter$/, /-leave-to$/],
        variables: true,
        })
    ])
    .options({
        terser: {
            extractComments: false,
        },
});

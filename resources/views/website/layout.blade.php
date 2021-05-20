<!doctype html>
@if (isset($html))
    <html lang="en">
@else
    <html ⚡ lang="en">
@endif
<head>
    <meta charset="utf-8" />

    @if (isset($noindex))
        <meta name="robots" content="noindex">
    @endif

    @if (request()->getHttpHost() !== 'thegreatescaperoom.com')
        <meta name="robots" content="noindex">
    @endif

    <title>{{ $seotitle ?? 'The Great Escape Room' }}</title>
    <meta name="description" content="{{ $seodescription ?? 'The Great Escape Room has been rated the best escape room with multiple games for all skill levels.' }}" />
    <link rel="canonical" href="{{ $canonical }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicons/favicon-16x16.png">
    <link rel="manifest" href="/img/favicons/site.webmanifest">
    <link rel="mask-icon" href="/img/favicons/safari-pinned-tab.svg" color="#84329B">
    <link rel="shortcut icon" href="/favicon.ico">
    <meta name="msapplication-TileColor" content="#84329B">
    <meta name="msapplication-config" content="/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#84329B">

    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $ogtitle ?? 'The Great Escape Room' }}" />
    <meta property="og:description" content="{{ $ogdescription ?? 'The Great Escape Room has been rated the best escape room with multiple games for all skill levels.' }}" />
    <meta property="og:url" content="{{ $canonical }}" />
    <meta property="og:site_name" content="The Great Escape Room" />
    <meta property="og:image" content="{{ $ogimage }}" />
    <meta property="article:publisher" content="https://www.facebook.com/thegreatescaperoom/" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="{{ $ogdescription ?? 'The Great Escape Room has been rated the best escape room with multiple games for all skill levels.' }}" />
    <meta name="twitter:title" content="{{ $ogtitle ?? 'The Great Escape Room' }}" />
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <script async src="https://cdn.ampproject.org/v0.js"></script>

    @include('website.partials.schema')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css2?family=Life+Savers:wght@800&family=Roboto+Condensed:wght@300;700&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.3.45/css/materialdesignicons.min.css">


    @if (isset($html))
        <style>
    @else
        <style amp-custom>
            .amp-carousel-button{width:40px;height:40px;margin:16px 2px;border-radius:40px;background-color:rgba(255,255,255,0.9);box-shadow:0 0 10px -5px rgba(0,0,0,0.5);}
            .amp-carousel-button-prev{display:flex;align-items:center;justify-content:center;background-image:none;}
            .amp-carousel-button-prev:after{content:'\f104';font-family:'FontAwesome';font-size: 20px;}
            .amp-carousel-button-next{display:flex;align-items:center;justify-content:center;background-image:none;}
            .amp-carousel-button-next:after{content:'\f105';font-family:'FontAwesome';font-size: 20px;}
            amp-accordion > section > .nav-link{border-bottom: none;}
            amp-accordion > section[expanded] > .nav-link{border-bottom: 4px solid #f7c429;}
    @endif
    @section('styles')
        {{ File::get( public_path('css/website.css') ) }}
    @show
    </style>

    @section('amp-scripts')
    <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
    <script async custom-element="amp-lightbox" src="https://cdn.ampproject.org/v0/amp-lightbox-0.1.js"></script>
    <script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
    <script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.2.js"></script>
    <script async custom-element="amp-accordion" src="https://cdn.ampproject.org/v0/amp-accordion-0.1.js"></script>
    <script async custom-element="amp-fx-collection" src="https://cdn.ampproject.org/v0/amp-fx-collection-0.1.js"></script>
    <script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>
    <script async custom-element="amp-fit-text" src="https://cdn.ampproject.org/v0/amp-fit-text-0.1.js"></script>
    <script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>
    <script async custom-element="amp-selector" src="https://cdn.ampproject.org/v0/amp-selector-0.1.js"></script>
    @show

    <style amp-boilerplate>
        body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}
    </style>

    <noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
</head>
<body>
    <amp-analytics config="https://www.googletagmanager.com/amp.json?id=GTM-WMKJL9S&gtm.url=SOURCE_URL" data-credentials="include">
        @isset($market)
            <script type='application/json'>
                {
                    "vars" : {
                        "market": "{{ $market->slug }}"
                    }
                }
            </script>
        @endisset
    </amp-analytics>
    <div id="app" class="tger-website">
        @include('website.partials.header')

        <div class="tger-website-wrapper">

            <main class="tger-main">
                <div class="tger-main__pattern-bg" style="background-image: url({{ url('img/background/tger-purple-halftone.png') }});"></div>
                <div class="behindnav"></div>
                @include('website.partials.hero')
                @yield('content')

                @include('website.partials.menu')
            </main>

            @include('website.partials.footer')

        </div>

    </div>
</body>
</html>

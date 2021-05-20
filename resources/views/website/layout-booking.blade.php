<!doctype html>
<html lang="en">
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
    <link rel="canonical" href="{{ $canonical ?? '' }}" />
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
    <meta property="og:url" content="{{ $canonical ?? '' }}" />
    <meta property="og:site_name" content="The Great Escape Room" />
    <meta property="og:image" content="{{ $ogimage ?? '' }}" />
    <meta property="article:publisher" content="https://www.facebook.com/thegreatescaperoom/" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="{{ $ogdescription ?? 'The Great Escape Room has been rated the best escape room with multiple games for all skill levels.' }}" />
    <meta name="twitter:title" content="{{ $sogtitle ?? 'The Great Escape Room' }}" />
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">

    @include('website.partials.schema')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Life+Savers:wght@800&family=Rubik:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&wght@700&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.3.45/css/materialdesignicons.min.css">

    <link href="/css/website.css" rel="stylesheet" type="text/css">
    <link href="/css/booking.css" rel="stylesheet" type="text/css">
    <script src="{{ asset('js/booking.js') }}" defer></script>
</head>
<body>

    <div id="app" class="tger-website">
        <header class="tger-booking-header">
            <div class="tger-booking-header__container">
                <a class="tger-logo" href="/">
                    <svg
                        data-name="Layer 1"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 1600 1200">
                        <path class="cls-1" d="M740.41,942.36l-57.73,16.08-57.78,15.8c-38.58,10.31-77.09,20.86-115.71,31s-77.16,20.51-115.81,30.44l-14.49,3.76-7.24,1.87c-2.48.63-5.3,1.37-8,2a82.2,82.2,0,0,1-87.58-40.32l-.37-.67-.35-.93L219,848.41,163.32,695.23C154,669.72,145,644.08,135.83,618.51s-18.33-51.14-27.21-76.82l-26.83-77-26.42-77.1.71,1.56-3-6.47-1.44-3.25-1.08-3.4c-.68-2.28-1.47-4.52-2-6.83l-1.26-7c-1.19-9.39-1.24-19,.94-28.23a79.56,79.56,0,0,1,10.36-26A78,78,0,0,1,77,287l2.71-2.21c.94-.7,2-1.29,2.93-1.93,2-1.24,3.91-2.55,5.93-3.69,4.23-2,8.33-4.22,12.82-5.47a55.86,55.86,0,0,1,6.66-2l6.82-1.34c2.38-.52,4.21-.58,6.34-.89l6.16-.74,49.32-6,98.59-12.21,98.52-12.7q196.94-26.24,393.32-56.18l392.72-60.33,98.24-14.63,98.28-14.38,49.15-7.13,24.57-3.57a94.81,94.81,0,0,1,29.3.25c19.47,3.76,37.73,14,50.35,29.43A85.2,85.2,0,0,1,1524.71,137a92.29,92.29,0,0,1,5.28,29.26l0,.91-.17,1.21c-9.08,64.67-17.85,129.38-27.2,194l-14,96.95c-4.66,32.32-9.31,64.64-14.22,96.92L1445.29,750l-29.92,193.62.13-1.84a99.64,99.64,0,0,1-2.93,22,96.53,96.53,0,0,1-8.14,20.62,90.73,90.73,0,0,1-29.59,32.32,95.45,95.45,0,0,1-19.68,9.82c-1.72.66-3.64,1.14-5.45,1.7l-2.76.8c-.86.21-1.59.31-2.39.47l-9.44,1.77-37.76,7.06-151.11,27.77c-50.39,9.11-100.76,18.29-151.2,27.08s-100.81,17.88-151.29,26.37l-.57-2.88c49.84-11.59,99.78-22.67,149.68-33.88s99.84-22.2,149.77-33.17l149.87-32.49,37.49-8,9.37-2c.76-.17,1.61-.32,2.3-.51l1.82-.62c1.23-.44,2.42-.72,3.68-1.25a72.22,72.22,0,0,0,14.38-7.62,73.23,73.23,0,0,0,12.07-10.85,72.49,72.49,0,0,0,9.07-13.41,71.31,71.31,0,0,0,5.54-15.13,73.29,73.29,0,0,0,1.73-16v-.92l.12-.92,26.38-194.14,27.17-194c4.47-32.35,9.21-64.65,13.94-97l14.14-96.93c9.42-64.63,19.42-129.16,29.1-193.75l-.15,2.11a63.19,63.19,0,0,0-3.28-19.41,56.51,56.51,0,0,0-9.71-17.13c-8.27-10.44-20.51-17.39-33.44-20.12a66.09,66.09,0,0,0-20.14-.35l-24.62,3.28-49.23,6.57-98.48,13-98.51,12.76L768.94,194.12q-197.13,24.76-393.72,53.35L277,262.16l-98.16,15.17-49.07,7.73-6.13,1c-2,.36-4.28.57-5.92,1.05l-5.32,1.25a39.21,39.21,0,0,0-5.16,1.76c-3.51,1.05-6.6,3-9.84,4.6-1.53.95-3,2.05-4.48,3-.74.53-1.52,1-2.22,1.55l-2,1.81A59.42,59.42,0,0,0,75,317.7a60.13,60.13,0,0,0-7.18,20.11c-1.45,7-1,14.21,0,21.13l1.1,5.17c.49,1.69,1.16,3.33,1.71,5l.85,2.5L72.75,374l2.33,4.75.51,1.05.19.52,28.64,76.31,28.22,76.45c9.48,25.46,18.62,51,27.85,76.59s18.55,51.07,27.57,76.69L242.48,840l53.74,153.88-.72-1.6a64.27,64.27,0,0,0,16.22,19.32,61.4,61.4,0,0,0,48.31,12.2l6.61-1.46,7.3-1.68,14.61-3.38c38.92-9.07,77.95-17.71,116.91-26.57s78-17.35,117-26.05L681.07,952l58.64-12.44Z"/><path class="cls-1" d="M586.17,896.76l270.25,4.59a3.2,3.2,0,0,1,1.71,5.85l-224,149S671.05,981.94,665,958C659.18,935.08,586.17,896.76,586.17,896.76Z"/><circle class="cls-1" cx="859.56" cy="1118.18" r="34.24"/><polygon class="cls-2" points="504.3 331.19 388.12 331.19 388.12 357.3 433.69 357.3 433.69 575.1 459.8 575.1 459.8 357.3 504.3 357.3 504.3 331.19"/><polygon class="cls-2" points="899.13 430.36 899.13 404.26 819.98 404.26 819.98 705.82 899.13 705.82 899.13 679.71 846.08 679.71 846.08 583.14 878.83 583.14 878.83 557.04 846.08 557.04 846.08 430.36 899.13 430.36"/><polygon class="cls-2" points="613.56 582.59 613.56 556.49 534.41 556.49 534.41 858.04 613.56 858.04 613.56 831.94 560.51 831.94 560.51 735.37 593.25 735.37 593.25 709.26 560.51 709.26 560.51 582.59 613.56 582.59"/><polygon class="cls-2" points="1373.41 372.2 1373.41 346.09 1294.26 346.09 1294.26 647.65 1373.41 647.65 1373.41 621.55 1320.36 621.55 1320.36 524.98 1353.11 524.98 1353.11 498.87 1320.36 498.87 1320.36 372.2 1373.41 372.2"/><path class="cls-2" d="M1223.74,722.18h-26.1V423l11.09-1.91c1.13-.19,27.71-4.51,49.06,16.34,16.45,16.07,24.85,41.73,25,76.27.15,46.47-9.24,79.5-27.91,98.16-11.47,11.46-23.48,14.52-31.11,15.16Zm0-271v146A26.52,26.52,0,0,0,1238.1,589c8.55-8.87,18.7-29.12,18.55-75.18-.08-25.33-5.34-43.35-15.63-53.57A33.83,33.83,0,0,0,1223.74,451.16Z"/><path class="cls-2" d="M516.84,719.3c5.71-25.19,6.67-82-10.5-105.16-20.13-27.18-70.56-19-70.56-19V895.51l26.1-.48.65-125c1.22-.06,5.83-.12,7.27-.23l18.64,126.08,30.32.91L493.64,761.62C502.83,754.85,511.61,742.41,516.84,719.3ZM462.05,744l.24-123.71c9-.07,21.82,3.75,28.57,17.06,8.77,17.3,6.62,62.66.77,80.79C483.82,742.32,470.28,743.77,462.05,744Z"/><path class="cls-2" d="M977.55,859c6.37-22.89,7.45-74.48-11.72-95.54-22.47-24.68-78.77-17.24-78.77-17.24v272.86l29.14-.43.72-113.59c1.36-.06,6.51-.11,8.12-.21l20.81,114.54,33.84.83-28-122.77C961.9,891.31,971.71,880,977.55,859Zm-61.17,22.41L916.66,769c10.09-.07,24.36,3.4,31.89,15.49,9.78,15.72,7.38,56.93.85,73.4C940.69,879.92,925.58,881.24,916.38,881.42Z"/><polygon class="cls-2" points="712.23 498.07 712.23 524.17 737.78 524.17 737.78 799.63 763.88 799.63 763.88 524.17 791.38 524.17 791.38 498.07 712.23 498.07"/><path class="cls-2" d="M686.56,826.09h25.93l-27.84-301H652.33l-28.82,301h26.15l5.8-58.23h25.81Zm-28.49-84.33L669,632.46l9.94,109.3Z"/><path class="cls-2" d="M1160.2,667.67h25.93l-27.84-301H1126l-28.82,301h26.15l5.81-58.23h25.8Zm-28.49-84.34,10.9-109.3,9.93,109.3Z"/><path class="cls-2" d="M1046.54,711.11c-20.53,0-37.23-19-37.23-42.32V454.34c0-23.34,16.7-42.32,37.23-42.32s37.23,19,37.23,42.32v33.54h-26.11V454.34c0-8.64-5.19-16.22-11.12-16.22s-11.13,7.58-11.13,16.22V668.79c0,8.63,5.2,16.22,11.13,16.22s11.12-7.59,11.12-16.22v-33.6h26.11v33.6C1083.77,692.12,1067.07,711.11,1046.54,711.11Z"/><path class="cls-2" d="M366.47,884.16c-21.77,0-39.48-19.7-39.48-43.92V614.12c0-24.22,17.71-43.92,39.48-43.92S406,589.9,406,614.12v35.36h-26.1V614.12c0-9.66-6.13-17.82-13.38-17.82s-13.37,8.16-13.37,17.82V840.24c0,9.66,6.12,17.81,13.37,17.81s13.38-8.15,13.38-17.81v-100H366.47V714.12H392.9l13.05,0V840.24C406,864.46,388.24,884.16,366.47,884.16Z"/><path class="cls-2" d="M951.52,737c-21.08,0-38.23-19.53-38.23-43.53V658.54H939.4v34.91c0,9.45,5.55,17.42,12.12,17.42s12.12-8,12.12-17.42l.1-1.56c.06-.54,6.39-54.11-1.82-84.79-2.28-8.5-14-18-23.39-25.6-6.18-5-11.53-9.34-15.25-14-16.11-20-11.82-75.4-10-93,.35-23.66,17.36-42.78,38.22-42.78,21.08,0,38.23,19.52,38.23,43.52v34.91H963.64V475.28c0-9.44-5.55-17.42-12.12-17.42s-12.12,8-12.12,17.42l-.07,1.38c-3.14,29.54-2.17,66.52,4.27,74.5,2,2.46,6.75,6.32,11.37,10.06,12.34,10,27.7,22.44,32.16,39.13,9,33.81,3.44,86.69,2.61,93.92C989.36,717.89,972.36,737,951.52,737Z"/><path class="cls-2" d="M1033.49,954.81c-24.87,0-45.1-17.84-45.1-39.76V799.85c0-21.93,20.23-39.77,45.1-39.77s45.09,17.84,45.09,39.77v115.2C1078.58,937,1058.35,954.81,1033.49,954.81Zm0-171.71c-10.48,0-19,7.51-19,16.75v115.2c0,9.23,8.52,16.75,19,16.75s19-7.52,19-16.75V799.85C1052.48,790.61,1044,783.1,1033.49,783.1Z"/><path class="cls-2" d="M710.5,399.17V320.79a45.1,45.1,0,0,0-90.2,0V451.44a45.1,45.1,0,0,0,90.2,0V435H684.39v16.49a19,19,0,0,1-38,0V399.17Zm-64.09-78.38a19,19,0,0,1,38,0v52.27h-38Z"/><path class="cls-2" d="M1135.6,1002.91c-24.87,0-45.1-17.84-45.1-39.77V847.94c0-21.92,20.23-39.76,45.1-39.76s45.1,17.84,45.1,39.76v115.2C1180.7,985.07,1160.46,1002.91,1135.6,1002.91Zm0-171.72c-10.48,0-19,7.52-19,16.75v115.2c0,9.24,8.52,16.75,19,16.75s19-7.51,19-16.75V847.94C1154.59,838.71,1146.07,831.19,1135.6,831.19Z"/><path class="cls-2" d="M1305,757.38A44.93,44.93,0,0,0,1273,770.82a44.78,44.78,0,0,0-51-9.18v-24.4h-26.11v207h26.11V802.48a19,19,0,0,1,38,0V942.92H1286V802.48a19,19,0,0,1,38,0V942.92h26.1V802.48A45.16,45.16,0,0,0,1305,757.38Z"/><path class="cls-2" d="M561.15,332a44.81,44.81,0,0,0-19,4.25V260h-26.1V534.87h26.1V517.52h0V377.09a19,19,0,0,1,38,0V535.15h26.11V377.09A45.16,45.16,0,0,0,561.15,332Z"/>
                    </svg>
                </a>
                <a href="{{ $market->path ?? '' }}" class="button0 tger-location">
                    <svg
                        version="1.1"
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        class="location-pin"
                        viewBox="0 0 230.4 436.7"
                        xml:space="preserve">
                        <path class="svg-location-pin" d="M115.2,25.1C55.7,25.1,7.4,73.4,7.4,132.9c0,8.4,1,16.6,2.8,24.4c-1.6-1.1,103.1,252.3,103.1,252.3
                        c1.1,2.8,5.1,2.6,5.9-0.3c0,0,102.6-253.1,101.1-252c1.8-7.8,2.8-16,2.8-24.3C223,73.4,174.8,25.1,115.2,25.1z M115.2,209.9
                        c-40,0-72.4-32.4-72.4-72.4S75.2,65,115.2,65s72.4,32.4,72.4,72.4S155.2,209.9,115.2,209.9z"/>
                    </svg>
                    {{ $market->name ?? ''}}
                </a>
            </div>
        </header>

        <div class="tger-booking-website-wrapper">
            <div class="tger-booking-website-wrapper__pattern-bg" style="background-image: url({{ url('img/background/tger-purple-halftone.png') }});"></div>

            <main class="tger-booking-main">
                @yield('content')
            </main>
        </div>

        <footer class="tger-booking-footer">
            <div class="tger-booking-footer__wrapper">
                <div class="tger-booking-footer__copyright">
                    <ul class="tger-booking-footer__copyright-left">
                        <li>&copy;2020 <a href="/">The Great Escape Room</a></li>
                        <li><a href="{{ route('terms') }}">Terms of Service</a></li>
                        <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                        <li><a href="{{ $market->faq_path ?? route('faq') }}">FAQs</a></li>
                        <li><a href="{{ $location->phone->full_number }}">{{ $location->phone->parenthetical_formatted_numbers }}</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>

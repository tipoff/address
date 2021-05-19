<section class="tger-home-hero">
    <div class="tger-home-hero__bg" style="background-image: url({{ url('/img/background/tger-hero-bg.png') }});"></div>
    <div class="tger-home-hero__inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="tger-home-hero__text">
                        <h1>{{ $title ?? 'The Great Escape Room' }}</h1>
                        @if(isset($subtitle))
                            <p>{{ $subtitle }}</p>
                        @endif
                        @if(isset($cta))
                        <div class="tger-button-container">
                            <a href="{{ $market->bookings_path ?? route('bookings') }}" class="button4">
                                Book Online
                            </a>
                            <a href="{{ $market->reservations_path ?? route('reservations') }}" class="button1">
                                Play Anytime
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="tger-home-hero__image">
                        <amp-img
                            src="{{ $image ?? url('img/hero/tger.jpg') }}"
                            width="1200"
                            height="630"
                            layout="responsive"
                            alt="The Great Escape Room"
                            title=""
                            class="hero-image">
                        </amp-img>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="tger-hero-wedge"></div>
@extends('website.layout-booking')

@section('content')
    @if ($location->covid == 1)
        <section class="covid-notice">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="notes-image">
                        <img 
                            src="/img/icons/tger-closed.svg"
                            width="300"
                            height="197"
                            class="img-fluid">
                    </div>
                </div>
                <div class="col-sm-6 col-md-9">
                    <div class="notes-text">
                        <h2>Temporarily Closed</h2>

                        <p>In order to do our part to help prevent the spread of COVID-19, we have temporarily ceased operations at {{ $market->title }}. During the appropriate phase, we will reopen with new operational procedures to ensure the safety of our participants.</p>
                    </div>
                </div>
            </div>
        </section>
    @else
        @if ($location->use_iframe == 1)
            {!! $location->booking_iframe !!}
        @else

            @if ($errors->any())
                <ul style="background-color: red;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <games-list
                :market="{{ $market }}"
                :location="{{ $location }}"
            >
            </games-list>

            @if (auth('customer')->user() && auth('customer')->user()->cart()->cartItems->count())
                <div class="tger-button-container">
                    <a class="button6" href="{{ locationRoute('bookings.checkout.create', $market, $location) }}">Return to Checkout</a>
                </div>
            @endif

        @endif
    @endif
@endsection
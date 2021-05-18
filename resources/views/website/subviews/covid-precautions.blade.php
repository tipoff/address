@if ($market)
    @if(empty($market->locations->first()->covid))
        <section class="covid-notice">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="notes-image">
                        <amp-img 
                            src="/img/icons/tger-covid.svg"
                            width="300"
                            height="241.2"
                            layout="intrinsic"
                            class="tger-escape-room-notes"></amp-img>
                    </div>
                </div>
                <div class="col-sm-6 col-md-9">
                    <div class="notes-text">
                        <h2>Your safety is our priority!</h2>

                        <p><a href="{{ $market->precautions_path ?? route('precautions') }}">Click here to read about our safety precautions</a> in response to the COVID-19 pandemic.</p>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endif
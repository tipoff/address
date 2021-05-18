@if ($market)
    @if(!empty($market->locations->first()->covid))
        <section class="covid-notice">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="notes-image">
                        <amp-img 
                            src="/img/icons/tger-closed.svg"
                            width="300"
                            height="197"
                            layout="intrinsic"
                            class="tger-escape-room-notes"></amp-img>
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
    @endif
@endif
<div class="tger-footer__bg"></div>
<footer class="tger-footer">
    <div class="tger-footer__wrapper">
        <div class="tger-footer__mobile-main">                    
            <div class="tger-footer__mobile-main-column">
                <div class="tger-footer__inner">
                    <amp-accordion animate>
                        <section>
                            <h4><span class="footer-column-heading">Locations <amp-img 
                                src="{{ url('img/menus/tger-menu-chevrons-white.svg') }}"
                                width="25"
                                height="25.57856941265"
                                layout="intrinsic"
                                class="chevron-icon"></amp-img></span></h4>
                            <ul>
                                @foreach ($allmarkets as $allmarket)
                                    <li>
                                        <a href="{{ url($allmarket->path) }}">{{ $allmarket->name}}, {{ $allmarket->state}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </section>
                    </amp-accordion>
                </div>                    
            </div>
            <div class="tger-footer__mobile-main-column">
                <div class="tger-footer__inner">
                    <amp-accordion animate>
                        <section>
                            <h4><span class="footer-column-heading">TGER Company <amp-img 
                                src="{{ url('img/menus/tger-menu-chevrons-white.svg') }}"
                                width="25"
                                height="25.57856941265"
                                layout="intrinsic"
                                class="chevron-icon"></amp-img></span></h4>
                            <ul>
                                <li>
                                    <a href="{{ $market->gifts_path ?? route('gifts') }}">Gift Certificates</a>
                                </li>
                                <li>
                                    <a href="{{ $market->parties_path ?? route('parties') }}">Private Parties</a>
                                </li>
                                <li>
                                    <a href="{{ $market->team_building_path ?? route('team-building') }}">Team Building</a>
                                </li>
                                <li>
                                    <a href="{{ $market->contact_path ?? route('contact') }}">Contact Us</a>
                                </li>
                            </ul>
                        </section>
                    </amp-accordion>
                </div>                    
            </div>
            <div class="tger-footer__mobile-main-column">
                <div class="tger-footer__inner">
                    <amp-accordion animate>
                        <section>
                            <h4><span class="footer-column-heading">Escape Rooms <amp-img 
                                src="{{ url('img/menus/tger-menu-chevrons-white.svg') }}"
                                width="25"
                                height="25.57856941265"
                                layout="intrinsic"
                                class="chevron-icon"></amp-img></span></h4>
                            <ul>
                                @if ($market && $market->findAllThemes() !== null)
                                    @foreach ($market->findAllThemes() as $marketfootertheme)
                                        <li>
                                            <a href="{{ url($marketfootertheme->path) }}">{{ $marketfootertheme->title}}</a>
                                        </li>
                                    @endforeach
                                @elseif ($market)
                                @else
                                    @foreach ($footerthemes as $footertheme)
                                        <li>
                                            <a href="{{ url($footertheme->path) }}">{{ $footertheme->title}}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </section>
                    </amp-accordion>
                </div>                    
            </div>
        </div>

        <div class="tger-footer__desktop-main">                    
            <div class="tger-footer__desktop-main-column">
                <div class="tger-footer__inner">
                    <h4>Florida Locations</h4>
                    <ul>
                        @foreach ($flmarkets as $flmarket)
                            <li>
                                <a href="{{ url($flmarket->path) }}">{{ $flmarket->name}}, {{ $flmarket->state}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>                    
            </div>
            <div class="tger-footer__desktop-main-column">
                <div class="tger-footer__inner">
                    <h4>Midwest Locations</h4>
                    <ul>
                        @foreach ($midmarkets as $midmarket)
                            <li>
                                <a href="{{ url($midmarket->path) }}">{{ $midmarket->name}}, {{ $midmarket->state}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>                    
            </div>
            <div class="tger-footer__desktop-main-column">
                <div class="tger-footer__inner">
                    <h4>Northeast Locations</h4>
                    <ul>
                        @foreach ($nemarkets as $nemarket)
                            <li>
                                <a href="{{ url($nemarket->path) }}">{{ $nemarket->name}}, {{ $nemarket->state}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>                    
            </div>
            <div class="tger-footer__desktop-main-column">
                <div class="tger-footer__inner">
                    <h4>TGER Company</h4>
                    <ul>
                        <li>
                            <a href="{{ $market->gifts_path ?? route('gifts') }}">Gift Certificates</a>
                        </li>
                        <li>
                            <a href="{{ $market->parties_path ?? route('parties') }}">Private Parties</a>
                        </li>
                        <li>
                            <a href="{{ $market->team_building_path ?? route('team-building') }}">Team Building</a>
                        </li>
                        <li>
                            <a href="{{ $market->contact_path ?? route('contact') }}">Contact Us</a>
                        </li>
                    </ul>
                </div>                    
            </div>
            <div class="tger-footer__desktop-main-column">
                <div class="tger-footer__inner">
                    <h4>Escape Rooms</h4>
                    <ul>
                        @if ($market && $market->findAllThemes() !== null)
                            @foreach ($market->findAllThemes() as $marketfootertheme)
                                <li>
                                    <a href="{{ url($marketfootertheme->path) }}">{{ $marketfootertheme->title}}</a>
                                </li>
                            @endforeach
                        @elseif ($market)
                        @else
                            @foreach ($footerthemes as $footertheme)
                                <li>
                                    <a href="{{ url($footertheme->path) }}">{{ $footertheme->title}}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>                    
            </div>
        </div>
        
        <div class="tger-footer__copyright">
            <ul class="tger-footer__copyright-left">
                <li>&copy;2020 <a href="/">The Great Escape Room</a></li>
                <li><a href="{{ route('terms') }}">Terms of Service</a></li>
                <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                <li><a href="{{ $market->faq_path ?? route('faq') }}">FAQs</a></li>
                <li><a href="{{ $market->employment_path ?? route('employment') }}">Employment</a></li>
                <li><a href="{{ route('company') }}">About Us</a></li>
                @if($market)
                    <li><a href="{{ $market->locations->first()->phone_link }}">{{ $market->locations->first()->phone }}</a></li>
                @endif
            </ul>
            <ul class="tger-footer__copyright-right">
                <li><a href="https://www.facebook.com/thegreatescaperoom/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://www.instagram.com/thegreatescaperoom/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                <li><a href="https://twitter.com/greatescaperoom" target="_blank"><i class="fa fa-twitter"></i></a></li>
            </ul>
        </div>
    </div>
    
</footer>
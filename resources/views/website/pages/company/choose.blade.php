@extends('website.layout')

@section('content')
    @if(isset($link))
        <section class="tger-location-selector">
            <div class="tger-location-selector__top-bg"></div>
            <div class="tger-location-selector__wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="tger-location-selector__inner">
                                <h2>Choose your location</h2>
                                <form action="">
                                    <select class="form-control" name="" id="" on="change:AMP.navigateTo(url=event.value)" tabindex="0" role="">
                                        <option value="">Choose your location</option>
                                        @foreach ($locationslist as $selector)
                                            @if($link == 'bookings')
                                                <option value="{{ url($selector->market->slug.'/book-online/'.$selector->location_slug) }}">{{ $selector->location_name }}</option>
                                            @endif
                                            @if($link == 'contact')
                                                <option value="{{ url($selector->contact_path) }}">{{ $selector->selector_title }}</option>
                                            @endif
                                            @if($link == 'employment')
                                                <option value="{{ url($selector->employment_path) }}">{{ $selector->selector_title }}</option>
                                            @endif
                                            @if($link == 'faq')
                                                <option value="{{ url($selector->faq_path) }}">{{ $selector->selector_title }}</option>
                                            @endif
                                            @if($link == 'gifts')
                                                <option value="{{ url($selector->gifts_path) }}">{{ $selector->selector_title }}</option>
                                            @endif
                                            @if($link == 'parties')
                                                <option value="{{ url($selector->parties_path) }}">{{ $selector->selector_title }}</option>
                                            @endif
                                            @if($link == 'reservations')
                                                <option value="{{ url($selector->reservations_path) }}">{{ $selector->selector_title }}</option>
                                            @endif
                                            @if($link == 'team_building')
                                                <option value="{{ url($selector->team_building_path) }}">{{ $selector->selector_title }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tger-location-selector__bottom-bg"></div>
        </section>
    @endif
@endsection

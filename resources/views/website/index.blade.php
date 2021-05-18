@extends('website.layout')

@section('amp-scripts')
    @parent
    <script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.2.js"></script>
@endsection

@section('content')
    @include('website.subviews.escape-rooms')

    @include('website.subviews.group-events')

    @include('website.subviews.testimonials')

    @include('website.subviews.about')
@endsection
@extends ('layouts.appjs')

@section ('content')

<div class="flex flex-col items-center">
    <div class="w-1/2">
        @include ('addresses::domestic-address-search-bar-javascript')
    </div>
    <form 
        method="POST"
        action="{{ route('submit-form') }}" 
        class="w-1/2"
    >
        @csrf
        @include ('addresses::domestic-address-search-bar-fields-javascript')
        <button type="submit">Submit</button>
    </form>
</div>



@endsection

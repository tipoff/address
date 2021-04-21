@extends ('layouts.app')

@section ('content')

<div class="flex flex-col items-center">
    <div class="w-1/2">
        <!-- JS version -->
        @livewire ('addresses::domestic-address-search-bar')
    </div>
    <form 
        method="POST"
        action="{{ route('submit-form') }}" 
        class="w-1/2"
    >
        @csrf
        @livewire ('addresses::domestic-address-search-bar-fields')
        <button type="submit">Submit</button>
    </form>
</div>

@endsection

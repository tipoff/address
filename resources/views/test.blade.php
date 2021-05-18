@extends ('layouts.app')

@section ('content')

<div class="flex flex-col">
    <div class="w-1/2 my-4">
        @livewire('addresses::domestic-address-search-bar')
    </div>
    <form 
        method="POST"
        action="{{ route('submit-form') }}" 
        class="w-1/2 my-4"
    >
        @csrf
        @livewire('addresses::domestic-address-search-bar-fields')
        @livewire('addresses::get-phone')
        <button class="mt-4 px-2 py-1 ring-1 ring-gray-400 rounded-md text-gray-400" type="submit">Submit</button>
    </form>
</div>

@endsection

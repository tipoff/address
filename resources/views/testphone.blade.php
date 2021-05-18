@extends ('layouts.app')

@section ('content')

<form wire:ignore id="phone-number" onsubmit="savePhoneNumber(event)">
    @livewire ('addresses::get-phone')
    <input type="submit" class="btn" value="Submit"/>
</form>

@endsection
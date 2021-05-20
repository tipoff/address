@extends('website.layout-booking')

@section('content')
<section class="tger-booking-contact">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Contact Details</h1>

                <form
                    action="{{ route('bookings.contact-details.store', [$market, $location], false) }}"
                    method="POST">
                    @csrf
            
                    <div class="form-group">
                        <label for="first_name">First Name</label>
            
                        <input type="text" id="first_name" class="form-control" name="name" required>
            
                        @error('name')
                            <div style="background-color: red;">{{ $message }}</div>
                        @enderror
                    </div>
            
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
            
                        <input type="text" id="last_name" class="form-control" name="name_last" required>
            
                        @error('name_last')
                            <div style="background-color: red;">{{ $message }}</div>
                        @enderror
                    </div>
            
                    <div class="form-group">
                        <label for="email">E-mail</label>
            
                        <input type="email" id="email" class="form-control" name="email" required>
            
                        @error('email')
                            <div style="background-color: red;">{{ $message }}</div>
                        @enderror
                    </div>
            
                    <button class="button6" type="submit">
                        Next Step
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
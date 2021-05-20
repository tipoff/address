@extends('website.layout-booking')

@section('content')
<section class="tger-booking-checkout">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
                <div class="tger-booking-checkout__countdown">
                    <countdown-clock end="{{ $cart->expires_at }}"></countdown-clock>

                    @if ($errors->any())
                        <ul style="background-color: red;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 order-1 order-lg-0">
                <purchase-form
                    class="tger-booking-checkout__checkout"
                    :location="{{ $location }}"
                    :market="{{ $market }}">
                </purchase-form>
                @if ($cart->hasInRoomMonitors())
                    <div class="tger-booking-checkout__notice">
                        <p><strong>*</strong>Your cart contains a scavenger hunt game (Library or Gameroom) with a personal gamemaster who will join you in the room.</p>
                    </div>
                @endif
                <img src="/img/tger/stripe-payments.png" width="800" height="88" alt="Secure Payments via Stripe" title="" class="tger-booking-checkout__payments">
            </div>

            <div class="col-lg-4 order-0 order-lg-1 mb-5 mb-lg-0">
                <div class="tger-booking-checkout__cart">
                    @if ($cart->hasInRoomMonitors())
                        <h3>Cart*</h3>
                    @else
                        <h3>Cart</h3>
                    @endif

                    <a class="button6" href="{{ locationRoute('bookings.slots.index', $market, $location) }}">
                        <i class="fa fa-plus"></i> Add More Games
                    </a>

                    <ul class="tger-booking-cart">
                        @foreach ($cartItems as $item)
                            <li>
                                <div class="booking-cart-left">
                                    <span>{{ $item->room->title }}</span>

                                    <span>{{ $item->formatted_start }}</span>

                                    <div>
                                        <span>{{ $item->participants }} Participants</span>
                                        <span>{{ $item->is_private ? 'Private' : 'Public' }} Game</span>
                                    </div>

                                    <span>Subtotal: @money($item->amount)</span>

                                    <form
                                        action="{{ route('bookings.holds.destroy', [$market, $item->slot_number, $location], false) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class="button-link" type="submit"><i class="fa fa-minus"></i> Delete</button>
                                    </form>
                                </div>
                                <div class="booking-cart-right">
                                    <div class="booking-cart-right-image" style="background-image: url('{{ $item->room->icon_url }}');"></div>
                                </div>

                            </li>
                        @endforeach
                    </ul>

                    @if ($cart->deduction_codes->count())
                        <ul>
                            @foreach ($cart->deduction_codes as $deductionCode)
                                <li>
                                    <div>Code {{ $deductionCode->code }}</div>
                                    <div>
                                        Deduction:
                                        @if (!empty($deductionCode->amount))
                                            @money($deductionCode->amount)
                                        @endif
                                        @if (!empty($deductionCode->percent))
                                            -{{$deductionCode->percent}}%
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <p>
                        <span>Taxes: @money($cart->total_taxes)</span><br>
                        <span>Fees: @money($cart->total_fees)</span>
                    </p>

                    <h3>Total: @money($cart->total_amount) (USD)</h3>

                    <deduction-code-form
                        vouchers-endpoint="{{ route('bookings.voucher-applications.store', [$market, $location]) }}"
                        discounts-endpoint="{{ route('bookings.discount-applications.store', [$market, $location]) }}"
                    ></deduction-code-form>

                    @if (session()->has('code-applied'))
                        <div>{{ session('code-applied') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
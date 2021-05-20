<script>
	//Set dataLayer variables
    var location = "@php echo $location->name; @endphp";
    var market = "@php echo $market->name; @endphp";
    var rooms = [];
        @foreach($cartItems as $item)
            rooms.push({
                "roomTitle":  "@php echo $item->room->title; @endphp",
                "roomDate":  "@php echo $item->formatted_start; @endphp",
                "roomParticipants":  "@php echo $item->participants; @endphp",
                "roomOccupants":  "@php echo ($item->is_private) ? 'Private' : 'Public'; @endphp",
                "roomTotal": "@php echo number_format($item->amount / 100, 2); @endphp"
            });
        @endforeach
    var taxes = "@php echo number_format($cart->total_taxes / 100, 2); @endphp";
    var fees = "@php echo number_format($cart->total_fees / 100, 2); @endphp";
    var grandTotal = "@php echo number_format($cart->total_amount / 100, 2); @endphp";

    //Populate empty dataLayer array with object data
    dataLayer.push({
        'event': 'addtocart_checkout',
        'currencyCode': 'USD',
        'room_details': {
            'location': location,
            'market': market,
            'rooms': rooms,
            'taxes': taxes,
            'fees': fees,
            'grandTotal': grandTotal
        }
    });
</script>
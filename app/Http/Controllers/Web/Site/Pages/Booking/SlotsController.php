<?php

namespace App\Http\Controllers\Web\Site\Pages\Booking;

use App\Http\Controllers\Controller;
use Tipoff\Locations\Models\Location;
use Tipoff\Locations\Models\Market;
use Illuminate\Http\Request;

class SlotsController extends Controller
{
    public function __invoke(Request $request, Market $market = null, Location $location = null)
    {
        $current = getCurrentMarket($request);

        // Redirect to the user's current market if they have one set and end up on page in company section
        if ($current && $request->segment(1) === 'company') {
            return redirect()->to($current->bookings_path);
        }

        $image = url('img/tger.jpg');

        // Show the page in the company section of the site
        if ($request->segment(1) === 'company') {
            return view('website.pages.company.choose', [
                'market' => $current,
                'html' => null, // set to true if need to use html page instead of AMP
                'title' => 'Book Online at The Great Escape Room',
                'subtitle' => 'Please select your location from the dropdown below:',
                'cta' => null,
                'link' => 'bookings',
                'seotitle' => 'Book Online at The Great Escape Room',
                'seodescription' => 'Book Online at The Great Escape Room, a leader in the escape room industry with 12 locations. Visit our website to learn more.',
                'ogtitle' => 'Book Online at The Great Escape Room',
                'ogdescription' => 'Book Online at The Great Escape Room, a leader in the escape room industry with 12 locations. Visit our website to learn more.',
                'canonical' => route('bookings'),
                'image' => $image,
                'ogimage' => $image === null ? url('img/ogimage.jpg') : $image,
            ]);
        }

        // Send to correct market if somehow they get to a URL with a different market than where the location belongs
        if ($location && $market->id !== $location->market_id) {
            return redirect()->to($location->bookings_path);
        }

        // If there is only one location in the market, remove the trailing location name in the route/URL
        if ($market->locations_count === 1 && $location) {
            return redirect()->to($market->bookings_path);
        }

        setCurrentMarket($request, $market);

        // In a multi-location market, ask the user to choose a location
        if ($market->locations_count !== 1 && ! $location) {
            return view('website.markets.select', [
                'market' => $market,
                'html' => null, // set to true if need to use html page instead of AMP
                'title' => 'Book your game in '.$market->name,
                'subtitle' => 'Please select your '.$market->name.' location from the dropdown below:',
                'cta' => null,
                'link' => 'bookings',
                'seotitle' => 'Book Online at '.$market->name.' Escape Rooms',
                'seodescription' => $market->title.' has '.$market->rooms->count().' different escape rooms and offers private escape games for groups & parties. Book your escape room today!',
                'ogtitle' => 'Book Online at '.$market->name.' Escape Rooms',
                'ogdescription' => $market->title.' has '.$market->rooms->count().' different escape rooms and offers private escape games for groups & parties. Book your escape room today!',
                'canonical' => 'https://thegreatescaperoom.com'.$market->bookings_path,
                'image' => $image,
                'ogimage' => $image === null ? url('img/ogimage.jpg') : $image,
            ]);
        }

        // If end up here, then display the bookings page
        if (! $location) {
            $location = $market->locations->first();
        }

        return view('website.pages.booking.slots', [
            'market' => $market,
            'location' => $location,
            'html' => true,
            'seotitle' => 'Book Online at '.$market->name.' Escape Rooms',
            'seodescription' => $market->title.' has '.$market->rooms->count().' different escape rooms and offers private escape games for groups & parties. Book your escape room today!',
            'ogtitle' => 'Book Online at '.$market->name.' Escape Rooms',
            'ogdescription' => $market->title.' has '.$market->rooms->count().' different escape rooms and offers private escape games for groups & parties. Book your escape room today!',
            'canonical' => 'https://thegreatescaperoom.com'.$location->bookings_path,
            'image' => $image,
            'ogimage' => $image === null ? url('img/ogimage.jpg') : $image,
        ]);
    }
}

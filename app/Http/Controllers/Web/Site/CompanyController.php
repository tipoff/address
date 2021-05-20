<?php

namespace App\Http\Controllers\Web\Site;

use App\Http\Controllers\Controller;
use Tipoff\Locations\Models\Location;
use DrewRoberts\Media\Models\Image;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __invoke(Request $request)
    {
        $current = getCurrentMarket($request);
        $locations = Location::all()->join('phones', 'phones.id', '=', 'locations.phone_id');

        $image = Image::find(43)->url;

        return view('website.pages.company.company', [
            'market' => $current,
            'locations' => $locations,
            'html' => null, // set to true if need to use html page instead of AMP
            'title' => 'About The Great Escape Room',
            'subtitle' => 'Voted #1 Escape Room across America - A truly innovative experience that will keep you coming back for more!',
            'cta' => true,
            'seotitle' => 'About The Great Escape Room',
            'seodescription' => 'Find out more about The Great Escape Room, a leader in the escape room industry with ' . $locations->count() . ' locations.',
            'ogtitle' => 'About The Great Escape Room',
            'ogdescription' => 'Find out more about The Great Escape Room, a leader in the escape room industry with ' . $locations->count() . ' locations.',
            'canonical' => route('company'),
            'image' => $image,
            'ogimage' => $image === null ? url('img/ogimage.jpg') : $image,
        ]);
    }
}

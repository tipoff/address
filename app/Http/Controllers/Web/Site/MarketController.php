<?php

namespace App\Http\Controllers\Web\Site;

use App\Http\Controllers\Controller;
use Tipoff\EscapeRoom\Models\EscaperoomTheme;
use Tipoff\Locations\Models\Market;
use Tipoff\Reviews\Models\Review;
use Tipoff\EscapeRoom\Models\Room;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    public function __invoke(Request $request)
    {
        // Custom routing due to catch-all fallback in web routes
        $market = Market::where('slug', $request->segment(1))->first();
        if (is_null($market)) {
            abort(404);
        }
        if (! is_null($request->segment(2))) {
            return redirect()->to($market->path);
        }

        setCurrentMarket($request, $market);

        $locations = $market->locations;

        // Get all rooms for those locations
        $rooms = Room::whereIn('location_id', $locations->pluck('id'))
            ->whereNull('closed_at')
            ->orderByDesc('priority')
            ->get();

        $roomPriority = $rooms->pluck('priority', 'theme_id');
        $roomnotes = $rooms->filter->note->pluck('note', 'theme_id');
        $roomtitles = $rooms->filter->title->pluck('title', 'theme_id');
        $roomexcerpts = $rooms->filter->excerpt->pluck('excerpt', 'theme_id');
        $roomdescriptions = $rooms->filter->description->pluck('description', 'theme_id');

        $comingsoon = $rooms->filter(function ($room) {
            return $room->isComing();
        })->pluck('opened_at', 'theme_id');

        // Get the themes, ordered by rooms->priority exclude closed themes and remove duplicates
        $themes = EscaperoomTheme::whereIn('id', $rooms->pluck('theme_id'))
            ->get()
            ->sortBy(function ($theme) use ($roomPriority) {
                return $roomPriority[$theme->id];
            });

        $marketreviews = Review::where('is_displayable', true)->whereIn('location_id', $locations->pluck('id'))->orderByDesc('reviewed_at')->limit(6)->get();
        if ($marketreviews->count() <= 3) {
            $marketreviews = null;
        }

        $image = $market->image === null ? url('img/hero/tger.jpg') : $market->image->url;

        return view('website.markets.show', [
            'market' => $market,
            'themes' => $themes,
            'availablelocations' => $this->availableLocations($themes, $rooms, $locations),
            'notes' => $roomnotes,
            'titles' => $roomtitles,
            'excerpts' => $roomexcerpts,
            'descriptions' => $roomdescriptions,
            'comingsoon' => $comingsoon,
            'reviews' => $marketreviews,
            'html' => null, // set to true if need to use html page instead of AMP
            'title' => $market->title,
            'subtitle' => 'Voted #1 Escape Room across America - A truly innovative experience that will keep you coming back for more!',
            'cta' => true,
            'seotitle' => $market->title,
            'seodescription' => $market->description,
            'ogtitle' => $market->title,
            'ogdescription' => $market->description,
            'canonical' => 'https://thegreatescaperoom.com'.$market->path,
            'image' => $image,
            'ogimage' => $market->ogimage === null ? $image : $market->ogimage->url,
        ]);
    }

    private function availableLocations($themes, $rooms, $locations)
    {
        // For each theme, return $themeId => [locations that have this theme]
        return $themes->mapWithKeys(function ($theme) use ($rooms, $locations) {
            $availablerooms = $rooms->filter(function ($room) use ($theme) {
                return $room->theme_id === $theme->id;
            });

            return [
                $theme->id => $locations->filter(function ($location) use ($availablerooms) {
                    return $availablerooms->contains('location_id', $location->id);
                }),
            ];
        });
    }
}

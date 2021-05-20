<?php

namespace App\Providers;

use Tipoff\EscapeRoom\Models\EscaperoomTheme;
use Tipoff\Locations\Models\Location;
use Tipoff\Locations\Models\Market;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('website.partials.menu', function ($view) {
            $navmarkets = Cache::remember('navmarkets', 3600, function () {
                return Market::orderBy('state_id')->orderBy('name')->get();
            });
            $navescapethemes = Cache::remember('allthemes', 3600, function () {
                return EscaperoomTheme::where('scavenger_level', '<', 4)->orderBy('name')->get();
            });
            $navscavengerthemes = Cache::remember('allscavengerthemes', 3600, function () {
                return EscaperoomTheme::where('scavenger_level', '>=', 4)->orderBy('name')->get();
            });

            return $view->with('navmarkets', $navmarkets)->with('navescapethemes', $navescapethemes)->with('navscavengerthemes', $navscavengerthemes);
        });

        View::composer('website.partials.footer', function ($view) {
            $allmarkets = Cache::remember('allmarkets', 3600, function () {
                return Market::orderBy('state_id')->orderBy('name')->get();
            });
            $flmarkets = Cache::remember('flmarkets', 3600, function () {
                return Market::join('states', 'states.id', '=', 'markets.state_id')
                    ->where('states.abbreviation', 'FL')
                    ->orderBy('markets.name')
                    ->get();
            });
            $midmarkets = Cache::remember('midmarkets', 3600, function () {
                return Market::join('states', 'states.id', '=', 'markets.state_id')
                    ->where('states.abbreviation', ['MI', 'OH', 'IL'])
                    ->orderBy('markets.name')
                    ->get();
            });
            $nemarkets = Cache::remember('nemarkets', 3600, function () {
                return Market::join('states', 'states.id', '=', 'markets.state_id')
                    ->where('states.abbreviation', ['NY', 'RI', 'DC', 'PA'])
                    ->orderBy('markets.name')
                    ->get();
            });
            $footerthemes = Cache::remember('footerthemes', 3600, function () {
                return EscaperoomTheme::orderBy('name')->limit(7)->get();
            });

            return $view->with('allmarkets', $allmarkets)->with('flmarkets', $flmarkets)->with('midmarkets', $midmarkets)->with('nemarkets', $nemarkets)->with('footerthemes', $footerthemes);
        });

        View::composer('website.pages.company.choose', function ($view) {
            $locationslist = Cache::remember('locationslist', 3600, function () {
                return Location::select('locations.*', 'locations.name as location_name', 'locations.slug as location_slug', 'markets.*', 'markets.name as market_name')
                    ->join('markets', 'markets.id', '=', 'locations.market_id')
                    ->join('pages', 'pages.id', '=', 'locations.page_id')
                    ->orderBy('markets.state_id')
                    ->orderBy('markets.title')
                    ->orderBy('locations.name')->get();
            });
            return $view->with('locationslist', $locationslist);
        });
    }
}

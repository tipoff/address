<?php

use Tipoff\Locations\Models\Location;
use Tipoff\Locations\Models\Market;
use App\Services\Breakdown;
use Tipoff\Locations\Services\LocationRouter;

function markdown($text)
{
    return (new Breakdown())->parse($text);
}

function getCurrentMarket($request)
{
    return Market::find($request->session()->get('current_market_id'));
}

function setCurrentMarket($request, $market)
{
    $request->session()->put('current_market_id', $market->id);
}

function locationRoute(string $routeName, Market $market, Location $location): string
{
    return LocationRouter::build($routeName, $market, $location);
}

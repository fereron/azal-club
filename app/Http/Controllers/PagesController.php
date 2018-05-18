<?php

namespace App\Http\Controllers;

use Cache;
use GuzzleHttp\Client;

class PagesController extends Controller
{

    public function index()
    {
        return view('pages.index');
    }


    public function flights(Client $client)
    {

        return view('pages.flights', [
            'arrivals' => Cache::get('arrivals'),
            'departures' => Cache::get('departures'),
        ]);
    }


}
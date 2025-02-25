<?php

namespace App\Http\Controllers;

use App\Services\RealtyInUsAPI;

class PropertyListingController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('index');
    }

    public function importListings()
    {
        $listings = RealtyInUsAPI::importProperties();

        return response()->json($listings);
    }

    public function listings()
    {
        // This is where we would normally query the database for listings

        return view('listings');
    }
}

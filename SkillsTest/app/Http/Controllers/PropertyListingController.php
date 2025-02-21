<?php

namespace App\Http\Controllers;

use App\Services\RealtyInUsAPI;

class PropertyListingController extends Controller
{
    public function listings()
    {
        $listings = PropertyListing::limit(5)->get();

        return view('listings', compact('listings'));
    }

    public function importListings()
    {
        RealtyInUsAPI::importProperties();

        return redirect('/listings');
    }

    public function index()
    {
        $propertyListings = PropertyListing::all();

        return view('index', compact('propertyListings'));
    }
}

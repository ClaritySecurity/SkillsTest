<?php

namespace App\Http\Controllers;

use App\Models\PropertyListing;
use App\Services\RealtyInUsAPI;
use Illuminate\Http\Request;

class PropertyListingController extends Controller
{
    public function listings()
    {
        $listings = PropertyListing::limit(10)->get();

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

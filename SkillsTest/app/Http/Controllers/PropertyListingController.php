<?php

namespace App\Http\Controllers;

use App\Services\RealtyInUsAPI;

class PropertyListingController extends Controller
{
    public function listings()
    {
        $listings = RealtyInUsAPI::importProperties();

        return view('listings', compact('listings'));
    }

}

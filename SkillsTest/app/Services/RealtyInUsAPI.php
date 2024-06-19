<?php

namespace App\Services;

use App\Models\PropertyListing;
use Illuminate\Support\Facades\Http;

class RealtyInUsAPI
{

    public static function importProperties()
    {
        $response = Http::withHeaders([
            'X-RapidAPI-Host' => 'realty-in-us.p.rapidapi.com',
            'X-RapidAPI-Key' => '2a2d93f173msh14ef235fe751cb4p1ee8abjsnd15df3d91306',
            'content-type' => 'application/json',
            ])->post('https://realty-in-us.p.rapidapi.com/properties/v3/list', [
            'limit' => 5,
            'offset' => 0,
            'postal_code' => '90210',
            'status' => [
                'for_sale',
                'ready_to_build'
            ],
            'sort' => [
                'direction' => 'desc',
                'field' => 'list_date'
            ]
        ]);

        return $response->json();
    }
}

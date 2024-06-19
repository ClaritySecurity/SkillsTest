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
            'X-RapidAPI-Key' => 'GET KEY FROM MIKE',
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

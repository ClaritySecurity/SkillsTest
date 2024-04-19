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
            //'X-RapidAPI-Key' => 'GET_KEY_FROM_GREG_OR_MIKE',
            'X-RapidAPI-Key' => '2a2d93f173msh14ef235fe751cb4p1ee8abjsnd15df3d91306',
            'content-type' => 'application/json',
            ])->post('https://realty-in-us.p.rapidapi.com/properties/v3/list', [
            'limit' => 50,
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

        $results = $response->json();

        foreach ($results['data']['home_search']['results'] as $result) {
            // Save the property to the database
            PropertyListing::create([
                'property_id' => $result['property_id'],
                'listing_id' => $result['listing_id'],
                'status' => $result['status'],
                'price' => $result['list_price'],
                'street_view_url' => $result['location']['street_view_url'],
                'bedrooms' => $result['description']['beds'],
                'bathrooms' => $result['description']['baths'],
                'square_footage' => $result['description']['sqft'],
                'lot_size' => $result['description']['lot_sqft'],
                'address_street' => $result['location']['address']['line'],
                'address_city' => $result['location']['address']['city'],
                'address_state' => $result['location']['address']['state_code'],
                'address_zip' => $result['location']['address']['postal_code'],
                'photo_count' => $result['photo_count'],
            ]);
        }
    }
}

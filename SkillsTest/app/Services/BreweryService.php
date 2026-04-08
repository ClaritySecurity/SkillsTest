<?php

namespace App\Services;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\Factory as HttpFactory;
use RuntimeException;

class BreweryService
{
    public function __construct(
        protected HttpFactory $http,
    ) {}

    public function fetchBreweries(): array
    {
        try {
            $response = $this->http->get('https://api.openbrewerydb.org/v1/breweries');

            if ($response->failed()) {
                throw new RuntimeException('Failed to fetch breweries: ' . $response->status());
            }
        } catch (ConnectionException $e) {
            throw new RuntimeException('Failed to connect to the API: ' . $e->getMessage());
        }

        return $response->json();
    }
}

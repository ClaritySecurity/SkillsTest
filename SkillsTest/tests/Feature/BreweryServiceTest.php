<?php

namespace Tests\Feature;

use App\Services\BreweryService;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class BreweryServiceTest extends TestCase
{
    public function test_fetch_breweries_calls_api(): void
    {
        Http::fake([
            'api.openbrewerydb.org/v1/breweries' => Http::response([
                [
                    'id' => 'madtree-brewing-cincinnati',
                    'name' => 'MadTree Brewing',
                    'brewery_type' => 'micro',
                    'city' => 'Cincinnati',
                    'state_province' => 'Ohio',
                ],
            ]),
        ]);

        $service = app(BreweryService::class);
        $breweries = $service->fetchBreweries();

        $this->assertIsArray($breweries);
        $this->assertNotEmpty($breweries);

        Http::assertSentCount(1);
        Http::assertSent(static fn ($request) => $request->url() === 'https://api.openbrewerydb.org/v1/breweries');
    }
}

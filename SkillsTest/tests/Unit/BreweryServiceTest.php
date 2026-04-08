<?php

namespace Tests\Unit;

use App\Services\BreweryService;
use Illuminate\Http\Client\Factory as HttpFactory;
use Illuminate\Http\Client\Request;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class BreweryServiceTest extends TestCase
{
    public function test_fetch_breweries_returns_array(): void
    {
        $http = new HttpFactory();
        $http->fake([
            'api.openbrewerydb.org/v1/breweries' => $http::response([
                [
                    'id' => 'madtree-brewing-cincinnati',
                    'name' => 'MadTree Brewing',
                    'brewery_type' => 'micro',
                    'city' => 'Cincinnati',
                    'state_province' => 'Ohio',
                ],
            ]),
        ]);

        $service = new BreweryService($http);
        $result = $service->fetchBreweries();

        $this->assertIsArray($result);
        $this->assertCount(1, $result);
        $this->assertEquals('MadTree Brewing', $result[0]['name']);

        $http->assertSentCount(1);
        $http->assertSent(static fn (Request $request) => $request->url() === 'https://api.openbrewerydb.org/v1/breweries');
    }

    public function test_fetch_breweries_throws_on_failure(): void
    {
        $http = new HttpFactory();
        $http->fake([
            'api.openbrewerydb.org/v1/breweries' => $http::response([], 500),
        ]);

        $this->expectException(RuntimeException::class);

        $service = new BreweryService($http);
        $service->fetchBreweries();
    }
}

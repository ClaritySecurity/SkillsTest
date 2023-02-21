<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class SWAPITest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_starship_table_exists(): void
    {
        $this->assertDatabaseHas('st_starship');
    }

    public function test_the_starship_table_has_fields(): void
    {
        if(Schema::hasColumn('st_starship', 'name')
            && Schema::hasColumn('st_starship', 'model')
            && Schema::hasColumn('st_starship', 'manufacturer')
            && Schema::hasColumn('st_starship', 'passengers')
        ) {
            $result = true;
        } else {
            $result = false;
        }
        $this->assertTrue($result);
    }

    public function test_the_starship_models_are_populated(): void
    {
        $starship = App\Models\Starship::all();
        $this->assertNotEmpty($starship);
    }

    public function test_the_starship_route(): void
    {
        $response = $this->get('/starships');
        $response->assertStatus(200);
    }

}

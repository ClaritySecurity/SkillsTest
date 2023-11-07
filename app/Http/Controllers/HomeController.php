<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Film;
use App\Services\SWAPIService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function syncSWAPI()
    {
        $startTime = microtime(true);
        SWAPIService::importFilms();
        SWAPIService::importCharacters();
        SWAPIService::syncFilmCharacterRelationships();
        $endTime = microtime(true);
        $executionTime = ($endTime - $startTime);
        $filmCount = Film::all()->count();
        $characterCount = Character::all()->count();

        return view('sync', [
            'executionTime' => $executionTime,
            'filmCount' => $filmCount,
            'characterCount' => $characterCount
        ]);
    }
}

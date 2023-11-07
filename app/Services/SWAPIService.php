<?php

namespace App\Services;

use App\Models\Character;
use App\Models\Film;
use Illuminate\Support\Facades\Http;

class SWAPIService
{

    public static function importFilms()
    {
        $result = Http::get('https://swapi.dev/api/films')->json();

        foreach ($result['results'] as $film) {
            $idParts = explode('/', $film['url']);
            $id = $idParts[count($idParts) - 2];
            $existingFilm = Film::where('swapi_id', $id)
                ->first();
            if (!$existingFilm) {
                $newFilm = new Film();
                $newFilm->swapi_id = $id;
                $newFilm->title = $film['title'];
                $newFilm->episode_id = $film['episode_id'];
                $newFilm->opening_crawl = $film['opening_crawl'];
                $newFilm->director = $film['director'];
                $newFilm->producer = $film['producer'];
                $newFilm->release_date = $film['release_date'];
                $newFilm->characters = $film['characters'];
                $newFilm->planets = $film['planets'];
                $newFilm->starships = $film['starships'];
                $newFilm->vehicles = $film['vehicles'];
                $newFilm->species = $film['species'];
                $newFilm->save();
            } else {
                // TODO: what should we do if the film already exists?
            }
        }
    }


    public static function importCharacters()
    {
        $result = Http::get('https://swapi.dev/api/people')->json();

        foreach ($result['results'] as $character) {
            $idParts = explode('/', $character['url']);
            $id = $idParts[count($idParts) - 2];
            $existingCharacter = Character::where('swapi_id', $id)
                ->first();
            if (!$existingCharacter) {
                $newCharacter = new Character();
                $newCharacter->swapi_id = $id;
                $newCharacter->name = $character['name'];
                $newCharacter->height = $character['height'];
                $newCharacter->mass = $character['mass'];
                $newCharacter->hair_color = $character['hair_color'];
                $newCharacter->skin_color = $character['skin_color'];
                $newCharacter->eye_color = $character['eye_color'];
                $newCharacter->birth_year = $character['birth_year'];
                $newCharacter->gender = $character['gender'];
                $newCharacter->homeworld = $character['homeworld'];
                $newCharacter->save();
            } else {
                // TODO: what should we do if the character already exists?
            }
        }
    }

    public static function syncFilmCharacterRelationships()
    {
        // TODO: implement this
    }
}

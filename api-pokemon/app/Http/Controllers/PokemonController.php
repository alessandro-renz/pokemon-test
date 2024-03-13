<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PokemonController extends Controller
{
    private $endpoint;
    private $offset;
    private $limit;

    public function __construct()
    {
        $this->endpoint = 'https://pokeapi.co/api/v2';
    }

    public function list()
    {
        $url = $this->endpoint . '/pokemon';
        $result = Http::get($url);
        if (!$result->successful()) {
            throw new Exception("Erro na requisição!");
        }

        return $result->json();
    }

    public function view(string $name)
    {
        $url = $this->endpoint . "/pokemon/{$name}";

        $result = Http::get($url);
        if (!$result->successful()) {
            throw new Exception("Erro na requisição!");
        }

        return $result->json();
    }

    public function next()
    {
        $this->offset += 10;
        $currentPage = $this->endpoint . '/pokemon?offset='. $this->offset .'&limit=' . $this->limit;
        $result = Http::get($currentPage);
        if (!$result->successful()) {
            throw new Exception("Erro na requisição!");
        }

        return $result->json();
    }

    public function previous()
    {
        if ($this->offset > 0) {
            $this->offset -= 10;
        }

        $currentPage = $this->endpoint . '/pokemon?offset='. $this->offset .'&limit=' . $this->limit;
        $result = Http::get($currentPage);
        if (!$result->successful()) {
            throw new Exception("Erro na requisição!");
        }

        return $result->json();


    }
}

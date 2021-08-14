<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class GenshinController extends Controller
{
    public function index()
    {
        $characters = Http::get('https://genshinlist.com/api/characters')->json();
        $weapons = Http::get('https://genshinlist.com/api/weapons')->json();
        $artifacts = Http::get('https://genshinlist.com/api/artifacts')->json();

        $countCharacters = count($characters);
        $countWeapons = count($weapons);
        $countArtifacts = count($artifacts);
        
        return view('home', [
            'count_characters' => $countCharacters,
            'count_weapons' => $countWeapons,
            'count_artifacts' => $countArtifacts,
        ]);
    }

    public function getData($typeData)
    {
        $data = Http::get('https://genshinlist.com/api/'.$typeData)->json();
        $count = count($data);

        return view('pages.'.$typeData, [
            'data' => $data,
            'count_data' => $count,
        ]);
    }
}

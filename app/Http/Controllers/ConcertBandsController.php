<?php

namespace App\Http\Controllers;

use App\Http\Resources\ConcertResource;
use App\Models\Band;
use App\Models\Concert;
use Illuminate\Http\Request;

class ConcertBandsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param Concert $concert
     * @param Band $band
     * @return \Illuminate\Http\Response
     */
    public function store(Concert $concert, Band $band)
    {
        $concert->bands()->attach([
            'band_id' => $band->id
        ]);

        return response(['concert' => new ConcertResource($concert),
            'message' => 'Added band successfully'], 201);
    }
}

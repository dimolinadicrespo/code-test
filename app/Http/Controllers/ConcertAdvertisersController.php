<?php

namespace App\Http\Controllers;

use App\Http\Resources\ConcertResource;
use App\Models\Advertiser;
use App\Models\Concert;
use Illuminate\Http\Request;

class ConcertAdvertisersController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param Concert $concert
     * @param Advertiser $advertiser
     * @return \Illuminate\Http\Response
     */
    public function store(Concert $concert, Advertiser $advertiser)
    {
        $concert->advertisers()->attach([
            'advertiser_id' => $advertiser->id
        ]);

        return response(['concert' => new ConcertResource($concert),
            'message' => 'Added advertiser successfully'], 201);
    }
}

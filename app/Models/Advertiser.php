<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertiser extends Model
{
    use HasFactory;

    public function concerts()
    {
        return $this->belongsToMany(Concert::class, 'advertiser_concert', 'concert_id', 'advertiser_id');
    }

}

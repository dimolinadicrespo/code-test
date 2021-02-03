<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    use HasFactory;

    protected $guarded = [];

    /** Relationship */
    public function local()
    {
        return $this->belongsTo(Local::class);
    }

    public function promoter()
    {
        return $this->belongsTo(Promoter::class);
    }

    public function bands()
    {
        return $this->belongsToMany(Band::class, 'band_concert', 'band_id','concert_id');
    }

    public function advertisers()
    {
        return $this->belongsToMany(Advertiser::class, 'advertiser_concert', 'advertiser_id', 'concert_id');
    }
}

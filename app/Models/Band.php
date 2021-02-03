<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    use HasFactory;

    public function concerts()
    {
        return $this->belongsToMany(Concert::class, 'band_concert', 'concert_id','band_id');
    }
}

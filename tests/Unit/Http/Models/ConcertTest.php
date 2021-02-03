<?php

namespace Tests\Unit\Http\Models;

use App\Models\Advertiser;
use App\Models\Band;
use App\Models\Concert;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ConcertTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function aConcertCanHaveManyBandsAssociate()
    {
        $concert = Concert::factory()->create([
            'name' => 'Conciertazo',
        ]);

        $band1 = Band::factory()->create(['name' => 'Banda 1']);
        $band2 = Band::factory()->create(['name' => 'Banda 2']);
        $band3 = Band::factory()->create(['name' => 'Banda 3']);

        $concert->bands()->attach([
            $band1->id,
            $band2->id,
            $band3->id,
        ]);

        $this->assertInstanceOf(Band::class, $concert->bands->shift());
        $this->assertInstanceOf(Band::class, $concert->bands->shift());
        $this->assertInstanceOf(Band::class, $concert->bands->shift());
    }

    /** @test */
    public function aConcertCanHaveManyAdvertisersAssociate()
    {
        $concert = Concert::factory()->create([
            'name' => 'Conciertazo',
        ]);

        $advertiser1 = Advertiser::factory()->create(['name' => 'Anunciante 1']);
        $advertiser2 = Advertiser::factory()->create(['name' => 'Anunciante 2']);
        $advertiser3 = Advertiser::factory()->create(['name' => 'Anunciante 3']);

        $concert->advertisers()->attach([
            $advertiser1->id,
            $advertiser2->id,
            $advertiser3->id,
        ]);

        $this->assertInstanceOf(Advertiser::class, $concert->advertisers->shift());
        $this->assertInstanceOf(Advertiser::class, $concert->advertisers->shift());
        $this->assertInstanceOf(Advertiser::class, $concert->advertisers->shift());
    }
}

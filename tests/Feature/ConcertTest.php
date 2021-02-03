<?php

namespace Tests\Feature;

use App\Models\Advertiser;
use App\Models\Band;
use App\Models\Concert;
use App\Models\Local;
use App\Models\Promoter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConcertTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function userCanCreateConcert()
    {
        $promoter = Promoter::factory()->create();
        $local = Local::factory()->create();

        $band1 = Band::factory()->create();
        $band2 = Band::factory()->create();
        $realizedAt = now()->subDays(4)->toDateTime();

        $response = $this->post(route('api.concerts.store'),[
                'name'     => 'Súper Concierto',
                'spectators' => 2000,
                'profitability' => 3000000,
                'local_id' => $local->id,
                'realized_at' => $realizedAt,
                'promoter_id' => $promoter->id
            ]
        );

        $response->assertStatus(201);
        $this->assertDatabaseHas('concerts', [
                'name'     => 'Súper Concierto',
                'spectators' => 2000,
                'profitability' => 3000000,
                'local_id' => $local->id,
                'realized_at' => $realizedAt,
                'promoter_id' => $promoter->id
            ]
        );
    }

    /** @test */
    public function userCanAddBandsToConcert()
    {
        $this->withoutExceptionHandling();
        $concert = Concert::factory()->create([
            'name' => 'Conciertazo',
        ]);

        $band1 = Band::factory()->create([
            'name' => 'Los Rolling',
        ]);

        //Make get request to concerts/{concert}/{band} we add bands to the concert
        $response = $this->postJson(route('api.concerts.bands.store',[$concert, $band1]));

        $this->assertDatabaseHas('band_concert', [
                'concert_id' => $concert->id,
                'band_id' => $band1->id
            ]
        );
    }

    /** @test */
    public function userCanAddAdvertiserToConcert()
    {
        $this->withoutExceptionHandling();
        $concert = Concert::factory()->create([
            'name' => 'Conciertazo',
        ]);

        $advertiser1 = Advertiser::factory()->create([
            'name' => 'Anunciante con money',
        ]);

        //Make get request to concerts/{concert}/{band} we add bands to the concert
        $response = $this->postJson(route('api.concerts.advertisers.store',[$concert, $advertiser1]));

        $this->assertDatabaseHas('advertiser_concert', [
                'concert_id' => $concert->id,
                'advertiser_id' => $advertiser1->id
            ]
        );
    }
}

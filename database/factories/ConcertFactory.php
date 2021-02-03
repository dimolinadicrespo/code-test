<?php

namespace Database\Factories;

use App\Models\Concert;
use App\Models\Local;
use App\Models\Promoter;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConcertFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Concert::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'realized_at' => $this->faker->dateTime,
            'spectators' => $this->faker->randomNumber(),
            'profitability' => $this->faker->randomNumber(),
            'local_id' =>  function(){
                return Local::factory()->create();
            },
            'promoter_id' =>  function(){
                return Promoter::factory()->create();
            }
        ];
    }
}

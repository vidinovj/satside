<?php

namespace Database\Factories;

use App\Models\VesselData;
use Illuminate\Database\Eloquent\Factories\Factory;

class VesselDataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VesselData::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'vessel_id' => $this->faker->uuid(),
            'timestamp' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'speed' => $this->faker->randomFloat(2, 0, 30),
            'heading' => $this->faker->randomFloat(2, 0, 360),
            'destination' => $this->faker->city(),
            'sanctions_risk_score' => $this->faker->randomFloat(2, 0, 1),
            'anomaly_score' => $this->faker->randomFloat(2, 0, 1),
            'last_port' => $this->faker->city(),
            'flag_country' => $this->faker->countryCode(),
        ];
    }
}
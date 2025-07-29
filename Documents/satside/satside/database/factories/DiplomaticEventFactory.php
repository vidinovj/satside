<?php

namespace Database\Factories;

use App\Models\DiplomaticEvent;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiplomaticEventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DiplomaticEvent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $eventTypes = ['Meeting', 'Agreement', 'Conflict', 'Speech', 'Visit'];
        $impactPredictions = ['positive', 'negative', 'neutral', 'uncertain'];
        $categories = ['Politics', 'Economy', 'Security', 'Culture'];

        return [
            'event_date' => $this->faker->dateTimeBetween('-2 years', 'now'),
            'country_code' => $this->faker->countryCode(),
            'event_type' => $this->faker->randomElement($eventTypes),
            'description' => $this->faker->paragraph(),
            'source_url' => $this->faker->url(),
            'sentiment_score' => $this->faker->randomFloat(2, -1, 1),
            'impact_prediction' => $this->faker->randomElement($impactPredictions),
            'confidence_level' => $this->faker->randomFloat(2, 0, 1),
            'category' => $this->faker->randomElement($categories),
        ];
    }
}
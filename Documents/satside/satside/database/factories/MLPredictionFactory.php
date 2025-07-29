<?php

namespace Database\Factories;

use App\Models\MLPrediction;
use Illuminate\Database\Eloquent\Factories\Factory;

class MLPredictionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MLPrediction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $modelTypes = ['vessel_risk', 'anomaly_detection', 'sentiment_analysis', 'country_risk', 'event_prediction'];

        return [
            'model_type' => $this->faker->randomElement($modelTypes),
            'input_data' => json_encode(['example_input' => $this->faker->sentence()]),
            'prediction' => json_encode(['example_prediction' => $this->faker->word()]),
            'confidence' => $this->faker->randomFloat(2, 0.5, 0.99),
            'execution_time' => $this->faker->randomFloat(2, 0.01, 5.0),
            'expires_at' => $this->faker->boolean(70) ? $this->faker->dateTimeBetween('+1 day', '+1 year') : null,
        ];
    }
}
<?php

namespace Database\Factories;

use App\Models\CountryRisk;
use Illuminate\Database\Eloquent\Factories\Factory;

class CountryRiskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CountryRisk::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $trendDirections = ['improving', 'declining', 'stable'];

        return [
            'country_code' => $this->faker->countryCode(),
            'assessment_date' => $this->faker->dateTimeBetween('-2 years', 'now'),
            'political_risk' => $this->faker->randomFloat(2, 0, 1),
            'economic_risk' => $this->faker->randomFloat(2, 0, 1),
            'financial_risk' => $this->faker->randomFloat(2, 0, 1),
            'overall_score' => $this->faker->randomFloat(2, 0, 1),
            'trend_direction' => $this->faker->randomElement($trendDirections),
            'last_updated' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
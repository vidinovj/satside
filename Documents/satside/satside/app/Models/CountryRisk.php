<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryRisk extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_code',
        'assessment_date',
        'political_risk',
        'economic_risk',
        'financial_risk',
        'overall_score',
        'trend_direction',
        'last_updated',
    ];

    protected $casts = [
        'assessment_date' => 'date',
        'last_updated' => 'datetime',
    ];

    /**
     * The validation rules for the model.
     *
     * @var array
     */
    public static $rules = [
        'country_code' => 'required|string|size:2',
        'assessment_date' => 'required|date',
        'political_risk' => 'nullable|numeric|between:0,1',
        'economic_risk' => 'nullable|numeric|between:0,1',
        'financial_risk' => 'nullable|numeric|between:0,1',
        'overall_score' => 'required|numeric|between:0,1',
        'trend_direction' => 'nullable|string|in:improving,declining,stable',
    ];

    /**
     * Scope a query to get the latest risk assessment for a country.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $countryCode
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLatestForCountry($query, $countryCode)
    {
        return $query->where('country_code', $countryCode)->latest('assessment_date')->first();
    }

    /**
     * Scope a query to get historical risk assessments for a country.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $countryCode
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeHistoricalForCountry($query, $countryCode)
    {
        return $query->where('country_code', $countryCode)->orderBy('assessment_date', 'asc');
    }
}
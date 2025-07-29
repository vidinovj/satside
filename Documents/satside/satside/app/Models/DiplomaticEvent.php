<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiplomaticEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_date',
        'country_code',
        'event_type',
        'description',
        'source_url',
        'sentiment_score',
        'impact_prediction',
        'confidence_level',
        'category',
    ];

    protected $casts = [
        'event_date' => 'date',
    ];

    /**
     * The validation rules for the model.
     *
     * @var array
     */
    public static $rules = [
        'event_date' => 'required|date',
        'country_code' => 'required|string|size:2',
        'event_type' => 'required|string|max:255',
        'description' => 'required|string',
        'source_url' => 'nullable|url|max:2048',
        'sentiment_score' => 'nullable|numeric|between:-1,1',
        'impact_prediction' => 'nullable|string|max:255',
        'confidence_level' => 'nullable|numeric|between:0,1',
        'category' => 'nullable|string|max:255',
    ];

    /**
     * Scope a query to filter by country code.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $countryCode
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByCountry($query, $countryCode)
    {
        return $query->where('country_code', $countryCode);
    }

    /**
     * Scope a query to filter by event type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $eventType
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfType($query, $eventType)
    {
        return $query->where('event_type', $eventType);
    }
}
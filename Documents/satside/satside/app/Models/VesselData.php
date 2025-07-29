<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VesselData extends Model
{
    use HasFactory;

    protected $fillable = [
        'vessel_id',
        'timestamp',
        'latitude',
        'longitude',
        'speed',
        'heading',
        'destination',
        'sanctions_risk_score',
        'anomaly_score',
        'last_port',
        'flag_country',
    ];

    protected $casts = [
        'timestamp' => 'datetime',
    ];

    /**
     * The validation rules for the model.
     *
     * @var array
     */
    public static $rules = [
        'vessel_id' => 'required|string|max:255',
        'timestamp' => 'required|date',
        'latitude' => 'required|numeric|between:-90,90',
        'longitude' => 'required|numeric|between:-180,180',
        'speed' => 'nullable|numeric|min:0',
        'heading' => 'nullable|numeric|between:0,360',
        'destination' => 'nullable|string|max:255',
        'sanctions_risk_score' => 'nullable|numeric|between:0,1',
        'anomaly_score' => 'nullable|numeric|between:0,1',
        'last_port' => 'nullable|string|max:255',
        'flag_country' => 'nullable|string|size:2',
    ];

    /**
     * Scope a query to filter by vessel ID.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $vesselId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByVesselId($query, $vesselId)
    {
        return $query->where('vessel_id', $vesselId);
    }

    /**
     * Scope a query to filter by date range.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $startDate
     * @param  string  $endDate
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBetweenDates($query, $startDate, $endDate)
    {
        return $query->whereBetween('timestamp', [$startDate, $endDate]);
    }
}
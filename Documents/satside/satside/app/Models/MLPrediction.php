<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MLPrediction extends Model
{
    use HasFactory;

    protected $fillable = [
        'model_type',
        'input_data',
        'prediction',
        'confidence',
        'execution_time',
        'expires_at',
    ];

    protected $casts = [
        'input_data' => 'array',
        'prediction' => 'array',
        'expires_at' => 'datetime',
    ];

    /**
     * The validation rules for the model.
     *
     * @var array
     */
    public static $rules = [
        'model_type' => 'required|string|max:255',
        'input_data' => 'required|json',
        'prediction' => 'required|json',
        'confidence' => 'nullable|numeric|between:0,1',
        'execution_time' => 'nullable|numeric|min:0',
        'expires_at' => 'nullable|date',
    ];

    /**
     * Scope a query to filter by model type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $modelType
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByModelType($query, $modelType)
    {
        return $query->where('model_type', $modelType);
    }

    /**
     * Scope a query to get predictions that have not expired.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNotExpired($query)
    {
        return $query->where(function ($query) {
            $query->whereNull('expires_at')
                  ->orWhere('expires_at', '>', now());
        });
    }
}
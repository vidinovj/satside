<?php

namespace App\Services\ML;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ModelService
{
    protected $mlServerUrl;

    public function __construct()
    {
        $this->mlServerUrl = config('services.ml_server.url');
    }

    public function loadModels()
    {
        try {
            // Simulate loading models, in a real scenario, this would call an ML server
            $response = Http::timeout(30)->get($this->mlServerUrl . '/models/load');

            if ($response->successful()) {
                Log::info('ML models loaded successfully.', ['response' => $response->json()]);
                return true;
            } else {
                Log::error('Failed to load ML models.', ['status' => $response->status(), 'response' => $response->body()]);
                throw new \Exception('Failed to load ML models: ' . $response->body());
            }
        } catch (\Exception $e) {
            Log::error('Exception while loading ML models: ' . $e->getMessage());
            throw new \Exception('Error loading ML models: ' . $e->getMessage());
        }
    }

    public function checkModelHealth()
    {
        return Cache::remember('ml_model_health', 60, function () {
            try {
                $response = Http::timeout(10)->get($this->mlServerUrl . '/health');

                if ($response->successful()) {
                    Log::info('ML model health check successful.', ['response' => $response->json()]);
                    return $response->json();
                } else {
                    Log::warning('ML model health check failed.', ['status' => $response->status(), 'response' => $response->body()]);
                    return ['status' => 'unhealthy', 'message' => 'ML server returned an error'];
                }
            } catch (\Exception $e) {
                Log::error('Exception during ML model health check: ' . $e->getMessage());
                return ['status' => 'unhealthy', 'message' => 'Could not connect to ML server', 'error' => $e->getMessage()];
            }
        });
    }

    public function retrainModels()
    {
        try {
            $response = Http::timeout(300)->post($this->mlServerUrl . '/models/retrain');

            if ($response->successful()) {
                Log::info('ML models retraining triggered successfully.', ['response' => $response->json()]);
                return true;
            } else {
                Log::error('Failed to trigger ML models retraining.', ['status' => $response->status(), 'response' => $response->body()]);
                throw new \Exception('Failed to trigger ML models retraining: ' . $response->body());
            }
        } catch (\Exception $e) {
            Log::error('Exception while triggering ML models retraining: ' . $e->getMessage());
            throw new \Exception('Error triggering ML models retraining: ' . $e->getMessage());
        }
    }
}

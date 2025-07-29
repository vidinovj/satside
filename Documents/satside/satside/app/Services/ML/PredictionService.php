<?php

namespace App\Services\ML;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class PredictionService
{
    protected $mlServerUrl;

    public function __construct()
    {
        $this->mlServerUrl = config('services.ml_server.url');
    }

    public function analyzeVesselRisk(string $vesselId)
    {
        return Cache::remember('vessel_risk_' . $vesselId, 3600, function () use ($vesselId) {
            try {
                $response = Http::timeout(60)->post($this->mlServerUrl . '/predict/vessel-risk', ['vessel_id' => $vesselId]);

                if ($response->successful()) {
                    return $response->json();
                } else {
                    Log::error('Failed to analyze vessel risk.', ['vessel_id' => $vesselId, 'status' => $response->status(), 'response' => $response->body()]);
                    throw new \Exception('Failed to analyze vessel risk: ' . $response->body());
                }
            } catch (\Exception $e) {
                Log::error('Exception while analyzing vessel risk: ' . $e->getMessage());
                throw new \Exception('Error analyzing vessel risk: ' . $e->getMessage());
            }
        });
    }

    public function detectVesselAnomalies(array $vesselData)
    {
        try {
            $response = Http::timeout(120)->post($this->mlServerUrl . '/predict/vessel-anomalies', ['data' => $vesselData]);

            if ($response->successful()) {
                return $response->json();
            } else {
                Log::error('Failed to detect vessel anomalies.', ['status' => $response->status(), 'response' => $response->body()]);
                throw new \Exception('Failed to detect vessel anomalies: ' . $response->body());
            }
        } catch (\Exception $e) {
            Log::error('Exception while detecting vessel anomalies: ' . $e->getMessage());
            throw new \Exception('Error detecting vessel anomalies: ' . $e->getMessage());
        }
    }

    public function analyzeDiplomaticSentiment(string $newsText)
    {
        try {
            $response = Http::timeout(60)->post($this->mlServerUrl . '/predict/diplomatic-sentiment', ['text' => $newsText]);

            if ($response->successful()) {
                return $response->json();
            } else {
                Log::error('Failed to analyze diplomatic sentiment.', ['status' => $response->status(), 'response' => $response->body()]);
                throw new \Exception('Failed to analyze diplomatic sentiment: ' . $response->body());
            }
        } catch (\Exception $e) {
            Log::error('Exception while analyzing diplomatic sentiment: ' . $e->getMessage());
            throw new \Exception('Error analyzing diplomatic sentiment: ' . $e->getMessage());
        }
    }

    public function assessCountryRisk(string $countryCode)
    {
        return Cache::remember('country_risk_' . $countryCode, 86400, function () use ($countryCode) {
            try {
                $response = Http::timeout(60)->get($this->mlServerUrl . '/predict/country-risk/' . $countryCode);

                if ($response->successful()) {
                    return $response->json();
                } else {
                    Log::error('Failed to assess country risk.', ['country_code' => $countryCode, 'status' => $response->status(), 'response' => $response->body()]);
                    throw new \Exception('Failed to assess country risk: ' . $response->body());
                }
            } catch (\Exception $e) {
                Log::error('Exception while assessing country risk: ' . $e->getMessage());
                throw new \Exception('Error assessing country risk: ' . $e->getMessage());
            }
        });
    }

    public function predictDiplomaticEvents(string $country)
    {
        try {
            $response = Http::timeout(120)->post($this->mlServerUrl . '/predict/diplomatic-events', ['country' => $country]);

            if ($response->successful()) {
                return $response->json();
            } else {
                Log::error('Failed to predict diplomatic events.', ['status' => $response->status(), 'response' => $response->body()]);
                throw new \Exception('Failed to predict diplomatic events: ' . $response->body());
            }
        } catch (\Exception $e) {
            Log::error('Exception while predicting diplomatic events: ' . $e->getMessage());
            throw new \Exception('Error predicting diplomatic events: ' . $e->getMessage());
        }
    }

    public function analyzeTradeImpact(array $tradePolicyData)
    {
        try {
            $response = Http::timeout(120)->post($this->mlServerUrl . '/predict/trade-impact', ['data' => $tradePolicyData]);

            if ($response->successful()) {
                return $response->json();
            } else {
                Log::error('Failed to analyze trade impact.', ['status' => $response->status(), 'response' => $response->body()]);
                throw new \Exception('Failed to analyze trade impact: ' . $response->body());
            }
        } catch (\Exception $e) {
            Log::error('Exception while analyzing trade impact: ' . $e->getMessage());
            throw new \Exception('Error analyzing trade impact: ' . $e->getMessage());
        }
    }

    public function analyzePortfolioRisk(array $portfolioData)
    {
        try {
            $response = Http::timeout(120)->post($this->mlServerUrl . '/predict/portfolio-risk', ['data' => $portfolioData]);

            if ($response->successful()) {
                return $response->json();
            } else {
                Log::error('Failed to analyze portfolio risk.', ['status' => $response->status(), 'response' => $response->body()]);
                throw new \Exception('Failed to analyze portfolio risk: ' . $response->body());
            }
        } catch (\Exception $e) {
            Log::error('Exception while analyzing portfolio risk: ' . $e->getMessage());
            throw new \Exception('Error analyzing portfolio risk: ' . $e->getMessage());
            }
        }
}

<?php

namespace App\Services\ML;

use Illuminate\Support\Facades\Log;

class DataPreprocessor
{
    public function cleanVesselData(array $data)
    {
        // Placeholder for data cleaning logic
        Log::info('Cleaning vessel data.', ['data' => $data]);
        if (empty($data)) {
            throw new \InvalidArgumentException('Vessel data cannot be empty.');
        }
        // Example: ensure vessel_id is present and is a string
        foreach ($data as &$item) {
            if (!isset($item['vessel_id']) || !is_string($item['vessel_id'])) {
                throw new \InvalidArgumentException('Each vessel data item must have a string vessel_id.');
            }
            $item['vessel_id'] = trim($item['vessel_id']);
            // Add more cleaning rules as needed
        }
        return $data;
    }

    public function extractNewsFeatures(string $newsText)
    {
        // Placeholder for news feature extraction logic
        Log::info('Extracting news features.', ['newsText' => $newsText]);
        if (empty($newsText)) {
            throw new \InvalidArgumentException('News text cannot be empty.');
        }
        // Example: simple tokenization or keyword extraction
        $features = explode(' ', strtolower(preg_replace('/[^a-z0-9 ]/', '', $newsText)));
        return array_unique($features);
    }

    public function normalizeRiskFactors(array $riskFactors)
    {
        // Placeholder for risk factor normalization logic
        Log::info('Normalizing risk factors.', ['riskFactors' => $riskFactors]);
        if (empty($riskFactors)) {
            throw new \InvalidArgumentException('Risk factors cannot be empty.');
        }
        // Example: min-max normalization for numerical factors
        $normalizedFactors = [];
        $min = min($riskFactors);
        $max = max($riskFactors);

        if (($max - $min) == 0) { // Avoid division by zero if all values are the same
            foreach ($riskFactors as $key => $value) {
                $normalizedFactors[$key] = 0.5; // Assign a neutral value
            }
        } else {
            foreach ($riskFactors as $key => $value) {
                $normalizedFactors[$key] = ($value - $min) / ($max - $min);
            }
        }
        return $normalizedFactors;
    }
}

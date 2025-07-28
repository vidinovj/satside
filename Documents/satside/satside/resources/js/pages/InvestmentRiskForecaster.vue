<script setup lang="ts">
import CountryRiskScores from '@/components/CountryRiskScores.vue';
import Heading from '@/components/Heading.vue';
import InvestmentControlPanel from '@/components/InvestmentControlPanel.vue';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
</script>

<template>
    <div>
        <Heading>Investment Risk Forecaster</Heading>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
            <div class="col-span-1">
                <InvestmentControlPanel />
            </div>
            <div class="md:col-span-3">
                <CountryRiskScores />
                <Card class="mt-4">
                    <CardHeader>
                        <CardTitle>Bank Data Overlay</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <p>Existing "Bank" data will be overlaid here.</p>
                    </CardContent>
                </Card>
            </div>
        </div>
    </div>
</template>

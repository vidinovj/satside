<script setup lang="ts">
import DiplomaticControlPanel from '@/components/DiplomaticControlPanel.vue';
import Heading from '@/components/Heading.vue';
import SentimentChart from '@/components/SentimentChart.vue';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
</script>

<template>
    <div>
        <Heading>Diplomatic Pulse Monitor</Heading>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
            <div class="col-span-1">
                <DiplomaticControlPanel />
            </div>
            <div class="md:col-span-3">
                <Card>
                    <CardHeader>
                        <CardTitle>Sentiment Timeline</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <div style="height: 400px">
                            <SentimentChart />
                        </div>
                    </CardContent>
                </Card>
                <Card class="mt-4">
                    <CardHeader>
                        <CardTitle>Trade Policy Correlations</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <p>Trade policy changes will be listed here.</p>
                    </CardContent>
                </Card>
            </div>
        </div>
    </div>
</template>

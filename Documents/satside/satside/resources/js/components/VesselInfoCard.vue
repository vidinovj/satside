<script setup lang="ts">
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';

// Mock data for now
const vessel = {
    name: 'The Black Pearl',
    flag: '🏴‍☠️',
    owner: 'Captain Jack Sparrow',
    destination: 'Tortuga',
};
</script>

<template>
    <Card>
        <CardHeader>
            <CardTitle>{{ vessel.name }} {{ vessel.flag }}</CardTitle>
        </CardHeader>
        <CardContent>
            <p><strong>Owner:</strong> {{ vessel.owner }}</p>
            <p><strong>Destination:</strong> {{ vessel.destination }}</p>
        </CardContent>
    </Card>
</template>

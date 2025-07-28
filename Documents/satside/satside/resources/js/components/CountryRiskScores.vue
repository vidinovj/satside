<script setup lang="ts">
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';

const riskScores = [
    { country: 'USA', score: 20 },
    { country: 'China', score: 60 },
    { country: 'Russia', score: 85 },
    { country: 'Germany', score: 15 },
    { country: 'Taiwan', score: 70 },
];
</script>

<template>
    <Card>
        <CardHeader>
            <CardTitle>Country Risk Scores</CardTitle>
        </CardHeader>
        <CardContent>
            <ul>
                <li v-for="item in riskScores" :key="item.country">{{ item.country }}: {{ item.score }}</li>
            </ul>
        </CardContent>
    </Card>
</template>

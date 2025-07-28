<script setup lang="ts">
import { CategoryScale, Chart as ChartJS, Legend, LinearScale, LineElement, PointElement, Title, Tooltip } from 'chart.js';
import { Line } from 'vue-chartjs';

ChartJS.register(Title, Tooltip, Legend, LineElement, PointElement, CategoryScale, LinearScale);

const chartData = {
    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    datasets: [
        {
            label: 'Sentiment Score',
            backgroundColor: '#f87979',
            data: [40, 39, 10, 40, 39, 80, 40],
        },
    ],
};

const chartOptions = {
    responsive: true,
    maintainAspectRatio: false,
};
</script>

<template>
    <Line :data="chartData" :options="chartOptions" />
</template>

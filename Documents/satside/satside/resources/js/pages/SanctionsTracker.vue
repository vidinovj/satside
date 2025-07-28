<script setup lang="ts">
import ControlPanel from '@/components/ControlPanel.vue';
import Heading from '@/components/Heading.vue';
import HeatmapLegend from '@/components/HeatmapLegend.vue';
import VesselInfoCard from '@/components/VesselInfoCard.vue';
import L from 'leaflet';
import 'leaflet.heat';
import { createApp, h, onMounted, ref } from 'vue';
import { renderToString } from 'vue/server-renderer';

const mapContainer = ref<HTMLElement | null>(null);

// Mock data for heatmap
const heatData: [number, number, number][] = [
    [34.0522, -118.2437, 0.5], // Los Angeles
    [40.7128, -74.006, 0.8], // New York
    [48.8566, 2.3522, 0.3], // Paris
    [35.6895, 139.6917, 0.6], // Tokyo
    [51.5074, -0.1278, 0.9], // London
    [19.076, 72.8777, 0.7], // Mumbai
    [-33.8688, 151.2093, 0.4], // Sydney
];

onMounted(async () => {
    if (mapContainer.value) {
        const map = L.map(mapContainer.value, {
            zoomControl: false, // We'll add it back later in a different position
        }).setView([20, 0], 2);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        }).addTo(map);

        L.heatLayer(heatData, { radius: 25 }).addTo(map);

        const marker = L.marker([51.5074, -0.1278]).addTo(map);

        const popupContent = await renderToString(h(VesselInfoCard));

        marker.bindPopup(popupContent);

        // Add zoom control to top-right
        L.control.zoom({ position: 'topright' }).addTo(map);

        // Add legend to bottom-right
        const legend = L.control({ position: 'bottomright' });
        legend.onAdd = () => {
            const div = L.DomUtil.create('div', 'info legend');
            createApp({ render: () => h(HeatmapLegend) }).mount(div);
            return div;
        };
        legend.addTo(map);
    }
});
</script>

<template>
    <div>
        <Heading>Sanctions Evasion Tracker</Heading>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
            <div class="col-span-1">
                <ControlPanel />
            </div>
            <div class="col-span-2">
                <div ref="mapContainer" style="height: 600px; position: relative"></div>
            </div>
        </div>
    </div>
</template>

<template>
    <div class="heatmap-legend">
        <div>Low</div>
        <div class="gradient"></div>
        <div>High</div>
    </div>
</template>

<style scoped>
.heatmap-legend {
    display: flex;
    align-items: center;
    padding: 10px;
    background-color: white;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

.gradient {
    width: 100px;
    height: 20px;
    background: linear-gradient(to right, lightblue, yellow, red);
    margin: 0 10px;
}
</style>

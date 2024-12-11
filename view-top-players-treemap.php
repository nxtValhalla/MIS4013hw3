<div class="container mt-4">
    <h1>Top 10 Players by Points Per Game</h1>
    <!-- TreeMap Chart -->
    <div id="treemap"></div>
</div>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    // Convert PHP data to JavaScript
    const playerData = <?php echo json_encode($players); ?>;
    // Prepare data for TreeMap
    const treeMapData = playerData.map(player => ({
        x: player.PlayerName,
        y: player.StatValue
    }));
    // Initialize the TreeMap chart
    const options = {
        series: [{
            data: treeMapData
        }],
        chart: {
            type: 'treemap',
            height: 500
        },
        title: {
            text: `Top Players by ${"<?= $statName ?>"}`,
            align: 'center'
        },
        colors: ['#008FFB', '#00E396', '#FEB019', '#FF4560', '#775DD0'],
        legend: {
            show: false
        }
    };
    const chart = new ApexCharts(document.querySelector("#treemap"), options);
    chart.render();
    // Handle stat selection change
    document.getElementById('statSelect').addEventListener('change', function () {
        const selectedStat = this.value;
        window.location.href = `treemap-stat-chart.php?stat=${selectedStat}`;
    });
</script>

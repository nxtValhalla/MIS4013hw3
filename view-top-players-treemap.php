<div class="container mt-4">
    <h1>Top Players by Stat</h1>

    <div class="mb-4">
        <label for="statSelect" class="form-label">Select a Stat</label>
        <select id="statSelect" class="form-select">
            <?php foreach ($availableStats as $stat): ?>
                <option value="<?= $stat ?>" <?= $stat === $statName ? 'selected' : '' ?>>
                    <?= $stat ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div id="treemap"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>

    const playerData = <?php echo json_encode($players); ?>;

    const treeMapData = playerData.map(player => ({
        x: player.PlayerName,
        y: player.StatValue
    }));

    const minValue = Math.min(...treeMapData.map(player => player.y));
    const maxValue = Math.max(...treeMapData.map(player => player.y));

    const options = {
        series: [{
            data: treeMapData
        }],
        chart: {
            type: 'treemap',
            height: 350
        },
        title: {
            text: `Top Players by ${"<?= $statName ?>"}`,
            align: 'center'
        },
        colors: ['#008FFB'],
        plotOptions: {
            treemap: {
                colorScale: {
                    ranges: [
                        {
                            from: minValue,
                            to: maxValue,
                            color: function({ value }) {
                                const intensity = (value - minValue) / (maxValue - minValue);
                                const red = Math.floor(255 * intensity);
                                const green = Math.floor(192 * (1 - intensity));
                                return `rgb(${red}, ${green}, 128)`;
                            }
                        }
                    ]
                }
            }
        },
        legend: {
            show: false
        }
    };

    const chart = new ApexCharts(document.querySelector("#treemap"), options);
    chart.render();

    document.getElementById('statSelect').addEventListener('change', function () {
        const selectedStat = this.value;
        window.location.href = `treemap-stat-chart.php?stat=${selectedStat}`;
    });
</script>

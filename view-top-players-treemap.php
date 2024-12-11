<div class="container mt-4">
    <h1>Player Stats Treemap</h1>

    <!-- Dropdown to select the stat -->
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

    <!-- Treemap Chart -->
    <canvas id="treemapChart" style="max-width: 800px; height: 400px;"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-chart-treemap"></script>
<script>
    // Convert PHP data to JavaScript
    const playerData = <?php echo json_encode($data); ?>;

    // Prepare data for TreeMap
    const treeMapData = playerData.map(player => ({
        label: player.PlayerName,
        value: player.StatValue
    }));

    // Initialize the TreeMap chart
    const ctx = document.getElementById('treemapChart').getContext('2d');
    const treemapChart = new Chart(ctx, {
        type: 'treemap',
        data: {
            datasets: [{
                tree: treeMapData,
                key: 'value',
                groups: ['label'],
                backgroundColor: (ctx) => {
                    const value = ctx.raw.v;
                    const max = Math.max(...treeMapData.map(item => item.value));
                    const intensity = value / max;
                    return `rgba(${Math.floor(255 * intensity)}, ${Math.floor(200 * (1 - intensity))}, 128, 0.8)`;
                },
                borderColor: 'rgba(0, 0, 0, 0.1)',
                borderWidth: 1,
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: `Player Stats - <?= $statName ?>`,
                    font: {
                        size: 18
                    }
                },
                tooltip: {
                    callbacks: {
                        label: (context) => {
                            const label = context.raw.g;
                            const value = context.raw.v;
                            return `${label}: ${value}`;
                        }
                    }
                }
            }
        }
    });

    // Handle stat selection change
    document.getElementById('statSelect').addEventListener('change', function () {
        const selectedStat = this.value;
        window.location.href = `treemap-chart.php?stat=${selectedStat}`;
    });
</script>

<div class="container mt-4">
    <h1>Player Stats Comparison</h1>
    <!-- Dropdowns for selecting players -->
    <div class="row mb-4">
        <div class="col-md-6">
            <label for="player1" class="form-label">Select Player 1</label>
            <select id="player1" class="form-select">
                <option value="" disabled selected>Select a Player</option>
                <?php
                foreach ($players as $player) {
                    echo "<option value='{$player['PlayerName']}'>{$player['PlayerName']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="col-md-6">
            <label for="player2" class="form-label">Select Player 2</label>
            <select id="player2" class="form-select">
                <option value="" disabled selected>Select a Player</option>
                <?php
                foreach ($players as $player) {
                    echo "<option value='{$player['PlayerName']}'>{$player['PlayerName']}</option>";
                }
                ?>
            </select>
        </div>
        
    <canvas id="playerStatsChart"></canvas>
        
</div>

<style>
    #playerStatsChart {
        max-width: 1000px;
        max-height: 700px;
        margin: 0 auto;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Convert PHP data to JavaScript
    const playerData = <?php echo json_encode($players); ?>;

    // Calculate max values for each stat
    const maxValues = {
        Points: Math.max(...playerData.map(player => player.Points)),
        Rebounds: Math.max(...playerData.map(player => player.Rebounds)),
        Assists: Math.max(...playerData.map(player => player.Assists)),
    };

    // Fetch raw player stats
    function getPlayerStats(playerName) {
        const player = playerData.find(p => p.PlayerName === playerName);
        return player ? [player.Points, player.Rebounds, player.Assists] : [0, 0, 0];
    }

    const ctx = document.getElementById('playerStatsChart').getContext('2d');
    const radarChart = new Chart(ctx, {
        type: 'radar',
        data: {
            labels: ['Points', 'Rebounds', 'Assists'],
            datasets: []
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        boxWidth: 20,
                    }
                },
                title: {
                    display: true,
                    text: 'Player Stats Comparison',
                    font: {
                        size: 16
                    }
                }
            },
            scales: {
                r: {
                    min: 0,
                    ticks: {
                        stepSize: 5, // Set the step size for the axes
                        callback: function(value) {
                            return value; // Display raw values without normalization
                        }
                    },
                    pointLabels: {
                        font: {
                            size: 14
                        },
                        callback: function(label, index) {
                            // Append max value to axis label
                            const max = [maxValues.Points, maxValues.Rebounds, maxValues.Assists][index];
                            return `${label} (Max: ${max})`;
                        }
                    }
                }
            }
        }
    });

    // Update chart on player selection
    function updateChart(player1, player2) {
        radarChart.data.datasets = [];
        if (player1) {
            radarChart.data.datasets.push({
                label: player1,
                data: getPlayerStats(player1),
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            });
        }
        if (player2) {
            radarChart.data.datasets.push({
                label: player2,
                data: getPlayerStats(player2),
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            });
        }
        radarChart.update();
    }

    // Event listeners for dropdowns
    document.getElementById('player1').addEventListener('change', (e) => {
        const player1 = e.target.value;
        const player2 = document.getElementById('player2').value;
        updateChart(player1, player2);
    });

    document.getElementById('player2').addEventListener('change', (e) => {
        const player1 = document.getElementById('player1').value;
        const player2 = e.target.value;
        updateChart(player1, player2);
    });
</script>

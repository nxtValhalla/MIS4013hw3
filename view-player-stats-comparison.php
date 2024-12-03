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

    // Extract stats for a given player
    function getPlayerStats(playerName) {
        const player = playerData.find(p => p.PlayerName === playerName);
        return player ? [player.Points, player.Rebounds, player.Assists] : [0, 0, 0];
    }

    // Initialize chart
    const ctx = document.getElementById('playerStatsChart').getContext('2d');
    const radarChart = new Chart(ctx, {
        type: 'radar',
        data: {
            labels: ['Points', 'Rebounds', 'Assists'],
            datasets: []
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' },
                title: { display: true, text: 'Player Stats Comparison' }
            }
        }
    });

    // Function to update chart based on selected players
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

<div class="container mt-4">
    <h1>Player Stats Comparison</h1>
    <canvas id="playerStatsChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Convert PHP data to JavaScript
    const playerData = <?php
        $players = [];
        while ($row = $playerStatsData->fetch_assoc()) {
            $players[] = $row;
        }
        echo json_encode($players);
    ?>;

    // Extract data for the chart
    const playerNames = playerData.map(player => player.PlayerName);
    const gamesPlayed = playerData.map(player => player.GamesPlayed)
    const points = playerData.map(player => player.Points);
    const rebounds = playerData.map(player => player.Rebounds);
    const assists = playerData.map(player => player.Assists);

    // Create the radar chart
    const ctx = document.getElementById('playerStatsChart').getContext('2d');
    const radarChart = new Chart(ctx, {
        type: 'radar',
        data: {
            labels: ['Games Played', 'Points', 'Rebounds', 'Assists'],
            datasets: playerNames.map((name, i) => ({
                label: name,
                data: [gamesPlayed[i], points[i], rebounds[i], assists[i]],
                fill: true,
                backgroundColor: `rgba(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, 0.2)`,
                borderColor: `rgba(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, 1)`,
                borderWidth: 1
            }))
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Player Stats Comparison'
                }
            }
        }
    });
</script>

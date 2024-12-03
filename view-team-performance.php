<div class="container mt-4">
    <h1>Team Performance - Wins and Losses</h1>
    <canvas id="teamPerformanceChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Convert PHP data to JavaScript
    const teamData = <?php
        $teams = [];
        while ($row = $teamPerformanceData->fetch_assoc()) {
            $teams[] = $row;
        }
        echo json_encode($teams);
    ?>;

    // Extract data
    const teamNames = teamData.map(team => team.TeamName);
    const wins = teamData.map(team => team.Wins);
    const losses = teamData.map(team => team.Losses);

    // Chart
    const ctx = document.getElementById('teamPerformanceChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: teamNames,
            datasets: [
                {
                    label: 'Wins',
                    data: wins,
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Losses',
                    data: losses,
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Team Performance - Sorted by Wins'
                }
            }
        }
    });
</script>

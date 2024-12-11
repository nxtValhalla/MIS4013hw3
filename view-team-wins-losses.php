<div class="container mt-4">
    <h1>Team Wins and Losses</h1>

    <!-- Dropdown to select a team -->
    <div class="mb-4">
        <label for="teamSelect" class="form-label">Select a Team</label>
        <select id="teamSelect" class="form-select">
            <option value="" disabled selected>Select a Team</option>
            <?php foreach ($teams as $team): ?>
                <option value="<?= $team['TeamID'] ?>"
                        data-wins="<?= $team['Wins'] ?>"
                        data-losses="<?= $team['Losses'] ?>">
                    <?= $team['TeamName'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- Doughnut Chart -->
    <canvas id="teamDoughnutChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('teamDoughnutChart').getContext('2d');

    // Initialize the chart with empty data
    const doughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Wins', 'Losses'],
            datasets: [{
                data: [0, 0], // Default data
                backgroundColor: ['rgba(75, 192, 192, 0.5)', 'rgba(255, 99, 132, 0.5)'],
                borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top'
                },
                title: {
                    display: true,
                    text: 'Team Wins and Losses'
                }
            }
        }
    });

    // Update chart when a team is selected
    document.getElementById('teamSelect').addEventListener('change', function () {
        const selectedOption = this.options[this.selectedIndex];
        const wins = parseInt(selectedOption.getAttribute('data-wins'));
        const losses = parseInt(selectedOption.getAttribute('data-losses'));

        // Update chart data
        doughnutChart.data.datasets[0].data = [wins, losses];
        doughnutChart.update();
    });
</script>

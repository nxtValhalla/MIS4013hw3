<h1>NBA Players With Stats - Northwest Division</h1>
<div class="container">
<?php
if ($players->num_rows > 0) {
    while ($player = $players->fetch_assoc()) {
?>
    <div class="row mb-4">
      <div class="card w-100">
        <div class="card-body">
          <h5 class="card-title">
              Player ID: <?php echo $player['PlayerID']; ?><br> 
              Name: <?php echo $player['PlayerName']; ?></h5>
          <p class="card-text">
          <ul class="list-group">
<?php
          if ($playerstats->num_rows > 0) {
            while ($playerstat = $playerstats->fetch_assoc()) {
?>
              <li class="list-group-item">Games Played: <?php echo $playerstat['GamesPlayed']; ?></li>
              <li class="list-group-item">PPG: <?php echo $playerstat['PPG']; ?></li>
              <li class="list-group-item">APG: <?php echo $playerstat['APG']; ?></li>
              <li class="list-group-item">RPG: <?php echo $playerstat['RPG']; ?></li>
<?php
            }
      }   else {
              echo "<li class='list-group-item'>No stats available for this player</li>";
              break;
          }
?>
          </ul>
          </p>
          <p class="card-text"><small class="text-body-secondary">Position: <?php echo $player['PlayerPosition']; ?></small></p>
        </div>
      </div>
    </div>
<?php
        }
} 
else {
    echo "No players found.";
}
?>
</div>


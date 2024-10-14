<h1>NBA Players With Stats - Northwest Division</h1>
<div class="card-group">
<?php
while ($player = $playerswithstats->fetch_assoc()){
?>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title"><?php echo $player['PlayerName']; ?></h5>
      <p class="card-text">
      <ul class="list-group">
<?php
  $stats = selectStatsByPlayer($player['PlayerID']);
  while ($playerstat = $stats->fetch_assoc()) {
?>
    <li class="list-group-item">Games Played: <?php echo $playerstat['GamesPlayed']; ?></li>
    <li class="list-group-item">PPG: <?php echo $playerstat['PPG']; ?></li>
    <li class="list-group-item">APG: <?php echo $playerstat['APG']; ?></li>
    <li class="list-group-item">RPG: <?php echo $playerstat['RPG']; ?></li>
<?php
  }
?>
      </ul>
      </p>
      <p class="card-text"><small class="text-body-secondary">Position: <?php echo $player['PlayerPosition']; ?></small></p>
    </div>
  </div>
<?php
}
?>
</div>

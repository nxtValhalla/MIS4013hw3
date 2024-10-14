<h1>NBA Players With Stats - Northwest Division</h1>
<div class="card-group">
<?php
while ($player = $playerswithstats->fetch_assoc()){
?>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title"><?php echo $player['PlayerName']; ?></h5>
      <p class="card-text">
<?php
  $stats = selectStatsByPlayer($player['PlayerID']);
  while ($playerstat = $playerstats->fetch_assoc()) {
?>
    
<?php
  }
?>
      </p>
      <p class="card-text"><small class="text-body-secondary">Position: <?php echo $player['PlayerPosition']; ?></small></p>
    </div>
  </div>
<?php
}
?>
</div>

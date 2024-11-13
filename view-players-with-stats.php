<h1>NBA Players with Statistics - Northwest Division</h1>
<div class="container">
<?php
while ($player = $players->fetch_assoc()){
?>
  <div class="row mb-4">
    <div class="card w-100">
      <div class="card-body">
        <h5 class="card-title">
          ID: <?php echo $player['PlayerID']; ?> - Name: <?php echo $player['PlayerName']; ?>
        </h5>
        <p class="card-text">
        <ul class="list-group">
<?php
  $statvars = selectStatsByPlayer($player['PlayerID']);
  while ($statvar = $statvars->fetch_assoc()) {
?>     
    <li class="list-group-item"><?php echo $statvar['StatName']; ?>: <?php echo $statvar['StatValue']; ?></li>
    <li></li>
    <li></li>
<?php
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
?>
</div>

<div class="row mb-3">
  <div class="col">
<h1>NBA Players with Statistics</h1>
  </div>
  <div class="col-auto d-flex align-items-center">
<?php
include "view-players-with-stats-addform.php";
?>
<h2 class="ms-3">Add a New Player Stat</h2>
  </div>
</div>
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
    <li class="list-group-item"><?php echo $statvar['StatName']; ?>: <?php echo $statvar['StatValue']; ?><?php include "view-players-with-stats-editform.php"; ?>
      <form method="post" action="">
        <input type="hidden" name="statinputid" value="<?php echo $statvar['StatInputID'];?>">
        <input type="hidden" name="actionType" value="Delete">
        <button type="submit" class="btn btn-danger" onclick="return confirm('Confirm deletion of <?php echo $statvar['StatName']; ?>: <?php echo $statvar['StatValue']; ?> from <?php echo $player['PlayerName']; ?>');">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
          </svg>
        </button>
      </form>
    </li>
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

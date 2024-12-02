<?php
include "js-scroll-to-top.php";
?>
<div class="container sticky-header">
  <div class="row mb-3 d-flex align-items-center">
    <div class="col d-flex justify-content-start align-items-center">
      <h1>NBA Players</h1>
    </div>
    <div class="col d-flex justify-content-center align-items-center">
      <button type="button" class="btn btn-outline-success" onclick="scrollToTop()"><i class="bi bi-arrow-bar-up"></i> Scroll to Top <i class="bi bi-arrow-bar-up"></i></button>
    </div>
    <div class="col d-flex justify-content-end align-items-center">
      <?php include "view-players-addform.php"; ?>
      <h2 class="ms-3">Add a New Player</h2>
    </div>
  </div>
</div>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
      <th>Player ID</th>
      <th>Player Name</th>
      <th>Position</th>
      <th>Team ID</th>
      <th>Player Stats</th>
      <th>Edit</th>
      <th>Delete</th>
      </tr>
    </thead>
    <tbody>
<?php
while ($player = $players->fetch_assoc()){
?>
  <tr>
    <td><?php echo $player['PlayerID']; ?></td>
    <td><?php echo $player['PlayerName']; ?></td>
    <td><?php echo $player['PlayerPosition']; ?></td>
    <td><?php echo $player['TeamID']; ?></td>
    <td><a href="stats-by-player.php?pid=<?php echo $player['PlayerID']; ?>">Pass Player ID</a></td>
    <td>
      <?php
      include "view-players-editform.php";
      ?>
    </td>
    <td>
      <form method="post" action="">
        <input type="hidden" name="playerID" value="<?php echo $player['PlayerID'];?>">
        <input type="hidden" name="actionType" value="Delete">
        <button type="submit" class="btn btn-danger" onclick="return confirm('Confirm deletion of <?php echo $player['PlayerName'];?>');">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
          </svg>
        </button>
      </form>
    </td>
  </tr>
<?php
}
?>
    </tbody>
  </table>
</div>

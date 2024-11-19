<h1>NBA Players</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
      <th>Player ID</th>
      <th>Player Name</th>
      <th>Position</th>
      <th>Team ID</th>
      <th></th>
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
  </tr>
<?php
}
?>
    </tbody>
  </table>
</div>

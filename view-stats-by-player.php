<h1>2023-2024 Statistics Per Game by Northwest Division Players</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
      <th>Player ID</th>
      <th>Player Name</th>
      <th>Position</th>
      <th>Games Played</th>
      <th>Points</th>
      <th>Assists</th>
      <th>Rebounds</th>
      </tr>
    </thead>
    <tbody>
<?php
while ($stats = $statsbyplayer->fetch_assoc()){
?>
  <tr>
    <td><?php echo $stats['PlayerID']; ?></td>
    <td><?php echo $stats['PlayerName']; ?></td>
    <td><?php echo $stats['PlayerPosition']; ?></td>
    <td><?php echo $stats['GamesPlayed']; ?></td>
    <td><?php echo $stats['PPG']; ?></td>
    <td><?php echo $stats['APG']; ?></td>
    <td><?php echo $stats['RPG']; ?></td>
  </tr>
<?php
}
?>
    </tbody>
  </table>
</div>

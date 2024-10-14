<h1>NBA Player Stats - Northwest Division</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
      <th>Player ID</th>
      <th>Games Played</th>
      <th>Points per Game</th>
      <th>Assists per Game</th>
      <th>Rebounds per Game</th>
      </tr>
    </thead>
    <tbody>
<?php
while ($playerstat = $playerstats->fetch_assoc()){
?>
  <tr>
    <td><?php echo $playerstat['PlayerID']; ?></td>
    <td><?php echo $playerstat['GamesPlayed']; ?></td>
    <td><?php echo $playerstat['PPG']; ?></td>
    <td><?php echo $playerstat['APG']; ?></td>
    <td><?php echo $playerstat['RPG']; ?></td>
  </tr>
<?php
}
?>
    </tbody>
  </table>
</div>

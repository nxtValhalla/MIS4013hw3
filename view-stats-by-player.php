<h1>Player Stats</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
      <th>Player ID</th>
      <th>Player Name</th>
      <th>Games Played</th>
      <th>Points per Game</th>
      <th>Assists per Game</th>
      <th>Rebounds per Game</th>
      </tr>
    </thead>
    <tbody>
<?php
while ($playerstats = $statsbyplayer->fetch_assoc()){
?>
  <tr>
    <td><?php echo $playerstats['PlayerID']; ?></td>
    <td><?php echo $playerstats['PlayerName']; ?></td>
    <td><?php echo $playerstats['GamesPlayed']; ?></td>
    <td><?php echo $playerstats['PPG']; ?></td>
    <td><?php echo $playerstats['APG']; ?></td>
    <td><?php echo $playerstats['RPG']; ?></td>
  </tr>
<?php
}
?>
    </tbody>
  </table>
</div>

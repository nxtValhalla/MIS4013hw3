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
while ($playerstats = $nbaplayerstats->fetch_assoc()){
?>
  <tr>
    <td><?php echo $playerstats['PlayerID']; ?></td>
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

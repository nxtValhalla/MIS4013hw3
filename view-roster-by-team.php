<?php
while ($rosterbyteam = $rosterbyteams->fetch_assoc()){
?>
<h1><?php echo $rosterbyteam['TeamName']; ?> - Team Roster</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
      <th>Player ID</th>
      <th>Player Name</th>
      <th>Position</th>
      </tr>
    </thead>
    <tbody>
  <tr>
    <td><?php echo $rosterbyteam['PlayerID']; ?></td>
    <td><?php echo $rosterbyteam['PlayerName']; ?></td>
    <td><?php echo $rosterbyteam['PlayerPosition']; ?></td>
  </tr>
<?php
}
?>
    </tbody>
  </table>
</div>

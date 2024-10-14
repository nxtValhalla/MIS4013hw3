<h1>Team Roster</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
      <th>Team ID</th>
      <th>Team Name</th>
      <th>Player ID</th>
      <th>Player Name</th>
      <th>Position</th>
      </tr>
    </thead>
    <tbody>
<?php
while ($rosterbyteam = $rosterbyteams->fetch_assoc()){
?>
  <tr>
    <td><?php echo $rosterbyteam['TeamID']; ?></td>
    <td><?php echo $rosterbyteam['TeamName']; ?></td>
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

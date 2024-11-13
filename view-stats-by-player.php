<h1>2023-2024 Statistics For <?php echo $stats['PlayerName']; ?></h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
      <th>Player ID</th>
      <th>Player Name</th>
      <th>Position</th>
      <th>Stat Name</th>
      <th>Stat Value</th>
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
    <td><?php echo $stats['StatName']; ?></td>
    <td><?php echo $stats['StatValue']; ?></td>
  </tr>
<?php
}
?>
    </tbody>
  </table>
</div>

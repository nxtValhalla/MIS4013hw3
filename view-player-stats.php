<h1>NBA Player Stats - Northwest Division</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
      <th>Player ID</th>
      <th>Stat Name</th>
      <th>Stat Value</th>
      </tr>
    </thead>
    <tbody>
<?php
while ($playerstat = $playerstats->fetch_assoc()){
?>
  <tr>
    <td><?php echo $playerstat['PlayerID']; ?></td>
    <td><?php echo $playerstat['StatName']; ?></td>
    <td><?php echo $playerstat['StatValue']; ?></td>
  </tr>
<?php
}
?>
    </tbody>
  </table>
</div>

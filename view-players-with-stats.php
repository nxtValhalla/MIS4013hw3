<h1>NBA Players - Northwest Division</h1>
<div class="card-group">
<?php
while ($player = $playerswithstats->fetch_assoc()){
?>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title"><?php echo $player['PlayerName']; ?></h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      <p class="card-text"><small class="text-body-secondary">Position: <?php echo $player['PlayerPosition']; ?></small></p>
    </div>
  </div>
  <tr>
    <td><?php echo $player['PlayerID']; ?></td>
    <td><?php echo $player['PlayerName']; ?></td>
    <td><?php echo $player['PlayerPosition']; ?></td>
    <td><?php echo $player['TeamID']; ?></td>
  </tr>
<?php
}
?>
</div>

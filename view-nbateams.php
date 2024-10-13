<h1>NBA Teams - Northwest Division</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
      <th>ID</th>
      <th>Team Name</th>
      <th>Wins</th>
      <th>Losses</th>
      <th>Location ID</th>
      </tr>
    </thead>
    <tbody>
<?php
while ($nbateam = $nbateams->fetch_assoc()){
?>
  <tr>
    <td><?php echo $nbateam['TeamID']; ?></td>
    <td><?php echo $nbateam['TeamName']; ?></td>
    <td><?php echo $nbateam['Wins']; ?></td>
    <td><?php echo $nbateam['Losses']; ?></td>
    <td><?php echo $nbateam['LocationID']; ?></td>
  </tr>
<?php
}
?>
    </tbody>
  </table>
</div>

<div class="row">
  <div class="col">
<h1>NBA Teams - Northwest Division</h1>
  </div>
  <div class="col-auto">
<?php
include "view-nbateams-addform.php";
?>
  </div>
</div>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
      <th>ID</th>
      <th>Team Name</th>
      <th>Wins</th>
      <th>Losses</th>
      <th>Location ID</th>
      <th></th>
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
    <td><a href="roster-by-team.php?id=<?php echo $nbateam['TeamID']; ?>">Roster</a></td>
  </tr>
<?php
}
?>
    </tbody>
  </table>
</div>

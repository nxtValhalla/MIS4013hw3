<div class="row">
  <div class="col">
<h1>NBA Teams - Northwest Division</h1>
  </div>
  <div class="col-auto" style="display: flex; flex-direction: row; align-items: center;">
    <h2>Add New Team</h2>
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
      <th></th>
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
    <td></td>
    <td>
      <form method="post" action="">
        <input type="hidden" name="teamid" value="<?php echo $nbateam['TeamID'];?>">
        <input type="hidden" name="actionType" value="Delete">
        <button type="submit" class="btn btn-danger" onclick="return confirm('Confirm deletion of <?php echo $nbateam['TeamName'];?>');">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
          </svg>
        </button>
      </form>
    </td>
    <td><a href="roster-by-team.php?id=<?php echo $nbateam['TeamID']; ?>">Roster</a></td>
  </tr>
<?php
}
?>
    </tbody>
  </table>
</div>

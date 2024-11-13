<div class="row">
  <div class="col">
<h1>Locations - Northwest Division</h1>
  </div>
  <div class="col-auto" style="display: flex; flex-direction: row; align-items: center;">
<?php
include "view-locations-addform.php";
?>
<h2>Add a New Location</h2>
  </div>
</div>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
      <th>Location ID</th>
      <th>City</th>
      <th>State</th>
      <th></th>
      </tr>
    </thead>
    <tbody>
<?php
while ($location = $locations->fetch_assoc()){
?>
  <tr>
    <td><?php echo $location['LocationID']; ?></td>
    <td><?php echo $location['City']; ?></td>
    <td><?php echo $location['State']; ?></td>
    <td>
      <form action="address-by-location.php" method="POST">
        <input type="hidden" name="lid" value="<?php echo $location['LocationID']; ?>">
        <button type="submit" class="btn btn-primary">Arena Address</button>
      </form>
    </td>
  </tr>
<?php
}
?>
    </tbody>
  </table>
</div>

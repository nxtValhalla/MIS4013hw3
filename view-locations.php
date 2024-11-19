<h1>NBA Team Locations</h1>
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

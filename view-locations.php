<h1>Locations - Northwest Division</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
      <th>Location ID</th>
      <th>City</th>
      <th>State</th>
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
      <form method="post" action="address-by-location.php">
        <input type="hidden" name="Locid" value="<?php echo $address['ArenaID']; ?>">
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

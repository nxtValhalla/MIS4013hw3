<h1>Arena Name and Address</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
      <th>Arena ID</th>
      <th>Arena Name</th>
      <th>Address</th>
      <th>City</th>
      <th>State</th>
      <th>Zip Code</th>
      </tr>
    </thead>
    <tbody>
<?php
while ($address = $addressbylocation->fetch_assoc()){
?>
  <tr>
    <td><?php echo $address['ArenaID']; ?></td>
    <td><?php echo $address['ArenaName']; ?></td>
    <td><?php echo $address['Address']; ?></td>
    <td><?php echo $address['City']; ?></td>
    <td><?php echo $address['State']; ?></td>
    <td><?php echo $address['ZipCode']; ?></td>
  </tr>
<?php
}
?>
    </tbody>
  </table>
</div>

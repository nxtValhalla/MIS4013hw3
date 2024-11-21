<select class="form-select" id="teamID" name="teamID">
<?php
while ($teamItem = $teamList -> fetch_assoc()) {
?>
  <option value="<?php echo $teamItem['TeamID']; ?>"><?php echo $teamItem['TeamName']; ?></option>
<?php
}
?>
</select>

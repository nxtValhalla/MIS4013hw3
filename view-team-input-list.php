<select class="form-select" id="teamID" name="teamID">
<?php
while ($teamItem = $teamList -> fetch_assoc()) {
  $selText = "";
  if ($selectedTeam == $teamItem['TeamID']) {
    $selText = " selected";
  }
?>
  <option value="<?php echo $teamItem['TeamID']; ?>"<?$selText?>><?php echo $teamItem['TeamName']; ?></option>
<?php
}
?>
</select>

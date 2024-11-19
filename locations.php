<?php
require_once("util-db.php");
require_once("model-locations.php");

$pageTitle = "NBA Team Locations";
include "view-header.php";

if (isset($_POST['actionType'])) {
  switch ($_POST['actionType']) {
    case "Add":
      if (insertLocation($_POST['city'], $_POST['state'], $_POST['arenaID'])) {
        echo '<div class="alert alert-success" role="alert">Location Added Successfully!</div>';   
      } else {
        echo '<div class="alert alert-danger" role="alert">Error. No Location Added.</div>';
      }
      break;
    case "Edit":
      if (updateLocation($_POST['city'], $_POST['state'], $_POST['arenaID'], $_POST['locID'])) {
        echo '<div class="alert alert-success" role="alert">Location Edited Successfully!</div>';   
      } else {
        echo '<div class="alert alert-danger" role="alert">Error. No Location Edited.</div>';
      }
      break;
    case "Delete":
      if (deleteLocation($_POST['locID'])) {
        echo '<div class="alert alert-success" role="alert">Location Deleted Successfully!</div>';   
      } else {
        echo '<div class="alert alert-danger" role="alert">Error. No Location Removed.</div>';
      }
      break;
  }
}

$locations = selectLocations();
include "view-locations.php";
include "view-footer.php";
?>

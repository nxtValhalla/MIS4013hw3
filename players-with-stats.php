<?php
require_once("util-db.php");
require_once("model-players-with-stats.php");

$pageTitle = "NBA Players With Statistics - Northwest Division";
include "view-header.php";

if (isset($_POST['actionType'])) {
  switch ($_POST['actionType']) {
    case "Add":
      if (insertPlayerStats($_POST['playerID'], $_POST['statName'], $_POST['statValue'])) {
        echo '<div class="alert alert-success" role="alert">Player Stat Added Successfully!</div>';   
      } else {
        echo '<div class="alert alert-danger" role="alert">Error. No Stat Added.</div>';
      }
      break;
    case "Edit":
      if (updatePlayerStats($_POST['playerID'], $_POST['statName'], $_POST['statValue'], $_POST['statInputID'])) {
        echo '<div class="alert alert-success" role="alert">Player Stat Edited Successfully!</div>';   
      } else {
        echo '<div class="alert alert-danger" role="alert">Error. No Stat Edited.</div>';
      }
      break;
    case "Delete":
      if (deletePlayerStats($_POST['statInputID'])) {
        echo '<div class="alert alert-success" role="alert">Player Stat Deleted Successfully!</div>';   
      } else {
        echo '<div class="alert alert-danger" role="alert">Error. No Stat Removed.</div>';
      }
      break;
  }
}

$players = selectPlayers();
include "view-players-with-stats.php";
include "view-footer.php";
?>

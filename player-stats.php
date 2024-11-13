<?php
require_once("util-db.php");
require_once("model-player-stats.php");

$pageTitle = "NBA Player Stats - Northwest Division";
include "view-header.php";

if (isset($_POST['actionType'])) {
  switch ($_POST['actionType']) {
    case "Add":
      if (insertPlayersWithStats($_POST['teamName'], $_POST['wins'], $_POST['losses'], $_POST['locID'])) {
        echo '<div class="alert alert-success" role="alert">NBA Team Added Successfully!</div>';   
      } else {
        echo '<div class="alert alert-danger" role="alert">Error. No Team Added.</div>';
      }
      break;
    case "Edit":
      if (updateNBATeam($_POST['teamName'], $_POST['wins'], $_POST['losses'], $_POST['locID'], $_POST['teamid'])) {
        echo '<div class="alert alert-success" role="alert">NBA Team Edited Successfully!</div>';   
      } else {
        echo '<div class="alert alert-danger" role="alert">Error. No Team Edited.</div>';
      }
      break;
    case "Delete":
      if (deleteNBATeam($_POST['teamid'])) {
        echo '<div class="alert alert-success" role="alert">NBA Team Deleted Successfully!</div>';   
      } else {
        echo '<div class="alert alert-danger" role="alert">Error. No Team Removed.</div>';
      }
      break;
  }
}

$playerstats = selectPlayerStats();
include "view-player-stats.php";
include "view-footer.php";
?>

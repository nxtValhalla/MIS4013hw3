<?php
require_once("util-db.php");
require_once("model-players-with-stats.php");

$pageTitle = "NBA Players With Statistics";
include "view-header.php";

if (isset($_POST['actionType'])) {
  switch ($_POST['actionType']) {
    case "Add":
      if (insertPlayerStat($_POST['playerid'], $_POST['statname'], $_POST['statvalue'])) {
        echo '<div class="alert alert-success" role="alert">Player Stat Added Successfully!</div>';   
      } else {
        echo '<div class="alert alert-danger" role="alert">Error. No Player Stat Added.</div>';
      }
      break;
    case "Edit":
      if (updatePlayerStat($_POST['playerid'], $_POST['statname'], $_POST['statvalue'], $_POST['statinputid'])) {
        echo '<div class="alert alert-success" role="alert">Player Stat Edited Successfully!</div>';   
      } else {
        echo '<div class="alert alert-danger" role="alert">Error. No Player Stat Edited.</div>';
      }
      break;
    case "Delete":
      if (deletePlayerStat($_POST['statinputid'])) {
        echo '<div class="alert alert-success" role="alert">Player Stat Deleted Successfully!</div>';   
      } else {
        echo '<div class="alert alert-danger" role="alert">Error. No Player Stat Removed.</div>';
      }
      break;
  }
}

$players = selectPlayers();
include "js-scroll-to-top.php";
include "view-players-with-stats.php";
include "view-footer.php";
?>

<?php
require_once("util-db.php");
require_once("model-players.php");

$pageTitle = "NBA Players - Northwest Division";
include "view-header.php";

if (isset($_POST['actionType'])) {
  switch ($_POST['actionType']) {
    case "Add":
      if (insertPlayer($_POST['playerName'], $_POST['pos'], $_POST['teamID'])) {
        echo '<div class="alert alert-success" role="alert">Player Added Successfully!</div>';   
      } else {
        echo '<div class="alert alert-danger" role="alert">Error. No Player Added.</div>';
      }
      break;
    case "Edit":
      if (updatePlayer($_POST['playerName'], $_POST['pos'], $_POST['teamID'], $_POST['playerID'])) {
        echo '<div class="alert alert-success" role="alert">Player Edited Successfully!</div>';   
      } else {
        echo '<div class="alert alert-danger" role="alert">Error. No Player Edited.</div>';
      }
      break;
    case "Delete":
      if (deletePlayer($_POST['playerID'])) {
        echo '<div class="alert alert-success" role="alert">Player Deleted Successfully!</div>';   
      } else {
        echo '<div class="alert alert-danger" role="alert">Error. No Player Removed.</div>';
      }
      break;
  }
}

$players = selectPlayers();
include "view-players.php";
include "view-footer.php";
?>

<?php
require_once("util-db.php");
require_once("model-nbateams.php");

$pageTitle = "NBA Teams";
include "view-header.php";

if (isset($_POST['actionType'])) {
  switch ($_POST['actionType']) {
    case "Add":
      if (insertNBATeam($_POST['teamName'], $_POST['wins'], $_POST['losses'], $_POST['locID'])) {
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

$nbateams = selectNBATeams();
include "js-scroll-to-top.php";
include "view-nbateams.php";
include "view-footer.php";
?>

<?php
require_once("util-db.php");
require_once("model-nbateams.php");

$pageTitle = "NBA Teams";
include "view-header.php";

if (isset($_POST['actionType'])) {
  switch ($_POST['actionType']) {
    case "Add":
      insertNBATeam($_POST['teamName'], $_POST['wins'], $_POST['losses'], $_POST['locID'])
      break;
  }
}

$nbateams = selectNBATeams();
include "view-nbateams.php";
include "view-footer.php";
?>

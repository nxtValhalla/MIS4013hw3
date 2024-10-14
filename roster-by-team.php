<?php
require_once("util-db.php");
require_once("model-roster-by-team.php");

$pageTitle = "Roster by Team";
include "view-header.php";
$rosterbyteams = selectRosterByTeam($_GET['TeamID']);
include "view-roster-by-team.php";
include "view-footer.php";
?>

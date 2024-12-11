<?php
require_once("util-db.php");
require_once("model-team-wins-losses.php");

$pageTitle = "Doughnut Chart - Wins and Losses";
include "view-header.php";

$teamData = getTeamListWithStats();

$teams = [];
while ($row = $teamData->fetch_assoc()) {
    $teams[] = $row;
}

include "view-team-wins-losses.php";
include "view-footer.php";
?>

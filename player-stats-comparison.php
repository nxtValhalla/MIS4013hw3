<?php
require_once("util-db.php");
require_once("model-player-stats-comparison.php");

$pageTitle = "Player Stats Comparison";
include "view-header.php";

// Stat Data
$playerStatsData = getPlayerStatsComparison();

// Array for Player Dropdowns
$players = [];
while ($row = $playerStatsData->fetch_assoc()) {
    $players[] = $row;
}

include "view-player-stats-comparison.php";
include "view-footer.php";
?>

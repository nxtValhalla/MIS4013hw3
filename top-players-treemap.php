<?php
require_once("util-db.php");
require_once("model-top-players-treemap.php");

$pageTitle = "Player Stats Treemap";
include "view-header.php";

// Fetch available stats dynamically
$availableStats = getAvailableStats();

// Default stat to display
$defaultStat = $availableStats[0]; // Use the first available stat as the default
$statName = isset($_GET['stat']) && in_array($_GET['stat'], $availableStats) ? $_GET['stat'] : $defaultStat;

// Fetch player data for the selected stat
$limit = 10;
$playerStats = getPlayerStatsForTreemap($statName, $limit);

// Convert data to an array for Chart.js
$data = [];
while ($row = $playerStats->fetch_assoc()) {
    $data[] = $row;
}

include "view-top-players-treemap.php";
include "view-footer.php";
?>

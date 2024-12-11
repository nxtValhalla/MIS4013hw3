<?php
require_once("util-db.php");
require_once("model-top-players-treemap.php");

$pageTitle = "Player Stats Treemap";
include "view-header.php";

// Default stat to display
$defaultStat = "PPG";
$statName = isset($_GET['stat']) ? $_GET['stat'] : $defaultStat;

// Fetch data for the specified stat
$playerStats = getPlayerStatsForTreemap($statName);

// Convert data to an array for Chart.js
$data = [];
while ($row = $playerStats->fetch_assoc()) {
    $data[] = $row;
}

// Available stats for selection
$availableStats = ['PPG', 'RPG', 'APG'];

include "view-top-players-treemap.php";
include "view-footer.php";
?>

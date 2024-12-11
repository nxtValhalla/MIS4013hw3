<?php
require_once("util-db.php");
require_once("model-top-players-treemap.php");

$pageTitle = "Top Players by Stat";
include "view-header.php";

// Fetch all available stat names
$statNames = getStatNames();

// Determine the selected stat
$defaultStat = $statNames[0]; // Default to the first stat if none is selected
$statName = isset($_GET['stat']) && in_array($_GET['stat'], $statNames) ? $_GET['stat'] : $defaultStat;

// Fetch top 10 players for the selected stat
$playerStats = getTopPlayersByStat($statName);

// Prepare data for the chart
$data = [];
while ($row = $playerStats->fetch_assoc()) {
    $data[] = $row;
}

// Include the view
include "view-top-players-treemap.php";
include "view-footer.php";
?>

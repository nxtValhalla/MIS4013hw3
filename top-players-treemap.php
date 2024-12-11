<?php
require_once("util-db.php");
require_once("model-top-players-treemap.php");

$pageTitle = "Top Players by Stat";
include "view-header.php";

$defaultStat = "PPG";

$statName = isset($_GET['stat']) ? $_GET['stat'] : $defaultStat;
$playerData = getTopPlayersByStat($statName);

$players = [];
while ($row = $playerData->fetch_assoc()) {
    $players[] = $row;
}

$availableStats = ["PPG", "Rebounds", "Assists", "Steals", "Blocks"];

include "view-top-players-treemap.php";
include "view-footer.php";
?>

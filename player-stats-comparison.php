<?php
require_once("util-db.php");
require_once("model-player-stats-comparison.php");

$pageTitle = "Player Stats Comparison";
include "view-header.php";

$playerStatsData = getPlayerStatsComparison();
include "view-player-stats-comparison.php";
include "view-footer.php";
?>

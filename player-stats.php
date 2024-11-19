<?php
require_once("util-db.php");
require_once("model-player-stats.php");

$pageTitle = "NBA Player Stats";
include "view-header.php";
$playerstats = selectPlayerStats();
include "view-player-stats.php";
include "view-footer.php";
?>

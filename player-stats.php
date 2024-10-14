<?php
require_once("util-db.php");
require_once("model-player-stats.php");

$pageTitle = "NBA Player Stats - Northwest Division";
include "view-header.php";
$playerstats = selectPlayerStats();
include "view-playerstats.php";
include "view-footer.php";
?>

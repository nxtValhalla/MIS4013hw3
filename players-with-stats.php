<?php
require_once("util-db.php");
require_once("model-players-with-stats.php");

$pageTitle = "NBA Players With Statistics - Northwest Division";
include "view-header.php";
$players = selectPlayers();
include "view-players-with-stats.php";
include "view-footer.php";
?>

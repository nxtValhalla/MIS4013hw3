<?php
require_once("util-db.php");
require_once("model-stats-by-player.php");

$pageTitle = "Stats by Player";
include "view-header.php";
$statsbyplayer = selectStatsByPlayer($_GET['pid']);
include "view-stats-by-player.php";
include "view-footer.php";
?>

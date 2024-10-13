<?php
require_once("util-db.php");
require_once("model-players.php");

$pageTitle = "NBA Northwest Division Players";
include "view-header.php";
$players = selectPlayers();
include "view-players.php";
include "view-footer.php";
?>

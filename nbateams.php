<?php
require_once("util-db.php");
require_once("model-nbateams.php");

$pageTitle = "NBA Teams";
include "view-header.php";
$nbateams = selectNBATeams();
include "view-nbateams.php";
include "view-footer.php";
?>

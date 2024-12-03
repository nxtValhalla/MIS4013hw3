<?php
require_once("util-db.php");
require_once("model-team-performance.php");

$pageTitle = "Team Performance";
include "view-header.php";

$teamPerformanceData = selectTeamPerformanceData();
include "view-team-performance.php";
include "view-footer.php";
?>

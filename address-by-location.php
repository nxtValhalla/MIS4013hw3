<?php
require_once("util-db.php");
require_once("model-address-by-location.php");

$pageTitle = "Address by Location";
include "view-header.php";
$addresses = selectAddressByLocation($_POST['id']);
include "view-address-by-location.php";
include "view-footer.php";
?>

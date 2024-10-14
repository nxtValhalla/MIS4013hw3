<?php
require_once("util-db.php");
require_once("model-address-by-location.php");

$pageTitle = "Address by Location";
include "view-header.php";
$addressbylocation = selectAddressByLocation($_POST['lid']);
include "view-address-by-location.php";
include "view-footer.php";
?>

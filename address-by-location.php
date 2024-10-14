<?php
require_once("util-db.php");
require_once("model-address-by-location.php");

$pageTitle = "Address by Location";
include "view-header.php";

// // Check if $_POST['lid'] is set and pass it to the query
// if (isset($_POST['lid'])) {
//     $lid = $_POST['lid'];
//     echo "Location ID: " . $lid; // Debugging line to verify POST data

//     $addressbylocation = selectAddressByLocation($_POST['lid']);

//     if ($addressbylocation->num_rows > 0) {
//         include "view-address-by-location.php";
//     } else {
//         echo "No results found for Location ID: " . $lid;
//     }
// } else {
//     echo "Location ID not set!";
// }
  
include "view-address-by-location.php";
include "view-footer.php";
?>

<?php
    // Database Config

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "busspass";

    $conn = new mysqli($servername, $username, $password, $dbname);


?>

<?php

$keyId = 'rzp_test_U7mD1yOp3gHGB7';
$keySecret = 'kuH0Le0x5uZ4xeyCTlnJB1V9';
$displayCurrency = 'INR';

//These should be commented out in production
// This is for error reporting
// Add it to config.php to report any errors
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 0);

// Function to handle PHP errors
function customErrorHandler($errno, $errstr, $errfile, $errline) {
    // Format the error as a JSON-encoded string to send to the console
    $message = "Error:[$errno] $errstr - $errfile:$errline";
    error_log($message . PHP_EOL,3,"error_log.txt");

}

set_error_handler("customErrorHandler");

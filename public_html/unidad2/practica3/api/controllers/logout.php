<?php
    include_once("../helpers/utils.php");
    is_method("POST"); // Only POST request are allowed

    header("Content-Type: applicacion/json");

    session_start();
    session_destroy();

    http_response_code(204); // Success: No content
    exit();
?>
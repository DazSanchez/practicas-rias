<?php
    $user = "root";
    $password = "toor";
    $db_name = "hospital_db";
    $host = "127.0.0.1";
    $port = "3306";

    $dns = "mysql:host={$host};port={$port};dbname={$db_name};charset=utf8mb4";

    function get_connection() {
        global $dns, $user, $password;
        return new PDO($dns, $user, $password);
    }
?>
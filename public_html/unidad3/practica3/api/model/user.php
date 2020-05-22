<?php
    include_once("../classes/mysql_client.php");

    class User extends MySQL_Client {
        public function check_user($username) {
            return $this->query(
                "SELECT PASSWORD password FROM USERS WHERE USERNAME = :username",
                [":username" => $username]
            );
        }
    }
?>
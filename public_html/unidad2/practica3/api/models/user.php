<?php
    include_once("../helpers/mysql_helper.php");

    class UserModel {
        private $pdo;

        function __construct() {
            $this->pdo = get_connection();
        }

        public function get_user_by_username($username) {
            $query = $this->pdo->prepare(
                "SELECT USERNAME as username, PASSWORD as password ".
                "FROM USERS WHERE USERNAME = :username"
            );

            $query->execute(array(
                ':username' => $username
            ));

            return $query->fetch(PDO::FETCH_LAZY);
        }
    }
?>
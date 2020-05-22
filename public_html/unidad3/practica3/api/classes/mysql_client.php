<?php
    class MySQL_Client {
        private $pdo;

        private $user = "hospital_user";
        private $password = "lorem";
        private $db_name = "hospital_db";
        private $host = "127.0.0.1";
        private $port = "3306";

        function __construct() {
            $this->pdo = new PDO("mysql:host={$this->host};port={$this->port};dbname={$this->db_name};charset=utf8mb4", $this->user, $this->password);
        }

        public function query($sql, $params = []) {
            $query = $this->pdo->prepare($sql);
            $query->execute($params);

            return $query->fetchObject();
        }

        public function queryAll($sql, $params = []) {
            $query = $this->pdo->prepare($sql);
            $query->execute($params);

            return $query->fetchAll(PDO::FETCH_OBJ);
        }
    }
?>
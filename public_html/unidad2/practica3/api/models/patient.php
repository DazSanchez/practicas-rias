<?php
    include_once("../helpers/mysql_helper.php");

    class PatientModel {
        private $pdo;

        function __construct() {
            $this->pdo = get_connection();
        }

        public function get_patient_by_id($id) {
            $query = $this->pdo->prepare(
                "SELECT ID as id, NAME as name, FIRST_SURNAME as firstSurname, SECOND_SURNAME as secondSurname ".
                "FROM PATIENTS WHERE id = :id",
            );

            $query->execute(array(
                ":id" => $id
            ));

            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_patient_by_name($name) {
            $query = $this->pdo->prepare(
                "SELECT ID as id, NAME as name, FIRST_SURNAME as firstSurname, SECOND_SURNAME as secondSurname ".
                "FROM PATIENTS WHERE name LIKE :name",
            );

            $query->execute(array(
                ":name" => "%".$name."%"
            ));

            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>
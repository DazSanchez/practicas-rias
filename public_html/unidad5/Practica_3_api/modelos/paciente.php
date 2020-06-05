<?php
    include_once("../utils/mysql_helper.php");

    class Paciente {
        private $pdo;

        function __construct() {
            $this->pdo = get_connection();
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        function obtener_pacientes() {
            $query = $this->pdo->prepare(
                "SELECT ID id, NAME name, FIRST_SURNAME firstSurname, SECOND_SURNAME secondSurname ".
                "FROM PATIENTS"
            );

            $query->execute();

            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        function crear_paciente($paciente) {
            $query = $this->pdo->prepare(
                "INSERT INTO PATIENTS (NAME, FIRST_SURNAME, SECOND_SURNAME) ".
                "VALUES(:name, :firstSurname, :secondSurname)"
            );

            $query->execute([
                ":name" => $paciente->name,
                ":firstSurname" => $paciente->firstSurname,
                ":secondSurname" => $paciente->secondSurname,
            ]);

            return $this->pdo->lastInsertId();
        }

        function modificar_paciente($paciente) {
            $query = $this->pdo->prepare(
                "UPDATE PATIENTS SET NAME = :name, FIRST_SURNAME = :firstSurname, SECOND_SURNAME = :secondSurname ".
                "WHERE ID = :id"
            );

            $query->execute([
                ":id" => $paciente->id,
                ":name" => $paciente->name,
                ":firstSurname" => $paciente->firstSurname,
                ":secondSurname" => $paciente->secondSurname,
            ]);
        }

        function eliminar_paciente($id) {
            $query = $this->pdo->prepare("DELETE FROM PATIENTS WHERE ID = :id");

            $query->execute([":id" => $id]);
        }
    }
?>
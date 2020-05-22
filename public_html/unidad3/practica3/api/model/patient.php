<?php
    include_once("../classes/mysql_client.php");

    class Patient extends MySQL_Client {
        public function get_patients() {
            return $this->queryAll(
                "SELECT ID idPaciente, NAME name, FIRST_SURNAME firstSurname, SECOND_SURNAME secondSurname FROM PATIENTS;"
            );
        }
    }
?>
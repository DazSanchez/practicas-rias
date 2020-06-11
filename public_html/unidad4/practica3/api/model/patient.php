<?php
    include_once("../classes/mysql_client.php");

    class Patient extends MySQL_Client {
        public function get_patients() {
            return $this->queryAll(
                "SELECT ID id, NAME name, FIRST_SURNAME firstSurname, SECOND_SURNAME secondSurname ".
                "FROM PATIENTS;"
            );
        }
    }
?>
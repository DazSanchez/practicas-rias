<?php
    include_once("../classes/patient_filters.php");
    include_once("../models/patient.php");

    class PatientsService {
        private $patientModel;

        function __construct() {
            $this->patientModel = new PatientModel();
        }

        public function get_patient_by($filter, $q) {
            switch ($filter) {
                case PatientFilters::KEY_FILTER:
                    return $this->patientModel->get_patient_by_id($q);
                case PatientFilters::NAME_FILTER:
                    return $this->patientModel->get_patient_by_name($q);
            }
        }
    }
?>
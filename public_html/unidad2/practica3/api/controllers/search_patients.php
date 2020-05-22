<?php
    include_once("../helpers/utils.php");
    is_method("GET"); // Only GET request are allowed

    session_start();

    if(!isset($_SESSION["logged_in"])) {
        throw_error(401, "No ha iniciado sesión");
    }

    include_once("../classes/patient_filters.php");
    include_once("../services/patients.php");
    header("Content-Type: applicacion/json");

    $queryParams = get_query_params();

    if(!isset($queryParams["filter_by"])) throw_error(400, "El parámetro 'filter_by' es requerido.");
    if(!isset($queryParams["q"])) throw_error(400, "El parámetro 'q' es requerido.");
    if(!in_array($queryParams["filter_by"], PatientFilters::VALID_FILTERS)) throw_error(400, "El filtro no es válido");

    $service = new PatientsService();

    try {
        $result = $service->get_patient_by($queryParams["filter_by"], $queryParams["q"]);
        echo json_encode($result);
    } catch(Exception $e) {
        error_log("Error: ".$e->getMessage());
        throw_error(500, $e->getMessage());
    }
?>
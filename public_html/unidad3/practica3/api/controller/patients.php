<?php
    include_once("../classes/utils.php");
    include_once("../model/patient.php");

    header("Content-Type: application/json");
    header("Accept: aplication/json");

    is_method("GET");

    $patients = [];

    try {
        $patientModel = new Patient();
        $patients = $patientModel->get_patients();
    } catch (Exception $e) {
        echo throw_error(409, "No se pudo conectar con los servicios");
    }

    http_response_code(200);
    echo json_encode([
        "success" => true,
        "status" => 200,
        "data" => $patients
    ]);
?>
<?php
    include_once("../utils/request.php");
    include_once("../modelos/paciente.php");

    header("Content-Type: application/json");
    header("Accept: aplication/json");

    is_method("GET");

    try {
        $paciente = new Paciente();
        $pacientes = $paciente->obtener_pacientes();

        http_response_code(200);
        echo json_encode($pacientes);
    } catch (Exception $e) {
        echo throw_error(409, "No se pudo conectar con los servicios: ", $e);
    }

?>
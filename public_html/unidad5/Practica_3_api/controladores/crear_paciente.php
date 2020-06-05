<?php
    include_once("../utils/request.php");
    include_once("../modelos/paciente.php");

    header("Content-Type: application/json");
    header("Accept: aplication/json");

    is_method("POST");

    $paciente = get_body();
    
    try {
        $modelo = new Paciente();
        $id = $modelo->crear_paciente($paciente);

        http_response_code(200);
        echo json_encode(["id" => $id]);
    } catch (Exception $e) {
        echo throw_error(409, "No se pudo conectar con los servicios", $e);
    }

?>
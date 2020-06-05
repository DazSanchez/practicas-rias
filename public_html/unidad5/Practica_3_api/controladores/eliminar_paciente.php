<?php
    include_once("../utils/request.php");
    include_once("../modelos/paciente.php");

    header("Content-Type: application/json");
    header("Accept: aplication/json");

    is_method("POST");

    $body = get_body();
    
    try {
        $modelo = new Paciente();
        $modelo->eliminar_paciente($body->id);

        http_response_code(200);
        echo json_encode(["message" => "Ok"]);
    } catch (Exception $e) {
        echo throw_error(409, "No se pudo conectar con los servicios", $e);
    }

?>
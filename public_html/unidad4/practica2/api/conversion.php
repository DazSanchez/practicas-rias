<?php
    header("Content-Type: application/json");
    header("Accept: aplication/json");

    if($_SERVER['REQUEST_METHOD'] != "POST") {
        http_response_code(405);
        echo json_encode([
            "codigo" => 405,
            "mensaje" => "El verbo http no es aceptado.",
            "success" => false,
        ]);
        exit();
    }

    $raw = file_get_contents("php://input");
    $body = json_decode($raw);

    function throw_error($code, $message) {
        http_response_code($code);
        echo json_encode([
            "code" => $code,
            "message" => $message,
            "success" => false,
        ]);
        exit();
    }

    if(!isset($body)) throw_error(400, "El cuerpo de la peticion es requerido");
    if(!isset($body->type)) throw_error(400, "El tipo de conversión es requerido");
    if(!isset($body->value)) throw_error(400, "El valor a convertir es requerido");

    $result = 0;

    if($body->type == 1) {
        $result = $body->value * 1.8 + 32;
    } else if($body->type == 2) {
        $result = $body->value + 273.15;
    } else {
        throw_error(400, "La operación {$body->value} no es válida.");
    }

    http_response_code(200);
    echo json_encode([
        "status" => 200,
        "data" => [
            "conversion" => [
                "value" => $body->value,
                "type" => 0
            ],
            "result" => [
                "value" => $result,
                "type" => $body->type
            ]
        ],
    ]);
?>
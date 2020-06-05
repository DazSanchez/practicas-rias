<?php
    function is_method($metodo) {
        if($_SERVER['REQUEST_METHOD'] != $metodo) {
            http_response_code(405);
            echo json_encode([
                "codigo" => 405,
                "mensaje" => "El verbo http no es aceptado.",
                "success" => false,
            ]);
            exit();
        }
    }

    function get_body() {
        $raw = file_get_contents("php://input");
        return json_decode($raw);
    }

    function throw_error($code, $message, $e) {
        http_response_code($code);
        echo json_encode([
            "code" => $code,
            "message" => $message . ": " . $e->getMessage(),
        ]);
        exit();
    }
?>
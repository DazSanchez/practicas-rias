<?php
    function is_method($metodo) {
        if($_SERVER['REQUEST_METHOD'] != $metodo) {
            http_response_code(405);
            echo json_encode([
                "codigo" => 405,
                "mensaje" => "El verbo http no es aceptado."
            ]);
            exit();
        }
    }

    function get_query_params() {
        $query = $_SERVER["QUERY_STRING"];
        if(empty($query)) {
            return [];
        }

        $explodedQuery = explode("&", $query);
        $mappedQuery = array_map(function ($q) {
            return explode("=", $q);
        }, $explodedQuery);
        $parsedQuery = array_reduce($mappedQuery, function ($prev, $curr) {
            $next = $prev;

            if(count($curr) != 2) {
                $next[$curr[0]] = NULL;
            } else {
                $next[$curr[0]] = $curr[1];
            }

            return $next;
        }, []);
        return $parsedQuery;
    }

    function get_body() {
        $raw = file_get_contents("php://input");
        return json_decode($raw);
    }

    function throw_error($code, $message) {
        http_response_code($code);
        echo json_encode([
            "code" => $code,
            "message" => $message
        ]);
        exit();
    }
?>
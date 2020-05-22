<?php
    include_once("../helpers/utils.php");
    is_method("POST"); // Only POST request are allowed

    header("Content-Type: applicacion/json");

    $body = get_body();

    if(empty($body->username)) throw_error(400, "El nombre de usuario es requerido");
    if(empty($body->password)) throw_error(400, "La contraseña es requerida");

    include_once("../services/users.php");

    $service = new UsersService();

    $user = $service->check_credentials($body);

    if(is_null($user)) {
        throw_error(409, "Nombre de usuario o contraseña incorrectos");
    }

    session_start();

    $_SESSION["logged_in"] = TRUE;

    http_response_code(204); // Success: No content
    exit();
?>
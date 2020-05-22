<?php
    include_once("../classes/utils.php");
    include_once("../model/user.php");

    header("Content-Type: application/json");
    header("Accept: aplication/json");

    is_method("POST");

    $credentials = get_body();

    if(!isset($credentials)) throw_error(400, "El cuerpo de la peticion es requerido");
    if(!isset($credentials->username)) throw_error(400, "El nombre de usuario es requerido");
    if(!isset($credentials->password)) throw_error(400, "La contraseña es requerida");

    $user = NULL;
    
    try {
        $userModel = new User();
        $user = $userModel->check_user($credentials->username);
    } catch (Exception $e) {
        echo throw_error(409, "No se pudo conectar con los servicios");
    }

    if($user == FALSE) throw_error(409, "No se encontró el usuario");

    if($user->password != md5($credentials->password)) throw_error(409, "La contraseña es incorrecta");

    session_start();

    $_SESSION["username"] = $credentials->username;
    $_SESSION["logged_in"] = TRUE;

    http_response_code(200);
    echo json_encode([
        "success" => true,
        "status" => 200,
        "message" => "Sesión iniciada",
    ]);
?>
<?php
    include_once("../models/profile.php");
    include_once("../utils/helpers.php");

    session_start();
    $data_list = (array) $_SESSION["register"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de registros</title>
    <link rel="stylesheet" href="../assets/skeleton.css" />
    <link rel="stylesheet" href="../assets/index.css?cb=<?= time(); // Prevents CSS cache for development?>" />
</head>
<body>
    <div class="container">
        <header class="flex space-between center">
            <h2>Lista de registros</h2>
            <a class="button button-primary" href="/practica1/index.php">
                + Agregar registro
            </a>
        </header>

        <table class="h-scroll-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido paterno</th>
                    <th>Apellido materno</th>
                    <th>Fecha de nacimiento</th>
                    <th>Color favorito</th>
                    <th>Fotografía</th>
                    <th>Área de interés</th>
                    <th>Pasatiempos</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Página web</th>
                    <th>Fecha de ingreso</th>
                </tr>
            </thead>
            <tbody>
                <? foreach ($data_list as $key => $data) { 
                    $profile = (object) $data;    
                ?>
                    <tr>
                        <td><?= $profile->name ?></td>
                        <td><?= $profile->firstSurname ?></td>
                        <td><?= $profile->secondSurname ?></td>
                        <td>
                            <?= $profile->day ?>/
                            <?= $profile->month ?>
                        </td>
                        <td><?= $profile->favoriteColor ?></td>
                        <td><?= $profile->picture["name"] ?></td>
                        <td><?= $interest_areas[$profile->interestArea] ?></td>
                        <td><?= join(",", $profile->hobbies) ?></td>
                        <td><?= $profile->email ?></td>
                        <td><?= $profile->password ?></td>
                        <td><?= $profile->webpage ?></td>
                        <td><?= $profile->joinDate ?></td>
                    </tr>
                <? } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
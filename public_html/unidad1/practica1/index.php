<?php 
  include_once('./utils/helpers.php');
  include_once('./models/profile.php');

  session_start();
  
  $userAgent = $_SERVER["HTTP_USER_AGENT"];
  $isIE = (preg_match('~MSIE|Internet Explorer~i', $userAgent) || (strpos($userAgent, 'Trident/7.0; rv:11.0') !== false));
  
  $hasError = isset($_SESSION["REGISTER_ERROR"]) && $_SESSION["REGISTER_ERROR"];
  $dateError = isset($_SESSION["DATE_ERROR"]) && $_SESSION["DATE_ERROR"];

  if($hasError) {
    $_SESSION["REGISTER_ERROR"] = NULL;
  }

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Registro</title>
    <link rel="stylesheet" href="assets/skeleton.css" />
    <link rel="stylesheet" href="assets/index.css?cb=<?= time(); // Prevents CSS cache for development?>" />
  </head>
  <body>
    <div class="container">
      <h2>Registro</h2>

      <?php if($hasError || $dateError) { ?>
        <div class="row alert alert--error">
          <p class="alert__title">
            Error en la solicitud.
          </p>
          <p class="alert__message">
            <?php if ($dateError) { unset($_SESSION["DATE_ERROR"]); ?>
              La fecha de nacimiento no es válida.
            <? } else { ?>
              Parece que faltan datos requeridos.
            <? } ?>
          </p>
        </div>
      <?php }?>

      <form action="controllers/form_controller.php" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="three columns">
            <label for="name">
              Nombre
            </label>
            <input
              required
              type="text"
              name="name"
              id="name"
              class="u-full-width"
            />
          </div>
          <div class="three columns">
            <label for="firstSurname">
              Apellido paterno
            </label>
            <input
              required
              type="text"
              name="firstSurname"
              id="firstSurname"
              class="u-full-width"
            />
          </div>
          <div class="three columns">
            <label for="secondSurname">
              Apellido materno
            </label>
            <input
              required
              type="text"
              name="secondSurname"
              id="secondSurname"
              class="u-full-width"
            />
          </div>
          <div class="three columns">
            <label for="day">
              Fecha de nacimiento
            </label>
            <div class="row">
              <div class="six columns">
                <input
                  required
                  type="number"
                  placeholder="31"
                  min="1"
                  max="31"
                  name="day"
                  class="u-full-width"
                />
              </div>
              <div class="six columns">
                <select 
                  required 
                  name="month" 
                  id="month" 
                  class="u-full-width" 
                >
                  <?= create_options($months); ?>
                </select>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="three columns">
            <label for="favoriteColor">
              Color favorito
            </label>
            <input
              required
              type="color"
              name="favoriteColor"
              id="favoriteColor"
              class="u-full-width"
              placeholder="<?= $isIE ? "Ingresa un color hexadecimal" : ""?>"
            />
          </div>
          <div class="three columns">
            <label for="picture">
              Fotograf&iacute;a
            </label>
            <input
              required
              type="file"
              name="picture"
              id="picture"
              class="u-full-width"
              accept="image/*"
            />
          </div>
          <div class="three columns">
            <label for="interestArea">
              &Aacute;rea de inter&eacute;s
            </label>
            <select
              required
              name="interestArea"
              id="interestArea"
              class="u-full-width"
            >
              <?= create_options($interest_areas); ?>
            </select>
          </div>
          <div class="three columns">
            <label for="hobbies">
              Pasatiempos
            </label>
            <select
              required
              name="hobbies[]"
              id="hobbies"
              class="u-full-width"
              multiple
            >
              <?= create_options($hobbies); ?>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="three columns">
            <label for="email">
              Correo electr&oacute;nico
            </label>
            <input
              required
              type="email"
              name="email"
              id="email"
              class="u-full-width"
            />
          </div>
          <div class="three columns">
            <label for="password">
              Password
            </label>
            <input
              required
              type="password"
              name="password"
              id="password"
              class="u-full-width"
              pattern="\d{2}_[A-Z]{2}\d[a-z]"
            />
          </div>
          <div class="three columns">
            <label for="webpage">
              Direcci&oacute;n de la p&aacute;gina web
            </label>
            <input
              required
              type="url"
              name="webpage"
              id="webpage"
              class="u-full-width"
            />
          </div>
          <div class="three columns">
            <label for="joinDate">
              Fecha de ingreso
            </label>
            <input
              required
              type="date"
              name="joinDate"
              id="joinDate"
              class="u-full-width"
              placeholder="<?= $isIE ? "dd/mm/yyyy" : ""?>"
            />
          </div>
        </div>

        <div class="flex space-between">
          <a class="button" href="/practica1/pages/list.php">
            Ver listado
          </a>
          <button type="submit" class="button-primary u-pull-right">
            Enviar
          </button>
        </div>
      </form>
    </div>
  </body>
</html>

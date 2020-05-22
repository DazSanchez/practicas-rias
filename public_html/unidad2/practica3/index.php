<?php
  session_start();

  if(isset($_SESSION["logged_in"])) {
    header("Location: /search.php");
  }
?>

<!DOCTYPE html>
<html lang="es-MX">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="/assets/css/index.css?cb=<?php echo time(); ?>"
    />
  </head>
  <body>
    <div class="container d-flex justify-content-center align-items-center">
      <div class="card form">
        <div class="card-body">
          <h5 class="card-title">Inciar sesi&oacute;n</h5>

          <div
            class="alert alert-danger"
            role="alert"
            id="errorAlert"
            style="display: none;"
          ></div>

          <form id="loginForm">
            <div class="form-group">
              <input
                class="form-control"
                type="text"
                name="username"
                id="username"
                placeholder="Nombre de usuario"
              />
            </div>
            <div class="form-group">
              <input
                class="form-control"
                type="password"
                name="password"
                id="password"
                placeholder="Contraseña"
              />
            </div>
            <button type="submit" class="btn btn-primary btn-block">
              Iniciar sesi&oacute;n
            </button>
          </form>
        </div>
      </div>
    </div>
    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/login.js?cb=<?php echo time(); ?>"></script>
  </body>
</html>

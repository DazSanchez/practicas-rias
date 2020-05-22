<?php
  session_start();

  if(!isset($_SESSION["logged_in"])) {
    header("Location: /index.php");
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
    <nav class="navbar navbar-light bg-light">
      <span class="navbar-brand mb-0 h1">B&uacute;squeda de pacientes</span>
      <span class="flex-fill"></span>
      <button id="logout" class="btn btn-outline-info">Salir</button>
    </nav>

    <div class="container py-2">
      <div class="card">
        <div class="card-body">
          <form id="searchForm" class="form-inline pb-3">
            <span class="d-sm-inline-block mr-2">Buscar por:</span>
            <select
              name="filter_by"
              id="filter-by"
              class="form-control mb-2 mb-sm-0 mr-sm-2"
            >
              <option value="KEY">Clave</option>
              <option value="NAME">Nombre</option>
            </select>
            <input
              type="text"
              name="q"
              id="query"
              placeholder="Búsqueda"
              class="form-control mb-2 mb-sm-0 mr-sm-2"
            />
            <button type="submit" class="btn btn-primary">
              Buscar
            </button>
          </form>

          <div class="alert alert-info" role="alert" id="infoAlert" style="display: none;">
            No se encontraron resultados
          </div>

          <div class="table-responsive d-none">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">Clave</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">A. Paterno</th>
                  <th scope="col">A. Materno</th>
                </tr>
              </thead>
              <tbody id="tbody"></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/search.js"></script>
  </body>
</html>

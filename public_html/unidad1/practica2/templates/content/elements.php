<? require_once(__DIR__."/../components/section_media.php"); ?>

<section class="section">
  <h1 class="section__title">
    Elementos de modelado
  </h1>

  <div class="section__content">
    <h2 class="section__subtitle">
      Par&aacute;metros
    </h2>
    <p class="section__paragraph">
      Elemento b&aacute;sico con tipo y nombre, dependiendo de su funci&oacute;n
      pueden ser de entrada o de salida.
    </p>
    <?= section_media([
      "src" =>
      "/assets/img/parameters.png", "title" => "Tabla de tipos de par&aacute;metros"
    ]); ?>

    <h2 class="section__subtitle">
      Eventos
    </h2>
    <p class="section__paragraph">
      Son acciones en el modelo y afectan a la aplicaci&oacute;n. Se dividen en
      eventos de captura y eventos de lanzado.
    </p>
    <?= section_media([
      "src" =>
      "/assets/img/events.png", "title" => "Tabla de tipos de eventos" 
    ]); ?>

    <h2 class="section__subtitle">
      Componentes
    </h2>
    <p class="section__paragraph">
      Elemento que muestra contenido e interactuar con otros componentes. Acepta
      par&aacute;metros de entrada y puede generar par&aacute;metros de salida,
      por ejemplo una lista.
    </p>
    <?= section_media([
      "src" =>
      "/assets/img/components.png", "title" => "Tabla de tipos de componentes"
    ]);?>

    <h2 class="section__subtitle">
      Contenedores
    </h2>
    <p class="section__paragraph">
      Es un elemento de la interfaz que contiene a otros elementos que muestran
      contenido. Contiene propiedades como <em>Default View Container</em>, para
      marcarlo por defecto, <em>Landmark View Container</em> para hacerlo
      visible para navegaci&oacute;n, o ser excluyente al mostrarse
      alternativamente a otros contenedores, <em>XOR View Container</em>. Por
      ejemplo, una p&aacute;gina web.
    </p>
    <?= section_media([
      "src" =>
      "/assets/img/containers.png", "title" => "Ejemplo de contenedores" 
    ]); ?>
    <?= section_media([
      "src" =>
      "/assets/img/containers-table.png", "title" => "Tabla de tipos de contenedores"
    ]); ?>

    <h2 class="section__subtitle">
      Flujos
    </h2>
    <h2 class="section__subtitle-2">
      Flujos de navegaci&oacute;n (Navigation flow)
    </h2>
    <p class="section__paragraph">
      Se representa por una flecha continua encargado del intercambio de
      informaci&oacute;n entre los componentes, permite enlazar
      par&aacute;metros de entrada y par&aacute;metros de salida entre elementos
      para representar la navegaci&oacute;n entre distintas p&aacute;ginas.
    </p>
    <h2 class="section__subtitle-2">
      Flujos de datos (Data flow)
    </h2>
    <p class="section__paragraph">
      Se representa como una flecha discontinua y sirve para representar una
      dependencia entre datos. Pr&aacute;cticamente provee de datos de entrada o
      salida al componente o contenedor solo en el momento en el que el flujo de
      navegaci&oacute;n lo indica.
    </p>
    <?= section_media([
      "src" =>
      "/assets/img/flows.png", "title" => "Tabla de tipos de flujos" 
    ]); ?>

    <h2 class="section__subtitle">
      Acciones de activaci&oacute;n
    </h2>
    <?= section_media([
      "src" =>
      "/assets/img/activation-expressions.png", "title" => "Tabla de tipos de acciones de activaci&oacute;n"
    ]); ?>

    <h2 class="section__subtitle">
      Acciones
    </h2>
    <?= section_media([
      "src" =>
      "/assets/img/actions.png", "title" => "Tabla de tipos de acciones"
    ]); ?>

    <h2 class="section__subtitle">
      M&oacute;dulos
    </h2>
    <p class="section__paragraph">
      Tienen como objetivo englobar un fragmento del diagrama IFML en un
      contenedor para crear una definición de módulo con una funcionalidad
      concreta, por ejemplo: todas las acciones necesarias que intervienen en
      una Web de comercio electrónico.
    </p>
    <?= section_media([
      "src" =>
      "/assets/img/modules-1.png", "title" => "Tabla de tipos de modulos"
    ]); ?>
    <?= section_media([
      "src" =>
      "/assets/img/modules-2.png", "title" => "Tabla de entradas y salidas"
    ]); ?>

  </div>
</section>

<div class="section__links">
  <a href="/" class="section__link">
    &larr; Introducci&oacute;n
  </a>
  <a href="/pages/articles.php" class="section__link">
    Referencias &rarr;
  </a>
</div>

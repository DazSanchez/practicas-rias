<? require_once(__DIR__."/../components/article.php"); ?>

<section class="section">
  <h1 class="section__title">
    Art&iacute;culos de inter&eacute;s
  </h1>

  <?= open_article([
    "title" => "Ampliaci&oacute;n del lenguaje de modelado de flujo de interacci&oacute;n (IFML) para el desarrollo basado en modelos de aplicaciones m&oacute;viles Front End",
    "src" => "https://www.ifml.org/wp-content/uploads/Mobile-Web-Information-Systems.jpg",
    "authors" => ["Marco Brambilla","Andrea Mauri","Eric Umuhoza"],
    "download_url" => "https://www.slideshare.net/mbrambil/mobile-extensions-for-omgs-ifml-modeling-language-at-mobiwis"
  ]); ?>
    <p class="article__paragraph">
      El dise&ntilde;o front-end de aplicaciones m&oacute;viles es una tarea compleja y
      multidisciplinaria, donde se cruzan muchas perspectivas y la experiencia del
      usuario debe adaptarse perfectamente a los objetivos de la aplicaci&oacute;n. Sin
      embargo, el desarrollo de las interacciones de los usuarios m&oacute;viles sigue
      siendo en gran medida una tarea manual, que genera altos riesgos de errores,
      inconsistencias e ineficiencias. En este art&iacute;culo, proponemos un enfoque
      basado en modelos para el desarrollo de aplicaciones m&oacute;viles basado en el
      est&aacute;ndar IFML. Proponemos una extensi&oacute;n del Lenguaje de modelado de flujo de
      interacci&oacute;n adaptado a aplicaciones m&oacute;viles y describimos nuestra
      experiencia de implementaci&oacute;n que comprende el desarrollo de generadores de
      c&oacute;digo autom&aacute;ticos para aplicaciones m&oacute;viles multiplataforma basadas en
      HTML5, CSS y JavaScript optimizados para el marco Apache Cordova. Mostramos
      el enfoque en el trabajo en una aplicaci&oacute;n m&oacute;vil popular, informamos sobre
      la aplicaci&oacute;n del enfoque en un proyecto de desarrollo de aplicaciones
      industriales y proporcionamos una comparaci&oacute;n de productividad con los
      enfoques tradicionales.
    </p>
  <?= close_article(); ?>

  <?= open_article([
    "title" => "Quince a&ntilde;os de desarrollo basado en modelos industriales en software front-end: de WebML a WebRatio e IFML",
    "src" => "https://www.ifml.org/wp-content/uploads/ifml-15-years-history.png",
    "authors" => ["Marco Brambilla","Stefano Butti"]
  ]); ?>
    <p class="article__paragraph">
      Este documento t&eacute;cnico analiza la historia detr&aacute;s del IFML est&aacute;ndar,
      recientemente adoptado por el Object Management Group. Muestra c&oacute;mo la
      propuesta inicial llamada WebML ha sido una incubadora para la investigaci&oacute;n
      y la explotaci&oacute;n industrial en el modelado conceptual, explotando las
      experiencias existentes en el campo y abordando continuamente nuevos
      desaf&iacute;os relacionados con abstracciones, m&eacute;todos, herramientas y
      tecnolog&iacute;as. Resume la esencia del enfoque y muestra la herramienta de
      modelado de soporte WebRatio en funcionamiento.
    </p>
  <?= close_article(); ?>

  <?= open_article([
    "title" => "IFML: creaci&oacute;n del front-end de aplicaciones web y m&oacute;viles con el lenguaje de modelado de flujo de interacci&oacute;n de OMG",
    "authors" => ["Marco Brambilla"],
    "download_url" => "https://www.slideshare.net/mbrambil/ifml-interaction-flow-modeling-language-tutorial-ui-ux-modeling-design-icwe-2014-object-management-group-by-marco-brambilla"
  ]); ?>
    <p class="article__paragraph">
      Este tutorial se centra en el Lenguaje espec&iacute;fico de dominio (DSL) llamado
      IFML, que fue adoptado como est&aacute;ndar por OMG en marzo de 2013. El Lenguaje
      de modelado de flujo de interacci&oacute;n (IFML) est&aacute; dise&ntilde;ado para expresar
      contenido, la interacci&oacute;n del usuario y el comportamiento de control del
      frente -final de aplicaciones de software, as&iacute; como el enlace a las capas de
      persistencia y l&oacute;gica de negocios. IFML es la pieza que falta para modelar
      el front-end de las aplicaciones de software y complementa perfectamente
      otras dimensiones de modelado en proyectos de modelado de sistemas amplios.
      Por lo tanto, IFML funciona mejor cuando se integra con otros lenguajes de
      modelado en la suite MDA, como UML y BPMN. Este tutorial ilustra los
      conceptos b&aacute;sicos de IFML, presenta las mejores pr&aacute;cticas de dise&ntilde;o y la
      integraci&oacute;n con otros lenguajes de modelado, y discute algunas experiencias
      industriales (tambi&eacute;n con medidas cuantitativas de productividad) logradas
      por la herramienta complementaria WebRatio. Al final del tutorial, los
      asistentes obtendr&aacute;n un conocimiento general sobre IFML (podr&aacute;n dise&ntilde;ar
      modelos simples y derivar modelos de interfaces existentes), podr&aacute;n asociar
      el dise&ntilde;o front-end con el modelado del sistema en general, ver&aacute;n la
      herramienta MDE asociada WebRatio en funcionamiento, y tendr&aacute; una idea de
      las aplicaciones industriales de la vida real desarrolladas para grandes
      empresas. Esto les permitir&aacute; apreciar las ventajas de un enfoque de
      desarrollo basado en modelos en el trabajo dentro de proyectos industriales
      a gran escala.
    </p>
  <?= close_article(); ?>

  <h2 class="section__subtitle">
    Otros art&iacute;culos:
  </h2>

  <div class="section__content">
    <?= article_reference_list([
      "articles" => [
        [
          "authors" => ["Andrea Salini","Ivano Malavolta","Fabrizio Rossi"],
          "title" => "Leveraging Web Analytics for Automatically Generating Mobile Navigation Models",
          "url" => "https://ieeexplore.ieee.org/abstract/document/7787061/",
          "source" => "Mobile Services 2016"
        ],
        [
          "authors" => ["R Acerbis","A Bongio","S Butti","M Brambilla."],
          "title" => "Model-driven development of cross-platform mobile applications with WebRatio and IFML",
          "url" => "https://dl.acm.org/doi/10.5555/2825041.2825090",
          "source" => "MobileSoft 2015"
        ],
        [
          "authors" => [
            "Roberto Rodriguez-Echeverria",
            "Victor M. Pav&oacute;n",
            "Fernando Mac&iacute;as",
            "Jose Maria Conejero",
            "Pedro J. Clemente",
            "Fernando S&aacute;nchez-Figueroa"
          ],
          "title" => "IFML-based Model-Driven Front-End Modernization",
          "url" => "https://ieeexplore.ieee.org/abstract/document/7787061/",
          "source" => "ISD 2014"
        ],
        [
          "authors" => ["C Bernaschina","M Brambilla","T Koka","A Mauri","E. Umuhoza"],
          "title" => "Integrating Modeling Languages and Web Logs for Enhanced User Behavior Analytics",
          "url" => "https://dl.acm.org/doi/10.1145/3041021.3054734",
          "source" => "WWW 2017"
        ],
      ]
    ]);?>
  </div>


  <div class="section__links">
    <a href="/pages/elements.php" class="section__link">
      &larr; Elementos de IFML
    </a>
  </div>
</section>

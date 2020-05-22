<? require_once("templates/components/youtube_video.php"); ?>

<section class="section">
  <h1 class="section__title">Introducci&oacute;n</h1>
  <div class="section__content">
    <p class="section__paragraph">
      Las aplicaciones cliente/servidor trabajan bajo el principio de “divide y
      vencer&aacute;s”, es decir, la funcionalidad de la aplicaci&oacute;n se
      ejecuta en dos lugares diferentes, por lo general el cliente representa la
      parte que interact&uacute;a con el usuario e incluye una interfaz
      gr&aacute;fica, considerando “cliente ligero” a aqu&eacute;l que
      s&oacute;lo incluye la presentaci&oacute;n de informaci&oacute;n y un
      m&iacute;nimo de validaciones y “cliente pesado” a aqu&eacute;l que
      adem&aacute;s de eso implementa alg&uacute;n tipo de l&oacute;gica de
      negocio y/o provee una interfaz gr&aacute;fica con mayor riqueza; por su
      parte, en el servidor se realizan los procesos m&aacute;s fuertes de
      c&aacute;lculo, b&uacute;squeda y/o implementaci&oacute;n de reglas de
      negocio.
    </p>
    <p class="section__paragraph">
      Las aplicaciones Web son un tipo especial de aplicaciones
      cliente/servidor. El cliente lo constituye un visualizador Web instalado
      en una computadora de escritorio, en una laptop o en dispositivo
      m&oacute;vil como tablet o tel&eacute;fono inteligente, en tanto que el
      servidor com&uacute;nmente se encuentra en un espacio f&iacute;sico
      distante y lo constituye al menos un equipo; la comunicaci&oacute;n entre
      el cliente y el servidor se realiza generalmente mediante los protocolos
      HTTP, TCP/IP y otros (Shklar, 2003).
    </p>
    <p class="section__paragraph">
      Las aplicaciones Web tradicionales cuentan con clientes ligeros, ya que
      por cuestiones de seguridad los visualizadores se implementaron evitando
      casi cualquier acceso a los recursos del equipo cliente como son disco
      duro y perif&eacute;ricos; sin embargo, a medida que los equipos
      aumentaron sus capacidades de c&oacute;mputo, los visualizadores
      incrementaron tambi&eacute;n sus posibilidades de acci&oacute;n, con la
      implementaci&oacute;n de funcionalidades muy comunes en aplicaciones de
      escritorio pero inexistentes en la mayor&iacute;a de los visualizadores
      hasta 2008 aproximadamente, lo que abri&oacute; la posibilidad de contar
      con clientes pesados en las aplicaciones Web, tanto en lo concerniente a
      funcionalidad como en lo relacionado a la riqueza de las interfaces
      gr&aacute;ficas de usuario disponibles, dando origen a un nuevo tipo de
      aplicaciones Web: las aplicaciones enriquecidas de Internet o RIAs por su
      siglas en ingl&eacute;s.
    </p>
    <p class="section__paragraph">
      En el caso de las aplicaciones Web tradicionales generalmente se manejaban
      como lenguajes en el cliente HTML, CSS y JavaScript, mientras que del lado
      del servidor se utilizaban tecnolog&iacute;as como PHP o Java (JSP y/o
      Servlets o bien marcos de trabajo como JSF o Struts) o ASP.NET o Python o
      Perl entre otros muchos; si, adem&aacute;s, la aplicaci&oacute;n
      requer&iacute;a almacenar informaci&oacute;n en una base de datos,
      tambi&eacute;n era posible combinar PostgreSQL o MySQL o SQLServer u
      Oracle o Informix o incluso obtener informaci&oacute;n de otros sistemas
      mediante la invocaci&oacute;n de servicios Web.
    </p>
    <p class="section__paragraph">
      En el caso de las RIAs, tambi&eacute;n intervienen en el lado del cliente
      XML, XHTML, JSON y una adecuaci&oacute;n de HTTP, XMLHttpRequest, que
      permite la solicitud y respuesta parcial de p&aacute;ginas (Dong, 2011).
      Por todas las complejidades que implican las aplicaciones Web
      tradicionales y las RIAs, al hacer uso de muy diversos lenguajes y/o
      marcos de trabajo y de muy diversas capacidades, se hace indispensable el
      uso de t&eacute;cnicas de Ingenier&iacute;a de Software para asegurar que
      las aplicaciones cumplen con las expectativas del usuario (Laaz, 2016).
    </p>
    <p class="section__paragraph">
      Vea la entrevista en video con el presidente y CEO de OMG, Richard Soley,
      sobre c&oacute;mo modelar la interacci&oacute;n del usuario con IFML:
    </p>

    <?= youtube_video(["src" => "https://www.youtube.com/embed/ZT1Z0zOrOc4"]); ?>
    
  </div>
  <div class="section__links">
    <span></span>
    <a href="/pages/elements.php" class="section__link">
      Elementos principales de IFML &rarr;
    </a>
  </div>
</section>

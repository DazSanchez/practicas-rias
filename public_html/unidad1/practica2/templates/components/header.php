<?
    require_once("navbar.php");

    $page_navigation = [
        ["url" => "/", "content" => "Inicio"],
        ["url" => "/pages/elements.php", "content" => "Elementos"],
        ["url" => "/pages/articles.php", "content" => "Referencias"]
    ];

    function page_header($props = []) { ob_start(); 
        global $page_navigation; ?>
        
        <div class="top-container">
            <div class="header__container">
                <header class="header">
                    <img class="header__ito-logo" src="/assets/img/ito-logo.png" alt="ITO Logo">
                    <img class="header__ifml-logo" src="/assets/img/ifml-logo.png" alt="IFML Logo">
                    <h1 class="header__title">
                        Lenguage de Modelado de Flujo de Interacci&oacute;n
                    </h1>
                </header>
            </div>
            <?= page_navbar(["navigation" => $page_navigation]); ?>
        </div>
        <? return ob_get_clean();
    }
?>
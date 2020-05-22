<?
    require_once(__DIR__."/components/header.php");
    require_once(__DIR__."/components/footer.php");

    function open_page_layout($props = []) { ob_start(); ?>
        <!DOCTYPE html>
        <html lang="es-MX">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?= $props["title"]; ?></title>
            <link rel="stylesheet" href="/assets/css/index.css?cb=<?= time(); ?>">
        </head>
        <body>
            <?= page_header(); ?>
            <div class="page-container">
                <? require_once(__DIR__."/content/ads/side-ad.html"); ?>
                <main class="main">
        <? return ob_get_clean();
    }

    function close_page_layout() { ob_start(); ?>
                </main>
            </div>
            <? require_once(__DIR__."/content/ads/bottom-ad.html"); ?>
            <?= page_footer(); ?>
        </body>
        </html>
        <? return ob_get_clean();
    }
?>
<?
    function section_media($props = []) { ob_start(); ?>
        <figure class="section__media">
            <img src="<?= $props["src"] ?>" alt="<?= $props["title"] ?>" />
            <figcaption>
                <?= $props["title"] ?>
            </figcaption>
        </figure>
        <? return ob_get_clean();
    }
?>
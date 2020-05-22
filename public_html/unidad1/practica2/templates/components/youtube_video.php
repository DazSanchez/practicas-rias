<?
    function youtube_video($props = []) { ob_start(); ?>
        <div class="media__container">
            <iframe
                class="media"
                src="<?= $props["src"]; ?>"
                frameborder="0"
                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen
            ></iframe>
        </div>
        <? return ob_get_clean();
    }
?>
<?
    function _is_link_active($url) {
        $current_url = $_SERVER["REQUEST_URI"];
        return  $url == $current_url ? "active" : "";
    }

    function _navbar_link($props = []) { ob_start();
        $is_active = _is_link_active($props["url"]); ?>
        <a class="navbar__link <?= $is_active ?>" href="<?= $props["url"]?>">
            <?= $props["content"]; ?>
        </a>
        <? return ob_get_clean();
    }

    function page_navbar($props = []) { ob_start();?>
        <div class="navbar__container">
            <nav class="navbar">
                <? foreach ($props["navigation"] as $index => $link): ?>
                    <?= _navbar_link($link);?>
                <? endforeach; ?>
            </nav>
        </div>
        <? return ob_get_clean();
    }
?>
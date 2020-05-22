<?
    require_once("../helpers/clean.php");

    function open_article($props = []) { ob_start(); ?>
        <article class="article">
            <header class="article__header">
                <? if(isset($props["src"])): ?>
                    <div class="article__img">
                        <img src="<?= $props["src"]; ?>" alt="<?= $props["title"]; ?>">
                    </div>
                <? endif; ?>
                <div class="article__info">
                    <h2 class="article__title">
                        <?= $props["title"]; ?>
                    </h2>
                    <p class="article__authors">
                        <strong><?= join(",", $props["authors"]); ?></strong>
                    </p>
                    <? if(isset($props["download_url"])): ?>
                        <a href="<?= $props["dowload_url"]; ?>" class="article__download">
                            Descargue las diapositivas aqu&iacute;
                        </a>
                    <? endif; ?>
                </div>
            </header>
            <div class="article__content">
        <?return ob_get_clean();
    }
    
    function close_article() { ob_start(); ?>
            </div>
        </article>
        <hr class="article__rule" />
        <? return ob_get_clean();
    }

    function _article_reference($props = []) { ob_start(); ?>
        <li class="article__reference">
            <?= join(",", $props["authors"]); ?>.
            <a href="<?= $props["url"]; ?>"><?= $props["title"]; ?></a>.
            <?= $props["source"]; ?>
        </li>
        <? return clean_output(ob_get_clean());
    }

    function article_reference_list($props = []) { ob_start(); ?>
        <ul class="article__reference-list">
            <? foreach($props["articles"] as $index => $article):?>
                <?= _article_reference($article); ?>
            <? endforeach;?>
        </ul>
        <? return ob_get_clean();
    }
?>
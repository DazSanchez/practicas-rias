<?
    function page_footer($props = []) { ob_start(); ?>
        <footer class="footer">
            <p class="footer__copy">
                Todos los derechos reservados. Hugo S&aacute;nchez Vel&aacute;zquez &copy; 2020.
            </p>
        </footer>
        <? return ob_get_clean();
    }
?>
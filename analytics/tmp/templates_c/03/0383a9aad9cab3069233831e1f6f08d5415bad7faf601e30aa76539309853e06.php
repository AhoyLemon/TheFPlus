<?php

/* @CoreHome/_adblockDetect.twig */
class __TwigTemplate_628ce925f9bfaad6a0d7603c6670f33c5619f408e22110bccb109f8439011f5b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div id=\"bottomAd\" style=\"font-size: 2px;\">&nbsp;</div>
<script type=\"text/javascript\">
    if ('undefined' === (typeof hasBlockedContent) || hasBlockedContent !== false) {
        ";
        // line 5
        echo "        (function () {
            ";
        // line 7
        echo "            var body = document.getElementsByTagName('body');

            if (!body || !body[0]) {
                return;
            }

            var bottomAd = document.getElementById('bottomAd');
            var wasMostLikelyCausedByAdblock = false;

            if (!bottomAd) {
                wasMostLikelyCausedByAdblock = true;
            } else if (bottomAd.style && bottomAd.style.display === 'none') {
                wasMostLikelyCausedByAdblock = true;
            } else if ('undefined' !== (typeof bottomAd.clientHeight) && bottomAd.clientHeight === 0) {
                wasMostLikelyCausedByAdblock = true;
            }

            if (wasMostLikelyCausedByAdblock) {
                var warning = document.createElement('h3');
                warning.innerHTML = '";
        // line 26
        echo \Piwik\piwik_escape_filter($this->env, \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_AdblockIsMaybeUsed")), "js"), "html", null, true);
        echo "';

                body[0].appendChild(warning);
                warning.style.color = 'red';
                warning.style.fontWeight = 'bold';
                warning.style.marginLeft = '16px';
                warning.style.marginBottom = '16px';
            }
        })();
    }
</script>";
    }

    public function getTemplateName()
    {
        return "@CoreHome/_adblockDetect.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 26,  27 => 7,  24 => 5,  19 => 1,);
    }

    public function getSource()
    {
        return "<div id=\"bottomAd\" style=\"font-size: 2px;\">&nbsp;</div>
<script type=\"text/javascript\">
    if ('undefined' === (typeof hasBlockedContent) || hasBlockedContent !== false) {
        {# if hasBlockedContent was \"false\" most likely nothing was blocked #}
        (function () {
            {# most likely jQuery is not available, have to use vanilla JS here #}
            var body = document.getElementsByTagName('body');

            if (!body || !body[0]) {
                return;
            }

            var bottomAd = document.getElementById('bottomAd');
            var wasMostLikelyCausedByAdblock = false;

            if (!bottomAd) {
                wasMostLikelyCausedByAdblock = true;
            } else if (bottomAd.style && bottomAd.style.display === 'none') {
                wasMostLikelyCausedByAdblock = true;
            } else if ('undefined' !== (typeof bottomAd.clientHeight) && bottomAd.clientHeight === 0) {
                wasMostLikelyCausedByAdblock = true;
            }

            if (wasMostLikelyCausedByAdblock) {
                var warning = document.createElement('h3');
                warning.innerHTML = '{{ 'CoreHome_AdblockIsMaybeUsed'|translate|e('js') }}';

                body[0].appendChild(warning);
                warning.style.color = 'red';
                warning.style.fontWeight = 'bold';
                warning.style.marginLeft = '16px';
                warning.style.marginBottom = '16px';
            }
        })();
    }
</script>";
    }
}

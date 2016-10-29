<?php

/* @Morpheus/javascriptCode.twig */
class __TwigTemplate_f08ed9efac927520a6c32343bcfa5f87d6bbfe2ef002e6d1cd80fd8ce468e35b extends Twig_Template
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
        echo "<!-- Piwik -->
<script type=\"text/javascript\">
  var _paq = _paq || [];
{\$options}  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    {\$setTrackerUrl}
    {\$optionsBeforeTrackerUrl}_paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', '{\$idSite}']);
    ";
        // line 10
        if ((isset($context["loadAsync"]) ? $context["loadAsync"] : $this->getContext($context, "loadAsync"))) {
            echo "var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);";
        }
        // line 12
        echo "
  })();
</script>
";
        // line 15
        if ( !(isset($context["loadAsync"]) ? $context["loadAsync"] : $this->getContext($context, "loadAsync"))) {
            echo "<script type='text/javascript' src=\"{\$protocol}{\$piwikUrl}/piwik.js\">
";
        }
        // line 17
        echo "<noscript><p><img src=\"{\$protocol}{\$piwikUrl}/piwik.php?idsite={\$idSite}\" style=\"border:0;\" alt=\"\" /></p></noscript>
<!-- End Piwik Code -->
";
    }

    public function getTemplateName()
    {
        return "@Morpheus/javascriptCode.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 17,  40 => 15,  35 => 12,  30 => 10,  19 => 1,);
    }

    public function getSource()
    {
        return "<!-- Piwik -->
<script type=\"text/javascript\">
  var _paq = _paq || [];
{\$options}  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    {\$setTrackerUrl}
    {\$optionsBeforeTrackerUrl}_paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', '{\$idSite}']);
    {% if loadAsync %}var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);{% endif %}

  })();
</script>
{% if not loadAsync %}<script type='text/javascript' src=\"{\$protocol}{\$piwikUrl}/piwik.js\">
{% endif %}
<noscript><p><img src=\"{\$protocol}{\$piwikUrl}/piwik.php?idsite={\$idSite}\" style=\"border:0;\" alt=\"\" /></p></noscript>
<!-- End Piwik Code -->
";
    }
}

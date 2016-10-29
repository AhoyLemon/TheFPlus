<?php

/* layout.twig */
class __TwigTemplate_5af494118bc700ba576894d1ecb07c0e693896b813bb389bd911f09f8efa9027 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'pageTitle' => array($this, 'block_pageTitle'),
            'pageDescription' => array($this, 'block_pageDescription'),
            'meta' => array($this, 'block_meta'),
            'body' => array($this, 'block_body'),
            'root' => array($this, 'block_root'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html id=\"ng-app\" ";
        // line 2
        if (array_key_exists("language", $context)) {
            echo "lang=\"";
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["language"]) ? $context["language"] : $this->getContext($context, "language")), "html", null, true);
            echo "\"";
        }
        echo " ng-app=\"piwikApp\">
    <head>
        ";
        // line 4
        $this->displayBlock('head', $context, $blocks);
        // line 33
        echo "    </head>
    <!--[if lt IE 9 ]>
    <body id=\"";
        // line 35
        echo \Piwik\piwik_escape_filter($this->env, ((array_key_exists("bodyId", $context)) ? (_twig_default_filter((isset($context["bodyId"]) ? $context["bodyId"] : $this->getContext($context, "bodyId")), "")) : ("")), "html", null, true);
        echo "\" ng-app=\"app\" class=\"old-ie ";
        echo \Piwik\piwik_escape_filter($this->env, ((array_key_exists("bodyClass", $context)) ? (_twig_default_filter((isset($context["bodyClass"]) ? $context["bodyClass"] : $this->getContext($context, "bodyClass")), "")) : ("")), "html", null, true);
        echo "\">
    <![endif]-->
    <!--[if (gte IE 9)|!(IE)]><!-->
    <body id=\"";
        // line 38
        echo \Piwik\piwik_escape_filter($this->env, ((array_key_exists("bodyId", $context)) ? (_twig_default_filter((isset($context["bodyId"]) ? $context["bodyId"] : $this->getContext($context, "bodyId")), "")) : ("")), "html", null, true);
        echo "\" ng-app=\"app\" class=\"";
        echo \Piwik\piwik_escape_filter($this->env, ((array_key_exists("bodyClass", $context)) ? (_twig_default_filter((isset($context["bodyClass"]) ? $context["bodyClass"] : $this->getContext($context, "bodyClass")), "")) : ("")), "html", null, true);
        echo "\">
    <!--<![endif]-->

    ";
        // line 41
        $this->displayBlock('body', $context, $blocks);
        // line 52
        echo "
        ";
        // line 53
        $this->loadTemplate("@CoreHome/_adblockDetect.twig", "layout.twig", 53)->display($context);
        // line 54
        echo "    </body>
</html>
";
    }

    // line 4
    public function block_head($context, array $blocks = array())
    {
        // line 5
        echo "            <meta charset=\"utf-8\">
            <title>";
        // line 7
        $this->displayBlock('pageTitle', $context, $blocks);
        // line 12
        echo "</title>
            <meta http-equiv=\"X-UA-Compatible\" content=\"IE=EDGE,chrome=1\"/>
            <meta name=\"viewport\" content=\"initial-scale=1.0\"/>
            <meta name=\"generator\" content=\"Piwik - free/libre analytics platform\"/>
            <meta name=\"description\" content=\"";
        // line 16
        $this->displayBlock('pageDescription', $context, $blocks);
        echo "\"/>
            <meta name=\"apple-itunes-app\" content=\"app-id=737216887\" />
            <meta name=\"google-play-app\" content=\"app-id=org.piwik.mobile2\">
            ";
        // line 19
        $this->displayBlock('meta', $context, $blocks);
        // line 22
        echo "
            ";
        // line 23
        $this->loadTemplate("@CoreHome/_favicon.twig", "layout.twig", 23)->display($context);
        // line 24
        echo "            ";
        $this->loadTemplate("_jsGlobalVariables.twig", "layout.twig", 24)->display($context);
        // line 25
        echo "            ";
        $this->loadTemplate("_jsCssIncludes.twig", "layout.twig", 25)->display($context);
        // line 27
        if ( !(isset($context["isCustomLogo"]) ? $context["isCustomLogo"] : $this->getContext($context, "isCustomLogo"))) {
            echo "<link rel=\"manifest\" href=\"plugins/CoreHome/javascripts/manifest.json\">";
        }
        // line 28
        echo "
            <!--[if IE]>
            <link rel=\"stylesheet\" type=\"text/css\" href=\"plugins/Morpheus/stylesheets/ieonly.css\"/>
            <![endif]-->
        ";
    }

    // line 7
    public function block_pageTitle($context, array $blocks = array())
    {
        // line 8
        if (array_key_exists("title", $context)) {
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")), "html", null, true);
            echo " - ";
        }
        // line 9
        if (array_key_exists("categoryTitle", $context)) {
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["categoryTitle"]) ? $context["categoryTitle"] : $this->getContext($context, "categoryTitle")), "html", null, true);
            echo " - ";
        }
        // line 10
        if ( !(isset($context["isCustomLogo"]) ? $context["isCustomLogo"] : $this->getContext($context, "isCustomLogo"))) {
            echo "Piwik";
        }
    }

    // line 16
    public function block_pageDescription($context, array $blocks = array())
    {
    }

    // line 19
    public function block_meta($context, array $blocks = array())
    {
        // line 20
        echo "                <meta name=\"robots\" content=\"noindex,nofollow\">
            ";
    }

    // line 41
    public function block_body($context, array $blocks = array())
    {
        // line 42
        echo "
        ";
        // line 43
        $this->loadTemplate("_iframeBuster.twig", "layout.twig", 43)->display($context);
        // line 44
        echo "        ";
        $this->loadTemplate("@CoreHome/_javaScriptDisabled.twig", "layout.twig", 44)->display($context);
        // line 45
        echo "
        <div id=\"root\">
            ";
        // line 47
        $this->displayBlock('root', $context, $blocks);
        // line 49
        echo "        </div>

    ";
    }

    // line 47
    public function block_root($context, array $blocks = array())
    {
        // line 48
        echo "            ";
    }

    public function getTemplateName()
    {
        return "layout.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  175 => 48,  172 => 47,  166 => 49,  164 => 47,  160 => 45,  157 => 44,  155 => 43,  152 => 42,  149 => 41,  144 => 20,  141 => 19,  136 => 16,  130 => 10,  125 => 9,  120 => 8,  117 => 7,  109 => 28,  105 => 27,  102 => 25,  99 => 24,  97 => 23,  94 => 22,  92 => 19,  86 => 16,  80 => 12,  78 => 7,  75 => 5,  72 => 4,  66 => 54,  64 => 53,  61 => 52,  59 => 41,  51 => 38,  43 => 35,  39 => 33,  37 => 4,  28 => 2,  25 => 1,);
    }

    public function getSource()
    {
        return "<!DOCTYPE html>
<html id=\"ng-app\" {% if language is defined %}lang=\"{{ language }}\"{% endif %} ng-app=\"piwikApp\">
    <head>
        {% block head %}
            <meta charset=\"utf-8\">
            <title>
                {%- block pageTitle -%}
                    {%- if title is defined %}{{ title }} - {% endif %}
                    {%- if categoryTitle is defined %}{{ categoryTitle }} - {% endif %}
                    {%- if not isCustomLogo %}Piwik{% endif %}
                {%- endblock -%}
            </title>
            <meta http-equiv=\"X-UA-Compatible\" content=\"IE=EDGE,chrome=1\"/>
            <meta name=\"viewport\" content=\"initial-scale=1.0\"/>
            <meta name=\"generator\" content=\"Piwik - free/libre analytics platform\"/>
            <meta name=\"description\" content=\"{% block pageDescription %}{% endblock %}\"/>
            <meta name=\"apple-itunes-app\" content=\"app-id=737216887\" />
            <meta name=\"google-play-app\" content=\"app-id=org.piwik.mobile2\">
            {% block meta %}
                <meta name=\"robots\" content=\"noindex,nofollow\">
            {% endblock %}

            {% include \"@CoreHome/_favicon.twig\" %}
            {% include \"_jsGlobalVariables.twig\" %}
            {% include \"_jsCssIncludes.twig\" %}

            {%- if not isCustomLogo %}<link rel=\"manifest\" href=\"plugins/CoreHome/javascripts/manifest.json\">{% endif %}

            <!--[if IE]>
            <link rel=\"stylesheet\" type=\"text/css\" href=\"plugins/Morpheus/stylesheets/ieonly.css\"/>
            <![endif]-->
        {% endblock %}
    </head>
    <!--[if lt IE 9 ]>
    <body id=\"{{ bodyId|default('') }}\" ng-app=\"app\" class=\"old-ie {{ bodyClass|default('') }}\">
    <![endif]-->
    <!--[if (gte IE 9)|!(IE)]><!-->
    <body id=\"{{ bodyId|default('') }}\" ng-app=\"app\" class=\"{{ bodyClass|default('') }}\">
    <!--<![endif]-->

    {% block body %}

        {% include \"_iframeBuster.twig\" %}
        {% include \"@CoreHome/_javaScriptDisabled.twig\" %}

        <div id=\"root\">
            {% block root %}
            {% endblock %}
        </div>

    {% endblock %}

        {% include \"@CoreHome/_adblockDetect.twig\" %}
    </body>
</html>
";
    }
}

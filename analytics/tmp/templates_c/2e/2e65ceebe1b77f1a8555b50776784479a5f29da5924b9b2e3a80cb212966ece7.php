<?php

/* @CoreHome/_logo.twig */
class __TwigTemplate_b71ff555a20ff9217615a3287aef11c7617724424957d6bf59bf74e8a0a127d0 extends Twig_Template
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
        echo "<span id=\"logo\">
    <a href=\"index.php\" tabindex=\"-1\" title=\"";
        // line 2
        if ((isset($context["isCustomLogo"]) ? $context["isCustomLogo"] : $this->getContext($context, "isCustomLogo"))) {
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_PoweredBy")), "html", null, true);
            echo " ";
        }
        echo "Piwik # ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_OpenSourceWebAnalytics")), "html", null, true);
        echo "\">
    ";
        // line 3
        if ((isset($context["hasSVGLogo"]) ? $context["hasSVGLogo"] : $this->getContext($context, "hasSVGLogo"))) {
            // line 4
            echo "        <img src='";
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["logoSVG"]) ? $context["logoSVG"] : $this->getContext($context, "logoSVG")), "html", null, true);
            echo "' tabindex=\"3\"  alt=\"";
            if ((isset($context["isCustomLogo"]) ? $context["isCustomLogo"] : $this->getContext($context, "isCustomLogo"))) {
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_PoweredBy")), "html", null, true);
                echo " ";
            }
            echo "Piwik\" class=\"ie-hide ";
            if ( !(isset($context["isCustomLogo"]) ? $context["isCustomLogo"] : $this->getContext($context, "isCustomLogo"))) {
                echo "default-piwik-logo";
            }
            echo "\" />
        <!--[if lt IE 9]>
    ";
        }
        // line 7
        echo "        <img src='";
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["logoHeader"]) ? $context["logoHeader"] : $this->getContext($context, "logoHeader")), "html", null, true);
        echo "' alt=\"";
        if ((isset($context["isCustomLogo"]) ? $context["isCustomLogo"] : $this->getContext($context, "isCustomLogo"))) {
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_PoweredBy")), "html", null, true);
            echo " ";
        }
        echo "Piwik\" />
    ";
        // line 8
        if ((isset($context["hasSVGLogo"]) ? $context["hasSVGLogo"] : $this->getContext($context, "hasSVGLogo"))) {
            echo "<![endif]-->";
        }
        // line 9
        echo "</a>
</span>
";
    }

    public function getTemplateName()
    {
        return "@CoreHome/_logo.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 9,  59 => 8,  49 => 7,  33 => 4,  31 => 3,  22 => 2,  19 => 1,);
    }

    public function getSource()
    {
        return "<span id=\"logo\">
    <a href=\"index.php\" tabindex=\"-1\" title=\"{% if isCustomLogo %}{{ 'General_PoweredBy'|translate }} {% endif %}Piwik # {{ 'General_OpenSourceWebAnalytics'|translate }}\">
    {% if hasSVGLogo %}
        <img src='{{ logoSVG }}' tabindex=\"3\"  alt=\"{% if isCustomLogo %}{{ 'General_PoweredBy'|translate }} {% endif %}Piwik\" class=\"ie-hide {% if not isCustomLogo %}default-piwik-logo{% endif %}\" />
        <!--[if lt IE 9]>
    {% endif %}
        <img src='{{ logoHeader }}' alt=\"{% if isCustomLogo %}{{ 'General_PoweredBy'|translate }} {% endif %}Piwik\" />
    {% if hasSVGLogo %}<![endif]-->{% endif %}
</a>
</span>
";
    }
}

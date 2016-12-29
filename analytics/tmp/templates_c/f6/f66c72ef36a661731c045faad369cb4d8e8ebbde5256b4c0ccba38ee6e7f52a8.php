<?php

/* @CoreHome/_warningInvalidHost.twig */
class __TwigTemplate_cf52d19451a4641af474b1f2cf0aeb6a39c2e6af2761c5ffc3114f750911c9e3 extends Twig_Template
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
        // line 2
        if (((array_key_exists("isValidHost", $context) && array_key_exists("invalidHostMessage", $context)) && ((isset($context["isValidHost"]) ? $context["isValidHost"] : $this->getContext($context, "isValidHost")) == false))) {
            // line 3
            echo "    ";
            ob_start();
            // line 4
            echo "        <a class=\"btn btn-link\" style=\"float:right;\" href=\"http://piwik.org/faq/troubleshooting/#faq_171\" rel=\"noreferrer\" target=\"_blank\">
            <span class=\"icon-help\"></span>
            ";
            // line 6
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Help")), "html", null, true);
            echo "
        </a>
        <strong>";
            // line 8
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Warning")), "html", null, true);
            echo ":&nbsp;</strong>";
            echo (isset($context["invalidHostMessage"]) ? $context["invalidHostMessage"] : $this->getContext($context, "invalidHostMessage"));
            echo "

        <br>
        <br>

        ";
            // line 13
            echo (isset($context["invalidHostMessageHowToFix"]) ? $context["invalidHostMessageHowToFix"] : $this->getContext($context, "invalidHostMessageHowToFix"));
            echo "
    ";
            $context["invalidHostText"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 15
            echo "
    <div style=\"clear:both;width:800px;\">
        ";
            // line 17
            echo call_user_func_array($this->env->getFilter('notification')->getCallable(), array((isset($context["invalidHostText"]) ? $context["invalidHostText"] : $this->getContext($context, "invalidHostText")), array("noclear" => true, "raw" => true, "context" => "warning")));
            echo "
    </div>

";
        }
        // line 21
        echo "
";
    }

    public function getTemplateName()
    {
        return "@CoreHome/_warningInvalidHost.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 21,  52 => 17,  48 => 15,  43 => 13,  33 => 8,  28 => 6,  24 => 4,  21 => 3,  19 => 2,);
    }

    public function getSource()
    {
        return "{# untrusted host warning #}
{% if (isValidHost is defined and invalidHostMessage is defined and isValidHost == false) %}
    {% set invalidHostText %}
        <a class=\"btn btn-link\" style=\"float:right;\" href=\"http://piwik.org/faq/troubleshooting/#faq_171\" rel=\"noreferrer\" target=\"_blank\">
            <span class=\"icon-help\"></span>
            {{ 'General_Help'|translate }}
        </a>
        <strong>{{ 'General_Warning'|translate }}:&nbsp;</strong>{{ invalidHostMessage|raw }}

        <br>
        <br>

        {{ invalidHostMessageHowToFix|raw }}
    {% endset %}

    <div style=\"clear:both;width:800px;\">
        {{ invalidHostText|notification({'noclear': true, 'raw': true, 'context': 'warning'}) }}
    </div>

{% endif %}

";
    }
}

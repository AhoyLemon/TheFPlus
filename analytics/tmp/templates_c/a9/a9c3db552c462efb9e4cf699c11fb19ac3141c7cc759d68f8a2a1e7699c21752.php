<?php

/* user.twig */
class __TwigTemplate_ae7c0a7b3018d0c177bf523a65dff9295210954df7a167a7e29056797bce99f4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "user.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'root' => array($this, 'block_root'),
            'topcontrols' => array($this, 'block_topcontrols'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        ob_start();
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_Administration")), "html", null, true);
        $context["categoryTitle"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 5
        $context["bodyClass"] = call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Template.bodyClass", "admin"));
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        if ((isset($context["userIsAnonymous"]) ? $context["userIsAnonymous"] : $this->getContext($context, "userIsAnonymous"))) {
            // line 9
            echo "        ";
            $context["topMenuModule"] = "ScheduledReports";
            // line 10
            echo "        ";
            $context["topMenuAction"] = "index";
            // line 11
            echo "    ";
        } else {
            // line 12
            echo "        ";
            if (((isset($context["currentModule"]) ? $context["currentModule"] : $this->getContext($context, "currentModule")) != "Feedback")) {
                // line 13
                echo "            ";
                $context["topMenuModule"] = "UsersManager";
                // line 14
                echo "            ";
                $context["topMenuAction"] = "userSettings";
                // line 15
                echo "        ";
            }
            // line 16
            echo "    ";
        }
        // line 17
        echo "    ";
        $this->displayParentBlock("body", $context, $blocks);
        echo "
";
    }

    // line 20
    public function block_root($context, array $blocks = array())
    {
        // line 21
        echo "    ";
        $this->loadTemplate("@CoreHome/_topScreen.twig", "user.twig", 21)->display($context);
        // line 22
        echo "
    ";
        // line 23
        $context["ajax"] = $this->loadTemplate("ajaxMacros.twig", "user.twig", 23);
        // line 24
        echo "    ";
        echo $context["ajax"]->getrequestErrorDiv(((array_key_exists("emailSuperUser", $context)) ? (_twig_default_filter((isset($context["emailSuperUser"]) ? $context["emailSuperUser"] : $this->getContext($context, "emailSuperUser")), "")) : ("")), (isset($context["areAdsForProfessionalServicesEnabled"]) ? $context["areAdsForProfessionalServicesEnabled"] : $this->getContext($context, "areAdsForProfessionalServicesEnabled")), (isset($context["currentModule"]) ? $context["currentModule"] : $this->getContext($context, "currentModule")));
        echo "
    ";
        // line 25
        echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Template.beforeContent", "user", (isset($context["currentModule"]) ? $context["currentModule"] : $this->getContext($context, "currentModule"))));
        echo "

    <div class=\"page\">

        ";
        // line 29
        if (( !array_key_exists("showMenu", $context) || (isset($context["showMenu"]) ? $context["showMenu"] : $this->getContext($context, "showMenu")))) {
            // line 30
            echo "            ";
            $context["menu"] = $this->loadTemplate("@CoreHome/_menu.twig", "user.twig", 30);
            // line 31
            echo "            ";
            echo $context["menu"]->getmenu((isset($context["userMenu"]) ? $context["userMenu"] : $this->getContext($context, "userMenu")), false, "Menu--admin");
            echo "
        ";
        }
        // line 33
        echo "
        <div class=\"pageWrap\">

            <div class=\"top_controls\">
                ";
        // line 37
        $this->displayBlock('topcontrols', $context, $blocks);
        // line 39
        echo "            </div>

            <div id=\"content\" class=\"admin user\">

                ";
        // line 43
        $this->loadTemplate("@CoreHome/_notifications.twig", "user.twig", 43)->display($context);
        // line 44
        echo "
                <div class=\"ui-confirm\" id=\"alert\">
                    <h2></h2>
                    <input role=\"no\" type=\"button\" value=\"";
        // line 47
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Ok")), "html", null, true);
        echo "\"/>
                </div>

                ";
        // line 50
        $this->displayBlock('content', $context, $blocks);
        // line 52
        echo "
            </div>
        </div>
    </div>
";
    }

    // line 37
    public function block_topcontrols($context, array $blocks = array())
    {
        // line 38
        echo "                ";
    }

    // line 50
    public function block_content($context, array $blocks = array())
    {
        // line 51
        echo "                ";
    }

    public function getTemplateName()
    {
        return "user.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  156 => 51,  153 => 50,  149 => 38,  146 => 37,  138 => 52,  136 => 50,  130 => 47,  125 => 44,  123 => 43,  117 => 39,  115 => 37,  109 => 33,  103 => 31,  100 => 30,  98 => 29,  91 => 25,  86 => 24,  84 => 23,  81 => 22,  78 => 21,  75 => 20,  68 => 17,  65 => 16,  62 => 15,  59 => 14,  56 => 13,  53 => 12,  50 => 11,  47 => 10,  44 => 9,  41 => 8,  38 => 7,  34 => 1,  32 => 5,  28 => 3,  11 => 1,);
    }

    public function getSource()
    {
        return "{% extends 'layout.twig' %}

{% set categoryTitle %}{{ 'CoreAdminHome_Administration'|translate }}{% endset %}

{% set bodyClass = postEvent('Template.bodyClass', 'admin') %}

{% block body %}
    {% if userIsAnonymous %}
        {% set topMenuModule = 'ScheduledReports' %}
        {% set topMenuAction = 'index' %}
    {% else %}
        {% if currentModule != 'Feedback' %}
            {% set topMenuModule = 'UsersManager' %}
            {% set topMenuAction = 'userSettings' %}
        {% endif %}
    {% endif %}
    {{ parent() }}
{% endblock %}

{% block root %}
    {% include \"@CoreHome/_topScreen.twig\" %}

    {% import 'ajaxMacros.twig' as ajax %}
    {{ ajax.requestErrorDiv(emailSuperUser|default(''), areAdsForProfessionalServicesEnabled, currentModule) }}
    {{ postEvent(\"Template.beforeContent\", \"user\", currentModule) }}

    <div class=\"page\">

        {% if showMenu is not defined or showMenu %}
            {% import '@CoreHome/_menu.twig' as menu %}
            {{ menu.menu(userMenu, false, 'Menu--admin') }}
        {% endif %}

        <div class=\"pageWrap\">

            <div class=\"top_controls\">
                {% block topcontrols %}
                {% endblock %}
            </div>

            <div id=\"content\" class=\"admin user\">

                {% include \"@CoreHome/_notifications.twig\" %}

                <div class=\"ui-confirm\" id=\"alert\">
                    <h2></h2>
                    <input role=\"no\" type=\"button\" value=\"{{ 'General_Ok'|translate }}\"/>
                </div>

                {% block content %}
                {% endblock %}

            </div>
        </div>
    </div>
{% endblock %}
";
    }
}

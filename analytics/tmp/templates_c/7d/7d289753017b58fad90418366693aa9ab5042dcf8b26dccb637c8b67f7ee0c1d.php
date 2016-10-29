<?php

/* @Dashboard/_dashboardSettings.twig */
class __TwigTemplate_27e4ba158bd3c0c8e4d6fcaddc4cc3bb0c27a0058307097d491ff351c68c3d32 extends Twig_Template
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
        echo "<a class=\"title\" title=\"";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_ManageDashboard")), "html_attr");
        echo "\" tabindex=\"4\"><span class=\"icon icon-arrow-bottom\"></span>";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_Dashboard")), "html", null, true);
        echo " </a>
<ul class=\"dropdown submenu\">
    <li>
        <div class=\"addWidget\">";
        // line 4
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_AddAWidget")), "html", null, true);
        echo "</div>
        <ul class=\"widgetpreview-categorylist\"></ul>
    </li>
    ";
        // line 7
        if ((twig_length_filter($this->env, (isset($context["dashboardActions"]) ? $context["dashboardActions"] : $this->getContext($context, "dashboardActions"))) > 0)) {
            // line 8
            echo "    <li>
        <div class=\"manageDashboard\">";
            // line 9
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_ManageDashboard")), "html", null, true);
            echo "</div>
        <ul>
            ";
            // line 11
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["dashboardActions"]) ? $context["dashboardActions"] : $this->getContext($context, "dashboardActions")));
            foreach ($context['_seq'] as $context["action"] => $context["title"]) {
                // line 12
                echo "            <li data-action=\"";
                echo \Piwik\piwik_escape_filter($this->env, $context["action"], "html", null, true);
                echo "\">";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($context["title"])), "html", null, true);
                echo "</li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['action'], $context['title'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 14
            echo "        </ul>
    </li>
    ";
        }
        // line 17
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["generalActions"]) ? $context["generalActions"] : $this->getContext($context, "generalActions")));
        foreach ($context['_seq'] as $context["action"] => $context["title"]) {
            // line 18
            echo "    <li data-action=\"";
            echo \Piwik\piwik_escape_filter($this->env, $context["action"], "html", null, true);
            echo "\">";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($context["title"])), "html", null, true);
            echo "</li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['action'], $context['title'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "</ul>
<ul class=\"widgetpreview-widgetlist\"></ul>
<div class=\"widgetpreview-preview\"></div>";
    }

    public function getTemplateName()
    {
        return "@Dashboard/_dashboardSettings.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 20,  69 => 18,  64 => 17,  59 => 14,  48 => 12,  44 => 11,  39 => 9,  36 => 8,  34 => 7,  28 => 4,  19 => 1,);
    }

    public function getSource()
    {
        return "<a class=\"title\" title=\"{{ 'Dashboard_ManageDashboard'|translate|e('html_attr') }}\" tabindex=\"4\"><span class=\"icon icon-arrow-bottom\"></span>{{ 'Dashboard_Dashboard'|translate }} </a>
<ul class=\"dropdown submenu\">
    <li>
        <div class=\"addWidget\">{{ 'Dashboard_AddAWidget'|translate }}</div>
        <ul class=\"widgetpreview-categorylist\"></ul>
    </li>
    {% if dashboardActions|length > 0 %}
    <li>
        <div class=\"manageDashboard\">{{ 'Dashboard_ManageDashboard'|translate }}</div>
        <ul>
            {% for action, title in dashboardActions %}
            <li data-action=\"{{ action }}\">{{ title|translate }}</li>
            {% endfor %}
        </ul>
    </li>
    {% endif %}
    {% for action, title in generalActions %}
    <li data-action=\"{{ action }}\">{{ title|translate }}</li>
    {% endfor %}
</ul>
<ul class=\"widgetpreview-widgetlist\"></ul>
<div class=\"widgetpreview-preview\"></div>";
    }
}

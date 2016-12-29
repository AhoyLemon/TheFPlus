<?php

/* @Dashboard/embeddedIndex.twig */
class __TwigTemplate_beea2177b06c6581f757514386c22595ce669ab0b4657983285886b1875883c6 extends Twig_Template
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
        echo "<script type=\"text/javascript\">
    widgetsHelper.availableWidgets = ";
        // line 2
        echo (isset($context["availableWidgets"]) ? $context["availableWidgets"] : $this->getContext($context, "availableWidgets"));
        echo ";
    \$(function() {
        initDashboard(";
        // line 4
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["dashboardId"]) ? $context["dashboardId"] : $this->getContext($context, "dashboardId")), "html", null, true);
        echo ", ";
        echo (isset($context["dashboardLayout"]) ? $context["dashboardLayout"] : $this->getContext($context, "dashboardLayout"));
        echo ");
    });
</script>
<div id=\"dashboard\">
    <div class=\"ui-confirm\" id=\"confirm\">
        <h2>";
        // line 9
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_DeleteWidgetConfirm")), "html", null, true);
        echo "</h2>
        <input role=\"yes\" type=\"button\" value=\"";
        // line 10
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Yes")), "html", null, true);
        echo "\"/>
        <input role=\"no\" type=\"button\" value=\"";
        // line 11
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Cancel")), "html", null, true);
        echo "\"/>
    </div>

    <div class=\"ui-confirm\" id=\"setAsDefaultWidgetsConfirm\">
        <h2>";
        // line 15
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_SetAsDefaultWidgetsConfirm")), "html", null, true);
        echo "</h2>
        ";
        // line 16
        ob_start();
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_ResetDashboard")), "html", null, true);
        $context["resetDashboard"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 17
        echo "        <div class=\"popoverSubMessage\">";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_SetAsDefaultWidgetsConfirmHelp", (isset($context["resetDashboard"]) ? $context["resetDashboard"] : $this->getContext($context, "resetDashboard")))), "html", null, true);
        echo "</div>
        <input role=\"yes\" type=\"button\" value=\"";
        // line 18
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Yes")), "html", null, true);
        echo "\"/>
        <input role=\"no\" type=\"button\" value=\"";
        // line 19
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Cancel")), "html", null, true);
        echo "\"/>
    </div>

    <div class=\"ui-confirm\" id=\"resetDashboardConfirm\">
        <h2>";
        // line 23
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_ResetDashboardConfirm")), "html", null, true);
        echo "</h2>
        <input role=\"yes\" type=\"button\" value=\"";
        // line 24
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Yes")), "html", null, true);
        echo "\"/>
        <input role=\"no\" type=\"button\" value=\"";
        // line 25
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Cancel")), "html", null, true);
        echo "\"/>
    </div>

    <div class=\"ui-confirm\" id=\"dashboardEmptyNotification\">
        <h2>";
        // line 29
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_DashboardEmptyNotification")), "html", null, true);
        echo "</h2>
        <input role=\"addWidget\" type=\"button\" value=\"";
        // line 30
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_AddAWidget")), "html", null, true);
        echo "\"/>
        <input role=\"resetDashboard\" type=\"button\" value=\"";
        // line 31
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_ResetDashboard")), "html", null, true);
        echo "\"/>
    </div>

    <div class=\"ui-confirm\" id=\"changeDashboardLayout\">
        <h2>";
        // line 35
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_SelectDashboardLayout")), "html", null, true);
        echo "</h2>

        <div id=\"columnPreview\">
            ";
        // line 38
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["availableLayouts"]) ? $context["availableLayouts"] : $this->getContext($context, "availableLayouts")));
        foreach ($context['_seq'] as $context["_key"] => $context["layout"]) {
            // line 39
            echo "            <div>
                ";
            // line 40
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["layout"]);
            foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
                // line 41
                echo "                <div class=\"width-";
                echo \Piwik\piwik_escape_filter($this->env, $context["column"], "html", null, true);
                echo "\"><span></span></div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 43
            echo "            </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['layout'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        echo "        </div>
        <input role=\"yes\" type=\"button\" value=\"";
        // line 46
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Save")), "html", null, true);
        echo "\"/>
    </div>

    <div class=\"ui-confirm\" id=\"renameDashboardConfirm\">
        <h2>";
        // line 50
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_RenameDashboard")), "html", null, true);
        echo "</h2>

        <div id=\"newDashboardNameInput\"><label for=\"newDashboardName\">";
        // line 52
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_DashboardName")), "html", null, true);
        echo " </label>
            <input type=\"input\" name=\"newDashboardName\" id=\"newDashboardName\" value=\"\"/>
        </div>
        <input role=\"yes\" type=\"button\" value=\"";
        // line 55
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Save")), "html", null, true);
        echo "\"/>
        <input role=\"cancel\" type=\"button\" value=\"";
        // line 56
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Cancel")), "html", null, true);
        echo "\"/>
    </div>

    ";
        // line 59
        if ((isset($context["isSuperUser"]) ? $context["isSuperUser"] : $this->getContext($context, "isSuperUser"))) {
            // line 60
            echo "        <div class=\"ui-confirm\" id=\"copyDashboardToUserConfirm\">
            <h2>";
            // line 61
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_CopyDashboardToUser")), "html", null, true);
            echo "</h2>

            <div class=\"inputs\">
                <label for=\"copyDashboardName\">";
            // line 64
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_DashboardName")), "html", null, true);
            echo " </label>
                <input type=\"input\" name=\"copyDashboardName\" id=\"copyDashboardName\" value=\"\"/>
                <label for=\"copyDashboardUser\">";
            // line 66
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Username")), "html", null, true);
            echo " </label>
                <select name=\"copyDashboardUser\" id=\"copyDashboardUser\"></select>
            </div>
            <input role=\"yes\" type=\"button\" value=\"";
            // line 69
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Ok")), "html", null, true);
            echo "\"/>
            <input role=\"cancel\" type=\"button\" value=\"";
            // line 70
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Cancel")), "html", null, true);
            echo "\"/>
        </div>
    ";
        }
        // line 73
        echo "
    <div class=\"ui-confirm\" id=\"createDashboardConfirm\">
        <h2>";
        // line 75
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_CreateNewDashboard")), "html", null, true);
        echo "</h2>

        <div id=\"createDashboardNameInput\">
            <label>";
        // line 78
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_DashboardName")), "html", null, true);
        echo " <input type=\"input\" name=\"newDashboardName\" id=\"createDashboardName\" value=\"\"/></label><br/>

            <label for=\"dashboard_type_default\">
                <input type=\"radio\" checked=\"checked\" name=\"type\" value=\"default\" id=\"dashboard_type_default\" />
                ";
        // line 82
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_DefaultDashboard")), "html", null, true);
        echo "
            </label>
            <br/><br/>

            <label for=\"dashboard_type_empty\">
                <input type=\"radio\" name=\"type\" value=\"empty\" id=\"dashboard_type_empty\" />
                ";
        // line 88
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_EmptyDashboard")), "html", null, true);
        echo "
            </label>
        </div>
        <input role=\"yes\" type=\"button\" value=\"";
        // line 91
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Yes")), "html", null, true);
        echo "\"/>
        <input role=\"no\" type=\"button\" value=\"";
        // line 92
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Cancel")), "html", null, true);
        echo "\"/>
    </div>

    <div class=\"ui-confirm\" id=\"removeDashboardConfirm\">
        <h2>";
        // line 96
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_RemoveDashboardConfirm", "<span></span>"));
        echo "</h2>

        <div class=\"popoverSubMessage\">";
        // line 98
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_NotUndo", (isset($context["resetDashboard"]) ? $context["resetDashboard"] : $this->getContext($context, "resetDashboard")))), "html", null, true);
        echo "</div>
        <input role=\"yes\" type=\"button\" value=\"";
        // line 99
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Yes")), "html", null, true);
        echo "\"/>
        <input role=\"no\" type=\"button\" value=\"";
        // line 100
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Cancel")), "html", null, true);
        echo "\"/>
    </div>

    ";
        // line 103
        $this->loadTemplate("@Dashboard/_widgetFactoryTemplate.twig", "@Dashboard/embeddedIndex.twig", 103)->display($context);
        // line 104
        echo "
    <div id=\"dashboardWidgetsArea\"></div>
</div>";
    }

    public function getTemplateName()
    {
        return "@Dashboard/embeddedIndex.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  266 => 104,  264 => 103,  258 => 100,  254 => 99,  250 => 98,  245 => 96,  238 => 92,  234 => 91,  228 => 88,  219 => 82,  212 => 78,  206 => 75,  202 => 73,  196 => 70,  192 => 69,  186 => 66,  181 => 64,  175 => 61,  172 => 60,  170 => 59,  164 => 56,  160 => 55,  154 => 52,  149 => 50,  142 => 46,  139 => 45,  132 => 43,  123 => 41,  119 => 40,  116 => 39,  112 => 38,  106 => 35,  99 => 31,  95 => 30,  91 => 29,  84 => 25,  80 => 24,  76 => 23,  69 => 19,  65 => 18,  60 => 17,  56 => 16,  52 => 15,  45 => 11,  41 => 10,  37 => 9,  27 => 4,  22 => 2,  19 => 1,);
    }

    public function getSource()
    {
        return "<script type=\"text/javascript\">
    widgetsHelper.availableWidgets = {{ availableWidgets|raw }};
    \$(function() {
        initDashboard({{ dashboardId }}, {{ dashboardLayout|raw }});
    });
</script>
<div id=\"dashboard\">
    <div class=\"ui-confirm\" id=\"confirm\">
        <h2>{{ 'Dashboard_DeleteWidgetConfirm'|translate }}</h2>
        <input role=\"yes\" type=\"button\" value=\"{{ 'General_Yes'|translate }}\"/>
        <input role=\"no\" type=\"button\" value=\"{{ 'General_Cancel'|translate }}\"/>
    </div>

    <div class=\"ui-confirm\" id=\"setAsDefaultWidgetsConfirm\">
        <h2>{{ 'Dashboard_SetAsDefaultWidgetsConfirm'|translate }}</h2>
        {% set resetDashboard %}{{ 'Dashboard_ResetDashboard'|translate }}{% endset %}
        <div class=\"popoverSubMessage\">{{ 'Dashboard_SetAsDefaultWidgetsConfirmHelp'|translate(resetDashboard) }}</div>
        <input role=\"yes\" type=\"button\" value=\"{{ 'General_Yes'|translate }}\"/>
        <input role=\"no\" type=\"button\" value=\"{{ 'General_Cancel'|translate }}\"/>
    </div>

    <div class=\"ui-confirm\" id=\"resetDashboardConfirm\">
        <h2>{{ 'Dashboard_ResetDashboardConfirm'|translate }}</h2>
        <input role=\"yes\" type=\"button\" value=\"{{ 'General_Yes'|translate }}\"/>
        <input role=\"no\" type=\"button\" value=\"{{ 'General_Cancel'|translate }}\"/>
    </div>

    <div class=\"ui-confirm\" id=\"dashboardEmptyNotification\">
        <h2>{{ 'Dashboard_DashboardEmptyNotification'|translate }}</h2>
        <input role=\"addWidget\" type=\"button\" value=\"{{ 'Dashboard_AddAWidget'|translate }}\"/>
        <input role=\"resetDashboard\" type=\"button\" value=\"{{ 'Dashboard_ResetDashboard'|translate }}\"/>
    </div>

    <div class=\"ui-confirm\" id=\"changeDashboardLayout\">
        <h2>{{ 'Dashboard_SelectDashboardLayout'|translate }}</h2>

        <div id=\"columnPreview\">
            {% for layout in availableLayouts %}
            <div>
                {% for column in layout %}
                <div class=\"width-{{ column }}\"><span></span></div>
                {% endfor %}
            </div>
            {% endfor %}
        </div>
        <input role=\"yes\" type=\"button\" value=\"{{ 'General_Save'|translate }}\"/>
    </div>

    <div class=\"ui-confirm\" id=\"renameDashboardConfirm\">
        <h2>{{ 'Dashboard_RenameDashboard'|translate }}</h2>

        <div id=\"newDashboardNameInput\"><label for=\"newDashboardName\">{{ 'Dashboard_DashboardName'|translate }} </label>
            <input type=\"input\" name=\"newDashboardName\" id=\"newDashboardName\" value=\"\"/>
        </div>
        <input role=\"yes\" type=\"button\" value=\"{{ 'General_Save'|translate }}\"/>
        <input role=\"cancel\" type=\"button\" value=\"{{ 'General_Cancel'|translate }}\"/>
    </div>

    {% if isSuperUser %}
        <div class=\"ui-confirm\" id=\"copyDashboardToUserConfirm\">
            <h2>{{ 'Dashboard_CopyDashboardToUser'|translate }}</h2>

            <div class=\"inputs\">
                <label for=\"copyDashboardName\">{{ 'Dashboard_DashboardName'|translate }} </label>
                <input type=\"input\" name=\"copyDashboardName\" id=\"copyDashboardName\" value=\"\"/>
                <label for=\"copyDashboardUser\">{{ 'General_Username'|translate }} </label>
                <select name=\"copyDashboardUser\" id=\"copyDashboardUser\"></select>
            </div>
            <input role=\"yes\" type=\"button\" value=\"{{ 'General_Ok'|translate }}\"/>
            <input role=\"cancel\" type=\"button\" value=\"{{ 'General_Cancel'|translate }}\"/>
        </div>
    {% endif %}

    <div class=\"ui-confirm\" id=\"createDashboardConfirm\">
        <h2>{{ 'Dashboard_CreateNewDashboard'|translate }}</h2>

        <div id=\"createDashboardNameInput\">
            <label>{{ 'Dashboard_DashboardName'|translate }} <input type=\"input\" name=\"newDashboardName\" id=\"createDashboardName\" value=\"\"/></label><br/>

            <label for=\"dashboard_type_default\">
                <input type=\"radio\" checked=\"checked\" name=\"type\" value=\"default\" id=\"dashboard_type_default\" />
                {{ 'Dashboard_DefaultDashboard'|translate }}
            </label>
            <br/><br/>

            <label for=\"dashboard_type_empty\">
                <input type=\"radio\" name=\"type\" value=\"empty\" id=\"dashboard_type_empty\" />
                {{ 'Dashboard_EmptyDashboard'|translate }}
            </label>
        </div>
        <input role=\"yes\" type=\"button\" value=\"{{ 'General_Yes'|translate }}\"/>
        <input role=\"no\" type=\"button\" value=\"{{ 'General_Cancel'|translate }}\"/>
    </div>

    <div class=\"ui-confirm\" id=\"removeDashboardConfirm\">
        <h2>{{ 'Dashboard_RemoveDashboardConfirm'|translate('<span></span>')|raw }}</h2>

        <div class=\"popoverSubMessage\">{{ 'Dashboard_NotUndo'|translate(resetDashboard) }}</div>
        <input role=\"yes\" type=\"button\" value=\"{{ 'General_Yes'|translate }}\"/>
        <input role=\"no\" type=\"button\" value=\"{{ 'General_Cancel'|translate }}\"/>
    </div>

    {% include \"@Dashboard/_widgetFactoryTemplate.twig\" %}

    <div id=\"dashboardWidgetsArea\"></div>
</div>";
    }
}

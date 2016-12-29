<?php

/* ajaxMacros.twig */
class __TwigTemplate_ad883032136c93f8eeccbed13eae53fce3db3a0b10d36c26ce90734f2a8f16e3 extends Twig_Template
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
        // line 4
        echo "
";
        // line 15
        echo "
";
    }

    // line 1
    public function geterrorDiv($__id__ = "ajaxError", ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "id" => $__id__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "    <div id=\"";
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
            echo "\" style=\"display:none\"></div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 5
    public function getloadingDiv($__id__ = "ajaxLoadingDiv", ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "id" => $__id__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 6
            echo "<div id=\"";
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
            echo "\" style=\"display:none;\">
    <div class=\"loadingPiwik\">
        <img src=\"plugins/Morpheus/images/loading-blue.gif\" alt=\"";
            // line 8
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_LoadingData")), "html", null, true);
            echo "\" />";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_LoadingData")), "html", null, true);
            echo "
    </div>
    <div class=\"loadingSegment\">
        ";
            // line 11
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("SegmentEditor_LoadingSegmentedDataMayTakeSomeTime")), "html", null, true);
            echo "
    </div>
</div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 16
    public function getrequestErrorDiv($__emailSuperUser__ = null, $__areAdsForProfessionalServicesEnabled__ = false, $__currentModule__ = "", ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "emailSuperUser" => $__emailSuperUser__,
            "areAdsForProfessionalServicesEnabled" => $__areAdsForProfessionalServicesEnabled__,
            "currentModule" => $__currentModule__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 17
            echo "    <div id=\"loadingError\">
        <div class=\"alert alert-danger\">

            ";
            // line 20
            if ((array_key_exists("emailSuperUser", $context) && (isset($context["emailSuperUser"]) ? $context["emailSuperUser"] : $this->getContext($context, "emailSuperUser")))) {
                // line 21
                echo "                ";
                echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ErrorRequest", (("<a href=\"mailto:" . (isset($context["emailSuperUser"]) ? $context["emailSuperUser"] : $this->getContext($context, "emailSuperUser"))) . "\">"), "</a>"));
                echo "
            ";
            } else {
                // line 23
                echo "                ";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ErrorRequest", "", "")), "html", null, true);
                echo "
            ";
            }
            // line 25
            echo "
            <br /><br />
            ";
            // line 27
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_NeedMoreHelp")), "html", null, true);
            echo "

            <a rel=\"noreferrer\" target=\"_blank\" href=\"https://piwik.org/faq/troubleshooting/faq_19489/\">";
            // line 29
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Faq")), "html", null, true);
            echo "</a> –
            <a rel=\"noreferrer\" target=\"_blank\" href=\"http://forum.piwik.org/\">";
            // line 30
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Feedback_CommunityHelp")), "html", null, true);
            echo "</a>";
            // line 32
            if ((isset($context["areAdsForProfessionalServicesEnabled"]) ? $context["areAdsForProfessionalServicesEnabled"] : $this->getContext($context, "areAdsForProfessionalServicesEnabled"))) {
                // line 33
                echo "                –
                ";
                // line 34
                $context["supportUrl"] = (("https://piwik.org/support/?pk_campaign=Help&pk_medium=AjaxError&pk_content=" . (isset($context["currentModule"]) ? $context["currentModule"] : $this->getContext($context, "currentModule"))) . "&pk_source=Piwik_App");
                // line 35
                echo "                <a rel=\"noreferrer\" target=\"_blank\" href=\"";
                echo \Piwik\piwik_escape_filter($this->env, (isset($context["supportUrl"]) ? $context["supportUrl"] : $this->getContext($context, "supportUrl")), "html_attr");
                echo "\">";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Feedback_ProfessionalHelp")), "html", null, true);
                echo "</a>";
            }
            // line 36
            echo ".
        </div>
    </div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "ajaxMacros.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  165 => 36,  158 => 35,  156 => 34,  153 => 33,  151 => 32,  148 => 30,  144 => 29,  139 => 27,  135 => 25,  129 => 23,  123 => 21,  121 => 20,  116 => 17,  102 => 16,  83 => 11,  75 => 8,  69 => 6,  57 => 5,  39 => 2,  27 => 1,  22 => 15,  19 => 4,);
    }

    public function getSource()
    {
        return "{% macro errorDiv(id='ajaxError') %}
    <div id=\"{{ id }}\" style=\"display:none\"></div>
{% endmacro %}

{% macro loadingDiv(id='ajaxLoadingDiv') %}
<div id=\"{{ id }}\" style=\"display:none;\">
    <div class=\"loadingPiwik\">
        <img src=\"plugins/Morpheus/images/loading-blue.gif\" alt=\"{{ 'General_LoadingData'|translate }}\" />{{ 'General_LoadingData'|translate }}
    </div>
    <div class=\"loadingSegment\">
        {{ 'SegmentEditor_LoadingSegmentedDataMayTakeSomeTime'|translate }}
    </div>
</div>
{% endmacro %}

{% macro requestErrorDiv(emailSuperUser, areAdsForProfessionalServicesEnabled = false, currentModule = '') %}
    <div id=\"loadingError\">
        <div class=\"alert alert-danger\">

            {% if emailSuperUser is defined and emailSuperUser %}
                {{ 'General_ErrorRequest'|translate('<a href=\"mailto:' ~ emailSuperUser ~ '\">', '</a>')|raw }}
            {% else %}
                {{ 'General_ErrorRequest'|translate('', '') }}
            {% endif %}

            <br /><br />
            {{ 'General_NeedMoreHelp'|translate }}

            <a rel=\"noreferrer\" target=\"_blank\" href=\"https://piwik.org/faq/troubleshooting/faq_19489/\">{{ 'General_Faq'|translate }}</a> –
            <a rel=\"noreferrer\" target=\"_blank\" href=\"http://forum.piwik.org/\">{{ 'Feedback_CommunityHelp'|translate }}</a>

            {%- if areAdsForProfessionalServicesEnabled %}
                –
                {% set supportUrl = 'https://piwik.org/support/?pk_campaign=Help&pk_medium=AjaxError&pk_content=' ~ currentModule ~ '&pk_source=Piwik_App' %}
                <a rel=\"noreferrer\" target=\"_blank\" href=\"{{ supportUrl|e('html_attr') }}\">{{ 'Feedback_ProfessionalHelp'|translate }}</a>
            {%- endif %}.
        </div>
    </div>
{% endmacro %}";
    }
}

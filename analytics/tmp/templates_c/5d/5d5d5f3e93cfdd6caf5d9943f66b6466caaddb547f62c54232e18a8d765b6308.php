<?php

/* @CoreHome/_dataTableCell.twig */
class __TwigTemplate_92027b6653db8aaeb45b56cb236a7228142542586859469092789e3598cba9b5 extends Twig_Template
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
        ob_start();
        // line 2
        $context["tooltipIndex"] = ((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")) . "_tooltip");
        // line 3
        if ($this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getMetadata", array(0 => (isset($context["tooltipIndex"]) ? $context["tooltipIndex"] : $this->getContext($context, "tooltipIndex"))), "method")) {
            echo "<span class=\"cell-tooltip\" data-tooltip=\"";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getMetadata", array(0 => (isset($context["tooltipIndex"]) ? $context["tooltipIndex"] : $this->getContext($context, "tooltipIndex"))), "method"), "html", null, true);
            echo "\">";
        }
        // line 4
        if ((( !$this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getIdSubDataTable", array(), "method") && ((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")) == "label")) && $this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getMetadata", array(0 => "url"), "method"))) {
            // line 5
            echo "    <a rel=\"noreferrer\"
       target=\"_blank\"
       href='";
            // line 7
            if (!twig_in_filter(twig_slice($this->env, $this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getMetadata", array(0 => "url"), "method"), 0, 4), array(0 => "http", 1 => "ftp:"))) {
                echo "http://";
            }
            echo call_user_func_array($this->env->getFilter('rawSafeDecoded')->getCallable(), array($this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getMetadata", array(0 => "url"), "method")));
            echo "'>
    ";
            // line 8
            if ( !$this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getMetadata", array(0 => "logo"), "method")) {
                // line 9
                echo "        <img class=\"link\" width=\"10\" height=\"9\"
             src=\"plugins/Morpheus/images/link.gif\"/>
    ";
            }
        }
        // line 13
        echo "
";
        // line 14
        $context["totals"] = $this->getAttribute((isset($context["dataTable"]) ? $context["dataTable"] : $this->getContext($context, "dataTable")), "getMetadata", array(0 => "totals"), "method");
        // line 15
        if (twig_in_filter((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), twig_get_array_keys_filter((isset($context["totals"]) ? $context["totals"] : $this->getContext($context, "totals"))))) {
            // line 16
            $context["labelColumn"] = twig_first($this->env, (isset($context["columns_to_display"]) ? $context["columns_to_display"] : $this->getContext($context, "columns_to_display")));
            // line 17
            echo "    ";
            $context["reportTotal"] = $this->getAttribute((isset($context["totals"]) ? $context["totals"] : $this->getContext($context, "totals")), (isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), array(), "array");
            // line 18
            echo "    ";
            if (((array_key_exists("siteSummary", $context) &&  !twig_test_empty((isset($context["siteSummary"]) ? $context["siteSummary"] : $this->getContext($context, "siteSummary")))) && $this->getAttribute((isset($context["siteSummary"]) ? $context["siteSummary"] : $this->getContext($context, "siteSummary")), "getFirstRow", array()))) {
                // line 19
                echo "        ";
                $context["siteTotal"] = $this->getAttribute($this->getAttribute((isset($context["siteSummary"]) ? $context["siteSummary"] : $this->getContext($context, "siteSummary")), "getFirstRow", array()), "getColumn", array(0 => (isset($context["column"]) ? $context["column"] : $this->getContext($context, "column"))), "method");
                // line 20
                echo "    ";
            } else {
                // line 21
                echo "        ";
                $context["siteTotal"] = 0;
                // line 22
                echo "    ";
            }
            // line 23
            echo "    ";
            $context["rowPercentage"] = call_user_func_array($this->env->getFilter('percentage')->getCallable(), array($this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getColumn", array(0 => (isset($context["column"]) ? $context["column"] : $this->getContext($context, "column"))), "method"), (isset($context["reportTotal"]) ? $context["reportTotal"] : $this->getContext($context, "reportTotal")), 1));
            // line 24
            echo "    ";
            $context["metricTitle"] = (($this->getAttribute((isset($context["translations"]) ? $context["translations"] : null), (isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), array(), "array", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["translations"]) ? $context["translations"] : null), (isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), array(), "array"), (isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")))) : ((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column"))));
            // line 25
            echo "    ";
            $context["reportLabel"] = call_user_func_array($this->env->getFilter('rawSafeDecoded')->getCallable(), array(call_user_func_array($this->env->getFilter('truncate')->getCallable(), array($this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getColumn", array(0 => (isset($context["labelColumn"]) ? $context["labelColumn"] : $this->getContext($context, "labelColumn"))), "method"), 40))));
            // line 26
            echo "
    ";
            // line 27
            $context["reportRatioTooltip"] = call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ReportRatioTooltip", (isset($context["reportLabel"]) ? $context["reportLabel"] : $this->getContext($context, "reportLabel")), \Piwik\piwik_escape_filter($this->env, (isset($context["rowPercentage"]) ? $context["rowPercentage"] : $this->getContext($context, "rowPercentage")), "html_attr"), \Piwik\piwik_escape_filter($this->env, (isset($context["reportTotal"]) ? $context["reportTotal"] : $this->getContext($context, "reportTotal")), "html_attr"), \Piwik\piwik_escape_filter($this->env, (isset($context["metricTitle"]) ? $context["metricTitle"] : $this->getContext($context, "metricTitle")), "html_attr"), \Piwik\piwik_escape_filter($this->env, (($this->getAttribute((isset($context["translations"]) ? $context["translations"] : null), (isset($context["labelColumn"]) ? $context["labelColumn"] : $this->getContext($context, "labelColumn")), array(), "array", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["translations"]) ? $context["translations"] : null), (isset($context["labelColumn"]) ? $context["labelColumn"] : $this->getContext($context, "labelColumn")), array(), "array"), (isset($context["labelColumn"]) ? $context["labelColumn"] : $this->getContext($context, "labelColumn")))) : ((isset($context["labelColumn"]) ? $context["labelColumn"] : $this->getContext($context, "labelColumn")))), "html_attr")));
            // line 28
            echo "
    ";
            // line 29
            if (((isset($context["siteTotal"]) ? $context["siteTotal"] : $this->getContext($context, "siteTotal")) && ((isset($context["siteTotal"]) ? $context["siteTotal"] : $this->getContext($context, "siteTotal")) > (isset($context["reportTotal"]) ? $context["reportTotal"] : $this->getContext($context, "reportTotal"))))) {
                // line 30
                echo "        ";
                $context["totalPercentage"] = call_user_func_array($this->env->getFilter('percentage')->getCallable(), array($this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getColumn", array(0 => (isset($context["column"]) ? $context["column"] : $this->getContext($context, "column"))), "method"), (isset($context["siteTotal"]) ? $context["siteTotal"] : $this->getContext($context, "siteTotal")), 1));
                // line 31
                echo "        ";
                $context["totalRatioTooltip"] = call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_TotalRatioTooltip", (isset($context["totalPercentage"]) ? $context["totalPercentage"] : $this->getContext($context, "totalPercentage")), call_user_func_array($this->env->getFilter('number')->getCallable(), array((isset($context["siteTotal"]) ? $context["siteTotal"] : $this->getContext($context, "siteTotal")), 2, 0)), (isset($context["metricTitle"]) ? $context["metricTitle"] : $this->getContext($context, "metricTitle"))));
                // line 32
                echo "    ";
            } else {
                // line 33
                echo "        ";
                $context["totalRatioTooltip"] = "";
                // line 34
                echo "    ";
            }
            // line 35
            echo "
    <span class=\"ratio\"
          title=\"";
            // line 37
            echo (isset($context["reportRatioTooltip"]) ? $context["reportRatioTooltip"] : $this->getContext($context, "reportRatioTooltip"));
            echo " ";
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["totalRatioTooltip"]) ? $context["totalRatioTooltip"] : $this->getContext($context, "totalRatioTooltip")), "html_attr");
            echo "\"
          >&nbsp;";
            // line 38
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["rowPercentage"]) ? $context["rowPercentage"] : $this->getContext($context, "rowPercentage")), "html", null, true);
            echo "</span>";
        }
        // line 40
        echo "
";
        // line 41
        if (((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")) == "label")) {
            // line 42
            echo "    ";
            $context["piwik"] = $this->loadTemplate("macros.twig", "@CoreHome/_dataTableCell.twig", 42);
            // line 43
            echo "
    <span class='label";
            // line 44
            if ($this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getMetadata", array(0 => "is_aggregate"), "method")) {
                echo " highlighted";
            }
            echo "'
    ";
            // line 45
            if ((array_key_exists("properties", $context) &&  !twig_test_empty($this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "tooltip_metadata_name", array())))) {
                echo "title=\"";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getMetadata", array(0 => $this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "tooltip_metadata_name", array())), "method"), "html", null, true);
                echo "\"";
            }
            echo ">
        ";
            // line 46
            echo $context["piwik"]->getlogoHtml($this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getMetadata", array(), "method"), $this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getColumn", array(0 => "label"), "method"));
            echo "
        ";
            // line 47
            if ($this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getMetadata", array(0 => "html_label_prefix"), "method")) {
                echo "<span class='label-prefix'>";
                echo $this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getMetadata", array(0 => "html_label_prefix"), "method");
                echo "&nbsp;</span>";
            }
            // line 48
            if ($this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getMetadata", array(0 => "html_label_suffix"), "method")) {
                echo "<span class='label-suffix'>";
                echo $this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getMetadata", array(0 => "html_label_suffix"), "method");
                echo "</span>";
            }
        }
        // line 49
        echo "<span class=\"value\">";
        // line 50
        if (($this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getColumn", array(0 => (isset($context["column"]) ? $context["column"] : $this->getContext($context, "column"))), "method") || (((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")) == "label") && ($this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getColumn", array(0 => (isset($context["column"]) ? $context["column"] : $this->getContext($context, "column"))), "method") === "0")))) {
            if (((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")) == "label")) {
                echo call_user_func_array($this->env->getFilter('rawSafeDecoded')->getCallable(), array($this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getColumn", array(0 => (isset($context["column"]) ? $context["column"] : $this->getContext($context, "column"))), "method")));
            } else {
                echo call_user_func_array($this->env->getFilter('number')->getCallable(), array($this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getColumn", array(0 => (isset($context["column"]) ? $context["column"] : $this->getContext($context, "column"))), "method"), 2, 0));
            }
        } else {
            // line 51
            echo "-";
        }
        // line 52
        echo "</span>
";
        // line 53
        if (((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")) == "label")) {
            echo "</span>";
        }
        // line 54
        if ((( !$this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getIdSubDataTable", array(), "method") && ((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")) == "label")) && $this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getMetadata", array(0 => "url"), "method"))) {
            // line 55
            echo "    </a>
";
        }
        // line 57
        if ($this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getMetadata", array(0 => (isset($context["tooltipIndex"]) ? $context["tooltipIndex"] : $this->getContext($context, "tooltipIndex"))), "method")) {
            echo "</span>";
        }
        // line 58
        echo "
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "@CoreHome/_dataTableCell.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  197 => 58,  193 => 57,  189 => 55,  187 => 54,  183 => 53,  180 => 52,  177 => 51,  169 => 50,  167 => 49,  160 => 48,  154 => 47,  150 => 46,  142 => 45,  136 => 44,  133 => 43,  130 => 42,  128 => 41,  125 => 40,  121 => 38,  115 => 37,  111 => 35,  108 => 34,  105 => 33,  102 => 32,  99 => 31,  96 => 30,  94 => 29,  91 => 28,  89 => 27,  86 => 26,  83 => 25,  80 => 24,  77 => 23,  74 => 22,  71 => 21,  68 => 20,  65 => 19,  62 => 18,  59 => 17,  57 => 16,  55 => 15,  53 => 14,  50 => 13,  44 => 9,  42 => 8,  35 => 7,  31 => 5,  29 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }

    public function getSource()
    {
        return "{% spaceless %}
{% set tooltipIndex = column ~ '_tooltip' %}
{% if row.getMetadata(tooltipIndex) %}<span class=\"cell-tooltip\" data-tooltip=\"{{ row.getMetadata(tooltipIndex) }}\">{% endif %}
{% if not row.getIdSubDataTable() and column=='label' and row.getMetadata('url') %}
    <a rel=\"noreferrer\"
       target=\"_blank\"
       href='{% if row.getMetadata('url')|slice(0,4) not in ['http','ftp:'] %}http://{% endif %}{{ row.getMetadata('url')|rawSafeDecoded }}'>
    {% if not row.getMetadata('logo') %}
        <img class=\"link\" width=\"10\" height=\"9\"
             src=\"plugins/Morpheus/images/link.gif\"/>
    {% endif %}
{% endif %}

{% set totals = dataTable.getMetadata('totals') %}
{% if column in totals|keys -%}
    {% set labelColumn   = columns_to_display|first %}
    {% set reportTotal   = totals[column] %}
    {% if siteSummary is defined and siteSummary is not empty and siteSummary.getFirstRow %}
        {% set siteTotal = siteSummary.getFirstRow.getColumn(column) %}
    {% else %}
        {% set siteTotal = 0 %}
    {% endif %}
    {% set rowPercentage = row.getColumn(column)|percentage(reportTotal, 1) %}
    {% set metricTitle   = translations[column]|default(column) %}
    {% set reportLabel   = row.getColumn(labelColumn)|truncate(40)|rawSafeDecoded %}

    {% set reportRatioTooltip = 'General_ReportRatioTooltip'|translate(reportLabel, rowPercentage|e('html_attr'), reportTotal|e('html_attr'), metricTitle|e('html_attr'), translations[labelColumn]|default(labelColumn)|e('html_attr')) %}

    {% if siteTotal and siteTotal > reportTotal %}
        {% set totalPercentage   = row.getColumn(column)|percentage(siteTotal, 1) %}
        {% set totalRatioTooltip = 'General_TotalRatioTooltip'|translate(totalPercentage, siteTotal|number(2,0), metricTitle) %}
    {% else %}
        {% set totalRatioTooltip = '' %}
    {% endif %}

    <span class=\"ratio\"
          title=\"{{ reportRatioTooltip|raw }} {{ totalRatioTooltip|e('html_attr') }}\"
          >&nbsp;{{ rowPercentage }}</span>
{%- endif %}

{% if column=='label' %}
    {% import 'macros.twig' as piwik %}

    <span class='label{% if row.getMetadata('is_aggregate') %} highlighted{% endif %}'
    {% if properties is defined and properties.tooltip_metadata_name is not empty %}title=\"{{ row.getMetadata(properties.tooltip_metadata_name) }}\"{% endif %}>
        {{ piwik.logoHtml(row.getMetadata(), row.getColumn('label')) }}
        {% if row.getMetadata('html_label_prefix') %}<span class='label-prefix'>{{ row.getMetadata('html_label_prefix') | raw }}&nbsp;</span>{% endif -%}
        {%- if row.getMetadata('html_label_suffix') %}<span class='label-suffix'>{{ row.getMetadata('html_label_suffix') | raw }}</span>{% endif -%}
{% endif %}<span class=\"value\">
    {%- if row.getColumn(column) or (column=='label' and row.getColumn(column) is same as(\"0\")) %}{% if column=='label' %}{{- row.getColumn(column)|rawSafeDecoded -}}{% else %}{{- row.getColumn(column)|number(2,0)|raw -}}{% endif %}
    {%- else -%}-
    {%- endif -%}</span>
{% if column=='label' %}</span>{% endif %}
{% if not row.getIdSubDataTable() and column=='label' and row.getMetadata('url') %}
    </a>
{% endif %}
{% if row.getMetadata(tooltipIndex) %}</span>{% endif %}

{% endspaceless %}
";
    }
}

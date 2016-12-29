<?php

/* @CoreVisualizations/_dataTableViz_htmlTable.twig */
class __TwigTemplate_9bb78fa44e2dff8b9abe2bbecf84fc071ebf760908a00b23591a96f2f59b334d extends Twig_Template
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
        $context["subtablesAreDisabled"] = ((($this->getAttribute((isset($context["properties"]) ? $context["properties"] : null), "show_goals_columns", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["properties"]) ? $context["properties"] : null), "show_goals_columns", array()), false)) : (false)) && (($this->getAttribute(        // line 2
(isset($context["properties"]) ? $context["properties"] : null), "disable_subtable_when_show_goals", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["properties"]) ? $context["properties"] : null), "disable_subtable_when_show_goals", array()), false)) : (false)));
        // line 3
        $context["showingEmbeddedSubtable"] = ( !twig_test_empty($this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "show_embedded_subtable", array())) && ((        // line 4
array_key_exists("idSubtable", $context)) ? (_twig_default_filter((isset($context["idSubtable"]) ? $context["idSubtable"] : $this->getContext($context, "idSubtable")), false)) : (false)));
        // line 5
        if (array_key_exists("error", $context)) {
            // line 6
            echo "    ";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "message", array()), "html", null, true);
            echo "
";
        } else {
            // line 8
            if ( !(isset($context["showingEmbeddedSubtable"]) ? $context["showingEmbeddedSubtable"] : $this->getContext($context, "showingEmbeddedSubtable"))) {
                // line 9
                echo "<table cellspacing=\"0\" class=\"dataTable\">
        ";
                // line 10
                $this->loadTemplate("@CoreHome/_dataTableHead.twig", "@CoreVisualizations/_dataTableViz_htmlTable.twig", 10)->display($context);
                // line 11
                echo "
        <tbody>";
            }
            // line 14
            if (((isset($context["showingEmbeddedSubtable"]) ? $context["showingEmbeddedSubtable"] : $this->getContext($context, "showingEmbeddedSubtable")) && ($this->getAttribute((isset($context["dataTable"]) ? $context["dataTable"] : $this->getContext($context, "dataTable")), "getRowsCount", array(), "method") == 0))) {
                // line 15
                echo "            ";
                if ((( !array_key_exists("clientSideParameters", $context) ||  !$this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : null), "filter_pattern_recursive", array(), "any", true, true)) ||  !$this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "filter_pattern_recursive", array()))) {
                    // line 16
                    echo "                <tr class=\"nodata\">
                    <td colspan=\"";
                    // line 17
                    echo \Piwik\piwik_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "columns_to_display", array())), "html", null, true);
                    echo "\">";
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_CategoryNoData")), "html", null, true);
                    echo "</td>
                </tr>
            ";
                }
                // line 20
                echo "        ";
            } else {
                // line 21
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["dataTable"]) ? $context["dataTable"] : $this->getContext($context, "dataTable")), "getRows", array(), "method"));
                $context['loop'] = array(
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                );
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["rowId"] => $context["row"]) {
                    // line 22
                    $context["rowHasSubtable"] = (( !(isset($context["subtablesAreDisabled"]) ? $context["subtablesAreDisabled"] : $this->getContext($context, "subtablesAreDisabled")) && $this->getAttribute($context["row"], "getIdSubDataTable", array(), "method")) &&  !(null === $this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "subtable_controller_action", array())));
                    // line 23
                    $context["rowSubtableId"] = (($this->getAttribute($context["row"], "getMetadata", array(0 => "idsubdatatable_in_db"), "method", true, true)) ? (_twig_default_filter($this->getAttribute($context["row"], "getMetadata", array(0 => "idsubdatatable_in_db"), "method"), $this->getAttribute($context["row"], "getIdSubDataTable", array(), "method"))) : ($this->getAttribute($context["row"], "getIdSubDataTable", array(), "method")));
                    // line 24
                    $context["isSummaryRow"] = ($context["rowId"] == twig_constant("Piwik\\DataTable::ID_SUMMARY_ROW"));
                    // line 25
                    $context["shouldHighlightRow"] = ((isset($context["isSummaryRow"]) ? $context["isSummaryRow"] : $this->getContext($context, "isSummaryRow")) && $this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "highlight_summary_row", array()));
                    // line 28
                    $context["showRow"] = ((((isset($context["subtablesAreDisabled"]) ? $context["subtablesAreDisabled"] : $this->getContext($context, "subtablesAreDisabled")) ||  !                    // line 29
(isset($context["rowHasSubtable"]) ? $context["rowHasSubtable"] : $this->getContext($context, "rowHasSubtable"))) ||  !(($this->getAttribute(                    // line 30
(isset($context["properties"]) ? $context["properties"] : null), "show_expanded", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["properties"]) ? $context["properties"] : null), "show_expanded", array()), false)) : (false))) ||  !(($this->getAttribute(                    // line 31
(isset($context["properties"]) ? $context["properties"] : null), "replace_row_with_subtable", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["properties"]) ? $context["properties"] : null), "replace_row_with_subtable", array()), false)) : (false)));
                    // line 33
                    if ((isset($context["showRow"]) ? $context["showRow"] : $this->getContext($context, "showRow"))) {
                        // line 34
                        echo "                <tr ";
                        if ((isset($context["rowHasSubtable"]) ? $context["rowHasSubtable"] : $this->getContext($context, "rowHasSubtable"))) {
                            echo "id=\"";
                            echo \Piwik\piwik_escape_filter($this->env, (isset($context["rowSubtableId"]) ? $context["rowSubtableId"] : $this->getContext($context, "rowSubtableId")), "html", null, true);
                            echo "\"";
                        }
                        // line 35
                        echo "                    ";
                        if ( !call_user_func_array($this->env->getTest('false')->getCallable(), array($this->getAttribute($context["row"], "getMetadata", array(0 => "segment"), "method")))) {
                            echo " data-segment-filter=\"";
                            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["row"], "getMetadata", array(0 => "segment"), "method"), "html_attr");
                            echo "\"";
                        }
                        // line 36
                        echo "                    ";
                        if ( !call_user_func_array($this->env->getTest('false')->getCallable(), array($this->getAttribute($context["row"], "getMetadata", array(0 => "url"), "method")))) {
                            echo " data-url-label=\"";
                            echo call_user_func_array($this->env->getFilter('rawSafeDecoded')->getCallable(), array($this->getAttribute($context["row"], "getMetadata", array(0 => "url"), "method")));
                            echo "\"";
                        }
                        // line 37
                        echo "                    data-row-metadata=\"";
                        echo \Piwik\piwik_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute($context["row"], "getMetadata", array())), "html_attr");
                        echo "\"
                    class=\"";
                        // line 38
                        echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["row"], "getMetadata", array(0 => "css_class"), "method"), "html", null, true);
                        echo " ";
                        if ((isset($context["rowHasSubtable"]) ? $context["rowHasSubtable"] : $this->getContext($context, "rowHasSubtable"))) {
                            echo "subDataTable";
                        }
                        if ((isset($context["shouldHighlightRow"]) ? $context["shouldHighlightRow"] : $this->getContext($context, "shouldHighlightRow"))) {
                            echo " highlight";
                        }
                        if ((isset($context["isSummaryRow"]) ? $context["isSummaryRow"] : $this->getContext($context, "isSummaryRow"))) {
                            echo " summaryRow";
                        }
                        echo "\"
                    ";
                        // line 39
                        if ((isset($context["rowHasSubtable"]) ? $context["rowHasSubtable"] : $this->getContext($context, "rowHasSubtable"))) {
                            echo "title=\"";
                            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_ClickRowToExpandOrContract")), "html", null, true);
                            echo "\"";
                        }
                        echo ">
                    ";
                        // line 40
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "columns_to_display", array()));
                        $context['loop'] = array(
                          'parent' => $context['_parent'],
                          'index0' => 0,
                          'index'  => 1,
                          'first'  => true,
                        );
                        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                            $length = count($context['_seq']);
                            $context['loop']['revindex0'] = $length - 1;
                            $context['loop']['revindex'] = $length;
                            $context['loop']['length'] = $length;
                            $context['loop']['last'] = 1 === $length;
                        }
                        foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
                            // line 41
                            echo "                        <td>
                            ";
                            // line 42
                            $this->loadTemplate("@CoreHome/_dataTableCell.twig", "@CoreVisualizations/_dataTableViz_htmlTable.twig", 42)->display(array_merge($context, (isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties"))));
                            // line 43
                            echo "                        </td>
                    ";
                            ++$context['loop']['index0'];
                            ++$context['loop']['index'];
                            $context['loop']['first'] = false;
                            if (isset($context['loop']['length'])) {
                                --$context['loop']['revindex0'];
                                --$context['loop']['revindex'];
                                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                            }
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 45
                        echo "                </tr>
                ";
                    }
                    // line 47
                    echo "
                ";
                    // line 49
                    echo "                ";
                    if (((($this->getAttribute((isset($context["properties"]) ? $context["properties"] : null), "show_expanded", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["properties"]) ? $context["properties"] : null), "show_expanded", array()), false)) : (false)) && (isset($context["rowHasSubtable"]) ? $context["rowHasSubtable"] : $this->getContext($context, "rowHasSubtable")))) {
                        // line 50
                        echo "                    ";
                        $this->loadTemplate("@CoreVisualizations/_dataTableViz_htmlTable.twig", "@CoreVisualizations/_dataTableViz_htmlTable.twig", 50)->display(array_merge($context, array("dataTable" => $this->getAttribute($context["row"], "getSubtable", array(), "method"), "idSubtable" => (isset($context["rowSubtableId"]) ? $context["rowSubtableId"] : $this->getContext($context, "rowSubtableId")))));
                        // line 51
                        echo "                ";
                    }
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['rowId'], $context['row'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
            }
            // line 54
            if ( !(isset($context["showingEmbeddedSubtable"]) ? $context["showingEmbeddedSubtable"] : $this->getContext($context, "showingEmbeddedSubtable"))) {
                // line 55
                echo "</tbody>
    </table>";
            }
        }
    }

    public function getTemplateName()
    {
        return "@CoreVisualizations/_dataTableViz_htmlTable.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  211 => 55,  209 => 54,  193 => 51,  190 => 50,  187 => 49,  184 => 47,  180 => 45,  165 => 43,  163 => 42,  160 => 41,  143 => 40,  135 => 39,  121 => 38,  116 => 37,  109 => 36,  102 => 35,  95 => 34,  93 => 33,  91 => 31,  90 => 30,  89 => 29,  88 => 28,  86 => 25,  84 => 24,  82 => 23,  80 => 22,  63 => 21,  60 => 20,  52 => 17,  49 => 16,  46 => 15,  44 => 14,  40 => 11,  38 => 10,  35 => 9,  33 => 8,  27 => 6,  25 => 5,  23 => 4,  22 => 3,  20 => 2,  19 => 1,);
    }

    public function getSource()
    {
        return "{%- set subtablesAreDisabled = properties.show_goals_columns|default(false)
                           and properties.disable_subtable_when_show_goals|default(false) -%}
{%- set showingEmbeddedSubtable = properties.show_embedded_subtable is not empty
                              and idSubtable|default(false) -%}
{% if error is defined %}
    {{ error.message }}
{% else %}
    {%- if not showingEmbeddedSubtable -%}
    <table cellspacing=\"0\" class=\"dataTable\">
        {% include \"@CoreHome/_dataTableHead.twig\" %}

        <tbody>
    {%- endif -%}
        {% if showingEmbeddedSubtable and dataTable.getRowsCount() == 0 %}
            {% if clientSideParameters is not defined or clientSideParameters.filter_pattern_recursive is not defined or not clientSideParameters.filter_pattern_recursive  %}
                <tr class=\"nodata\">
                    <td colspan=\"{{ properties.columns_to_display|length }}\">{{ 'CoreHome_CategoryNoData'|translate }}</td>
                </tr>
            {% endif %}
        {% else %}
            {%- for rowId, row in dataTable.getRows() -%}
                {%- set rowHasSubtable = not subtablesAreDisabled and row.getIdSubDataTable() and properties.subtable_controller_action is not null -%}
                {%- set rowSubtableId = row.getMetadata('idsubdatatable_in_db')|default(row.getIdSubDataTable()) -%}
                {%- set isSummaryRow = rowId == constant('Piwik\\\\DataTable::ID_SUMMARY_ROW') -%}
                {%- set shouldHighlightRow = isSummaryRow and properties.highlight_summary_row -%}

                {# display this row if it doesn't have a subtable or if we don't replace the row with the subtable #}
                {%- set showRow = subtablesAreDisabled
                               or not rowHasSubtable
                               or not properties.show_expanded|default(false)
                               or not properties.replace_row_with_subtable|default(false) -%}

                {% if showRow %}
                <tr {% if rowHasSubtable %}id=\"{{ rowSubtableId }}\"{% endif %}
                    {% if row.getMetadata('segment') is not false %} data-segment-filter=\"{{ row.getMetadata('segment')|e('html_attr') }}\"{% endif %}
                    {% if row.getMetadata('url') is not false %} data-url-label=\"{{ row.getMetadata('url')|rawSafeDecoded }}\"{% endif %}
                    data-row-metadata=\"{{ row.getMetadata|json_encode|e('html_attr') }}\"
                    class=\"{{ row.getMetadata('css_class') }} {% if rowHasSubtable %}subDataTable{% endif %}{% if shouldHighlightRow %} highlight{% endif %}{% if isSummaryRow %} summaryRow{% endif %}\"
                    {% if rowHasSubtable %}title=\"{{ 'CoreHome_ClickRowToExpandOrContract'|translate }}\"{% endif %}>
                    {% for column in properties.columns_to_display %}
                        <td>
                            {% include \"@CoreHome/_dataTableCell.twig\" with properties %}
                        </td>
                    {% endfor %}
                </tr>
                {% endif %}

                {# display subtable if present and showing expanded datatable #}
                {% if properties.show_expanded|default(false) and rowHasSubtable %}
                    {% include \"@CoreVisualizations/_dataTableViz_htmlTable.twig\" with {'dataTable': row.getSubtable(), 'idSubtable': rowSubtableId} %}
                {% endif %}
            {%- endfor -%}
        {% endif %}
    {%- if not showingEmbeddedSubtable -%}
        </tbody>
    </table>
    {%- endif -%}
{% endif %}";
    }
}

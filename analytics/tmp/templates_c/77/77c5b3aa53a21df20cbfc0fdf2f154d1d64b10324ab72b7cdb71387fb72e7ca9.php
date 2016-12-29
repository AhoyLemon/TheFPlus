<?php

/* @CoreVisualizations/_dataTableViz_jqplotGraph.twig */
class __TwigTemplate_329584921c777ea6747f2e15df0921eb74304a88a9ff55b0b85d55c3ecfe6950 extends Twig_Template
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
        echo "<div alt=\"";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Mobile_StaticGraph")), "html", null, true);
        echo "\"  class=\"jqplot-graph\">
    <div class=\"piwik-graph\" data-data=\"";
        // line 2
        echo \Piwik\piwik_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute((isset($context["visualization"]) ? $context["visualization"] : $this->getContext($context, "visualization")), "getGraphData", array(0 => (isset($context["dataTable"]) ? $context["dataTable"] : $this->getContext($context, "dataTable")), 1 => (isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties"))), "method")), "html", null, true);
        echo "\"></div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@CoreVisualizations/_dataTableViz_jqplotGraph.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  24 => 2,  19 => 1,);
    }

    public function getSource()
    {
        return "<div alt=\"{{ 'Mobile_StaticGraph'|translate }}\"  class=\"jqplot-graph\">
    <div class=\"piwik-graph\" data-data=\"{{ visualization.getGraphData(dataTable, properties)|json_encode }}\"></div>
</div>
";
    }
}

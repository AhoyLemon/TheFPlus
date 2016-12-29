<?php

/* @VisitsSummary/getSparklines.twig */
class __TwigTemplate_c8aa950e021c9db243ba8a3b34c6d50f4088c72a1da0e5301c62fdbd6c99c6d5 extends Twig_Template
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
        $this->loadTemplate("@VisitsSummary/_sparklines.twig", "@VisitsSummary/getSparklines.twig", 1)->display($context);
    }

    public function getTemplateName()
    {
        return "@VisitsSummary/getSparklines.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    public function getSource()
    {
        return "{% include \"@VisitsSummary/_sparklines.twig\" %}";
    }
}

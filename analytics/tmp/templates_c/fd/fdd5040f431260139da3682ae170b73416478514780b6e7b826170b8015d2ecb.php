<?php

/* @Events/index.twig */
class __TwigTemplate_3e4747ed2dfcb1f03c7d75f4639568561dd087646be8725954b378c5d19da68c extends Twig_Template
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
        echo (isset($context["leftMenuReports"]) ? $context["leftMenuReports"] : $this->getContext($context, "leftMenuReports"));
        echo "

";
    }

    public function getTemplateName()
    {
        return "@Events/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    public function getSource()
    {
        return "{{ leftMenuReports|raw }}

";
    }
}

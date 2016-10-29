<?php

/* _sparklineFooter.twig */
class __TwigTemplate_941c2c8a625c685fde636992966430f3d381d4c62c0e0ea7162e2ccc4b5100f0 extends Twig_Template
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
    \$(function () {
        initializeSparklines();
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "_sparklineFooter.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    public function getSource()
    {
        return "<script type=\"text/javascript\">
    \$(function () {
        initializeSparklines();
    });
</script>
";
    }
}

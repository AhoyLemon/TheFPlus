<?php

/* _jsCssIncludes.twig */
class __TwigTemplate_4b862f0a1f4e5f9924551cfbaebf64a23ceeabde05537f0bbf5843e56e033fda extends Twig_Template
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
        // line 2
        echo "    ";
        echo call_user_func_array($this->env->getFunction('includeAssets')->getCallable(), array(array("type" => "css")));
        echo "
    ";
        // line 3
        echo call_user_func_array($this->env->getFunction('includeAssets')->getCallable(), array(array("type" => "js")));
        echo "
";
    }

    public function getTemplateName()
    {
        return "_jsCssIncludes.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  24 => 3,  19 => 2,);
    }

    public function getSource()
    {
        return "{% autoescape false %}
    {{ includeAssets({\"type\": \"css\"}) }}
    {{ includeAssets({\"type\":\"js\"}) }}
{% endautoescape %}
";
    }
}

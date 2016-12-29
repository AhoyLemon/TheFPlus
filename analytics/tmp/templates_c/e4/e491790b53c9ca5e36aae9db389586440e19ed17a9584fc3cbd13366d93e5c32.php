<?php

/* @Login/_formErrors.twig */
class __TwigTemplate_985e699672be6174360a5804658fdc54632768ba7e9c16eeaf4804a364f216ee extends Twig_Template
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
        echo "
";
        // line 2
        if ((array_key_exists("formErrors", $context) &&  !twig_test_empty((isset($context["formErrors"]) ? $context["formErrors"] : $this->getContext($context, "formErrors"))))) {
            // line 3
            echo "    <div class=\"message_error\">
        ";
            // line 4
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["formErrors"]) ? $context["formErrors"] : $this->getContext($context, "formErrors")));
            foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
                // line 5
                echo "            <strong>";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Error")), "html", null, true);
                echo "</strong>: ";
                echo $context["data"];
                echo "
            <br/>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 8
            echo "    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "@Login/_formErrors.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 8,  31 => 5,  27 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }

    public function getSource()
    {
        return "
{% if formErrors is defined and formErrors is not empty %}
    <div class=\"message_error\">
        {% for data in formErrors %}
            <strong>{{ 'General_Error'|translate }}</strong>: {{ data|raw }}
            <br/>
        {% endfor %}
    </div>
{% endif %}
";
    }
}

<?php

/* @CoreHome/ReportsByDimension/_reportsByDimension.twig */
class __TwigTemplate_240c9b0db69241a271e65e23199b51e3a8e5329c190d786e391219fa14f04ef1 extends Twig_Template
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
        echo "<div class=\"reportsByDimensionView\">

    <div class=\"entityList\">
        ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["dimensionCategories"]) ? $context["dimensionCategories"] : $this->getContext($context, "dimensionCategories")));
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
        foreach ($context['_seq'] as $context["category"] => $context["dimensions"]) {
            // line 5
            echo "        ";
            $context["firstCategory"] = ($this->getAttribute($context["loop"], "index0", array()) == 0);
            // line 6
            echo "            <div class='dimensionCategory'>
                ";
            // line 7
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($context["category"])), "html", null, true);
            echo "
                <ul class='listCircle'>
                    ";
            // line 9
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["dimensions"]);
            foreach ($context['_seq'] as $context["idx"] => $context["dimension"]) {
                // line 10
                echo "                        <li class=\"reportDimension ";
                if ((($context["idx"] == 0) && (isset($context["firstCategory"]) ? $context["firstCategory"] : $this->getContext($context, "firstCategory")))) {
                    echo "activeDimension";
                }
                echo "\"
                            data-url=\"";
                // line 11
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["dimension"], "url", array()), "html", null, true);
                echo "\">
                            <span class='dimension'>";
                // line 12
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($this->getAttribute($context["dimension"], "title", array()))), "html", null, true);
                echo "</span>
                        </li>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['idx'], $context['dimension'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 15
            echo "                </ul>
            </div>
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
        unset($context['_seq'], $context['_iterated'], $context['category'], $context['dimensions'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "    </div>

    <div style=\"float:left;max-width:730px;\">
        <div class=\"loadingPiwik\" style=\"display:none;\">
            <img src=\"plugins/Morpheus/images/loading-blue.gif\" alt=\"\"/>";
        // line 22
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_LoadingData")), "html", null, true);
        echo "
        </div>

        <div class=\"dimensionReport\">";
        // line 25
        echo (isset($context["firstReport"]) ? $context["firstReport"] : $this->getContext($context, "firstReport"));
        echo "</div>
    </div>
    <div class=\"clear\"></div>

</div>
";
    }

    public function getTemplateName()
    {
        return "@CoreHome/ReportsByDimension/_reportsByDimension.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 25,  98 => 22,  92 => 18,  76 => 15,  67 => 12,  63 => 11,  56 => 10,  52 => 9,  47 => 7,  44 => 6,  41 => 5,  24 => 4,  19 => 1,);
    }

    public function getSource()
    {
        return "<div class=\"reportsByDimensionView\">

    <div class=\"entityList\">
        {% for category, dimensions in dimensionCategories %}
        {% set firstCategory = (loop.index0 == 0) %}
            <div class='dimensionCategory'>
                {{ category|translate }}
                <ul class='listCircle'>
                    {% for idx, dimension in dimensions %}
                        <li class=\"reportDimension {% if idx == 0 and firstCategory %}activeDimension{% endif %}\"
                            data-url=\"{{ dimension.url }}\">
                            <span class='dimension'>{{ dimension.title|translate }}</span>
                        </li>
                    {% endfor %}
                </ul>
            </div>
        {% endfor %}
    </div>

    <div style=\"float:left;max-width:730px;\">
        <div class=\"loadingPiwik\" style=\"display:none;\">
            <img src=\"plugins/Morpheus/images/loading-blue.gif\" alt=\"\"/>{{ 'General_LoadingData'|translate }}
        </div>

        <div class=\"dimensionReport\">{{ firstReport|raw }}</div>
    </div>
    <div class=\"clear\"></div>

</div>
";
    }
}

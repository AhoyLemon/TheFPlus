<?php

/* @ProfessionalServices/promoServicesWidget.twig */
class __TwigTemplate_2ba32cab00696fbc674387f5bcd6b40bea170fb33c6a31e59b1e00cd05060925 extends Twig_Template
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
        echo "<div class=\"promoWidget\">
    <div class=\"promo\">
        <img class=\"icon\" src=\"plugins/ProfessionalServices/images/promo.png\">
        <p class=\"text\">
            ";
        // line 5
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["ctaText"]) ? $context["ctaText"] : $this->getContext($context, "ctaText")), "html", null, true);
        echo "
            <br /><br />
            <a class=\"btn\" href=\"";
        // line 7
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["ctaLinkUrl"]) ? $context["ctaLinkUrl"] : $this->getContext($context, "ctaLinkUrl")), "html_attr");
        echo "\" target=\"_blank\" rel=\"noreferrer\">
                ";
        // line 8
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["ctaLinkTitle"]) ? $context["ctaLinkTitle"] : $this->getContext($context, "ctaLinkTitle")), "html", null, true);
        echo "
            </a>
        </p>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "@ProfessionalServices/promoServicesWidget.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 8,  30 => 7,  25 => 5,  19 => 1,);
    }

    public function getSource()
    {
        return "<div class=\"promoWidget\">
    <div class=\"promo\">
        <img class=\"icon\" src=\"plugins/ProfessionalServices/images/promo.png\">
        <p class=\"text\">
            {{ ctaText }}
            <br /><br />
            <a class=\"btn\" href=\"{{ ctaLinkUrl|e('html_attr') }}\" target=\"_blank\" rel=\"noreferrer\">
                {{ ctaLinkTitle }}
            </a>
        </p>
    </div>
</div>";
    }
}

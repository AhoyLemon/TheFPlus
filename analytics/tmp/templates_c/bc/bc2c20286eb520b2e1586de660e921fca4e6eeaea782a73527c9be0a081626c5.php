<?php

/* @CoreHome/_menu.twig */
class __TwigTemplate_251068a2c0ab3b8e10ee329afa17dd16606156b95ca4986945b208d7de268443 extends Twig_Template
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
        // line 10
        echo "
";
        // line 24
        echo "
";
        // line 30
        echo "
";
    }

    // line 1
    public function getsubmenuItem($__name__ = null, $__url__ = null, $__anchorlink__ = null, $__tooltip__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "name" => $__name__,
            "url" => $__url__,
            "anchorlink" => $__anchorlink__,
            "tooltip" => $__tooltip__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "    ";
            if ((twig_slice($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), 0, 1) != "_")) {
                // line 3
                echo "        <li role=\"menuitem\" title=\"";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array(((array_key_exists("tooltip", $context)) ? (_twig_default_filter((isset($context["tooltip"]) ? $context["tooltip"] : $this->getContext($context, "tooltip")), "")) : ("")))), "html_attr");
                echo "\">
            <a class=\"item\" href=\"";
                // line 4
                if ((isset($context["anchorlink"]) ? $context["anchorlink"] : $this->getContext($context, "anchorlink"))) {
                    echo "#";
                } else {
                    echo "index.php?";
                }
                echo \Piwik\piwik_escape_filter($this->env, twig_slice($this->env, call_user_func_array($this->env->getFilter('urlRewriteWithParameters')->getCallable(), array((isset($context["url"]) ? $context["url"] : $this->getContext($context, "url")))), 1), "html", null, true);
                echo "\" tabindex=\"5\">
                ";
                // line 5
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array((isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")))), "html", null, true);
                echo "
            </a>
        </li>
    ";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 11
    public function getgroupedItem($__name__ = null, $__group__ = null, $__anchorlink__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "name" => $__name__,
            "group" => $__group__,
            "anchorlink" => $__anchorlink__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 12
            echo "    <li role=\"menuitem\" title=\"";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array((isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")))), "html_attr");
            echo "\">
        <div piwik-menudropdown show-search=\"true\" menu-title=\"";
            // line 13
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array((isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")))), "html_attr");
            echo "\">
            ";
            // line 14
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "getItems", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 15
                echo "                <a class=\"item menuItem\"
                   href='";
                // line 16
                if ((isset($context["anchorlink"]) ? $context["anchorlink"] : $this->getContext($context, "anchorlink"))) {
                    echo "#?";
                } else {
                    echo "index.php?";
                }
                echo \Piwik\piwik_escape_filter($this->env, twig_slice($this->env, call_user_func_array($this->env->getFilter('urlRewriteWithParameters')->getCallable(), array($this->getAttribute($context["item"], "url", array()))), 1), "html", null, true);
                echo "'
                   title=\"";
                // line 17
                if ($this->getAttribute($context["item"], "tooltip", array())) {
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["item"], "tooltip", array()), "html_attr");
                }
                echo "\">
                    ";
                // line 18
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($this->getAttribute($context["item"], "name", array()))), "html", null, true);
                echo "
                </a>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 21
            echo "        </div>
    </li>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 25
    public function getgetId($__urlParameters__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "urlParameters" => $__urlParameters__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 26
            if (twig_test_iterable((isset($context["urlParameters"]) ? $context["urlParameters"] : $this->getContext($context, "urlParameters")))) {
                // line 27
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('urlRewriteWithParameters')->getCallable(), array((isset($context["urlParameters"]) ? $context["urlParameters"] : $this->getContext($context, "urlParameters")))), "html", null, true);
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 31
    public function getmenu($__menu__ = null, $__anchorlink__ = null, $__cssClass__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "menu" => $__menu__,
            "anchorlink" => $__anchorlink__,
            "cssClass" => $__cssClass__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 32
            echo "    <div id=\"secondNavBar\" class=\"";
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["cssClass"]) ? $context["cssClass"] : $this->getContext($context, "cssClass")), "html", null, true);
            echo "\">
        <div id=\"search\" ng-cloak>
            <div piwik-quick-access class=\"borderedControl\"></div>
        </div>
        <ul role=\"menu\" aria-label=\"";
            // line 36
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_MainNavigation")), "html_attr");
            echo "\" class=\"navbar\">
            ";
            // line 37
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["menu"]) ? $context["menu"] : $this->getContext($context, "menu")));
            foreach ($context['_seq'] as $context["level1"] => $context["level2"]) {
                // line 38
                echo "                ";
                $context["hasSubmenuItem"] = false;
                // line 39
                echo "                ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["level2"]);
                foreach ($context['_seq'] as $context["name"] => $context["urlParameters"]) {
                    // line 40
                    echo "                    ";
                    if (($this->getAttribute($context["urlParameters"], "_url", array(), "any", true, true) &&  !twig_test_iterable($this->getAttribute($context["urlParameters"], "_url", array())))) {
                        // line 41
                        echo "                        ";
                        $context["hasSubmenuItem"] = true;
                        // line 42
                        echo "                    ";
                    } elseif ((twig_slice($this->env, $context["name"], 0, 1) != "_")) {
                        // line 43
                        echo "                        ";
                        $context["hasSubmenuItem"] = true;
                        // line 44
                        echo "                    ";
                    }
                    // line 45
                    echo "                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['name'], $context['urlParameters'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 46
                echo "
                ";
                // line 47
                if ((isset($context["hasSubmenuItem"]) ? $context["hasSubmenuItem"] : $this->getContext($context, "hasSubmenuItem"))) {
                    // line 48
                    echo "                    <li role=\"menuitem\" class=\"menuTab\" id=\"";
                    if (($this->getAttribute($context["level2"], "_url", array(), "any", true, true) &&  !twig_test_empty($this->getAttribute($context["level2"], "_url", array())))) {
                        echo $this->getAttribute($this, "getId", array(0 => $this->getAttribute($context["level2"], "_url", array())), "method");
                    }
                    echo "\">
                        <a class=\"item\" href=\"\" tabindex=\"5\">
                            <span class=\"menu-icon ";
                    // line 50
                    echo \Piwik\piwik_escape_filter($this->env, (($this->getAttribute($context["level2"], "_icon", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["level2"], "_icon", array()), "icon-arrow-right")) : ("icon-arrow-right")), "html", null, true);
                    echo "\"></span>";
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($context["level1"])), "html", null, true);
                    echo "
                        </a>

                        <ul role=\"menu\" title=\"";
                    // line 53
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($context["level1"])), "html_attr");
                    echo "\">
                            ";
                    // line 54
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["level2"]);
                    foreach ($context['_seq'] as $context["name"] => $context["urlParameters"]) {
                        // line 55
                        echo "                                ";
                        if (($this->getAttribute($context["urlParameters"], "_url", array(), "any", true, true) &&  !twig_test_iterable($this->getAttribute($context["urlParameters"], "_url", array())))) {
                            // line 56
                            echo "                                    ";
                            echo $this->getAttribute($this, "groupedItem", array(0 => $context["name"], 1 => $this->getAttribute($context["urlParameters"], "_url", array()), 2 => (isset($context["anchorlink"]) ? $context["anchorlink"] : $this->getContext($context, "anchorlink"))), "method");
                            echo "
                                ";
                        } elseif ((twig_slice($this->env,                         // line 57
$context["name"], 0, 1) != "_")) {
                            // line 58
                            echo "                                    ";
                            echo $this->getAttribute($this, "submenuItem", array(0 => $context["name"], 1 => $this->getAttribute($context["urlParameters"], "_url", array()), 2 => (isset($context["anchorlink"]) ? $context["anchorlink"] : $this->getContext($context, "anchorlink")), 3 => $this->getAttribute($context["urlParameters"], "_tooltip", array())), "method");
                            echo "
                                ";
                        }
                        // line 60
                        echo "                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['name'], $context['urlParameters'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 61
                    echo "                        </ul>
                    </li>
                ";
                }
                // line 64
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['level1'], $context['level2'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 65
            echo "        </ul>
    </div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "@CoreHome/_menu.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  304 => 65,  298 => 64,  293 => 61,  287 => 60,  281 => 58,  279 => 57,  274 => 56,  271 => 55,  267 => 54,  263 => 53,  255 => 50,  247 => 48,  245 => 47,  242 => 46,  236 => 45,  233 => 44,  230 => 43,  227 => 42,  224 => 41,  221 => 40,  216 => 39,  213 => 38,  209 => 37,  205 => 36,  197 => 32,  183 => 31,  167 => 27,  165 => 26,  153 => 25,  136 => 21,  127 => 18,  121 => 17,  112 => 16,  109 => 15,  105 => 14,  101 => 13,  96 => 12,  82 => 11,  62 => 5,  53 => 4,  48 => 3,  45 => 2,  30 => 1,  25 => 30,  22 => 24,  19 => 10,);
    }

    public function getSource()
    {
        return "{% macro submenuItem(name, url, anchorlink, tooltip) %}
    {% if name|slice(0,1) != '_' %}
        <li role=\"menuitem\" title=\"{{ tooltip|default(\"\")|translate|e('html_attr') }}\">
            <a class=\"item\" href=\"{% if anchorlink %}#{% else %}index.php?{% endif %}{{ url|urlRewriteWithParameters|slice(1) }}\" tabindex=\"5\">
                {{ name|translate }}
            </a>
        </li>
    {% endif %}
{% endmacro %}

{% macro groupedItem(name, group, anchorlink) %}
    <li role=\"menuitem\" title=\"{{ name|translate|e('html_attr') }}\">
        <div piwik-menudropdown show-search=\"true\" menu-title=\"{{ name|translate|e('html_attr') }}\">
            {% for item in group.getItems %}
                <a class=\"item menuItem\"
                   href='{% if anchorlink %}#?{% else %}index.php?{% endif %}{{ item.url|urlRewriteWithParameters|slice(1) }}'
                   title=\"{% if item.tooltip %}{{ item.tooltip|e('html_attr') }}{% endif %}\">
                    {{ item.name|translate }}
                </a>
            {% endfor %}
        </div>
    </li>
{% endmacro %}

{% macro getId(urlParameters) -%}
    {% if urlParameters is iterable -%}
        {{ urlParameters|urlRewriteWithParameters }}
    {%- endif %}
{%- endmacro %}

{% macro menu(menu, anchorlink, cssClass) %}
    <div id=\"secondNavBar\" class=\"{{ cssClass }}\">
        <div id=\"search\" ng-cloak>
            <div piwik-quick-access class=\"borderedControl\"></div>
        </div>
        <ul role=\"menu\" aria-label=\"{{ 'CoreHome_MainNavigation'|translate|e('html_attr') }}\" class=\"navbar\">
            {% for level1,level2 in menu %}
                {% set hasSubmenuItem = false %}
                {% for name,urlParameters in level2 %}
                    {% if urlParameters._url is defined and urlParameters._url is not iterable %}
                        {% set hasSubmenuItem = true %}
                    {% elseif name|slice(0,1) != '_' %}
                        {% set hasSubmenuItem = true %}
                    {% endif %}
                {% endfor %}

                {% if hasSubmenuItem %}
                    <li role=\"menuitem\" class=\"menuTab\" id=\"{% if level2._url is defined and level2._url is not empty %}{{ _self.getId(level2._url) }}{% endif %}\">
                        <a class=\"item\" href=\"\" tabindex=\"5\">
                            <span class=\"menu-icon {{ level2._icon|default('icon-arrow-right') }}\"></span>{{ level1|translate }}
                        </a>

                        <ul role=\"menu\" title=\"{{ level1|translate|e('html_attr') }}\">
                            {% for name,urlParameters in level2 %}
                                {% if urlParameters._url is defined and urlParameters._url is not iterable %}
                                    {{ _self.groupedItem(name,urlParameters._url, anchorlink) }}
                                {% elseif name|slice(0,1) != '_' %}
                                    {{ _self.submenuItem(name,urlParameters._url, anchorlink, urlParameters._tooltip) }}
                                {% endif %}
                            {% endfor %}
                        </ul>
                    </li>
                {% endif %}
            {% endfor %}
        </ul>
    </div>
{% endmacro %}
";
    }
}

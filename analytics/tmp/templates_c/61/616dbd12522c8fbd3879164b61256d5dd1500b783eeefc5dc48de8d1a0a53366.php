<?php

/* @CoreHome/_headerMessage.twig */
class __TwigTemplate_079c2fce6aafff7584267d9c1442e6e4ab9c50f15d77e2c3a7972927c4651b8c extends Twig_Template
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
        $context["test_latest_version_available"] = "4.0.0";
        // line 3
        $context["test_piwikUrl"] = "http://demo.piwik.org/";
        // line 4
        ob_start();
        echo \Piwik\piwik_escape_filter($this->env, (((isset($context["piwikUrl"]) ? $context["piwikUrl"] : $this->getContext($context, "piwikUrl")) == "http://demo.piwik.org/") || ((isset($context["piwikUrl"]) ? $context["piwikUrl"] : $this->getContext($context, "piwikUrl")) == "https://demo.piwik.org/")), "html", null, true);
        $context["isPiwikDemo"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 5
        echo "
";
        // line 6
        ob_start();
        // line 7
        echo "    <span id=\"updateCheckLinkContainer\">
                ";
        // line 8
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_CheckForUpdates")), "html", null, true);
        echo "
        <span class=\"icon icon-fixed icon-reload\"></span>
    </span>
";
        $context["updateCheck"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 12
        echo "
";
        // line 13
        if ((((isset($context["isPiwikDemo"]) ? $context["isPiwikDemo"] : $this->getContext($context, "isPiwikDemo")) || (((isset($context["latest_version_available"]) ? $context["latest_version_available"] : $this->getContext($context, "latest_version_available")) && (isset($context["hasSomeViewAccess"]) ? $context["hasSomeViewAccess"] : $this->getContext($context, "hasSomeViewAccess"))) &&  !(isset($context["isUserIsAnonymous"]) ? $context["isUserIsAnonymous"] : $this->getContext($context, "isUserIsAnonymous")))) || (((isset($context["isSuperUser"]) ? $context["isSuperUser"] : $this->getContext($context, "isSuperUser")) && array_key_exists("adminMenu", $context)) && (isset($context["adminMenu"]) ? $context["adminMenu"] : $this->getContext($context, "adminMenu"))))) {
            // line 14
            echo "<div piwik-expand-on-hover
     id=\"header_message\"
     class=\"piwikSelector borderedControl ";
            // line 16
            if (((isset($context["isPiwikDemo"]) ? $context["isPiwikDemo"] : $this->getContext($context, "isPiwikDemo")) ||  !(isset($context["latest_version_available"]) ? $context["latest_version_available"] : $this->getContext($context, "latest_version_available")))) {
                echo "header_info";
            } else {
            }
            echo " ";
            if ((isset($context["isPiwikDemo"]) ? $context["isPiwikDemo"] : $this->getContext($context, "isPiwikDemo"))) {
                echo "isPiwikDemo";
            } else {
                echo "piwikTopControl";
            }
            echo " ";
            if ((isset($context["latest_version_available"]) ? $context["latest_version_available"] : $this->getContext($context, "latest_version_available"))) {
                echo "update_available";
            }
            echo "\"
        >

    <a class=\"title\" href=\"#\">
        ";
            // line 20
            if ((isset($context["isPiwikDemo"]) ? $context["isPiwikDemo"] : $this->getContext($context, "isPiwikDemo"))) {
                // line 21
                echo "            ";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_YouAreViewingDemoShortMessage")), "html", null, true);
                echo "
        ";
            } elseif (            // line 22
(isset($context["latest_version_available"]) ? $context["latest_version_available"] : $this->getContext($context, "latest_version_available"))) {
                // line 23
                echo "            ";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_NewUpdatePiwikX", (isset($context["latest_version_available"]) ? $context["latest_version_available"] : $this->getContext($context, "latest_version_available")))), "html", null, true);
                echo "
            <span class=\"icon-warning\"></span>
        ";
            } elseif (((            // line 25
(isset($context["isSuperUser"]) ? $context["isSuperUser"] : $this->getContext($context, "isSuperUser")) && array_key_exists("adminMenu", $context)) && (isset($context["adminMenu"]) ? $context["adminMenu"] : $this->getContext($context, "adminMenu")))) {
                // line 26
                echo "            ";
                echo (isset($context["updateCheck"]) ? $context["updateCheck"] : $this->getContext($context, "updateCheck"));
                echo "
        ";
            }
            // line 28
            echo "    </a>

    <div class=\"dropdown\">
        ";
            // line 31
            if ((isset($context["isPiwikDemo"]) ? $context["isPiwikDemo"] : $this->getContext($context, "isPiwikDemo"))) {
                // line 32
                echo "            ";
                echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_DownloadFullVersion", "<a rel='noreferrer' href='https://piwik.org/'>", "</a>", "<a rel='noreferrer' href='https://piwik.org'>piwik.org</a>"));
                echo "
            <br/>
            ";
                // line 34
                if ((((isset($context["isSuperUser"]) ? $context["isSuperUser"] : $this->getContext($context, "isSuperUser")) && array_key_exists("adminMenu", $context)) && (isset($context["adminMenu"]) ? $context["adminMenu"] : $this->getContext($context, "adminMenu")))) {
                    // line 35
                    echo "                <br/>
            ";
                }
                // line 37
                echo "        ";
            }
            // line 38
            echo "        ";
            if (((isset($context["latest_version_available"]) ? $context["latest_version_available"] : $this->getContext($context, "latest_version_available")) && (isset($context["isSuperUser"]) ? $context["isSuperUser"] : $this->getContext($context, "isSuperUser")))) {
                // line 39
                echo "            ";
                if ((isset($context["isMultiServerEnvironment"]) ? $context["isMultiServerEnvironment"] : $this->getContext($context, "isMultiServerEnvironment"))) {
                    // line 40
                    echo "                ";
                    echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_OneClickUpdateNotPossibleAsMultiServerEnvironment", (("<a rel='noreferrer' href='https://builds.piwik.org/piwik-" . (isset($context["latest_version_available"]) ? $context["latest_version_available"] : $this->getContext($context, "latest_version_available"))) . ".zip'>"), "</a>"));
                    echo "
            ";
                } else {
                    // line 42
                    echo "                ";
                    echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_PiwikXIsAvailablePleaseUpdateNow", (isset($context["latest_version_available"]) ? $context["latest_version_available"] : $this->getContext($context, "latest_version_available")), "<br /><a href='index.php?module=CoreUpdater&amp;action=newVersionAvailable'>", "</a>", "<a href='?module=Proxy&amp;action=redirect&amp;url=http://piwik.org/changelog/' target='_blank'>", "</a>"));
                    echo "
            ";
                }
                // line 44
                echo "            <br />
        ";
            } elseif ((((            // line 45
(isset($context["latest_version_available"]) ? $context["latest_version_available"] : $this->getContext($context, "latest_version_available")) &&  !(isset($context["isPiwikDemo"]) ? $context["isPiwikDemo"] : $this->getContext($context, "isPiwikDemo"))) && (isset($context["hasSomeViewAccess"]) ? $context["hasSomeViewAccess"] : $this->getContext($context, "hasSomeViewAccess"))) &&  !(isset($context["isUserIsAnonymous"]) ? $context["isUserIsAnonymous"] : $this->getContext($context, "isUserIsAnonymous")))) {
                // line 46
                echo "            ";
                $context["updateSubject"] = \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_NewUpdatePiwikX", (isset($context["latest_version_available"]) ? $context["latest_version_available"] : $this->getContext($context, "latest_version_available")))), "url");
                // line 47
                echo "            ";
                echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_PiwikXIsAvailablePleaseNotifyPiwikAdmin", (("<a href='?module=Proxy&action=redirect&url=http://piwik.org/' target='_blank'>Piwik</a> <a href='?module=Proxy&action=redirect&url=http://piwik.org/changelog/' target='_blank'>" . (isset($context["latest_version_available"]) ? $context["latest_version_available"] : $this->getContext($context, "latest_version_available"))) . "</a>"), (((("<a href='mailto:" . (isset($context["superUserEmails"]) ? $context["superUserEmails"] : $this->getContext($context, "superUserEmails"))) . "?subject=") . (isset($context["updateSubject"]) ? $context["updateSubject"] : $this->getContext($context, "updateSubject"))) . "'>"), "</a>"));
                echo "
            <br />
        ";
            }
            // line 50
            echo "
        ";
            // line 51
            if (((((isset($context["isPiwikDemo"]) ? $context["isPiwikDemo"] : $this->getContext($context, "isPiwikDemo")) && (isset($context["isSuperUser"]) ? $context["isSuperUser"] : $this->getContext($context, "isSuperUser"))) && array_key_exists("adminMenu", $context)) && (isset($context["adminMenu"]) ? $context["adminMenu"] : $this->getContext($context, "adminMenu")))) {
                // line 52
                echo "            <br/>
            ";
                // line 53
                echo (isset($context["updateCheck"]) ? $context["updateCheck"] : $this->getContext($context, "updateCheck"));
                echo "
            <br/>
            <br/>
        ";
            }
            // line 57
            echo "
        ";
            // line 58
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_YouAreCurrentlyUsing", (isset($context["piwik_version"]) ? $context["piwik_version"] : $this->getContext($context, "piwik_version")))), "html", null, true);
            echo "
    </div>
</div>

<div style=\"clear:right\"></div>
";
        }
    }

    public function getTemplateName()
    {
        return "@CoreHome/_headerMessage.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  167 => 58,  164 => 57,  157 => 53,  154 => 52,  152 => 51,  149 => 50,  142 => 47,  139 => 46,  137 => 45,  134 => 44,  128 => 42,  122 => 40,  119 => 39,  116 => 38,  113 => 37,  109 => 35,  107 => 34,  101 => 32,  99 => 31,  94 => 28,  88 => 26,  86 => 25,  80 => 23,  78 => 22,  73 => 21,  71 => 20,  51 => 16,  47 => 14,  45 => 13,  42 => 12,  35 => 8,  32 => 7,  30 => 6,  27 => 5,  23 => 4,  21 => 3,  19 => 2,);
    }

    public function getSource()
    {
        return "{# testing, remove test_ from var names #}
{% set test_latest_version_available=\"4.0.0\" %}
{% set test_piwikUrl='http://demo.piwik.org/' %}
{% set isPiwikDemo %}{{ piwikUrl == 'http://demo.piwik.org/' or piwikUrl == 'https://demo.piwik.org/' }}{% endset %}

{% set updateCheck %}
    <span id=\"updateCheckLinkContainer\">
                {{ 'CoreHome_CheckForUpdates'|translate }}
        <span class=\"icon icon-fixed icon-reload\"></span>
    </span>
{% endset %}

{% if isPiwikDemo or (latest_version_available and hasSomeViewAccess and not isUserIsAnonymous) or (isSuperUser and adminMenu is defined and adminMenu) %}
<div piwik-expand-on-hover
     id=\"header_message\"
     class=\"piwikSelector borderedControl {% if isPiwikDemo or not latest_version_available %}header_info{% else %}{% endif %} {% if isPiwikDemo %}isPiwikDemo{% else %}piwikTopControl{% endif %} {% if latest_version_available %}update_available{% endif %}\"
        >

    <a class=\"title\" href=\"#\">
        {% if isPiwikDemo %}
            {{ 'General_YouAreViewingDemoShortMessage'|translate }}
        {% elseif latest_version_available %}
            {{ 'General_NewUpdatePiwikX'|translate(latest_version_available) }}
            <span class=\"icon-warning\"></span>
        {% elseif isSuperUser and adminMenu is defined and adminMenu %}
            {{ updateCheck|raw }}
        {% endif %}
    </a>

    <div class=\"dropdown\">
        {% if isPiwikDemo %}
            {{ 'General_DownloadFullVersion'|translate(\"<a rel='noreferrer' href='https://piwik.org/'>\",\"</a>\",\"<a rel='noreferrer' href='https://piwik.org'>piwik.org</a>\")|raw }}
            <br/>
            {% if isSuperUser and adminMenu is defined and adminMenu %}
                <br/>
            {% endif %}
        {% endif %}
        {% if latest_version_available and isSuperUser %}
            {% if isMultiServerEnvironment %}
                {{ 'CoreHome_OneClickUpdateNotPossibleAsMultiServerEnvironment'|translate(\"<a rel='noreferrer' href='https://builds.piwik.org/piwik-\" ~ latest_version_available ~ \".zip'>\",\"</a>\")|raw }}
            {% else %}
                {{ 'General_PiwikXIsAvailablePleaseUpdateNow'|translate(latest_version_available,\"<br /><a href='index.php?module=CoreUpdater&amp;action=newVersionAvailable'>\",\"</a>\",\"<a href='?module=Proxy&amp;action=redirect&amp;url=http://piwik.org/changelog/' target='_blank'>\",\"</a>\")|raw }}
            {% endif %}
            <br />
        {% elseif latest_version_available and not isPiwikDemo and hasSomeViewAccess and not isUserIsAnonymous %}
            {% set updateSubject = 'General_NewUpdatePiwikX'|translate(latest_version_available)|e('url') %}
            {{ 'General_PiwikXIsAvailablePleaseNotifyPiwikAdmin'|translate(\"<a href='?module=Proxy&action=redirect&url=http://piwik.org/' target='_blank'>Piwik</a> <a href='?module=Proxy&action=redirect&url=http://piwik.org/changelog/' target='_blank'>\" ~ latest_version_available ~ \"</a>\", \"<a href='mailto:\" ~ superUserEmails ~ \"?subject=\" ~ updateSubject ~ \"'>\", \"</a>\")|raw }}
            <br />
        {% endif %}

        {% if isPiwikDemo and isSuperUser and adminMenu is defined and adminMenu %}
            <br/>
            {{ updateCheck|raw }}
            <br/>
            <br/>
        {% endif %}

        {{ 'General_YouAreCurrentlyUsing'|translate(piwik_version) }}
    </div>
</div>

<div style=\"clear:right\"></div>
{% endif %}
";
    }
}

<?php

/* @CoreAdminHome/generalSettings.twig */
class __TwigTemplate_46a986762c45844e19e6bf7af252125588df4144bf05d98fda3827242fbdcbcd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin.twig", "@CoreAdminHome/generalSettings.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "admin.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        ob_start();
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_MenuGeneralSettings")), "html", null, true);
        $context["title"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        $context["piwik"] = $this->loadTemplate("macros.twig", "@CoreAdminHome/generalSettings.twig", 6);
        // line 7
        echo "    ";
        $context["ajax"] = $this->loadTemplate("ajaxMacros.twig", "@CoreAdminHome/generalSettings.twig", 7);
        // line 8
        echo "
    ";
        // line 9
        echo $context["ajax"]->geterrorDiv();
        echo "
    ";
        // line 10
        echo $context["ajax"]->getloadingDiv();
        echo "

    <h2>";
        // line 12
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_ArchivingSettings")), "html", null, true);
        echo "</h2>

    ";
        // line 14
        if ((isset($context["isGeneralSettingsAdminEnabled"]) ? $context["isGeneralSettingsAdminEnabled"] : $this->getContext($context, "isGeneralSettingsAdminEnabled"))) {
            // line 15
            echo "        <div class=\"form-group\">
            <label>";
            // line 16
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_AllowPiwikArchivingToTriggerBrowser")), "html", null, true);
            echo "</label>
            <div class=\"form-help\">
                ";
            // line 18
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ArchivingInlineHelp")), "html", null, true);
            echo "
                <br/>
                ";
            // line 20
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_SeeTheOfficialDocumentationForMoreInformation", "<a href='?module=Proxy&action=redirect&url=http://piwik.org/docs/setup-auto-archiving/' target='_blank'>", "</a>"));
            echo "
            </div>
            <label class=\"radio\">
                <input type=\"radio\" value=\"1\" name=\"enableBrowserTriggerArchiving\" ";
            // line 23
            if (((isset($context["enableBrowserTriggerArchiving"]) ? $context["enableBrowserTriggerArchiving"] : $this->getContext($context, "enableBrowserTriggerArchiving")) == 1)) {
                echo " checked=\"checked\"";
            }
            echo " />
                ";
            // line 24
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Yes")), "html", null, true);
            echo "
                <span class=\"form-description\">";
            // line 25
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Default")), "html", null, true);
            echo "</span>
            </label>
            <label class=\"radio\">
                <input type=\"radio\" value=\"0\" name=\"enableBrowserTriggerArchiving\" ";
            // line 28
            if (((isset($context["enableBrowserTriggerArchiving"]) ? $context["enableBrowserTriggerArchiving"] : $this->getContext($context, "enableBrowserTriggerArchiving")) == 0)) {
                echo " checked=\"checked\"";
            }
            echo " />
                ";
            // line 29
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_No")), "html", null, true);
            echo "
                <span class=\"form-description\">";
            // line 30
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ArchivingTriggerDescription", "<a href='?module=Proxy&action=redirect&url=http://piwik.org/docs/setup-auto-archiving/' target='_blank'>", "</a>"));
            echo "</span>
            </label>
        </div>
    ";
        } else {
            // line 34
            echo "        <div class=\"form-group\">
            <label>";
            // line 35
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_AllowPiwikArchivingToTriggerBrowser")), "html", null, true);
            echo "</label>
            <label class=\"radio\">
                <input type=\"radio\" checked=\"checked\" disabled=\"disabled\" />
                ";
            // line 38
            if (((isset($context["enableBrowserTriggerArchiving"]) ? $context["enableBrowserTriggerArchiving"] : $this->getContext($context, "enableBrowserTriggerArchiving")) == 1)) {
                // line 39
                echo "                    ";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Yes")), "html", null, true);
                echo "
                ";
            } else {
                // line 41
                echo "                    ";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_No")), "html", null, true);
                echo "
                ";
            }
            // line 43
            echo "            </label>
        </div>
    ";
        }
        // line 46
        echo "
    <div class=\"form-group\">
        <label for=\"todayArchiveTimeToLive\">
            ";
        // line 49
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ReportsContainingTodayWillBeProcessedAtMostEvery")), "html", null, true);
        echo "
        </label>
        ";
        // line 51
        if ((isset($context["isGeneralSettingsAdminEnabled"]) ? $context["isGeneralSettingsAdminEnabled"] : $this->getContext($context, "isGeneralSettingsAdminEnabled"))) {
            // line 52
            echo "            <div class=\"form-help\">
                ";
            // line 53
            if ((isset($context["showWarningCron"]) ? $context["showWarningCron"] : $this->getContext($context, "showWarningCron"))) {
                // line 54
                echo "                    <strong>
                        ";
                // line 55
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_NewReportsWillBeProcessedByCron")), "html", null, true);
                echo "<br/>
                        ";
                // line 56
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ReportsWillBeProcessedAtMostEveryHour")), "html", null, true);
                echo "
                        ";
                // line 57
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_IfArchivingIsFastYouCanSetupCronRunMoreOften")), "html", null, true);
                echo "<br/>
                    </strong>
                ";
            }
            // line 60
            echo "                ";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_SmallTrafficYouCanLeaveDefault", (isset($context["todayArchiveTimeToLiveDefault"]) ? $context["todayArchiveTimeToLiveDefault"] : $this->getContext($context, "todayArchiveTimeToLiveDefault")))), "html", null, true);
            echo "
                <br/>
                ";
            // line 62
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_MediumToHighTrafficItIsRecommendedTo", 1800, 3600)), "html", null, true);
            echo "
            </div>
        ";
        }
        // line 65
        echo "        <div class=\"input-group\">
            <input value='";
        // line 66
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["todayArchiveTimeToLive"]) ? $context["todayArchiveTimeToLive"] : $this->getContext($context, "todayArchiveTimeToLive")), "html", null, true);
        echo "' id='todayArchiveTimeToLive' ";
        if ( !(isset($context["isGeneralSettingsAdminEnabled"]) ? $context["isGeneralSettingsAdminEnabled"] : $this->getContext($context, "isGeneralSettingsAdminEnabled"))) {
            echo "disabled=\"disabled\"";
        }
        echo " />
            <span class=\"input-group-addon\">";
        // line 67
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Intl_NSeconds", "")), "html", null, true);
        echo "</span>
        </div>
        <span class=\"form-description\">
            ";
        // line 70
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_RearchiveTimeIntervalOnlyForTodayReports")), "html", null, true);
        echo "
        </span>
    </div>

    ";
        // line 74
        if ((isset($context["isGeneralSettingsAdminEnabled"]) ? $context["isGeneralSettingsAdminEnabled"] : $this->getContext($context, "isGeneralSettingsAdminEnabled"))) {
            // line 75
            echo "        <h2>";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_UpdateSettings")), "html", null, true);
            echo "</h2>

        <div class=\"form-group\">
            <label>";
            // line 78
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_ReleaseChannel")), "html", null, true);
            echo "</label>
            <div class=\"form-help\">
                ";
            // line 80
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_DevelopmentProcess", "<a href='?module=Proxy&action=redirect&url=http://piwik.org/participate/development-process/' target='_blank'>", "</a>"));
            echo "
                <br/>
                ";
            // line 82
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_StableReleases", "<a href='?module=Proxy&action=redirect&url=http%3A%2F%2Fdeveloper.piwik.org%2Fguides%2Fcore-team-workflow%23influencing-piwik-development' target='_blank'>", "</a>"));
            echo "
                <br />
                ";
            // line 84
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_LtsReleases")), "html", null, true);
            echo "
            </div>
            ";
            // line 86
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["releaseChannels"]) ? $context["releaseChannels"] : $this->getContext($context, "releaseChannels")));
            foreach ($context['_seq'] as $context["_key"] => $context["releaseChannel"]) {
                // line 87
                echo "                <label class=\"radio\">
                    <input type=\"radio\" value=\"";
                // line 88
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["releaseChannel"], "id", array()), "html_attr");
                echo "\" name=\"releaseChannel\"";
                if ($this->getAttribute($context["releaseChannel"], "active", array())) {
                    echo " checked=\"checked\"";
                }
                echo " />
                    ";
                // line 89
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["releaseChannel"], "name", array()), "html", null, true);
                echo "
                    ";
                // line 90
                if ($this->getAttribute($context["releaseChannel"], "description", array())) {
                    // line 91
                    echo "                    <span class=\"form-description\">";
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["releaseChannel"], "description", array()), "html", null, true);
                    echo "</span>
                    ";
                }
                // line 93
                echo "                </label>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['releaseChannel'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 95
            echo "        </div>

        ";
            // line 97
            if ((isset($context["canUpdateCommunication"]) ? $context["canUpdateCommunication"] : $this->getContext($context, "canUpdateCommunication"))) {
                // line 98
                echo "            <div class=\"form-group\">
                <label>";
                // line 99
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_SendPluginUpdateCommunication")), "html", null, true);
                echo "</label>
                <div class=\"form-help\">
                    ";
                // line 101
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_SendPluginUpdateCommunicationHelp")), "html", null, true);
                echo "
                </div>
                <label class=\"radio\">
                    <input type=\"radio\" name=\"enablePluginUpdateCommunication\" value=\"1\"
                            ";
                // line 105
                if (((isset($context["enableSendPluginUpdateCommunication"]) ? $context["enableSendPluginUpdateCommunication"] : $this->getContext($context, "enableSendPluginUpdateCommunication")) == 1)) {
                    echo " checked=\"checked\"";
                }
                echo "/>
                    ";
                // line 106
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Yes")), "html", null, true);
                echo "
                </label>
                <label class=\"radio\">
                    <input type=\"radio\" name=\"enablePluginUpdateCommunication\" value=\"0\"
                            ";
                // line 110
                if (((isset($context["enableSendPluginUpdateCommunication"]) ? $context["enableSendPluginUpdateCommunication"] : $this->getContext($context, "enableSendPluginUpdateCommunication")) == 0)) {
                    echo " checked=\"checked\"";
                }
                echo "/>
                    ";
                // line 111
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_No")), "html", null, true);
                echo "
                    <span class=\"form-description\">";
                // line 112
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Default")), "html", null, true);
                echo "</span>
                </label>
            </div>
        ";
            }
            // line 116
            echo "    ";
        }
        // line 117
        echo "
    ";
        // line 118
        if ((isset($context["isGeneralSettingsAdminEnabled"]) ? $context["isGeneralSettingsAdminEnabled"] : $this->getContext($context, "isGeneralSettingsAdminEnabled"))) {
            // line 119
            echo "        <h2>";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_EmailServerSettings")), "html", null, true);
            echo "</h2>

        <div class=\"form-group\">
            <label>";
            // line 122
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_UseSMTPServerForEmail")), "html", null, true);
            echo "</label>
            <div class=\"form-help\">
                ";
            // line 124
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_SelectYesIfYouWantToSendEmailsViaServer")), "html", null, true);
            echo "
            </div>
            <label class=\"radio\">
                <input type=\"radio\" name=\"mailUseSmtp\" value=\"1\" ";
            // line 127
            if (($this->getAttribute((isset($context["mail"]) ? $context["mail"] : $this->getContext($context, "mail")), "transport", array()) == "smtp")) {
                echo "checked";
            }
            echo " />
                ";
            // line 128
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Yes")), "html", null, true);
            echo "
            </label>
            <label class=\"radio\">
                <input type=\"radio\" name=\"mailUseSmtp\" value=\"0\" ";
            // line 131
            if (($this->getAttribute((isset($context["mail"]) ? $context["mail"] : $this->getContext($context, "mail")), "transport", array()) == "")) {
                echo "checked";
            }
            echo " />
                ";
            // line 132
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_No")), "html", null, true);
            echo "
            </label>
        </div>

        <div id=\"smtpSettings\">
            <div class=\"form-group\">
                <label for=\"mailHost\">";
            // line 138
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_SmtpServerAddress")), "html", null, true);
            echo "</label>
                <input type=\"text\" id=\"mailHost\" value=\"";
            // line 139
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute((isset($context["mail"]) ? $context["mail"] : $this->getContext($context, "mail")), "host", array()), "html", null, true);
            echo "\">
            </div>
            <div class=\"form-group\">
                <label for=\"mailPort\">";
            // line 142
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_SmtpPort")), "html", null, true);
            echo "</label>
                <span class=\"form-help\">";
            // line 143
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_OptionalSmtpPort")), "html", null, true);
            echo "</span>
                <input type=\"text\" id=\"mailPort\" value=\"";
            // line 144
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute((isset($context["mail"]) ? $context["mail"] : $this->getContext($context, "mail")), "port", array()), "html", null, true);
            echo "\">
            </div>
            <div class=\"form-group\">
                <label for=\"mailType\">";
            // line 147
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_AuthenticationMethodSmtp")), "html", null, true);
            echo "</label>
                <span class=\"form-help\">";
            // line 148
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_OnlyUsedIfUserPwdIsSet")), "html", null, true);
            echo "</span>
                <select id=\"mailType\">
                    <option value=\"\" ";
            // line 150
            if (($this->getAttribute((isset($context["mail"]) ? $context["mail"] : $this->getContext($context, "mail")), "type", array()) == "")) {
                echo " selected=\"selected\" ";
            }
            echo "></option>
                    <option id=\"plain\" ";
            // line 151
            if (($this->getAttribute((isset($context["mail"]) ? $context["mail"] : $this->getContext($context, "mail")), "type", array()) == "Plain")) {
                echo " selected=\"selected\" ";
            }
            echo " value=\"Plain\">Plain</option>
                    <option id=\"login\" ";
            // line 152
            if (($this->getAttribute((isset($context["mail"]) ? $context["mail"] : $this->getContext($context, "mail")), "type", array()) == "Login")) {
                echo " selected=\"selected\" ";
            }
            echo " value=\"Login\"> Login</option>
                    <option id=\"cram-md5\" ";
            // line 153
            if (($this->getAttribute((isset($context["mail"]) ? $context["mail"] : $this->getContext($context, "mail")), "type", array()) == "Crammd5")) {
                echo " selected=\"selected\" ";
            }
            echo " value=\"Crammd5\"> Crammd5</option>
                </select>
            </div>
            <div class=\"form-group\">
                <label for=\"mailUsername\">";
            // line 157
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_SmtpUsername")), "html", null, true);
            echo "</label>
                <span class=\"form-help\">";
            // line 158
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_OnlyEnterIfRequired")), "html", null, true);
            echo "</span>
                <input type=\"text\" id=\"mailUsername\" value=\"";
            // line 159
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute((isset($context["mail"]) ? $context["mail"] : $this->getContext($context, "mail")), "username", array()), "html", null, true);
            echo "\"/>
            </div>
            <div class=\"form-group\">
                <label for=\"mailPassword\">";
            // line 162
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_SmtpPassword")), "html", null, true);
            echo "</label>
                <span class=\"form-help\">
                    ";
            // line 164
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_OnlyEnterIfRequiredPassword")), "html", null, true);
            echo "<br/>
                    ";
            // line 165
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_WarningPasswordStored", "<strong>", "</strong>"));
            echo "
                </span>
                <input type=\"password\" id=\"mailPassword\" value=\"";
            // line 167
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute((isset($context["mail"]) ? $context["mail"] : $this->getContext($context, "mail")), "password", array()), "html", null, true);
            echo "\"/>
            </div>
            <div class=\"form-group\">
                <label for=\"mailEncryption\">";
            // line 170
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_SmtpEncryption")), "html", null, true);
            echo "</label>
                <span class=\"form-help\">";
            // line 171
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_EncryptedSmtpTransport")), "html", null, true);
            echo "</span>
                <select id=\"mailEncryption\">
                    <option value=\"\" ";
            // line 173
            if (($this->getAttribute((isset($context["mail"]) ? $context["mail"] : $this->getContext($context, "mail")), "encryption", array()) == "")) {
                echo " selected=\"selected\" ";
            }
            echo "></option>
                    <option id=\"ssl\" ";
            // line 174
            if (($this->getAttribute((isset($context["mail"]) ? $context["mail"] : $this->getContext($context, "mail")), "encryption", array()) == "ssl")) {
                echo " selected=\"selected\" ";
            }
            echo " value=\"ssl\">SSL</option>
                    <option id=\"tls\" ";
            // line 175
            if (($this->getAttribute((isset($context["mail"]) ? $context["mail"] : $this->getContext($context, "mail")), "encryption", array()) == "tls")) {
                echo " selected=\"selected\" ";
            }
            echo " value=\"tls\">TLS</option>
                </select>
            </div>
        </div>
    ";
        }
        // line 180
        echo "
    <h2>";
        // line 181
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_BrandingSettings")), "html", null, true);
        echo "</h2>

    <p>";
        // line 183
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_CustomLogoHelpText")), "html", null, true);
        echo "</p>

    <div class=\"form-group\">
        <label>";
        // line 186
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_UseCustomLogo")), "html", null, true);
        echo "</label>
        <div class=\"form-help\">
            ";
        // line 188
        ob_start();
        echo "\"";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_GiveUsYourFeedback")), "html", null, true);
        echo "\"";
        $context["giveUsFeedbackText"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 189
        echo "            ";
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_CustomLogoFeedbackInfo", (isset($context["giveUsFeedbackText"]) ? $context["giveUsFeedbackText"] : $this->getContext($context, "giveUsFeedbackText")), "<a href='?module=CorePluginsAdmin&action=plugins' rel='noreferrer' target='_blank'>", "</a>"));
        echo "
        </div>
        <label class=\"radio\">
            <input type=\"radio\" name=\"useCustomLogo\" value=\"1\" ";
        // line 192
        if (($this->getAttribute((isset($context["branding"]) ? $context["branding"] : $this->getContext($context, "branding")), "use_custom_logo", array()) == 1)) {
            echo "checked";
        }
        echo " />
            ";
        // line 193
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Yes")), "html", null, true);
        echo "
        </label>
        <label class=\"radio\">
            <input type=\"radio\" name=\"useCustomLogo\" value=\"0\" ";
        // line 196
        if (($this->getAttribute((isset($context["branding"]) ? $context["branding"] : $this->getContext($context, "branding")), "use_custom_logo", array()) == 0)) {
            echo "checked";
        }
        echo " />
            ";
        // line 197
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_No")), "html", null, true);
        echo "
        </label>
    </div>

    <div id=\"logoSettings\">
        <form id=\"logoUploadForm\" method=\"post\" enctype=\"multipart/form-data\" action=\"index.php?module=CoreAdminHome&format=json&action=uploadCustomLogo\">
            ";
        // line 203
        if ((isset($context["fileUploadEnabled"]) ? $context["fileUploadEnabled"] : $this->getContext($context, "fileUploadEnabled"))) {
            // line 204
            echo "                <input type=\"hidden\" name=\"token_auth\" value=\"";
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["token_auth"]) ? $context["token_auth"] : $this->getContext($context, "token_auth")), "html", null, true);
            echo "\"/>

                ";
            // line 206
            if ((isset($context["logosWriteable"]) ? $context["logosWriteable"] : $this->getContext($context, "logosWriteable"))) {
                // line 207
                echo "                    <div class=\"alert alert-warning uploaderror\" style=\"display:none;\">
                        ";
                // line 208
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_LogoUploadFailed")), "html", null, true);
                echo "
                    </div>
                    <div class=\"form-group\">
                        <label for=\"customLogo\">";
                // line 211
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_LogoUpload")), "html", null, true);
                echo "</label>
                        <div class=\"form-help\">";
                // line 212
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_LogoUploadHelp", "JPG / PNG / GIF", 110)), "html", null, true);
                echo "</div>
                        <input name=\"customLogo\" type=\"file\" id=\"customLogo\"/>
                        <img data-src=\"";
                // line 214
                echo \Piwik\piwik_escape_filter($this->env, (isset($context["pathUserLogo"]) ? $context["pathUserLogo"] : $this->getContext($context, "pathUserLogo")), "html", null, true);
                echo "\" data-src-exists=\"";
                echo (((isset($context["hasUserLogo"]) ? $context["hasUserLogo"] : $this->getContext($context, "hasUserLogo"))) ? ("1") : ("0"));
                echo "\" id=\"currentLogo\" style=\"max-height: 150px\"/>
                    </div>
                    <div class=\"form-group\">
                        <label for=\"customLogo\">";
                // line 217
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_FaviconUpload")), "html", null, true);
                echo "</label>
                        <div class=\"form-help\">";
                // line 218
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_LogoUploadHelp", "JPG / PNG / GIF", 16)), "html", null, true);
                echo "</div>
                        <input name=\"customFavicon\" type=\"file\" id=\"customFavicon\"/>
                        <img data-src=\"";
                // line 220
                echo \Piwik\piwik_escape_filter($this->env, (isset($context["pathUserFavicon"]) ? $context["pathUserFavicon"] : $this->getContext($context, "pathUserFavicon")), "html", null, true);
                echo "\" data-src-exists=\"";
                echo (((isset($context["hasUserFavicon"]) ? $context["hasUserFavicon"] : $this->getContext($context, "hasUserFavicon"))) ? ("1") : ("0"));
                echo "\" id=\"currentFavicon\" width=\"16\" height=\"16\"/>
                    </div>
                ";
            } else {
                // line 223
                echo "                    <div class=\"alert alert-warning\">
                        ";
                // line 224
                echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_LogoNotWriteableInstruction", (("<code>" .                 // line 225
(isset($context["pathUserLogoDirectory"]) ? $context["pathUserLogoDirectory"] : $this->getContext($context, "pathUserLogoDirectory"))) . "</code><br/>"), ((((((isset($context["pathUserLogo"]) ? $context["pathUserLogo"] : $this->getContext($context, "pathUserLogo")) . ", ") . (isset($context["pathUserLogoSmall"]) ? $context["pathUserLogoSmall"] : $this->getContext($context, "pathUserLogoSmall"))) . ", ") . (isset($context["pathUserLogoSVG"]) ? $context["pathUserLogoSVG"] : $this->getContext($context, "pathUserLogoSVG"))) . "")));
                echo "
                    </div>
                ";
            }
            // line 228
            echo "            ";
        } else {
            // line 229
            echo "                <div class=\"alert alert-warning\">
                    ";
            // line 230
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_FileUploadDisabled", "file_uploads=1")), "html", null, true);
            echo "
                </div>
            ";
        }
        // line 233
        echo "        </form>
    </div>

    <div class=\"ui-confirm\" id=\"confirmTrustedHostChange\">
        <h2>";
        // line 237
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_TrustedHostConfirm")), "html", null, true);
        echo "</h2>
        <input role=\"yes\" type=\"button\" value=\"";
        // line 238
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Yes")), "html", null, true);
        echo "\"/>
        <input role=\"no\" type=\"button\" value=\"";
        // line 239
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_No")), "html", null, true);
        echo "\"/>
    </div>
    <h2 id=\"trustedHostsSection\">";
        // line 241
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_TrustedHostSettings")), "html", null, true);
        echo "</h2>
    <div id='trustedHostSettings'>

        ";
        // line 244
        $this->loadTemplate("@CoreHome/_warningInvalidHost.twig", "@CoreAdminHome/generalSettings.twig", 244)->display($context);
        // line 245
        echo "
        ";
        // line 246
        if ( !(isset($context["isGeneralSettingsAdminEnabled"]) ? $context["isGeneralSettingsAdminEnabled"] : $this->getContext($context, "isGeneralSettingsAdminEnabled"))) {
            // line 247
            echo "            ";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_PiwikIsInstalledAt")), "html", null, true);
            echo ": ";
            echo \Piwik\piwik_escape_filter($this->env, twig_join_filter((isset($context["trustedHosts"]) ? $context["trustedHosts"] : $this->getContext($context, "trustedHosts")), ", "), "html", null, true);
            echo "
        ";
        } else {
            // line 249
            echo "            <div class=\"form-group\">
                <label>";
            // line 250
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_ValidPiwikHostname")), "html", null, true);
            echo "</label>
            </div>
            <ul>
                ";
            // line 253
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["trustedHosts"]) ? $context["trustedHosts"] : $this->getContext($context, "trustedHosts")));
            foreach ($context['_seq'] as $context["hostIdx"] => $context["host"]) {
                // line 254
                echo "                    <li>
                        <input name=\"trusted_host\" type=\"text\" value=\"";
                // line 255
                echo \Piwik\piwik_escape_filter($this->env, $context["host"], "html", null, true);
                echo "\"/>
                        <a href=\"#\" class=\"remove-trusted-host btn btn-flat btn-lg\" title=\"";
                // line 256
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Delete")), "html", null, true);
                echo "\">
                            <span class=\"icon-minus\"></span>
                        </a>
                    </li>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['hostIdx'], $context['host'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 261
            echo "            </ul>

            <div class=\"add-trusted-host\">
                <input type=\"text\" placeholder=\"";
            // line 264
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_AddNewTrustedHost")), "html_attr");
            echo "\" readonly/>

                <a href=\"#\" class=\"btn btn-flat btn-lg\" title=\"";
            // line 266
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Add")), "html", null, true);
            echo "\">
                    <span class=\"icon-add\"></span>
                </a>

            </div>
        ";
        }
        // line 272
        echo "    </div>

    <input type=\"submit\" value=\"";
        // line 274
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Save")), "html", null, true);
        echo "\" class=\"submit generalSettingsSubmit\"/>
    <br/><br/>

    ";
        // line 277
        if ((isset($context["isDataPurgeSettingsEnabled"]) ? $context["isDataPurgeSettingsEnabled"] : $this->getContext($context, "isDataPurgeSettingsEnabled"))) {
            // line 278
            echo "        <h2>";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_DeleteDataSettings")), "html", null, true);
            echo "</h2>
        <p>";
            // line 279
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_DeleteDataDescription")), "html", null, true);
            echo " ";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_DeleteDataDescription2")), "html", null, true);
            echo "</p>
        <p>
            <a href='";
            // line 281
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFunction('linkTo')->getCallable(), array(array("module" => "PrivacyManager", "action" => "privacySettings"))), "html", null, true);
            echo "#deleteLogsAnchor'>
                ";
            // line 282
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_ClickHereSettings", (("'" . call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_DeleteDataSettings"))) . "'"))), "html", null, true);
            echo "
            </a>
        </p>
    ";
        }
        // line 286
        echo "
";
    }

    public function getTemplateName()
    {
        return "@CoreAdminHome/generalSettings.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  762 => 286,  755 => 282,  751 => 281,  744 => 279,  739 => 278,  737 => 277,  731 => 274,  727 => 272,  718 => 266,  713 => 264,  708 => 261,  697 => 256,  693 => 255,  690 => 254,  686 => 253,  680 => 250,  677 => 249,  669 => 247,  667 => 246,  664 => 245,  662 => 244,  656 => 241,  651 => 239,  647 => 238,  643 => 237,  637 => 233,  631 => 230,  628 => 229,  625 => 228,  619 => 225,  618 => 224,  615 => 223,  607 => 220,  602 => 218,  598 => 217,  590 => 214,  585 => 212,  581 => 211,  575 => 208,  572 => 207,  570 => 206,  564 => 204,  562 => 203,  553 => 197,  547 => 196,  541 => 193,  535 => 192,  528 => 189,  522 => 188,  517 => 186,  511 => 183,  506 => 181,  503 => 180,  493 => 175,  487 => 174,  481 => 173,  476 => 171,  472 => 170,  466 => 167,  461 => 165,  457 => 164,  452 => 162,  446 => 159,  442 => 158,  438 => 157,  429 => 153,  423 => 152,  417 => 151,  411 => 150,  406 => 148,  402 => 147,  396 => 144,  392 => 143,  388 => 142,  382 => 139,  378 => 138,  369 => 132,  363 => 131,  357 => 128,  351 => 127,  345 => 124,  340 => 122,  333 => 119,  331 => 118,  328 => 117,  325 => 116,  318 => 112,  314 => 111,  308 => 110,  301 => 106,  295 => 105,  288 => 101,  283 => 99,  280 => 98,  278 => 97,  274 => 95,  267 => 93,  261 => 91,  259 => 90,  255 => 89,  247 => 88,  244 => 87,  240 => 86,  235 => 84,  230 => 82,  225 => 80,  220 => 78,  213 => 75,  211 => 74,  204 => 70,  198 => 67,  190 => 66,  187 => 65,  181 => 62,  175 => 60,  169 => 57,  165 => 56,  161 => 55,  158 => 54,  156 => 53,  153 => 52,  151 => 51,  146 => 49,  141 => 46,  136 => 43,  130 => 41,  124 => 39,  122 => 38,  116 => 35,  113 => 34,  106 => 30,  102 => 29,  96 => 28,  90 => 25,  86 => 24,  80 => 23,  74 => 20,  69 => 18,  64 => 16,  61 => 15,  59 => 14,  54 => 12,  49 => 10,  45 => 9,  42 => 8,  39 => 7,  36 => 6,  33 => 5,  29 => 1,  25 => 3,  11 => 1,);
    }

    public function getSource()
    {
        return "{% extends 'admin.twig' %}

{% set title %}{{ 'CoreAdminHome_MenuGeneralSettings'|translate }}{% endset %}

{% block content %}
    {% import 'macros.twig' as piwik %}
    {% import 'ajaxMacros.twig' as ajax %}

    {{ ajax.errorDiv() }}
    {{ ajax.loadingDiv() }}

    <h2>{{ 'CoreAdminHome_ArchivingSettings'|translate }}</h2>

    {% if isGeneralSettingsAdminEnabled %}
        <div class=\"form-group\">
            <label>{{ 'General_AllowPiwikArchivingToTriggerBrowser'|translate }}</label>
            <div class=\"form-help\">
                {{ 'General_ArchivingInlineHelp'|translate }}
                <br/>
                {{ 'General_SeeTheOfficialDocumentationForMoreInformation'|translate(\"<a href='?module=Proxy&action=redirect&url=http://piwik.org/docs/setup-auto-archiving/' target='_blank'>\",\"</a>\")|raw }}
            </div>
            <label class=\"radio\">
                <input type=\"radio\" value=\"1\" name=\"enableBrowserTriggerArchiving\" {% if enableBrowserTriggerArchiving==1 %} checked=\"checked\"{% endif %} />
                {{ 'General_Yes'|translate }}
                <span class=\"form-description\">{{ 'General_Default'|translate }}</span>
            </label>
            <label class=\"radio\">
                <input type=\"radio\" value=\"0\" name=\"enableBrowserTriggerArchiving\" {% if enableBrowserTriggerArchiving==0 %} checked=\"checked\"{% endif %} />
                {{ 'General_No'|translate }}
                <span class=\"form-description\">{{ 'General_ArchivingTriggerDescription'|translate(\"<a href='?module=Proxy&action=redirect&url=http://piwik.org/docs/setup-auto-archiving/' target='_blank'>\",\"</a>\")|raw }}</span>
            </label>
        </div>
    {% else %}
        <div class=\"form-group\">
            <label>{{ 'General_AllowPiwikArchivingToTriggerBrowser'|translate }}</label>
            <label class=\"radio\">
                <input type=\"radio\" checked=\"checked\" disabled=\"disabled\" />
                {% if enableBrowserTriggerArchiving==1 %}
                    {{ 'General_Yes'|translate }}
                {% else %}
                    {{ 'General_No'|translate }}
                {% endif %}
            </label>
        </div>
    {% endif %}

    <div class=\"form-group\">
        <label for=\"todayArchiveTimeToLive\">
            {{ 'General_ReportsContainingTodayWillBeProcessedAtMostEvery'|translate }}
        </label>
        {% if isGeneralSettingsAdminEnabled %}
            <div class=\"form-help\">
                {% if showWarningCron %}
                    <strong>
                        {{ 'General_NewReportsWillBeProcessedByCron'|translate }}<br/>
                        {{ 'General_ReportsWillBeProcessedAtMostEveryHour'|translate }}
                        {{ 'General_IfArchivingIsFastYouCanSetupCronRunMoreOften'|translate }}<br/>
                    </strong>
                {% endif %}
                {{ 'General_SmallTrafficYouCanLeaveDefault'|translate( todayArchiveTimeToLiveDefault ) }}
                <br/>
                {{ 'General_MediumToHighTrafficItIsRecommendedTo'|translate(1800,3600) }}
            </div>
        {% endif %}
        <div class=\"input-group\">
            <input value='{{ todayArchiveTimeToLive  }}' id='todayArchiveTimeToLive' {% if not isGeneralSettingsAdminEnabled %}disabled=\"disabled\"{% endif %} />
            <span class=\"input-group-addon\">{{ 'Intl_NSeconds'|translate('') }}</span>
        </div>
        <span class=\"form-description\">
            {{ 'General_RearchiveTimeIntervalOnlyForTodayReports'|translate }}
        </span>
    </div>

    {% if isGeneralSettingsAdminEnabled %}
        <h2>{{ 'CoreAdminHome_UpdateSettings'|translate }}</h2>

        <div class=\"form-group\">
            <label>{{ 'CoreAdminHome_ReleaseChannel'|translate }}</label>
            <div class=\"form-help\">
                {{ 'CoreAdminHome_DevelopmentProcess'|translate(\"<a href='?module=Proxy&action=redirect&url=http://piwik.org/participate/development-process/' target='_blank'>\",\"</a>\")|raw }}
                <br/>
                {{ 'CoreAdminHome_StableReleases'|translate(\"<a href='?module=Proxy&action=redirect&url=http%3A%2F%2Fdeveloper.piwik.org%2Fguides%2Fcore-team-workflow%23influencing-piwik-development' target='_blank'>\",\"</a>\")|raw }}
                <br />
                {{ 'CoreAdminHome_LtsReleases'|translate }}
            </div>
            {% for releaseChannel in releaseChannels %}
                <label class=\"radio\">
                    <input type=\"radio\" value=\"{{ releaseChannel.id|e('html_attr') }}\" name=\"releaseChannel\"{% if releaseChannel.active %} checked=\"checked\"{% endif %} />
                    {{ releaseChannel.name }}
                    {% if releaseChannel.description %}
                    <span class=\"form-description\">{{ releaseChannel.description }}</span>
                    {% endif %}
                </label>
            {% endfor %}
        </div>

        {% if canUpdateCommunication %}
            <div class=\"form-group\">
                <label>{{ 'CoreAdminHome_SendPluginUpdateCommunication'|translate }}</label>
                <div class=\"form-help\">
                    {{ 'CoreAdminHome_SendPluginUpdateCommunicationHelp'|translate }}
                </div>
                <label class=\"radio\">
                    <input type=\"radio\" name=\"enablePluginUpdateCommunication\" value=\"1\"
                            {% if enableSendPluginUpdateCommunication==1 %} checked=\"checked\"{% endif %}/>
                    {{ 'General_Yes'|translate }}
                </label>
                <label class=\"radio\">
                    <input type=\"radio\" name=\"enablePluginUpdateCommunication\" value=\"0\"
                            {% if enableSendPluginUpdateCommunication==0 %} checked=\"checked\"{% endif %}/>
                    {{ 'General_No'|translate }}
                    <span class=\"form-description\">{{ 'General_Default'|translate }}</span>
                </label>
            </div>
        {% endif %}
    {% endif %}

    {% if isGeneralSettingsAdminEnabled %}
        <h2>{{ 'CoreAdminHome_EmailServerSettings'|translate }}</h2>

        <div class=\"form-group\">
            <label>{{ 'General_UseSMTPServerForEmail'|translate }}</label>
            <div class=\"form-help\">
                {{ 'General_SelectYesIfYouWantToSendEmailsViaServer'|translate }}
            </div>
            <label class=\"radio\">
                <input type=\"radio\" name=\"mailUseSmtp\" value=\"1\" {% if mail.transport == 'smtp' %}checked{% endif %} />
                {{ 'General_Yes'|translate }}
            </label>
            <label class=\"radio\">
                <input type=\"radio\" name=\"mailUseSmtp\" value=\"0\" {% if mail.transport == '' %}checked{% endif %} />
                {{ 'General_No'|translate }}
            </label>
        </div>

        <div id=\"smtpSettings\">
            <div class=\"form-group\">
                <label for=\"mailHost\">{{ 'General_SmtpServerAddress'|translate }}</label>
                <input type=\"text\" id=\"mailHost\" value=\"{{ mail.host }}\">
            </div>
            <div class=\"form-group\">
                <label for=\"mailPort\">{{ 'General_SmtpPort'|translate }}</label>
                <span class=\"form-help\">{{ 'General_OptionalSmtpPort'|translate }}</span>
                <input type=\"text\" id=\"mailPort\" value=\"{{ mail.port }}\">
            </div>
            <div class=\"form-group\">
                <label for=\"mailType\">{{ 'General_AuthenticationMethodSmtp'|translate }}</label>
                <span class=\"form-help\">{{ 'General_OnlyUsedIfUserPwdIsSet'|translate }}</span>
                <select id=\"mailType\">
                    <option value=\"\" {% if mail.type == '' %} selected=\"selected\" {% endif %}></option>
                    <option id=\"plain\" {% if mail.type == 'Plain' %} selected=\"selected\" {% endif %} value=\"Plain\">Plain</option>
                    <option id=\"login\" {% if mail.type == 'Login' %} selected=\"selected\" {% endif %} value=\"Login\"> Login</option>
                    <option id=\"cram-md5\" {% if mail.type == 'Crammd5' %} selected=\"selected\" {% endif %} value=\"Crammd5\"> Crammd5</option>
                </select>
            </div>
            <div class=\"form-group\">
                <label for=\"mailUsername\">{{ 'General_SmtpUsername'|translate }}</label>
                <span class=\"form-help\">{{ 'General_OnlyEnterIfRequired'|translate }}</span>
                <input type=\"text\" id=\"mailUsername\" value=\"{{ mail.username }}\"/>
            </div>
            <div class=\"form-group\">
                <label for=\"mailPassword\">{{ 'General_SmtpPassword'|translate }}</label>
                <span class=\"form-help\">
                    {{ 'General_OnlyEnterIfRequiredPassword'|translate }}<br/>
                    {{ 'General_WarningPasswordStored'|translate(\"<strong>\",\"</strong>\")|raw }}
                </span>
                <input type=\"password\" id=\"mailPassword\" value=\"{{ mail.password }}\"/>
            </div>
            <div class=\"form-group\">
                <label for=\"mailEncryption\">{{ 'General_SmtpEncryption'|translate }}</label>
                <span class=\"form-help\">{{ 'General_EncryptedSmtpTransport'|translate }}</span>
                <select id=\"mailEncryption\">
                    <option value=\"\" {% if mail.encryption == '' %} selected=\"selected\" {% endif %}></option>
                    <option id=\"ssl\" {% if mail.encryption == 'ssl' %} selected=\"selected\" {% endif %} value=\"ssl\">SSL</option>
                    <option id=\"tls\" {% if mail.encryption == 'tls' %} selected=\"selected\" {% endif %} value=\"tls\">TLS</option>
                </select>
            </div>
        </div>
    {% endif %}

    <h2>{{ 'CoreAdminHome_BrandingSettings'|translate }}</h2>

    <p>{{ 'CoreAdminHome_CustomLogoHelpText'|translate }}</p>

    <div class=\"form-group\">
        <label>{{ 'CoreAdminHome_UseCustomLogo'|translate }}</label>
        <div class=\"form-help\">
            {% set giveUsFeedbackText %}\"{{ 'General_GiveUsYourFeedback'|translate }}\"{% endset %}
            {{ 'CoreAdminHome_CustomLogoFeedbackInfo'|translate(giveUsFeedbackText,\"<a href='?module=CorePluginsAdmin&action=plugins' rel='noreferrer' target='_blank'>\",\"</a>\")|raw }}
        </div>
        <label class=\"radio\">
            <input type=\"radio\" name=\"useCustomLogo\" value=\"1\" {% if branding.use_custom_logo == 1 %}checked{% endif %} />
            {{ 'General_Yes'|translate }}
        </label>
        <label class=\"radio\">
            <input type=\"radio\" name=\"useCustomLogo\" value=\"0\" {% if branding.use_custom_logo == 0 %}checked{% endif %} />
            {{ 'General_No'|translate }}
        </label>
    </div>

    <div id=\"logoSettings\">
        <form id=\"logoUploadForm\" method=\"post\" enctype=\"multipart/form-data\" action=\"index.php?module=CoreAdminHome&format=json&action=uploadCustomLogo\">
            {% if fileUploadEnabled %}
                <input type=\"hidden\" name=\"token_auth\" value=\"{{ token_auth }}\"/>

                {% if logosWriteable %}
                    <div class=\"alert alert-warning uploaderror\" style=\"display:none;\">
                        {{ 'CoreAdminHome_LogoUploadFailed'|translate }}
                    </div>
                    <div class=\"form-group\">
                        <label for=\"customLogo\">{{ 'CoreAdminHome_LogoUpload'|translate }}</label>
                        <div class=\"form-help\">{{ 'CoreAdminHome_LogoUploadHelp'|translate(\"JPG / PNG / GIF\", 110) }}</div>
                        <input name=\"customLogo\" type=\"file\" id=\"customLogo\"/>
                        <img data-src=\"{{ pathUserLogo }}\" data-src-exists=\"{{ hasUserLogo ? '1':'0' }}\" id=\"currentLogo\" style=\"max-height: 150px\"/>
                    </div>
                    <div class=\"form-group\">
                        <label for=\"customLogo\">{{ 'CoreAdminHome_FaviconUpload'|translate }}</label>
                        <div class=\"form-help\">{{ 'CoreAdminHome_LogoUploadHelp'|translate(\"JPG / PNG / GIF\", 16) }}</div>
                        <input name=\"customFavicon\" type=\"file\" id=\"customFavicon\"/>
                        <img data-src=\"{{ pathUserFavicon }}\" data-src-exists=\"{{ hasUserFavicon ? '1':'0' }}\" id=\"currentFavicon\" width=\"16\" height=\"16\"/>
                    </div>
                {% else %}
                    <div class=\"alert alert-warning\">
                        {{ 'CoreAdminHome_LogoNotWriteableInstruction'
                            |translate(\"<code>\"~pathUserLogoDirectory~\"</code><br/>\", pathUserLogo ~\", \"~ pathUserLogoSmall ~\", \"~ pathUserLogoSVG ~\"\")|raw }}
                    </div>
                {% endif %}
            {% else %}
                <div class=\"alert alert-warning\">
                    {{ 'CoreAdminHome_FileUploadDisabled'|translate(\"file_uploads=1\") }}
                </div>
            {% endif %}
        </form>
    </div>

    <div class=\"ui-confirm\" id=\"confirmTrustedHostChange\">
        <h2>{{ 'CoreAdminHome_TrustedHostConfirm'|translate }}</h2>
        <input role=\"yes\" type=\"button\" value=\"{{ 'General_Yes'|translate }}\"/>
        <input role=\"no\" type=\"button\" value=\"{{ 'General_No'|translate }}\"/>
    </div>
    <h2 id=\"trustedHostsSection\">{{ 'CoreAdminHome_TrustedHostSettings'|translate }}</h2>
    <div id='trustedHostSettings'>

        {% include \"@CoreHome/_warningInvalidHost.twig\" %}

        {% if not isGeneralSettingsAdminEnabled %}
            {{ 'CoreAdminHome_PiwikIsInstalledAt'|translate }}: {{ trustedHosts|join(\", \") }}
        {% else %}
            <div class=\"form-group\">
                <label>{{ 'CoreAdminHome_ValidPiwikHostname'|translate }}</label>
            </div>
            <ul>
                {% for hostIdx, host in trustedHosts %}
                    <li>
                        <input name=\"trusted_host\" type=\"text\" value=\"{{ host }}\"/>
                        <a href=\"#\" class=\"remove-trusted-host btn btn-flat btn-lg\" title=\"{{ 'General_Delete'|translate }}\">
                            <span class=\"icon-minus\"></span>
                        </a>
                    </li>
                {% endfor %}
            </ul>

            <div class=\"add-trusted-host\">
                <input type=\"text\" placeholder=\"{{ 'CoreAdminHome_AddNewTrustedHost'|translate|e('html_attr') }}\" readonly/>

                <a href=\"#\" class=\"btn btn-flat btn-lg\" title=\"{{ 'General_Add'|translate }}\">
                    <span class=\"icon-add\"></span>
                </a>

            </div>
        {% endif %}
    </div>

    <input type=\"submit\" value=\"{{ 'General_Save'|translate }}\" class=\"submit generalSettingsSubmit\"/>
    <br/><br/>

    {% if isDataPurgeSettingsEnabled %}
        <h2>{{ 'PrivacyManager_DeleteDataSettings'|translate }}</h2>
        <p>{{ 'PrivacyManager_DeleteDataDescription'|translate }} {{ 'PrivacyManager_DeleteDataDescription2'|translate }}</p>
        <p>
            <a href='{{ linkTo({'module':\"PrivacyManager\", 'action':\"privacySettings\"}) }}#deleteLogsAnchor'>
                {{ 'PrivacyManager_ClickHereSettings'|translate(\"'\" ~ 'PrivacyManager_DeleteDataSettings'|translate ~ \"'\") }}
            </a>
        </p>
    {% endif %}

{% endblock %}
";
    }
}

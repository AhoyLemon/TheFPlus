<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik\Plugins\CorePluginsAdmin;

use Piwik\Config;
use Piwik\Plugin;

class CorePluginsAdmin extends Plugin
{
    /**
     * @see Plugin::registerEvents
     */
    public function registerEvents()
    {
        return array(
            'AssetManager.getJavaScriptFiles'        => 'getJsFiles',
            'AssetManager.getStylesheetFiles'        => 'getStylesheetFiles',
            'Translate.getClientSideTranslationKeys' => 'getClientSideTranslationKeys'
        );
    }

    public function getStylesheetFiles(&$stylesheets)
    {
        $stylesheets[] = "plugins/CorePluginsAdmin/stylesheets/plugins_admin.less";
        $stylesheets[] = "plugins/CorePluginsAdmin/angularjs/plugin-settings/plugin-settings.directive.less";
    }

    public static function isPluginsAdminEnabled()
    {
        return (bool) Config::getInstance()->General['enable_plugins_admin'];
    }

    public function getJsFiles(&$jsFiles)
    {
        $jsFiles[] = "libs/bower_components/jQuery.dotdotdot/src/js/jquery.dotdotdot.min.js";
        $jsFiles[] = "plugins/CoreHome/javascripts/popover.js";
    }

    public function getClientSideTranslationKeys(&$translations)
    {
        $translations[] = 'CorePluginsAdmin_NoZipFileSelected';
        $translations[] = 'CorePluginsAdmin_NoPluginSettings';
        $translations[] = 'CoreAdminHome_PluginSettingsIntro';
        $translations[] = 'CoreAdminHome_PluginSettingsSaveSuccess';
        $translations[] = 'General_Save';
    }

}

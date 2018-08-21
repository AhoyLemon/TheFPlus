# Kirby Version Widget
![Version](https://img.shields.io/badge/version-2.0.0-green.svg)
![License](https://img.shields.io/badge/license-MIT-green.svg)
![Kirby Version](https://img.shields.io/badge/Kirby-2.3%2B-red.svg)

Panel dashboard widget displaying installed and latest version with link to changelog for [Kirby](http://getkirby.com).

![Kirby Version Widget screenshot Latest version](https://github.com/Thiousi/kirby-version-widget/blob/master/latestversion.png)

## Installation

### 1. Kirby CLI

If you are using the [Kirby CLI](https://github.com/getkirby/cli) you can install this plugin by running the following command in your shell from the root folder of your Kirby installation:

```
kirby plugin:install Thiousi/kirby-version-widget
```

### 2. Manual
[Download this archive](https://github.com/Thiousi/kirby-version-widget/archive/master.zip), extract it and rename it to `version-widget`. Copy the folder to your `site/plugins` folder.

### 3. Git Submodule
If you know your way around git, you can download this as a submodule:

```
$ git submodule add https://github.com/Thiousi/kirby-version-widget site/plugins/version-widget
```

## Usage
You don't have anything to do once the widget is installed. The widget has two states:

### 1. Latest version is installed

![Kirby Version Widget screenshot Latest version](https://github.com/Thiousi/kirby-version-widget/blob/master/latestversion.png)

### 2. New version available
When a new version is available, clicking on the version number will redirect to the Kirby Changelog for that version.
![Kirby Version Widget screenshot New version](https://github.com/Thiousi/kirby-version-widget/blob/master/newversion.png)

## Options

The following option can be set in your `/site/config/config.php` file:

```php
/* Version widget */
c::set('plugin.version.widget.cache_period', '+1 day');
```

### plugin.drafts.widget.cache_period

This option is used to define how long the remote version will be cached. It can take a few seconds for the version to be checked depending on a few factors. By default this is set to `+1 days` which means the cache will last for one day. The function used to convert this is [strtotime](http://php.net/manual/en/function.strtotime.php). You can change this to for example to:
- `next week`
- `+5 days`
- `+1 week 2 days 4 hours 2 seconds`

## To-do
- [ ] Display the widget only for admin role (with option in config)
- [ ] Internationalize widget?
- [X] Check latest version from cache
- [X] ~~Update readme~~
- [X] ~~Make it CLI and submodule compatible~~

## Credits
- [@jenstornell](https://github.com/jenstornell) for his feedback.
- Inspired by [kirby version by Fabian Sperrle.](https://github.com/FabianSperrle/kirby-version)
- [@lukasbestle](https://github.com/lukasbestle/) for his help with the cache and making sure my code wouldn't launch any nuclear missiles!
- [Kirbygram](https://github.com/PWesterdale/KirbyGram) for inspiration on using a custom cache system.

## License
MIT

## Changelog
### 1.0.0
- Initial release

### 1.1.0
- Changed colors to default panel colors
- Made CLI compatible
- Made Submodule compatible
- Enhanced readme
- Updated screenshots
- Fixed icon
- Added chain icon on new version message
- Fixed compressed headline and spacing issues

### 2.0.0
- Now with built-in configurable custom cache!

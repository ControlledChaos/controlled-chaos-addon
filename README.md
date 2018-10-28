# Controlled Chaos Addon

A WordPress starter plugin for building child or addon plugins.

![WordPress tested on verion 4.9.8](https://img.shields.io/badge/WordPress-tested%204.9.8-0073aa.svg?style=flat-square)
![PHP tested on version 7.2](https://img.shields.io/badge/PHP-tested%207.2-8892bf.svg?style=flat-square)

![](https://raw.githubusercontent.com/ControlledChaos/controlled-chaos-plugin/master/controlled-chaos-github-banner.jpg)

[Controlled Chaos Plugin](https://github.com/ControlledChaos/controlled-chaos-plugin) can be used as a base plugin for a WordPress multisite installation or otherwise related websites. This plugin is intended to be used as a site-specific plugin for functionality unique to sites running the parent plugin.

## Compatibility

Needs the [Controlled Chaos Plugin](https://github.com/ControlledChaos/controlled-chaos-plugin) or a renamed version to be installed and activated. If the parent plugin has been renamed then several definitions in this plugins core file need to be changed to reflect the new name.

* This plugin was written in a WordPress 4.9+ environment with no concern for backwards compatitbility.
* This plugin was written on a local server running PHP 7.0
* The short array syntax ( "[]" rather than "array()" ) requires PHP 5.4+
* Run a modern setup and you'll be fine.

## Features

At this point the plugin doesn't do much. It is up to you to add your extended functionality. However, it does add the bones of a settings page and one option to hide that page in the admin menu. This option is displayed on the parent plugin's Site Settings page and can be used as an example for how to add setting to existing parent pages.

Included is a proper directory structure and blank CSS and JavaScript files ready to use.
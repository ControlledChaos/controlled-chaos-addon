# Controlled Chaos Supplement

A WordPress starter plugin for buildin child or addon plugins.

![WordPress](https://img.shields.io/wordpress/v/akismet.svg?style=flat-square)
![PHP version](https://img.shields.io/php-eye/symfony/symfony.svg?style=flat-square)

[Controlled Chaos Plugin](https://github.com/ControlledChaos/controlled-chaos-plugin) can be used as a base plugin for a WordPress multisite installation or otherwise related websites. This plugin is intended to be used as a site-specific plugin for functionality unique to sites running the parent plugin.

## Compatibility

Needs the [Controlled Chaos Plugin](https://github.com/ControlledChaos/controlled-chaos-plugin) or a renamed version to be installed and activated. If the parent plugin has been renamed then several definitions in this plugins core file need to be changed to reflect the new name.

* This plugin was written in a WordPress 4.9+ environment with no concern for backwards compatitbility.
* This plugin was written on a local server running PHP 7.0
* The short array syntax ( "[]" rather than "array()" ) requires PHP 5.4+
* Run a modern setup and you'll be fine.
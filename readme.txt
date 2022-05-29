=== WpOnError ===
Contributors: vitoranguia
Donate link: https://liberapay.com/vitoranguia/
Tags: window.onerror, JavaScript
Requires at least: 4.7
Tested up to: 6.0
Stable tag: 1.1.2
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Register GlobalEventHandlers.onerror in WordPress

== Description ==

This package is compatible with [WordPress Coding Standards](https://github.com/WordPress/WordPress-Coding-Standards), [PSR-4](https://www.php-fig.org/psr/psr-4),
[Prettier](https://prettier.io), [StandardJS](https://standardjs.com) and [LibreJS](https://www.gnu.org/software/librejs).

Register [GlobalEventHandlers.onerror](https://developer.mozilla.org/en-US/docs/Web/API/GlobalEventHandlers/onerror) in WordPress post type and optionally receive an email via wp_mail

== Installation ==

This project uses [PHP](https://php.net) and [Composer](https://getcomposer.org).

$ cd wp-content/plugins/
$ git clone https://gitlab.com/sepbit/wponerror.git
$ cd wponerror
$ composer update --no-dev

== Screenshots ==

1. List of all post_type
2. See a specific post_type

== Changelog ==

= 1.1.2 =
* Fix post type

= 1.1.1 =
* Add private post type

= 1.1.0 =
* Add disable button

= 1.0.2 =
* Add icon and banner
* Change readme.txt

= 1.0.1 =
* Fix update_post_meta

= 1.0.0 =
* First release!

=== Custom Table Plugin ===
Contributors: lyonmuller
Tags: custom table, form, shortcode, REST API, AJAX
Requires at least: 5.0
Tested up to: 6.1
Requires PHP: 7.2
Stable tag: trunk
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A plugin that creates a custom table, allows data insertion via a form, displays the data, and supports AJAX and REST API.

== Description ==

This plugin provides:

* A custom database table to store data.
* A shortcode to display a form for data insertion.
* A shortcode to display the data from the custom table.
* AJAX support for form submission.
* REST API endpoints to insert and retrieve data.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/custom-table-plugin` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Use the `[custom_table_form]` shortcode to display the form and `[custom_table_list]` shortcode to display the data.

== Frequently Asked Questions ==

= How do I display the form for data insertion? =

Use the `[custom_table_form]` shortcode in your post or page.

= How do I display the data from the custom table? =

Use the `[custom_table_list]` shortcode in your post or page.

= Does this plugin support AJAX for form submission? =

Yes, the plugin supports AJAX for form submission to provide a seamless user experience.

= How can I interact with the data via the REST API? =

You can use the following endpoints:
- POST /wp-json/custom/v1/thing to insert data
- GET /wp-json/custom/v1/things to retrieve data

== Changelog ==

= 1.0 =
* Initial release.

== Upgrade Notice ==

= 1.0 =
* Initial release.

== License ==

This plugin is licensed under the GPLv2 or later.
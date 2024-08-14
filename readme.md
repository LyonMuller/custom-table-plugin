# Custom Table Plugin

A WordPress plugin that creates a custom table, allows data insertion via a form, displays the data, and supports AJAX and REST API.

## Features

- Custom database table
- Shortcode for data insertion form
- Shortcode for displaying data
- AJAX support for form submission
- REST API endpoints for data operations

## Installation

1. Upload the plugin files to the `/wp-content/plugins/custom-table-plugin` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Use the `[custom_table_form]` shortcode to display the form and `[custom_table_list]` shortcode to display the data.

## Shortcodes

- `[custom_table_form]` - Display the form for data insertion
- `[custom_table_list]` - Display the data from the custom table

## REST API Endpoints

- **POST** `/wp-json/custom/v1/thing` - Insert data
- **GET** `/wp-json/custom/v1/things` - Retrieve data

## AJAX Support

The form submission is handled via AJAX for a seamless user experience. The JavaScript file responsible for this is located in `assets/js/custom-table-plugin.js`.

## License

This plugin is licensed under the GPLv2 or later.

## Changelog

### 1.0

- Initial release.

## Frequently Asked Questions

### How do I display the form for data insertion?

Use the `[custom_table_form]` shortcode in your post or page.

### How do I display the data from the custom table?

Use the `[custom_table_list]` shortcode in your post or page.

### Does this plugin support AJAX for form submission?

Yes, the plugin supports AJAX for form submission to provide a seamless user experience.

### How can I interact with the data via the REST API?

You can use the following endpoints:
- POST /wp-json/custom/v1/thing to insert data
- GET /wp-json/custom/v1/things to retrieve data
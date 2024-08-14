<?php
/*
 * Plugin Name:       Custom Table Plugin
 * Plugin URI:        https://plugins.lyon.dev/custom-table-plugin
 * Description:       A plugin that creates a custom table, allows data insertion via a form, and displays the data with search functionality.
 * Version:           1.0
 * Requires at least: 5.0
 * Requires PHP:      7.2
 * Author:            Lyon Müller
 * Author URI:        https://lyon.dev
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://plugins.lyon.dev/custom-table-plugin/update
 * Text Domain:       custom-table-plugin
 * Domain Path:       /languages
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}

global $wpdb;

// Define table name constant
if (!defined('CUSTOM_TABLE_PLUGIN_TABLE_NAME')) {
  define('CUSTOM_TABLE_PLUGIN_TABLE_NAME', $wpdb->prefix . 'custom_table');
}

// Include the necessary files
require_once plugin_dir_path(__FILE__) . 'includes/class-custom-table-plugin.php';
require_once plugin_dir_path(__FILE__) . 'includes/rest-api.php';
require_once plugin_dir_path(__FILE__) . 'includes/shortcodes.php';
// Initialize the plugin
add_action('init', ['Custom_Table_Plugin', 'init']);

function incsub_enqueue_scripts()
{
  wp_enqueue_script('jquery');
  wp_enqueue_script('custom-table-plugin', plugin_dir_url(__FILE__) . 'assets/js/custom-table-plugin.js', ['jquery'], null, true);
  wp_localize_script('custom-table-plugin', 'customTablePlugin', [
    'ajax_url' => admin_url('admin-ajax.php')
  ]);
  wp_enqueue_style('custom-table-plugin', plugin_dir_url(__FILE__) . 'assets/css/custom-table-plugin.css');
}
add_action('wp_enqueue_scripts', 'incsub_enqueue_scripts');

// Register the uninstall hook
register_deactivation_hook(__FILE__, 'incsub_custom_table_plugin_uninstall');

function incsub_custom_table_plugin_uninstall() {
  global $wpdb;
  $table_name = CUSTOM_TABLE_PLUGIN_TABLE_NAME;
  $wpdb->query("DROP TABLE IF EXISTS $table_name");
  error_log('Custom table plugin uninstalled: ' . $table_name);
}

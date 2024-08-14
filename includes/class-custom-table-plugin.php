<?php
if (!class_exists('Custom_Table_Plugin')) {

  class Custom_Table_Plugin
  {
    private static $table_name;

    public static function init()
    {
      global $wpdb;
      self::$table_name = CUSTOM_TABLE_PLUGIN_TABLE_NAME;
      self::create_table();
    }

    private static function create_table()
    {
      global $wpdb;
      $charset_collate = $wpdb->get_charset_collate();

      $sql = "CREATE TABLE " . self::$table_name . " (
                id mediumint(9) NOT NULL AUTO_INCREMENT,
                name text NOT NULL,
                PRIMARY KEY  (id)
            ) $charset_collate;";

      require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
      dbDelta($sql);
    }

    public static function insert_data($name)
    {
      global $wpdb;
      $wpdb->insert(
        self::$table_name,
        [
          'name' => sanitize_text_field($name)
        ]
      );
    }

    public static function get_data()
    {
      global $wpdb;
      $query = $wpdb->prepare("SELECT * FROM %s", self::$table_name);
      $data = $wpdb->get_results(str_replace("'", "", $query));

      return $data;
    }
  }
}

// Hook the initialization function to the init action
add_action('init', ['Custom_Table_Plugin', 'init']);

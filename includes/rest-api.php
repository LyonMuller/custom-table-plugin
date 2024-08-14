<?php
// AJAX actions for inserting data
add_action('wp_ajax_insert_custom_table_data', 'incsub_handle_data_insertion');
add_action('wp_ajax_nopriv_insert_custom_table_data', 'incsub_handle_data_insertion');
add_action('wp_ajax_get_custom_table_data', 'incsub_get_custom_table_data');
add_action('wp_ajax_nopriv_get_custom_table_data', 'incsub_get_custom_table_data');

// REST API routes
add_action('rest_api_init', function () {
  register_rest_route('custom/v1', '/thing', [
    'methods'  => 'POST',
    'callback' => 'incsub_handle_rest_insertion',
    'permission_callback' => '__return_true',
  ]);

  register_rest_route('custom/v1', '/things', [
    'methods'  => 'GET',
    'callback' => 'incsub_custom_table_rest_get_data',
    'permission_callback' => '__return_true',
  ]);
});

// Function to handle data insertion for both AJAX and REST API
function incsub_handle_data_insertion()
{
  if (isset($_POST['name'])) {
    $name = sanitize_text_field($_POST['name']);
    incsub_insert_data($name);
  } else {
    wp_send_json_error('No name provided');
  }
}

function incsub_handle_rest_insertion(WP_REST_Request $request)
{
  $name = sanitize_text_field($request->get_param('name'));
  incsub_insert_data($name);
}

// Function to insert data and send appropriate response
function incsub_insert_data($name)
{
  if (!empty($name)) {
    Custom_Table_Plugin::insert_data($name);
    wp_send_json_success('Data inserted successfully');
  } else {
    wp_send_json_error('Name cannot be empty');
  }
}

function incsub_get_custom_table_data()
{
  $data = Custom_Table_Plugin::get_data();
  wp_send_json_success($data);
}

// Function to get data for REST API
function incsub_custom_table_rest_get_data(WP_REST_Request $request)
{
  return rest_ensure_response(Custom_Table_Plugin::get_data());
}

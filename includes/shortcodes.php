<?php
// Shortcode for the form
function incsub_custom_table_form_shortcode()
{
  ob_start();
?>
  <form id="custom-table-form" method="POST">
    <input type="text" name="custom_table_name" placeholder="Enter name" required>
    <input type="submit" value="Submit">
  </form>
  <div id="form-response"></div>
<?php
  return ob_get_clean();
}
add_shortcode('custom_table_form', 'incsub_custom_table_form_shortcode');

// Shortcode for displaying data
function incsub_custom_table_list_shortcode()
{
  $data = Custom_Table_Plugin::get_data();
  ob_start();
?>
  <table id="custom-table-list">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($data) : ?>
        <?php foreach ($data as $row) : ?>
          <tr>
            <td><?php echo esc_html($row->id); ?></td>
            <td><?php echo esc_html($row->name); ?></td>
          </tr>
        <?php endforeach; ?>
      <?php else : ?>
        <tr>
          <td colspan="2">No data found</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
<?php
  return ob_get_clean();
}
add_shortcode('custom_table_list', 'incsub_custom_table_list_shortcode');

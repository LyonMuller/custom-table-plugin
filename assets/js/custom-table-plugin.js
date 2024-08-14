jQuery(document).ready(function ($) {
  $('#custom-table-form').on('submit', function (e) {
    e.preventDefault();

    const name = $('input[name="custom_table_name"]').val();
    $.ajax({
      url: customTablePlugin.ajax_url,
      type: 'POST',
      data: {
        action: 'insert_custom_table_data',
        name: name,
      },
      success: function (response) {
        const responseDiv = $('#form-response');
        if (response.success) {
          responseDiv.html(
            '<p class="success-message">' + response.data + '</p>',
          );
          updateTable();
          $('input[name="custom_table_name"]').val('');
        } else {
          responseDiv.html(
            '<p class="error-message">' + response.data + '</p>',
          );
        }
      },
    });
  });

  function updateTable() {
    $.ajax({
      url: customTablePlugin.ajax_url,
      type: 'POST',
      data: {
        action: 'get_custom_table_data',
      },
      success: function (response) {
        if (response.success) {
          const tbody = $('#custom-table-list tbody');
          tbody.empty();
          $.each(response.data, function (index, row) {
            tbody.append(
              '<tr><td>' + row.id + '</td><td>' + row.name + '</td></tr>',
            );
          });
        }
      },
    });
  }
});

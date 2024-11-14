$(document).ready(function () {
// Delete Menu Item
$(document).on('click', '.deleteBtn', function () {
  var menuId = $(this).data('id');
  var row = $(this).closest('tr'); // Store a reference to the row

  if (confirm("Are you sure you want to delete this menu item?")) {
      $.ajax({
          type: 'POST',
          url: 'forms/delete_menu.php',
          data: { id: menuId },
          success: function () {
              // Remove the corresponding row from the table
              row.remove();
          },
          error: function (error) {
              console.log(error);
          }
      });
  }
});

    // Edit Menu Item
    $(document).on('click', '.editBtn', function () {
      var menuId = $(this).data('id');

      $.ajax({
          type: 'POST',
          url: 'forms/get_menu_details.php',
          data: { id: menuId },
          dataType: 'json',
          success: function (response) {
              if (response && response.success) {
                  // Populate the edit form with the fetched data
                  window.showEditForm = function () {
                    $('#editMenuModal').modal('show');
                  };
                  $('#editProductName').val(response.menuDetails.productName);
                  $('#editCategory').val(response.menuDetails.category);
                  $('#editPrice').val(response.menuDetails.price);
                  $('#editIngredients').val(response.menuDetails.ingredients);

                  // Update the menu item on form submission
                  $('#editMenuForm').off('submit').on('submit', function (e) {
                      e.preventDefault();
                      // Update the menu item using AJAX
                      $.ajax({
                          type: 'POST',
                          url: 'forms/update_menu.php',
                          data: {
                              id: menuId,
                              productName: $('#editProductName').val(),
                              category: $('#editCategory').val(),
                              price: $('#editPrice').val(),
                              ingredients: $('#editIngredients').val(),
                          },
                          success: function () {
                              // Reload the page after successful update
                              window.location.reload();
                          },
                          error: function (error) {
                              console.log(error);
                          }
                      });
                  });
              } else {
                  console.log('Failed to fetch menu details.');
              }
          },
          error: function (xhr, status, error) {
              console.log('Error fetching menu details:', error);
          }
      });
    });


  // Function to show Add Form
  window.showAddForm = function () {
      $('#addMenuModal').modal('show');
  };

 
});

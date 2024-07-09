
<?php
// echo "jibran";

include "conn.php";
$selected_orders = isset($_GET['selected_orders']) ? explode(',', $_GET['selected_orders']) : array();
if (!empty($selected_orders)) {
  // Build a comma-separated list of the selected order IDs for the SQL query
  $selected_order_ids = implode(',', array_map('intval', $selected_orders));
  
  // Construct the SQL query to update the status of the selected orders
  $update_query = "UPDATE release_vector SET status = 'paid' WHERE orderid IN ($selected_order_ids)";
  
  // Execute the query
  if (mysqli_query($conn, $update_query)) {
      echo "Selected orders updated successfully.";

  } else {
      echo "Error updating : " . mysqli_error($conn);
  }
}

?>
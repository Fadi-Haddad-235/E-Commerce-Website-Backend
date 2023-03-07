<?php
header('Access-Control-Allow-Origin: *');

header("Access-Control-Allow-Methods:GET,POST,PUT,DELETE,OPTIONS");
include ('connection.php');

$id = $_GET["id"];

// Delete the item from the database
$query = $mysqli->prepare("DELETE FROM items WHERE item_id =?");
$query->bind_param("i", $id);

if ($query->execute()) {
  // Return a success message as a JSON response
  echo "Item deleted successfully.";
  $response["status"]=true;
} else {
  // Return an error message as a JSON response
  echo "Error deleting item: " . $mysqli->error;
  $response["status"]=false;

}

echo json_encode($response);
?>
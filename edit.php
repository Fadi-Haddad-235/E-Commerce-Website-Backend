<?php
header('Access-Control-Allow-Origin: *');

include('connection.php');

$id=$_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$category = $_POST['category'];
$imageURL = $_POST['imageURL'];
$price = $_POST['price'];

$stmt = $mysqli->prepare('UPDATE items SET item_name=?, item_description=?, item_category=?, item_img_src=?, item_price=? WHERE item_id=?');

mysqli_stmt_bind_param($stmt,"ssssii", $name, $description, $category, $imageURL, $price, $id);

if (mysqli_stmt_execute($stmt)) {
    echo "Data updated successfully!";
} else {
    echo "Error updating data.";
}

?>
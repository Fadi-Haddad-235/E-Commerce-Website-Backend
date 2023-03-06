<?php
include('connection.php');

$name = $_POST['name'];
$description = $_POST['description'];
$category = $_POST['category'];
$imageURL = $_POST['imageURL'];
$price = $_POST['price'];

$check_name = $mysqli->prepare('select item_name from items where item_name=?');
$check_name->bind_param('s', $name);
$check_name->execute();
$check_name->store_result();
// $name_exists = $name->num_rows();

// if ($name_exists > 0) {
//     $response['status'] = "failed";
// } else {
    $query = $mysqli->prepare('insert into items(item_name, item_price, item_description, item_img_src, item_category) values(?,?,?,?,?)');
    $query->bind_param('sisss', $name, $price, $description, $imageURL, $category);
    $query->execute();
    $response['status'] = "success";

    $item = [
        "item_id" => $item_id,
        "item_name" => $name,
        "item_price" => $price,
        "item_description" => $description,
        "item_img_src" => $imageURL,
        "item_category" => $category,
    ];
    $response['addedItem']=$item;

// }   
echo json_encode($response);
?>
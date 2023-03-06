<?php
header('Access-Control-Allow-Origin: *');

include ('connection.php');

$items = [];
$query = $mysqli->prepare("SELECT * FROM items");
$query->execute();
$query->bind_result($item_id, $item_name,$item_price, $item_description, $item_img_src,$item_category);

while ($query->fetch()) {
    $item = [
        "item_id" => $item_id,
        "item_name" => $item_name,
        "item_price" => $item_price,
        "item_description" => $item_description,
        "item_img_src" => $item_img_src,
        "item_category" => $item_category,
    ];
    $items[] = $item;
}

echo json_encode($items);
?>
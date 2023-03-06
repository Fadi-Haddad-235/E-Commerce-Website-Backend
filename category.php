<?php
include ('connection.php');

$category = $_GET['category'];

$categories = array();
$qeury = $mysqli->prepare("SELECT * FROM items where item_category=?");
$qeury->bind_param('s',$category);
$qeury->execute();
$qeury->bind_result($item_id, $item_name,$item_price, $item_description, $item_img_src,$item_category);


while ($qeury->fetch()) {
    $item = array(
        "id" => $item_id,
        "name" => $item_name,
        "price" => $item_price,
        "description" => $item_description,
        "src"=>$item_img_src,
        "category"=>$item_category,
    );
    $categories[] = $item;
}
echo json_encode($categories);

?>
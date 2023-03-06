
<?php
include ('connection.php');
$items = array();
$qeury = $mysqli->prepare("SELECT * FROM items");
$qeury->execute();
$qeury->bind_result($item_id, $item_name,$item_price, $item_description, $item_img_src);

while ($qeury->fetch()) {
    $item = array(
        "id" => $item_id,
        "name" => $item_name,
        "price" => $item_price,
        "description" => $item_description,
        "src"=>$item_img_src,
    );
    $items[] = $item;
}

echo json_encode($items);
?>

<?php
include ('connection.php');

$logged_user= $_GET['logged_user'];

$query = $mysqli->prepare("SELECT * FROM favorites
    INNER JOIN items ON favorites.item_id = items.item_id
    WHERE favorites.user_id =?");
$query->bind_param('i',$logged_user);
$query->execute();
$query->bind_result($item_id, $item_name,$item_price, $item_description, $item_img_src,$item_category);

$favorites = array();

while ($query->fetch()) {
    $item = array(
        "id" => $item_id,
        "name" => $item_name,
        "price" => $item_price,
        "description" => $item_description,
        "src"=>$item_img_src,
        "category"=>$item_category,
    );
    $favorites[] = $item;
}


echo json_encode($favorites);
?>
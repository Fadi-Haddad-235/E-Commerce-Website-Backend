<?php

include('connection.php');

$id = $_GET["id"];

$query= $mysqli->prepare("select * from items where item_id=?");
$query->bind_param("i",$id);
$query->execute();
$result = $query->get_result();

while ($object = $result->fetch_assoc()){
    $data = $object;
}

$response["product"] = $data;

echo json_encode($response);

?>
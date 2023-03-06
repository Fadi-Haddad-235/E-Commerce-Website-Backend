<?php

include('connection.php');
//Product details
$id = $_GET["id"];
$category=$_GET["category"];

$query= $mysqli->prepare("select * from items where item_id=?");
$query->bind_param("i",$id);
$query->execute();
$result = $query->get_result();

while ($object = $result->fetch_assoc()){
    $data = $object;
}

$response["product"] = $data; 

echo json_encode($response);



//Similar products

$querySimilar=$mysqli->prepare("select * from items where item_category=?");
$querySimilar->bind_param("s",$category);
$querySimilar->execute();
$resultSimilar = $querySimilar->get_result();

while($objectSimilar = $resultSimilar->fetch_assoc()){
    $array[]=$objectSimilar;
}

$responseSimilar['similar']=$array;

echo json_encode($responseSimilar);


?>
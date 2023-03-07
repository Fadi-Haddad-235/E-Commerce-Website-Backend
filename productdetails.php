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


// Similar products

$querySimilar=$mysqli->prepare("SELECT * FROM `items` WHERE  item_category=? AND item_id!=? ORDER BY RAND()
LIMIT 6 ");
$querySimilar->bind_param("si",$category,$id);
$querySimilar->execute();
$resultSimilar = $querySimilar->get_result();

while($objectSimilar = $resultSimilar->fetch_assoc()){
    $array[]=$objectSimilar;
}

$response['similar']=$array;

echo json_encode($response);


// ?>
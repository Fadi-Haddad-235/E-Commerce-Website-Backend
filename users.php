<?php
header('Access-Control-Allow-Origin: *');

include ('connection.php');

$users = [];
$query = $mysqli->prepare("SELECT * FROM users");
$query->execute();
$query->bind_result($id, $username, $email, $password);

while ($query->fetch()) {
    $user = array(
        "id" => $id,
        "username" => $username,
        "email" => $email,
        "password" => $password,
    );
    $users[] = $user;
}

echo json_encode($users);
?>
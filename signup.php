<?php
include('connection.php');
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$check_username = $mysqli->prepare('select user_name from users where user_name=?');
$check_username->bind_param('s', $username);
$check_username->execute();
$check_username->store_result();
$username_exists = $check_username->num_rows();

echo $username_exists;

$hashed_password = password_hash($password, PASSWORD_BCRYPT);
$response =array();
if ($username_exists > 0) {
    $response['status'] = "failed";
} else {
    $query = $mysqli->prepare('insert into users (user_name,password,email) values(?,?,?)');
    $query->bind_param('sss', $username, $hashed_password, $email);
    $query->execute();
    $response['status'] = "success";
}

echo json_encode($response);
?>
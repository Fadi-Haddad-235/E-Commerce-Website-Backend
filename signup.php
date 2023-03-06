<?php
include('connection.php');

$username = $_POST['username'];
$email=$_POST['email'];
$password = $_POST['password'];

$check_email = $mysqli->prepare('select email from users where email=?');
$check_email->bind_param('s', $email);
$check_email->execute();
$check_email->store_result();
$email_exists = $email->num_rows();

$hashed_password = password_hash($password, PASSWORD_BCRYPT);

if ($email_exists > 0) {
    $response['status'] = "failed";
} else {
    $query = $mysqli->prepare('insert into users(user_name,email,password) values(?,?,?)');
    $query->bind_param('sss', $username, $email, $hashed_password);
    $query->execute();
    $response['status'] = "success";
}
echo json_encode($response);
?>
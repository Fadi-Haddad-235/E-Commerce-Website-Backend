<?php
include('connection.php');
$username = $_POST['username'];
$email=$_POST['email'];
$password = $_POST['password'];
<<<<<<< HEAD
$email = $_POST['email'];

$check_username = $mysqli->prepare('select user_name from users where user_name=?');
$check_username->bind_param('s', $username);
$check_username->execute();
$check_username->store_result();
$username_exists = $check_username->num_rows();
=======

$check_email = $mysqli->prepare('select email from users where email=?');
$check_email->bind_param('s', $email);
$check_email->execute();
$check_email->store_result();
$email_exists = $email->num_rows();
>>>>>>> 30538af9900d3d0aab3cbe3816b9da80c571555b

echo $username_exists;

$hashed_password = password_hash($password, PASSWORD_BCRYPT);

if ($email_exists > 0) {
    $response['status'] = "failed";
} else {
<<<<<<< HEAD
    $query = $mysqli->prepare('insert into users (user_name,password,email) values(?,?,?)');
    $query->bind_param('sss', $username, $hashed_password, $email);
=======
    $query = $mysqli->prepare('insert into users(user_name,email,password) values(?,?,?)');
    $query->bind_param('sss', $username, $email, $hashed_password);
>>>>>>> 30538af9900d3d0aab3cbe3816b9da80c571555b
    $query->execute();
    $response['status'] = "success";
}
echo json_encode($response);
?>
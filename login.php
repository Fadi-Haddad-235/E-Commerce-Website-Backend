<?php
include('connection.php');

$email = $_POST['email'];
$password = $_POST['password'];

$query = $mysqli->prepare('select id,user_name,password from users where email=?');
$query->bind_param('s', $email);
$query->execute();

$query->store_result();
$num_rows = $query->num_rows();
$query->bind_result($id, $username, $hashed_password);
$query->fetch();
$response = [];
if ($num_rows == 0) {
    $response['response'] = "user not found";
} else {
    if (password_verify($password, $hashed_password)) {
        $response['response'] = "logged in";
        $response['user_id'] = $id;
        $response['username'] = $username;

    } else {
        $response["response"] = "Incorrect password";
    }
}

echo json_encode($response);
?>


<?php
include '../connection.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$sql_check_username = "SELECT * FROM user WHERE username='$username'";
$result_check_username = $connect->query($sql_check_username);

if($result_check_username->num_rows > 0){
    echo json_encode(array('success' => false, 'message' => 'username'));
}else{
    $sql = "INSERT INTO user SET username='$username',password='$password',image='default_user_image.jpg'";
    $result = $connect->query($sql);

    if($result){
        echo json_encode(array('success' => true));
    }else{
        echo json_encode(array('success' => false));
    }
}
<?php
include '../connection.php';

$id = $_POST['id'];
$old_image = $_POST['old_image'];
$new_image = $_POST['new_image'];
$new_base64code = $_POST['new_base64code'];

$sql = "UPDATE user
        SET
        image = '$new_image'
        WHERE
        id = '$id'
        ";
$result = $connect->query($sql);

if ($result) {
    if ($old_image != "default_user_image.jpg") {
        unlink("../image/user/" . $old_image);
    }
    file_put_contents("../image/user/" . $new_image, base64_decode($new_base64code));
    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("success" => false));
}
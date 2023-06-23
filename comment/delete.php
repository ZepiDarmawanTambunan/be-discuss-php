<?php
include '../connection.php';

$id = $_POST['id'];
$image = $_POST['image'];

$sql = "DELETE FROM comment WHERE id='$id'";
$result = $connect->query($sql);

if($result){
    if($image != ''){
        unlink('../image/comment/'.$image);
    }
    echo json_encode(array('success' => true));
}else{
    echo json_encode(array('success' => false));
}
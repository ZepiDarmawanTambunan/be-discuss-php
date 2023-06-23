<?php
include '../connection.php';

$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];

$sql = "UPDATE topic SET title='$title',description='$description' WHERE id='$id'";
$result = $connect->query($sql);

if($result){
    echo json_encode(array('success' => true));
}else{
    echo json_encode(array('success' => false));
}
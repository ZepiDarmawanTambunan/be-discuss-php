<?php
include '../connection.php';

$from_id_user = $_POST['from_id_user'];
$to_id_user = $_POST['to_id_user'];

$sql = "SELECT * FROM follow WHERE from_id_user='$from_id_user' AND to_id_user='$to_id_user'";
$result = $connect->query($sql);

if($result->num_rows > 0){
    echo json_encode(array('success' => true));
}else{
    echo json_encode(array('success' => false));
}
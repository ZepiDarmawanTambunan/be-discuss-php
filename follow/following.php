<?php
include '../connection.php';

$from_id_user = $_POST['from_id_user'];
$to_id_user = $_POST['to_id_user'];

// klik tombol follow
$sql = "INSERT INTO follow SET from_id_user='$from_id_user', to_id_user='$to_id_user'";
$result = $connect->query($sql);

if($result){
    echo json_encode(array('success' => true));
}else{
    echo json_encode(array('success' => false));
}
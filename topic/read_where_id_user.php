<?php
include '../connection.php';

$id_user = $_POST['id_user'];

$sql = "SELECT * FROM topic
        WHERE
        id_user = '$id_user'
        ";
$result = $connect->query($sql);

// sama seperti $model = Topic::with('user')->where('id_user', $id_user)->get();
if($result->num_rows > 0) {    
    $data = array();
    while($get_row = $result->fetch_assoc()) {
        $data[] = $get_row;
    }
    echo json_encode(array(
        "success"=>true,
        "data"=> $data,
    ));
} else {
    echo json_encode(array(
        "success"=>false,
        "data"=>[],
    ));
}
<?php
include '../connection.php';

$id_user = $_POST['id_user'];


// melihat siapa saja yang memfollow kita
$sql = "SELECT * FROM follow WHERE to_id_user='$id_user'";
$result = $connect->query($sql);

if($result->num_rows > 0){
    $data = array();
    while ($row_follower = $result->fetch_assoc()) {
        $id_follower = $row_follower['from_id_user'];
        $sql_user = "SELECT * FROM user WHERE id='$id_follower'";
        $result_user = $connect->query($sql_user);
        $user = array();
        while ($row_user = $result_user->fetch_assoc()) {
            $user[] = $row_user;
        }
        $data[] = $user[0];
    }
    echo json_encode(array('success' => true, 'data' => $data));
}else{
    echo json_encode(array('success' => false, 'data' => []));
}
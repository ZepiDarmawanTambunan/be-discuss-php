<?php
include '../connection.php';

$id_user = $_POST['id_user'];

// melihat siapa saja yang kita follow
$sql = "SELECT * FROM follow WHERE from_id_user='$id_user'";
$result = $connect->query($sql);

if($result->num_rows > 0){
    $data = array();
    while ($row_following = $result->fetch_assoc()) {
        $id_following = $row_following['to_id_user'];
        $sql_user = "SELECT * FROM user WHERE id='$id_following'";
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
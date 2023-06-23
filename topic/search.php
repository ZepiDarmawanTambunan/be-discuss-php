<?php
include '../connection.php';

$search_query = $_POST['search_query'];

$sql = "SELECT * FROM topic WHERE title LIKE '%$search_query%' OR description LIKE'%$search_query%'";
$result = $connect->query($sql);

if($result->num_rows > 0){
    $data = array();
    while ($get_row = $result->fetch_assoc()) {
        $id_user = $get_row['id_user'];
        $sql_user = "SELECT * FROM  user WHERE id='$id_user'";
        $result_user = $connect->query($sql);
        $user = array();
        while ($row_user = $result_user->fetch_assoc()) {
            $user[] = $row_user;
        }
        $get_row['user'] = $user[0];
        $data[] = $get_row;
    }
    echo json_encode(array('success' => true, 'data' => $data));
}else{
    echo json_encode(array('success' => false, 'data' => []));
}
<?php
include '../connection.php';

$id_user = $_POST['id_user'];

$sql_topic = "SELECT id FROM topic
              WHERE
              id_user = '$id_user'
              ";
$result_topic = $connect->query($sql_topic);

$sql_follower = "SELECT id FROM follow
                 WHERE
                 to_id_user = '$id_user'
                 ";
$result_follower = $connect->query($sql_follower);

$sql_following = "SELECT id FROM follow
                  WHERE
                  from_id_user = '$id_user'
                  ";
$result_following = $connect->query($sql_following);

// info misal zepi_darmawan (topic: 4 topik, follower: 100 org, following: 12 org)
echo json_encode(array(
    "topic"=> floatval($result_topic->num_rows),
    "follower"=> floatval($result_follower->num_rows),
    "following"=> floatval($result_following->num_rows),
));
<?php
session_start();
$db = $_SESSION['db'];
if(!empty($_POST)){
date_default_timezone_set('Africa/Cairo');
include_once "../../conn/conn.php";
$today = date('Y-m-d');
$query_all_in_it = "SELECT * FROM parcel_send  WHERE date = '".date('Y-m-d')."'";
$result = mysqli_query($conn, $query_all_in_it);
$row_count = mysqli_num_rows($result);
if($row_count > 0){
while($row_pc=mysqli_fetch_assoc($result)){

        $row_read_dvice_json[] = $row_pc;
    }
    echo json_encode($row_read_dvice_json,JSON_UNESCAPED_UNICODE);
}
else {
    echo json_encode(array('message' => 'no datas found'));
}
} else {
   header('location:../views');
}
?>
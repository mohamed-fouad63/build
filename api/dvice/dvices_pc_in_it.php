<?php
session_start();
$db = $_SESSION['db'];
if(!empty($_GET)){
include_once "../../conn/conn.php";
$dvice_id = $_GET['dvice_id'];
$query_all_in_it = 'SELECT * FROM in_it WHERE status= "in_it" AND id = "'.$dvice_id.'"';
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
  header('location:../../views');
}
?>
<?php
session_start();
$db = $_SESSION['db'];
include_once "../../conn/conn.php";
$query_all_in_it = "SELECT office_type, count(office_type) FROM `all1` GROUP by office_type ORDER BY count(office_type) DESC";
$result = mysqli_query($conn, $query_all_in_it);
$row_count = mysqli_num_rows($result);
if($row_count > 0){
while($row_pc=mysqli_fetch_assoc($result)){
        $row_read_dvice_json[] = $row_pc;
    }
    echo json_encode($row_read_dvice_json,JSON_UNESCAPED_UNICODE);
}
else {
    $emptyresult = [];
    echo json_encode($emptyresult);
}
?>
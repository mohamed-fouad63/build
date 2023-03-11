<?php
session_start();
if ($_SESSION['db'] && !empty($_GET)) {
    $db = $_SESSION['db'];
    include_once "../../conn/conn.php";
    $b = $_GET['b'];
    $id = $_GET['id'];
    $query_all_in_it = "SELECT
        office_name,dvice_type,dvice_name,sn,pc_doman_name,ip,floor_name,building_name
        FROM `dvice` WHERE building_id = '$b' and id = '$id'";
    $result = mysqli_query($conn, $query_all_in_it);
    $row_count = mysqli_num_rows($result);
    if ($row_count > 0) {
        while ($row_pc = mysqli_fetch_assoc($result)) {
            $row_read_dvice_json[] = $row_pc;
        }
        echo json_encode($row_read_dvice_json, JSON_UNESCAPED_UNICODE);
    } else {
        $emptyresult = [];
        echo json_encode($emptyresult);
    }
} else {
    header('location:../../views');
}
?>
<?php
session_start();
if ($_SESSION['all_dvices'] and !empty($_POST)) {
    $db = $_SESSION['db'];
    include_once "../../conn/conn.php";
    $query_all_in_it = "
        SELECT dvice.num,dvice.office_name,dvice.dvice_name,dvice.dvice_type,dvice.sn,dvice.ip,all1.floor_name,all1.building_name FROM dvice
        LEFT JOIN
        all1
        ON dvice.office_name = all1.office_name
        ORDER BY office_name ASC
        ";
    $result = mysqli_query($conn, $query_all_in_it);
    $row_count = mysqli_num_rows($result);
    if ($row_count > 0) {
        while ($row_pc = mysqli_fetch_assoc($result)) {
            $row_read_dvice_json[] = $row_pc;
        }
        echo json_encode($row_read_dvice_json, JSON_UNESCAPED_UNICODE);
    } else {
        echo json_encode(array('message' => 'no datas found'));
    }
} else {
    header('location:../../views');
}
?>
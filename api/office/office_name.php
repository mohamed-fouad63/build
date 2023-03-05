<?php
session_start();
// $db = $_SESSION['db'];
$db = $_SESSION['db'];
if ($_SESSION['role'] == 'admin') {
    $user_id = '';
} else {
    $user_id = $_SESSION['id'];
}
if (!empty($_GET)) {
    $input_search = $_GET['phrase'];
    if (!empty($input_search)) {
        $input_search = $_GET['phrase'];
    } else {
        $input_search = '';
    }
    if ($_SESSION['db']) {
        include_once "../../conn/conn.php";
        $query_all_in_it = "
        SELECT all1.id,all1.office_name,floors.id_it,all1.building_name,all1.floor_name FROM `all1`
        LEFT JOIN floors 
        ON all1.floor_name = floors.floor_name AND all1.building_name = floors.building_name
        WHERE floors.id_it LIKE '%$user_id%' AND all1.office_name LIKE '%$input_search%'
";
        $result = mysqli_query($conn, $query_all_in_it);

        while ($row_pc = mysqli_fetch_assoc($result)) {

            $row_read_dvice_json[] = $row_pc;
        }
        echo json_encode($row_read_dvice_json, JSON_UNESCAPED_UNICODE);
    }
} else {
    header('location:../../views');
}
?>
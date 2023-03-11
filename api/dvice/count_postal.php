<?php
session_start();
if ($_SESSION['db'] && !empty($_POST)) {
    $db = $_SESSION['db'];
    $dvice_type = $_POST['dvice_type'];
    include_once "../../conn/conn.php";
    $query_all_in_it = "SELECT dvice_name,COUNT(dvice_name) FROM dvice where id='postal' AND dvice_type='$dvice_type' GROUP BY dvice_name ORDER BY `dvice`.`dvice_name` ASC";
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
<?php
session_start();
// $db = $_SESSION['db'];
$db = $_SESSION['db'];
if (!empty($_POST)) {
    $office_name = filter_var($_POST['office_name'], FILTER_SANITIZE_STRING);
    $dvice_name = filter_var($_POST['dvice_name'], FILTER_SANITIZE_STRING);
    $dvice_sn = filter_var($_POST['dvice_sn'], FILTER_SANITIZE_STRING);
    $building_name = filter_var($_POST['building_name'], FILTER_SANITIZE_STRING);
    $building_id = filter_var($_POST['building_id'], FILTER_SANITIZE_STRING);
    $floor_name = filter_var($_POST['floor_name'], FILTER_SANITIZE_STRING);
    $floor_id = filter_var($_POST['floor_id'], FILTER_SANITIZE_STRING);
    $office_id = filter_var($_POST['office_id'], FILTER_SANITIZE_STRING);

    if ($_SESSION['db']) {
        include_once "../../conn/conn.php";

        $sql_count_sn = "SELECT sn FROM dvice WHERE sn = '$dvice_sn' ";
        $result1 = mysqli_query($conn, $sql_count_sn);
        $row_count = mysqli_num_rows($result1);
        $sql_insert = "
            INSERT INTO dvice
            (id,office_id,office_name,sn,code_inventory,dvice_type,dvice_name,floor_id,floor_name,building_id,building_name)
            SELECT
            id,'$office_id','$office_name','$dvice_sn',code_inventory,dvice_type,'$dvice_name','$floor_id','$floor_name','$building_id','$building_name' FROM dvice_type
            WHERE dvice_name_new = '$dvice_name' ;";
        if (!empty($office_name) || !empty($dvice_name)) {
            if ($row_count < 1) {
                $result = $conn->prepare($sql_insert);
                $result->execute();
                echo "done";
            } else {
                echo "سريال مكرر";
            }

        } else {
            echo "تعذر اضافه الجهاز";
        }
    }
} else {
    header('location:../../views');
}
?>
<?php
session_start();
// $db = $_SESSION['db'];
$db = $_SESSION['db'];
$user_id = filter_var($_POST['user_id'], FILTER_SANITIZE_STRING);

if (!empty($_POST)) {
    if (filter_var($user_id, FILTER_VALIDATE_INT) !== false) {
        if ($_SESSION['db']) {
            include_once "../../conn/conn.php";
            $sql_update = "DELETE FROM `tbl_user` WHERE id  = '$user_id'";
            $sql_user_floors = "UPDATE floors set id_it = '' WHERE id_it = '$user_id' ";
            $conn->query($sql_update);
            $conn->query($sql_user_floors);
            echo 'done';
        }
    } else {
        echo 'رقم ملف غير صالح';
    }

} else {
    header('location:../../views');
}
?>